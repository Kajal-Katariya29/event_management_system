<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Interfaces\RolePermissionRepositoryInterface;
use App\Models\RolePermission;

class RolePermissionRepository implements RolePermissionRepositoryInterface
{
    public function allRolePermission()
    {
        return RolePermission::orderby('role_permission_id','desc')->with('role','permission')->get();
    }

    public function storeRolePermission($data)
    {
        return RolePermission::create($data);
    }

    public function findRolePermission($id)
    {
        return RolePermission::find($id);
    }

    public function updateRolePermission($data, $id)
    {
        $rolePermission = RolePermission::where('role_permission_id', $id)->first();
        $updatedRolePermission = null;
        if($rolePermission)
        {
            $updatedRolePermission = $rolePermission->update($data);
        }
        return $updatedRolePermission;
    }

    public function destroyRolePermission($id)
    {
        $rolePermission = RolePermission::find($id);
        $deleteRolePermission = null;
        if($rolePermission)
        {
            $deleteRolePermission = $rolePermission->delete();
        }
        return $deleteRolePermission;
    }
}
