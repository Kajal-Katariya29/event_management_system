<?php

namespace App\Http\Controllers\admin\event\eventCategory;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EventCategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\EventCategory;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categoryRepository;

    public function __construct(EventCategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->allCategory();

        return view('admin.eventcategory.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventCategory $request)
    {
        $this->categoryRepository->storeCategory($request->all());

        return redirect()->route('event-categories.index')->with('success','Event Category Record created successfully !!');

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
        $categoryData = $this->categoryRepository->findCategory($id);

        return view('admin.eventcategory.edit',compact('categoryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventCategory $request, $id)
    {
        $categoryData = $this->categoryRepository->updateCategory($request->all(), $id);

        if($categoryData){
            return redirect()->route('event-categories.index')->with('success','Category Detail upadted successfully !!');
        }
        return redirect()->route('event-categories.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryData = $this->categoryRepository->destroyCategory($id);

        if($categoryData){
            return redirect()->route('event-categories.index')->with('success','Category Deleted successfully !!');
        }
        return redirect()->route('event-categories.index')->with('error','The Data is not available !!');
    }
}
