<?php

namespace App\Repositories;

use App\Models\User;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll($perPage=20) 
    {
        return User::paginate($perPage);
    }

    public function getById($orderId) 
    {
        return User::findOrFail($orderId);
    }

    public function StoreUpdate($orderDetails, $id=0) 
    {
        return User::create($orderDetails);
    }

    public function delete($orderId) 
    {
        User::destroy($orderId);
    }
}