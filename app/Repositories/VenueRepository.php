<?php

namespace App\Repositories;

use App\Repositories\Interfaces\VenueRepositoryInterfce;
use App\Models\Venue;
use Illuminate\Support\Facades\Hash;

class VenueRepository implements VenueRepositoryInterfce
{
    public function allVenue()
    {
        return Venue::orderby('venue_id','desc')->get();
    }

    public function storeVenue($data)
    {
        return Venue::create($data);
    }

    public function findVenue($id)
    {
        return Venue::find($id);
    }

    public function updateVenue($data, $id)
    {
        $venue = Venue::where('venue_id', $id)->first();
        $updatedVenue = null;
        if($venue)
        {
            $updatedVenue = $venue->update($data);
        }
        return $updatedVenue;
    }

    public function destroyVenue($id)
    {
        $venue = Venue::find($id);
        $deleteVenue = null;
        if($venue)
        {
            $deleteVenue = $venue->delete();
        }
        return $deleteVenue;
    }
}
