<?php

namespace App\Traits;

trait GuruListTrait
{
    /**
     * @return array
     */
    public function guruList()
    {
        $guruLists = [
            'Guru 1',
            'Guru 2',
            'Guru 3',
            'Guru 4',
            'Guru 5',
        ];

        return $guruLists;
    }
}
