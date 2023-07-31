<?php

namespace App\Http\Controllers\admin\role;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\RoleUserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleUserRequest;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $roleUserRepository;

    public function __construct(RoleUserRepositoryInterface $roleUserRepository)
    {
        $this->roleUserRepository = $roleUserRepository;
    }

    public function index()
    {
        $roleUsers = $this->roleUserRepository->allRoleUser();

        return view('admin.roleuser.index',compact('roleUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Role::select('role_id','name')->pluck('name','role_id');
        $user_id = User::select('user_id','first_name')->pluck('first_name','user_id');

        return view('admin.roleuser.create',compact('role_id','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleUserRequest $request)
    {
        $this->roleUserRepository->storeRoleUser($request->all());

        return redirect()->route('role-user.index')->with('success','Role User Record created successfully !!');
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
        $user_id = User::select('user_id','first_name')->pluck('first_name','user_id');
        $roleUserData = $this->roleUserRepository->findRoleUser($id);

        return view('admin.roleuser.edit',compact('roleUserData','role_id','user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUserRequest $request, $id)
    {
        $roleUserData = $this->roleUserRepository->updateRoleUser($request->all(),$id);

        if($roleUserData){
            return redirect()->route('role-user.index')->with('success','Role User Detail upadted successfully !!');
        }
        return redirect()->route('role-user.index')->with('error','The Data is not available !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roleUserData = $this->roleUserRepository->destroyRoleUser($id);

        if($roleUserData){
            return redirect()->route('role-user.index')->with('success','Role User Deleted successfully !!');
        }
        return redirect()->route('role-user.index')->with('error','The Data is not available !!');
    }
}
