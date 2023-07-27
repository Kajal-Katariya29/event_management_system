<?php

namespace App\Http\Controllers\admin\venue;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\VenueRepositoryInterfce;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $venueRepository;

    public function __construct(VenueRepositoryInterfce $venueRepository)
    {
        $this->venueRepository = $venueRepository;
    }

    public function index()
    {
        $venues = $this->venueRepository->allVenue();

        return view('admin.venue.index',compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.venue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->venueRepository->storeVenue($request->all());

        return redirect()->route('venue.index')->with('success','Venue Record created successfully !!');
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
        $venueData = $this->venueRepository->findVenue($id);

        return view('admin.venue.edit',compact('venueData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venueData = $this->venueRepository->updateVenue($request->all(),$id);

        if($venueData){
            return redirect()->route('venue.index')->with('success','Venue Detail upadted successfully !!');
        }
        return redirect()->route('venue.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venueData = $this->venueRepository->destroyVenue($id);

        if($venueData){
            return redirect()->route('venue.index')->with('success','Venue Deleted successfully !!');
        }
        return redirect()->route('venue.index')->with('error','The Data is not available !!');
    }
}
