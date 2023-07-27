<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function allCity()
    {
        return City::orderby('city_id','desc')->with('country')->get();
    }

    public function storeCity($data)
    {
        $countryId = $data['country_id'];
        $storeCountry = null;

        if($countryId && $countryId != null)
        {
            $storeCountry = City::create($data);
        }
        return $storeCountry;
    }

    public function findCity($id)
    {
        return City::find($id);
    }

    public function updateCity($data, $id)
    {
        $city = City::where('city_id', $id)->first();
        $updatedCity = null;
        if($city)
        {
            $updatedCity = $city->update($data);
        }
        return $updatedCity;
    }

    public function destroyCity($id)
    {
        $city = City::find($id);
        $deleteCity = null;
        if($city)
        {
            $deleteCity = $city->delete();
        }
        return $deleteCity;
    }
}
