<?php

namespace App\Http\Controllers\admin\event;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Organizer;
use App\Models\Sponser;
use App\Models\Venue;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->allEvent();

        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventData = [];
        $event_category_id = EventCategory::select('event_category_id','name')->pluck('name','event_category_id');
        $venue_id = Venue::select('venue_id','venue_name')->pluck('venue_name','venue_id');
        $organizer_id = Organizer::select('organizer_id','name')->pluck('name','organizer_id');
        $sponser_id  = Sponser::select('sponser_id','sponser_name')->pluck('sponser_name','sponser_id');

        return view('admin.event.create',compact('event_category_id','venue_id','organizer_id','sponser_id','eventData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $this->eventRepository->storeEvent($request->all());

        return redirect()->route('event.index')->with('success','Event Record created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event_category_id = EventCategory::select('event_category_id','name')->pluck('name','event_category_id');
        $venue_id = Venue::select('venue_id','venue_name')->pluck('venue_name','venue_id');
        $organizer_id = Organizer::select('organizer_id','name')->pluck('name','organizer_id');
        $sponser_id  = Sponser::select('sponser_id','sponser_name')->pluck('sponser_name','sponser_id');

        $eventData = $this->eventRepository->findEvent($id);

        return view('admin.event.edit',compact('eventData','event_category_id','venue_id','organizer_id','sponser_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $eventData = $this->eventRepository->updateEvent($request->all(),$id);

        if($eventData){
            return redirect()->route('event.index')->with('success','Event Detail upadted successfully !!');
        }
        return redirect()->route('event.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventData = $this->eventRepository->destroyEvent($id);

        if($eventData){
            return redirect()->route('event.index')->with('success','Event Deleted successfully !!');
        }
        return redirect()->route('event.index')->with('error','The Data is not available !!');
    }
}
