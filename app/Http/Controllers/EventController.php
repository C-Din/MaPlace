<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\Event as ResourcesEvent;
use App\Http\Resources\EventCollection;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EventCollection
     */
    public function index()
    {
        //return new EventCollection(Event::where('state', '!=', -1)->paginate(10));
        return new EventCollection(Event::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventRequest $request
     * @return ResourcesEvent
     */
    public function store(EventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'date_event' => $request->date_event,
            'time_event' => $request->time_event,
            'image_event' => $request->image_event,
            'location_id' => $request->location_id
        ]);

        return new ResourcesEvent($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  Event $event
     * @return ResourcesEvent
     */
    public function show(Event $event)
    {
        return new ResourcesEvent($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventRequest  $request
     * @param  Event  $event
     * @return ResourcesEvent
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update([
            'name' => $request->name,
            'date_event' => $request->date_event,
            'time_event' => $request->time_event,
            'state' => $request->state,
            'image_event' => $request->image_event,
            'location_id' => $request->location_id
        ]);

        return new ResourcesEvent($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event  $event
     * @return void
     */
    public function destroy(Event $event)
    {
        //$event->update(['state' => -1]);
        $event->delete();
    }
}
