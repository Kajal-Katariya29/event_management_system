<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\RoleUser;
use App\Repositories\Interfaces\RoleUserRepositoryInterface;

class RoleUserRepository implements RoleUserRepositoryInterface
{
    public function allRoleUser()
    {
        return RoleUser::orderby('role_user_id','desc')->with('role','user')->get();
    }

    public function storeRoleUser($data)
    {
        return RoleUser::create($data);
    }

    public function findRoleUser($id)
    {
        return RoleUser::find($id);
    }

    public function updateRoleUser($data, $id)
    {
        $roleUser = RoleUser::where('role_user_id', $id)->first();
        $updatedRoleUser = null;
        if($roleUser)
        {
            $updatedRoleUser = $roleUser->update($data);
        }
        return $updatedRoleUser;
    }

    public function destroyRoleUser($id)
    {
        $roleUser = RoleUser::find($id);
        $deleteRoleUser = null;
        if($roleUser)
        {
            $deleteRoleUser = $roleUser->delete();
        }
        return $deleteRoleUser;
    }
}
