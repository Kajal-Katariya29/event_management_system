<?php
namespace App\Repositories\Interfaces;

Interface PermissionRepositoryInterface{

    public function allPermission();
    public function storePermission($data);
    public function findPermission($id);
    public function updatePermission($data, $id);
    public function destroyPermission($id);
}
