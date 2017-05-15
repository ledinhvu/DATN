<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Repositories\LessonRepository;
use App\Repositories\MenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LessonController extends AppBaseController
{
    /** @var  LessonRepository */
    private $lessonRepository;

    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(LessonRepository $lessonRepo, MenuRepository $menuRepo)
    {
        $this->middleware('auth');
        $this->lessonRepository = $lessonRepo;
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the Lesson.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lessonRepository->pushCriteria(new RequestCriteria($request));
        $lessons = $this->lessonRepository->all();

        return view('backend.lessons.index')
            ->with('lessons', $lessons);
    }

    /**
     * Show the form for creating a new Lesson.
     *
     * @return Response
     */
    public function create()
    {
        $menus = $this->menuRepository->all();

        return view('backend.lessons.create')->with('menus', $menus);
    }

    /**
     * Store a newly created Lesson in storage.
     *
     * @param CreateLessonRequest $request
     *
     * @return Response
     */
    public function store(CreateLessonRequest $request)
    {
        $input = $request->all();

        $id_menu = $request->input('menu');
        $name = $request->input('name');
        $content = $request->input('content');
        $url = $request->input('url');
        $token = $input['_token'];

        $data = array('_token' => $token,'name' => $name,'content' => $content, 'url'=> $url);

        $lesson = $this->lessonRepository->create($data);
        $lesson->menus()->attach($id_menu);

        Flash::success('Lesson saved successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Display the specified Lesson.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lesson = $this->lessonRepository->findWithoutFail($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        return view('backend.lessons.show')->with('lesson', $lesson);
    }

    /**
     * Show the form for editing the specified Lesson.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lesson = $this->lessonRepository->findWithoutFail($id);

        $menus = $this->menuRepository->all();

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        return view('backend.lessons.edit', compact('lesson', 'menus'));
    }

    /**
     * Update the specified Lesson in storage.
     *
     * @param  int              $id
     * @param UpdateLessonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLessonRequest $request)
    {
        $lesson = $this->lessonRepository->findWithoutFail($id);

        $id_menu = $request->menu;
        $name = $request->name;
        $content = $request->content;
        $url = $request->url;

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $data = array('name' => $name,'content' => $content, 'url'=> $url);

        $lesson = $this->lessonRepository->update($data, $id);
        $lesson->menus()->sync([$id_menu]);

        Flash::success('Lesson updated successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Remove the specified Lesson from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lesson = $this->lessonRepository->findWithoutFail($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $this->lessonRepository->delete($id);

        Flash::success('Lesson deleted successfully.');

        return redirect(route('lessons.index'));
    }
}
