<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RS_Records = [
            'Guru 1',
            'Guru 2',
            'Guru 3',
            'Guru 4',
            'Guru 5',
        ];

        foreach ($RS_Records as $Key=>$Val) {
            Guru::create(
                [
                    'user_id' => 1,
                    'name' => $Val,
                ]
            );
        }
    }
}
