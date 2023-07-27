<?php

namespace App\Repositories;

use App\Models\Organizer;
use App\Repositories\Interfaces\OrganizerrepositoryInterface;

class OrganizerRepository implements OrganizerrepositoryInterface
{
    public function allOrganizer()
    {
        return Organizer::orderby('organizer_id','desc')->get();
    }

    public function storeOrganizer($data)
    {
        return Organizer::create($data);
    }

    public function findOrganizer($id)
    {
        return Organizer::find($id);
    }

    public function updateOrganizer($data, $id)
    {
        $organizer = Organizer::where('organizer_id', $id)->first();
        $updatedOrganizer = null;
        if($organizer)
        {
            $updatedOrganizer = $organizer->update($data);
        }
        return $updatedOrganizer;
    }

    public function destroyOrganizer($id)
    {
        $organizer = Organizer::find($id);
        $deleteOrganizer = null;
        if($organizer)
        {
            $deleteOrganizer = $organizer->delete();
        }
        return $deleteOrganizer;
    }
}
