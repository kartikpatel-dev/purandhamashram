<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReferencePersonRepository
{
    public function getAll($searchKeyword)
    {
        $RS_Results = array();

        if ($searchKeyword != '') {
            $RS_Results = User::select(DB::raw("CONCAT(first_name, ' ', last_name) as full_name"))
                ->orderBy('first_name', 'ASC')
                ->where('first_name', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('last_name', 'LIKE', '%' . $searchKeyword . '%')
                ->get();
        }

        return $RS_Results;
    }
}
