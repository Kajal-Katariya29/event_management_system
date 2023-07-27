<?php

namespace App\Http\Controllers\admin\city;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $cityRepository;

    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->allCity();
        // dd($cities);

        return view('admin.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country_id = Country::select('country_id','name')->pluck('name','country_id');
        return view('admin.city.create',compact('country_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $storeCity = $this->cityRepository->storeCity($request->all());

        if($storeCity){
            return redirect()->route('cities.index')->with('success','Country Record created successfully!!');
        }
        return redirect()->route('cities.index')->with('error','Please select Country !!');
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
        $country_id = Country::select('country_id','name')->pluck('name','country_id');
        $cityData = $this->cityRepository->findCity($id);

        return view('admin.city.edit',compact('cityData','country_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $cityData = $this->cityRepository->updateCity($request->all(), $id);

        if($cityData){
            return redirect()->route('cities.index')->with('success','City Detail upadted successfully !!');
        }
        return redirect()->route('cities.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cityData = $this->cityRepository->destroyCity($id);

        if($cityData){
            return redirect()->route('cities.index')->with('success','City Deleted successfully !!');
        }
        return redirect()->route('cities.index')->with('error','The Data is not available !!');
    }
}
