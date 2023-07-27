<?php

namespace App\Repositories;

use App\Models\Organizer;
use App\Repositories\Interfaces\SponserRepositoryInterface;
use App\Models\Sponser;

class SponserRepository implements SponserRepositoryInterface
{
    public function allSponser()
    {
        return Sponser::orderby('sponser_id','desc')->get();
    }

    public function storeSponser($data)
    {
        return Sponser::create($data);
    }

    public function findSponser($id)
    {
        return Sponser::find($id);
    }

    public function updateSponser($data, $id)
    {
        $sponser = Sponser::where('sponser_id', $id)->first();
        $updatedSponser = null;
        if($sponser)
        {
            $updatedSponser = $sponser->update($data);
        }
        return $updatedSponser;
    }

    public function destroySponser($id)
    {
        $sponser = Sponser::find($id);
        $deleteSponser = null;
        if($sponser)
        {
            $deleteSponser = $sponser->delete();
        }
        return $deleteSponser;
    }
}
