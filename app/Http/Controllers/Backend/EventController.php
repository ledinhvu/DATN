<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Repositories\EventRepository;
use App\Repositories\MenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventController extends AppBaseController
{
    /** @var  EventRepository */
    private $eventRepository;

    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(EventRepository $eventRepo, MenuRepository $menuRepo)
    {
        $this->middleware('auth');
        $this->eventRepository = $eventRepo;
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the Event.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventRepository->pushCriteria(new RequestCriteria($request));
        $events = $this->eventRepository->all();

        return view('backend.events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new Event.
     *
     * @return Response
     */
    public function create()
    {
        $menus = $this->menuRepository->all();

        return view('backend.events.create')->with('menus', $menus);
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param CreateEventRequest $request
     *
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();
        
        $id_menu = $request->input('menu');
        $title = $request->input('title');
        $content = $request->input('content');
        $re_count = $request->input('re_count');
        $token = $input['_token'];

        $data = array('_token' => $token,'title' => $title,'content' => $content, 're_count'=> $re_count);

        $event = $this->eventRepository->create($data);

        $event->menus()->attach($id_menu);

        Flash::success('Event saved successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Display the specified Event.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('backend.events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        $menus = $this->menuRepository->all();

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('backend.events.edit', compact('event', 'menus'));
    }

    /**
     * Update the specified Event in storage.
     *
     * @param  int              $id
     * @param UpdateEventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventRequest $request)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        $id_menu = $request->menu;
        $title = $request->title;
        $content = $request->content;
        $re_count = $request->re_count;

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $data = array('title' => $title,'content' => $content, 're_count'=> $re_count);

        $event = $this->eventRepository->update($data, $id);
        $event->menus()->sync([$id_menu]);

        Flash::success('Event updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
}
