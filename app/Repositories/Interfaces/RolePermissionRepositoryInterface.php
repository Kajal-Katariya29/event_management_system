<?php
namespace App\Repositories\Interfaces;

Interface RolePermissionRepositoryInterface{

    public function allRolePermission();
    public function storeRolePermission($data);
    public function findRolePermission($id);
    public function updateRolePermission($data, $id);
    public function destroyRolePermission($id);
}
