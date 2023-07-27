<?php

namespace App\Http\Controllers\admin\organizer;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrganizerrepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizerRequest;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $organizerRepository;

    public function __construct(OrganizerrepositoryInterface $organizerRepository)
    {
        $this->organizerRepository = $organizerRepository;
    }
    public function index()
    {
        $organizers = $this->organizerRepository->allOrganizer();

        return view('admin.organizer.index',compact('organizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organizer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizerRequest $request)
    {
        $this->organizerRepository->storeOrganizer($request->all());

        return redirect()->route('organizer.index')->with('success','Organizer Record created successfully !!');

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
        $organizerData = $this->organizerRepository->findOrganizer($id);

        return view('admin.organizer.edit',compact('organizerData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizerRequest $request, $id)
    {
        $organizerData = $this->organizerRepository->updateOrganizer($request->all(), $id);

        if($organizerData){
            return redirect()->route('organizer.index')->with('success','Organizer Detail upadted successfully !!');
        }
        return redirect()->route('organizer.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organizerData = $this->organizerRepository->destroyOrganizer($id);

        if($organizerData){
            return redirect()->route('organizer.index')->with('success','Organizer Deleted successfully !!');
        }
        return redirect()->route('organizer.index')->with('error','The Data is not available !!');
    }
}
