<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventRepository;
use App\Repositories\MenuRepository;
use Flash;

class EventController extends AppBaseController
{
    /** @var  EventRepository */
    private $eventRepository;

    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(EventRepository $eventRepo, MenuRepository $menuRepo)
    {
        $this->eventRepository = $eventRepo;
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $event = $this->eventRepository->all()->last();

        $events = $this->eventRepository->all();

        return view('frontend.event.index', compact('event', 'events'));
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
        $item = $this->eventRepository->findWithoutFail($id);

        $event = $this->eventRepository->all();

        if (empty($item)) {
            Flash::error('event not found');

            return redirect(route('event.index'));
        }

        return view('frontend.event.show', compact('item', 'event'));
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
