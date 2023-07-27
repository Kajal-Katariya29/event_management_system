<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{
    public function allCountry()
    {
        return Country::orderby('country_id','desc')->get();
    }

    public function storeCountry($data)
    {
        return Country::create($data);
    }

    public function findCountry($id)
    {
        return Country::find($id);
    }

    public function updateCountry($data, $id)
    {
        $country = Country::where('country_id', $id)->first();
        $updatedCountry = null;
        if($country)
        {
            $updatedCountry = $country->update($data);
        }
        return $updatedCountry;
    }

    public function destroyCountry($id)
    {
        $country = Country::find($id);
        $deleteCountry = null;
        if($country)
        {
            $deleteCountry = $country->delete();
        }
        return $deleteCountry;
    }
}
