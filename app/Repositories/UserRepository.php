<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Role;

class UserRepository
{
    public function getAll($perPage = 20, $roleSlug = '', $status = '')
    {
        $users = User::latest();

        if ($roleSlug) {
            $RS_Results_Role = Role::with('users')->where('slug', $roleSlug)
                ->firstOrFail();

            $users = $RS_Results_Role->users()->latest();
        }

        if (!empty($status)) {
            $users->where('status', $status);
        }

        return $users->paginate($perPage);
    }

    public function getById($orderId)
    {
        return User::with('role')->findOrFail($orderId);
    }

    public function StoreUpdate($orderDetails, $id = 0)
    {
        return User::create($orderDetails);
    }

    public function delete($orderId)
    {
        User::destroy($orderId);
    }
}
