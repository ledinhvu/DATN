<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateteachersRequest;
use App\Http\Requests\UpdateteachersRequest;
use App\Repositories\TeachersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class teachersController extends AppBaseController
{
    /** @var  teachersRepository */
    private $teachersRepository;

    public function __construct(TeachersRepository $teachersRepo)
    {
        $this->middleware('auth');
        $this->teachersRepository = $teachersRepo;
    }

    /**
     * Display a listing of the teachers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->teachersRepository->pushCriteria(new RequestCriteria($request));
        $teachers = $this->teachersRepository->all();

        return view('backend.teachers.index')
            ->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new teachers.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created teachers in storage.
     *
     * @param CreateteachersRequest $request
     *
     * @return Response
     */
    public function store(CreateteachersRequest $request)
    {
        $input = $request->all();

        $teachers = $this->teachersRepository->create($input);

        Flash::success('Teachers saved successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified teachers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teachers = $this->teachersRepository->findWithoutFail($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        return view('backend.teachers.show')->with('teachers', $teachers);
    }

    /**
     * Show the form for editing the specified teachers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teachers = $this->teachersRepository->findWithoutFail($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        return view('backend.teachers.edit')->with('teachers', $teachers);
    }

    /**
     * Update the specified teachers in storage.
     *
     * @param  int              $id
     * @param UpdateteachersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateteachersRequest $request)
    {
        $teachers = $this->teachersRepository->findWithoutFail($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        $teachers = $this->teachersRepository->update($request->all(), $id);

        Flash::success('Teachers updated successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified teachers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teachers = $this->teachersRepository->findWithoutFail($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        $this->teachersRepository->delete($id);

        Flash::success('Teachers deleted successfully.');

        return redirect(route('teachers.index'));
    }
}
