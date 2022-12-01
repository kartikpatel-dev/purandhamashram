<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'success'   => false,
            'message'   => 'Something went wrong, try after sometime',
            'data' => null,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $RS_Row = Auth::guard('api')->user()->load(['role', 'modules']);

        return response()->json([
            'success'   => true,
            'message'   => 'Get profile data successfully',
            'data' => $RS_Row,
        ]);
    }
}
