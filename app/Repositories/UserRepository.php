<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function allUser()
    {
        return User::orderby('user_id','desc')->get();
    }

    public function storeUser($data)
    {
        return User::create($data);
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function updateUser($data, $id)
    {
        $user = User::where('user_id', $id)->first();
        $updatedUser = null;
        if($user)
        {
            $updatedUser = $user->update($data);
        }
        return $updatedUser;
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
        $deleteUser = null;
        if($user)
        {
            $deleteUser = $user->delete();
        }
        return $deleteUser;
    }
}
