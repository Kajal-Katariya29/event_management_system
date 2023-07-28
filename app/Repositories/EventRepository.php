<?php

namespace App\Repositories;

use App\Models\EventCategory;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use App\Models\Sponsorship;
use App\Models\EventMedia;

class EventRepository implements EventRepositoryInterface
{
    public function allEvent()
    {
        return Event::orderby('event_id','desc')->get();
    }

    public function storeEvent($data)
    {
        $event =  Event::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'event_category_id' => $data['event_category_id'],
            'venue_id' => $data['venue_id'],
            'organizer_id' => $data['organizer_id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'registration_deadline' => $data['registration_deadline'],
            'status' => $data['status']
        ]);

        if($data['sponser_id']){
            foreach($data['sponser_id'] as $sponserId){
                Sponsorship::create([
                    'event_id' => $event->event_id,
                    'sponser_id' => $sponserId
                ]);
            }
        }

        if ($images = $data['images']) {
            foreach ($images as $image) {
                $filename = $image->getClientOriginalName();
                $upload_path = 'admin/images/eventmedia/' . $event->event_id . "/";
                $image->move($upload_path, $filename);
                EventMedia::create([
                    'event_id' => $event->event_id,
                    'media_name' => $filename,
                    'media_type' => "image",
                    'media_path' => $upload_path,
                ]);
            }
        }
        return $event;
    }

    public function findEvent($id)
    {
        return Event::find($id)->with('eventMedia')->first();
    }

    public function updateEvent($data, $id)
    {
        $event = Event::where('event_id', $id)->first();
        $updatedEvent = null;
        if($event)
        {
            $updatedEvent = $event->update($data);
        }
        return $updatedEvent;
    }

    public function destroyEvent($id)
    {
        $event = Event::find($id);
        $deleteEvent = null;
        if($event)
        {
            $deleteEvent = $event->delete();
        }
        return $deleteEvent;
    }
}
