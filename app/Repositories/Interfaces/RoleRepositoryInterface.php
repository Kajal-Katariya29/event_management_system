<?php
namespace App\Repositories\Interfaces;

Interface RoleRepositoryInterface{

    public function allRole();
    public function storeRole($data);
    public function findRole($id);
    public function updateRole($data, $id);
    public function destroyRole($id);
}
