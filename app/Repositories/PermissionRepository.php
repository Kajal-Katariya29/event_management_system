<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function allPermission()
    {
        return Permission::orderby('permission_id','desc')->get();
    }

    public function storePermission($data)
    {
        return Permission::create($data);
    }

    public function findPermission($id)
    {
        return Permission::find($id);
    }

    public function updatePermission($data, $id)
    {
        $permission = Permission::where('permission_id', $id)->first();
        $updatedPermission = null;
        if($permission)
        {
            $updatedPermission = $permission->update($data);
        }
        return $updatedPermission;
    }

    public function destroyPermission($id)
    {
        $permission = Permission::find($id);
        $deletePermission = null;
        if($permission)
        {
            $deletePermission = $permission->delete();
        }
        return $deletePermission;
    }
}
