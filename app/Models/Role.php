<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users($role = '')
    {
        // $users = $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
        $users = $this->belongsToMany(User::class);

        return $users;
    }
}
