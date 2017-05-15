<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Repositories\MenuRepository;
use App\Repositories\CatalogRepository;
use App\Repositories\TimesRepository;
use App\Repositories\TeachersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MenuController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    /** @var  CatalogRepository */
    private $catalogRepository;

    /** @var  TimesRepository */
    private $timesRepository;

    /** @var  TeachersRepository */
    private $teachersRepository;

    public function __construct(MenuRepository $menuRepo, CatalogRepository $catalogRepo, TimesRepository $timesRepo, TeachersRepository $teachersRepo)
    {
        $this->middleware('auth');
        $this->menuRepository = $menuRepo;
        $this->catalogRepository = $catalogRepo;
        $this->timesRepository = $timesRepo;
        $this->teachersRepository = $teachersRepo;
    }

    /**
     * Display a listing of the Menu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menuRepository->pushCriteria(new RequestCriteria($request));
        $menus = $this->menuRepository->all();
        
        return view('backend.menus.index')
            ->with('menus', $menus);
    }

    /**
     * Show the form for creating a new Menu.
     *
     * @return Response
     */
    public function create()
    {
        $catalogs = $this->catalogRepository->all();

        $times = $this->timesRepository->all();

        $teachers = $this->teachersRepository->all();
        
        return view('backend.menus.create' , compact('catalogs', 'times', 'teachers'));
    }

    /**
     * Store a newly created Menu in storage.
     *
     * @param CreateMenuRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuRequest $request)
    {
        $input = $request->all();

        $times = $request->input('times');
        $teachers = $request->input('teachers');
        $id_cat = $request->input('id_cat');
        $name = $request->input('name');
        $cost = $request->input('cost');
        $description = $request->input('description');
        $token = $input['_token']; 
        
        $data = array('_token' => $token,'id_cat' => $id_cat,'id_teacher' => $teachers, 'name'=> $name, 'cost'=> $cost, 'description'=> $description);

        $menu = $this->menuRepository->create($data);
        
        $menu->times()->attach($times);
        
        Flash::success('Menu saved successfully.');

        return redirect(route('menus.index'));
    }

    /**
     * Display the specified Menu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }

        return view('backend.menus.show')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified Menu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        $catalogs = $this->catalogRepository->all();

        $times = $this->timesRepository->all();

        $teachers = $this->teachersRepository->all();

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }

        return view('backend.menus.edit', compact('catalogs', 'times', 'teachers', 'menu'));
    }

    /**
     * Update the specified Menu in storage.
     *
     * @param  int              $id
     * @param UpdateMenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuRequest $request)
    {
        $menu = $this->menuRepository->findWithoutFail($id);
        $times = $request->times;
        $teachers = $request->teachers;
        $id_cat = $request->id_cat;
        $description = $request->description;
        $name = $request->name;
        $cost = $request->cost;

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }
        $data =  array('id_cat' => $id_cat, 'id_teacher' => $teachers,'name' => $name, 'cost' => $cost, 'description' => $description);

        $menu = $this->menuRepository->update($data, $id);
        $menu->times()->sync([$times]);
        Flash::success('Menu updated successfully.');

        return redirect(route('menus.index'));
    }

    /**
     * Remove the specified Menu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }

        $this->menuRepository->delete($id);

        Flash::success('Menu deleted successfully.');

        return redirect(route('menus.index'));
    }
}
