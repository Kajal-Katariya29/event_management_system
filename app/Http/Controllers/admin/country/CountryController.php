<?php

namespace App\Http\Controllers\admin\country;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    public function index()
    {
        $countries = $this->countryRepository->allCountry();

        return view('admin.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $this->countryRepository->storeCountry($request->all());

        return redirect()->route('countries.index')->with('success','Country Record created successfully !!');

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
        $countryData = $this->countryRepository->findCountry($id);

        return view('admin.country.edit',compact('countryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $countryData = $this->countryRepository->updateCountry($request->all(), $id);

        if($countryData){
            return redirect()->route('countries.index')->with('success','Country Detail upadted successfully !!');
        }
        return redirect()->route('countries.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryData = $this->countryRepository->destroyCountry($id);

        if($countryData){
            return redirect()->route('countries.index')->with('success','Country Deleted successfully !!');
        }
        return redirect()->route('countries.index')->with('error','The Data is not available !!');
    }
}
