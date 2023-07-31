<?php

namespace App\Http\Controllers\admin\permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Interfaces\RolePermissionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\RolePermissionRequest;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $rolePermissionRepository;

    public function __construct(RolePermissionRepositoryInterface $rolePermissionRepository)
    {
        $this->rolePermissionRepository = $rolePermissionRepository;
    }

    public function index()
    {
        $rolePermissions = $this->rolePermissionRepository->allRolePermission();

        return view('admin.rolepermission.index',compact('rolePermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Role::select('role_id','name')->pluck('name','role_id');
        $permission_id = Permission::select('permission_id','name')->pluck('name','permission_id');
        return view('admin.rolepermission.create',compact('role_id','permission_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolePermissionRequest $request)
    {
        $this->rolePermissionRepository->storeRolePermission($request->all());

        return redirect()->route('role-permission.index')->with('success','Role-Permission Record created successfully !!');
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
        $role_id = Role::select('role_id','name')->pluck('name','role_id');
        $permission_id = Permission::select('permission_id','name')->pluck('name','permission_id');
        $rolePermissionData = $this->rolePermissionRepository->findRolePermission($id);

        return view('admin.rolepermission.edit',compact('rolePermissionData','role_id','permission_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolePermissionRequest $request, $id)
    {
        $rolePermissionData = $this->rolePermissionRepository->updateRolePermission($request->all(),$id);

        if($rolePermissionData){
            return redirect()->route('role-permission.index')->with('success','Role-Permission Detail upadted successfully !!');
        }
        return redirect()->route('role-permission.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rolePermissionData = $this->rolePermissionRepository->destroyRolePermission($id);


        if($rolePermissionData){
            return redirect()->route('role-permission.index')->with('success','Role-Permission Deleted successfully !!');
        }
        return redirect()->route('role-permission.index')->with('error','The Data is not available !!');
    }
}
