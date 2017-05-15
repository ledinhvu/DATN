<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateImagesRequest;
use App\Http\Requests\UpdateImagesRequest;
use App\Repositories\ImagesRepository;
use App\Repositories\LessonRepository;
use App\Repositories\NewsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ImagesController extends AppBaseController
{
    /** @var  ImagesRepository */
    private $imagesRepository;

    /** @var  LessonRepository */
    private $lessonRepository;

    /** @var  NewsRepository */
    private $newsRepository;

    public function __construct(ImagesRepository $imagesRepo, LessonRepository $lessonRepo, NewsRepository $newsRepo)
    {
        $this->middleware('auth');
        $this->imagesRepository = $imagesRepo;
        $this->lessonRepository = $lessonRepo;
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the Images.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->imagesRepository->pushCriteria(new RequestCriteria($request));
        $images = $this->imagesRepository->all();

        return view('backend.images.index')
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new Images.
     *
     * @return Response
     */
    public function create()
    {
        $lesson = $this->lessonRepository->all();

        $news = $this->newsRepository->all();

        return view('backend.images.create', compact('lesson', 'news'));
    }

    /**
     * Store a newly created Images in storage.
     *
     * @param CreateImagesRequest $request
     *
     * @return Response
     */
    public function store(CreateImagesRequest $request)
    {
        $input = $request->all();
        
        if($input['news']==null){
            $data = array('_token' => $input['_token'], 'lesson'=> $input['lesson'], 'image' => $input['image'] );
        }
        if($input['lesson']==null){
            $data = array('_token' => $input['_token'], 'news'=> $input['news'], 'image' => $input['image'] );
        }
        if(($input['news']==null)&&($input['lesson']==null)){
            $data = array('_token' => $input['_token'], 'image' => $input['image'] );
        }
        if(($input['news']!=null)&&($input['lesson']!=null)){
            $data = array('_token' => $input['_token'], 'news'=> $input['news'], 'lesson'=> $input['lesson'], 'image' => $input['image'] );
        }

        if ($request->hasFile('image')) {
     
            $images = $request->file('image');
            $number = 0;
            foreach($images as $image){
  
                $imagename=time() .'_'.$number. '.'. $image->getClientOriginalExtension();
                $data['name'] = $imagename;

                $image->move(public_path(config('path.upload_img')), $imagename);
                
                $image = $this->imagesRepository->create($data);
                $number++;
            }
        }

        Flash::success('Images saved successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Display the specified Images.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $images = $this->imagesRepository->findWithoutFail($id);

        if (empty($images)) {
            Flash::error('Images not found');

            return redirect(route('images.index'));
        }

        return view('backend.images.show')->with('images', $images);
    }

    /**
     * Show the form for editing the specified Images.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $images = $this->imagesRepository->findWithoutFail($id);

        $news = $this->newsRepository->all();

        $lesson = $this->lessonRepository->all();

        if (empty($images)) {
            Flash::error('Images not found');

            return redirect(route('images.index'));
        }

        return view('backend.images.edit', compact('images', 'news', 'lesson'));
    }

    /**
     * Update the specified Images in storage.
     *
     * @param  int              $id
     * @param UpdateImagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImagesRequest $request)
    {
        $input = $request->all();
        $id_news = $input['news'];
        $id_lesson = $input['lesson'];
        
        if($input['news']==null){
            $data = array('_token' => $input['_token'], 'lesson'=> $input['lesson'], 'image' => $input['image'] );
        }
        if($input['lesson']==null){
            $data = array('_token' => $input['_token'], 'news'=> $input['news'], 'image' => $input['image'] );
        }
        if(($input['news']==null)&&($input['lesson']==null)){
            $data = array('_token' => $input['_token'], 'image' => $input['image'] );
        }
        if(($input['news']!=null)&&($input['lesson']!=null)){
            $data = array('_token' => $input['_token'], 'news'=> $input['news'], 'lesson'=> $input['lesson'], 'image' => $input['image'] );
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time().'.'. $img->getClientOriginalExtension();
            $input['name'] = $imagename;
            $img->move(public_path(config('path.upload_img')), $imagename);
        }

        $images = $this->imagesRepository->findWithoutFail($id);

        if (empty($images)) {
            Flash::error('Images not found');

            return redirect(route('images.index'));
        }

        $images = $this->imagesRepository->update($input, $id);

        Flash::success('Images updated successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Remove the specified Images from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $images = $this->imagesRepository->findWithoutFail($id);

        if (empty($images)) {
            Flash::error('Images not found');

            return redirect(route('images.index'));
        }

        $this->imagesRepository->delete($id);

        Flash::success('Images deleted successfully.');

        return redirect(route('images.index'));
    }
}
