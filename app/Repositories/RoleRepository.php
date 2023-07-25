<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function allRole()
    {
        return Role::orderby('role_id','desc')->get();
    }

    public function storeRole($data)
    {
        return Role::create($data);
    }

    public function findRole($id)
    {
        return Role::find($id);
    }

    public function updateRole($data, $id)
    {
        $role = Role::where('role_id', $id)->first();
        $updatedRole = null;
        if($role)
        {
            $updatedRole = $role->update($data);
        }
        return $updatedRole;
    }

    public function destroyRole($id)
    {
        $role = Role::find($id);
        $deleteRole = null;
        if($role)
        {
            $deleteRole = $role->delete();
        }
        return $deleteRole;
    }
}
