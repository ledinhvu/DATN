<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Repositories\FeedbackRepository;
use App\Repositories\StudentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FeedbackController extends AppBaseController
{
    /** @var  FeedbackRepository */
    private $feedbackRepository;

    /** @var  StudentRepository */
    private $studentRepository;

    public function __construct(FeedbackRepository $feedbackRepo, StudentRepository $studentRepo)
    {
        $this->middleware('auth');
        $this->feedbackRepository = $feedbackRepo;
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Feedback.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->feedbackRepository->pushCriteria(new RequestCriteria($request));
        $feedback = $this->feedbackRepository->all();

        return view('backend.feedback.index')
            ->with('feedback', $feedback);
    }

    /**
     * Show the form for creating a new Feedback.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.feedback.create');
    }

    /**
     * Store a newly created Feedback in storage.
     *
     * @param CreateFeedbackRequest $request
     *
     * @return Response
     */
    public function store(CreateFeedbackRequest $request)
    {
        $input = $request->all();

        $feedback = $this->feedbackRepository->create($input);

        Flash::success('Feedback saved successfully.');

        return redirect(route('feedback.index'));
    }

    /**
     * Display the specified Feedback.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        return view('backend.feedback.show')->with('feedback', $feedback);
    }

    /**
     * Show the form for editing the specified Feedback.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        return view('backend.feedback.edit')->with('feedback', $feedback);
    }

    /**
     * Update the specified Feedback in storage.
     *
     * @param  int              $id
     * @param UpdateFeedbackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeedbackRequest $request)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        $feedback = $this->feedbackRepository->update($request->all(), $id);

        Flash::success('Feedback updated successfully.');

        return redirect(route('feedback.index'));
    }

    /**
     * Remove the specified Feedback from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        $this->feedbackRepository->delete($id);

        Flash::success('Feedback deleted successfully.');

        return redirect(route('feedback.index'));
    }

}

