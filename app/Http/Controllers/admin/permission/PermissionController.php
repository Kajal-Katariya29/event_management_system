<?php

namespace App\Http\Controllers\admin\permission;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use App\http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    public function index()
    {
        $permissions = $this->permissionRepository->allPermission();
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $this->permissionRepository->storePermission($request->all());

        return redirect()->route('permission.index')->with('success','Permission Record created successfully !!');

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
        $permissionData = $this->permissionRepository->findPermission($id);

        return view('admin.permission.edit',compact('permissionData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permissionData = $this->permissionRepository->updatePermission($request->all(),$id);

        if($permissionData){
            return redirect()->route('permission.index')->with('success','Permission Detail upadted successfully !!');
        }
        return redirect()->route('permission.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissionData = $this->permissionRepository->destroyPermission($id);

        if($permissionData){
            return redirect()->route('permission.index')->with('success','Permission Deleted successfully !!');
        }
        return redirect()->route('permission.index')->with('error','The Data is not available !!');
    }
}
