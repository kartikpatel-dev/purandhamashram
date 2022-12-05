<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GuruListTrait;

class GuruController extends Controller
{
    use GuruListTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RS_Results = $this->guruList();

        return response()->json([
            'success'   => true,
            'message'   => 'Guru Fetch successfully',
            'data'    => $RS_Results,
        ]);
    }
}
