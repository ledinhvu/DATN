<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateaboutRequest;
use App\Http\Requests\UpdateaboutRequest;
use App\Repositories\AboutRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class aboutController extends AppBaseController
{
    /** @var  aboutRepository */
    private $aboutRepository;

    public function __construct(AboutRepository $aboutRepo)
    {
        $this->middleware('auth');
        $this->aboutRepository = $aboutRepo;
    }

    /**
     * Display a listing of the about.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->aboutRepository->pushCriteria(new RequestCriteria($request));
        $abouts = $this->aboutRepository->all();

        return view('backend.abouts.index')
            ->with('abouts', $abouts);
    }

    /**
     * Show the form for creating a new about.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.abouts.create');
    }

    /**
     * Store a newly created about in storage.
     *
     * @param CreateaboutRequest $request
     *
     * @return Response
     */
    public function store(CreateaboutRequest $request)
    {
        $input = $request->all();

        $about = $this->aboutRepository->create($input);

        Flash::success('About saved successfully.');

        return redirect(route('abouts.index'));
    }

    /**
     * Display the specified about.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        return view('backend.abouts.show')->with('about', $about);
    }

    /**
     * Show the form for editing the specified about.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        return view('backend.abouts.edit')->with('about', $about);
    }

    /**
     * Update the specified about in storage.
     *
     * @param  int              $id
     * @param UpdateaboutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaboutRequest $request)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        $about = $this->aboutRepository->update($request->all(), $id);

        Flash::success('About updated successfully.');

        return redirect(route('abouts.index'));
    }

    /**
     * Remove the specified about from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        $this->aboutRepository->delete($id);

        Flash::success('About deleted successfully.');

        return redirect(route('abouts.index'));
    }
}
