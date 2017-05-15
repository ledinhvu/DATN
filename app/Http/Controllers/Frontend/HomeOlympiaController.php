<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\NewsRepository;
use App\Repositories\CatalogRepository;
use App\Repositories\SupportRepository;
use App\Repositories\MenuRepository;
use App\Models\Catalog;
use App\Models\News;
use Flash;

class HomeOlympiaController extends AppBaseController
{
        /** @var  NewsRepository */
        private $newsRepository;

        /** @var  CatalogRepository */
        private $catalogRepository;

        /** @var  SupportRepository */
        private $supportRepository;

        /** @var  MenuRepository */
        private $menuRepository;

        public function __construct(NewsRepository $newsRepo, CatalogRepository $catalogRepo, 
        SupportRepository $supportRepo, MenuRepository $menuRepo)
        {
//         	$this->middleware('student');
            $this->newsRepository = $newsRepo;
            $this->catalogRepository = $catalogRepo;
            $this->supportRepository = $supportRepo;
            $this->menuRepository = $menuRepo;
        }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Catalog::select('name', 'id')->take(3)->get();

        $news = News::select('title', 'id', 'content')->take(4)->get();
        
        $menus = $this->menuRepository->all();

        $support = $this->supportRepository->all();
        
        return view('frontend.index', compact('categories', 'news'));
        
    }
    
    public function showCourse()
    {
    	return view('frontend.login.show');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        // $item = $this->newsRepository->findWithoutFail($id);

        // if (empty($item)) {
        //     Flash::error('News not found');

        //     return redirect(route('news.index'));
        // }

        // return view('frontend.news.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
