<?php

namespace App\Http\Controllers\admin\banner;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BannerRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function index()
    {
        $banners = $this->bannerRepository->allBanner();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $this->bannerRepository->storeBanner($request->all());

        return redirect()->route('banner.index')->with('success','Banner Record created successfully !!');
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
        $bannerData = $this->bannerRepository->findBanner($id);

        return view('admin.banner.edit', compact('bannerData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $bannerData = $this->bannerRepository->updateBanner($request->all(), $id);
        if($bannerData){
            return redirect()->route('banner.index')->with('success','Banner Detail upadted successfully !!');
        }
        return redirect()->route('banner.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bannerData = $this->bannerRepository->destroyBanner($id);

        if($bannerData){
            return redirect()->route('banner.index')->with('success','Banner Deleted successfully !!');
        }
        return redirect()->route('banner.index')->with('error','The Data is not available !!');
    }
}
