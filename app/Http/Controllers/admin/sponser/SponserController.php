<?php

namespace App\Http\Controllers\admin\sponser;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SponserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SponserRequest;

class SponserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $sponserRepository;

    public function __construct(SponserRepositoryInterface $sponserRepository)
    {
        $this->sponserRepository = $sponserRepository;
    }

    public function index()
    {
        $sponsers = $this->sponserRepository->allSponser();

        return view('admin.sponser.index',compact('sponsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponserRequest $request)
    {
        $this->sponserRepository->storeSponser($request->all());

        return redirect()->route('sponser.index')->with('success','Sponser Record created successfully !!');

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
        $sponserData = $this->sponserRepository->findSponser($id);

        return view('admin.sponser.edit',compact('sponserData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SponserRequest $request, $id)
    {
        $sponserData = $this->sponserRepository->updateSponser($request->all(),$id);

        if($sponserData){
            return redirect()->route('sponser.index')->with('success','Sponser Detail upadted successfully !!');
        }
        return redirect()->route('sponser.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponserData = $this->sponserRepository->destroySponser($id);

        if($sponserData){
            return redirect()->route('sponser.index')->with('success','Sponser Deleted successfully !!');
        }
        return redirect()->route('sponser.index')->with('error','The Data is not available !!');
    }
}
