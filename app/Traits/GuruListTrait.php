<?php

namespace App\Traits;
use App\Models\Guru;

trait GuruListTrait
{
    /**
     * @return array
     */
    public function guruList()
    {
        $RS_Results = Guru::where('status', 'Active')->get();

        return $RS_Results->pluck('name');
    }
}
