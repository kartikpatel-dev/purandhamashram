<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleData = array(
            'admin' => 'Admin',
            'manager' => 'Manager',
            'user' => 'User'
        );

        foreach ($roleData as $Key => $Val) {
            Role::create(
                [
                    'name' => $Val,
                    'slug' => $Key
                ]
            );
        }

        $adminUser = User::create([
            'first_name' => 'Admin',
            'email' => 'admin@purandhamashram.com',
            'password' => Hash::make('Ashram@456#'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'status' => 'Active',
        ]);
        $adminUser->role()->sync(1);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
