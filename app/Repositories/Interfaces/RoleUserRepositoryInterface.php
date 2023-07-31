<?php
namespace App\Repositories\Interfaces;

Interface RoleUserRepositoryInterface{

    public function allRoleUser();
    public function storeRoleUser($data);
    public function findRoleUser($id);
    public function updateRoleUser($data, $id);
    public function destroyRoleUser($id);
}
