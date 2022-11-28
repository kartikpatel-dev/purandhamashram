<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'admin.managers.index' => 'Managers',
            'admin.users.index' => 'Users',
            'admin.users.waiting.approval' => 'Users Waiting Approval',
            'admin.visitors.index' => 'Visitor History',
            'admin.announcements.index' => 'Announcement',
            'admin.galleries.index' => 'Gallery',
        );

        foreach ($data as $Key => $Val) {
            Module::create(
                [
                    'name' => $Val,
                    'slug' => $Key
                ]
            );
        }
    }
}
