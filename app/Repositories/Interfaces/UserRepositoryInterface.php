<?php

namespace App\Repositories\Interfaces;

Interface UserRepositoryInterface{

    public function allUser();
    public function storeUser($data);
    public function findUser($id);
    public function updateUser($data, $id);
    public function destroyUser($id);
}
