<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RegisterRepository;

class RegisterController extends Controller
{
    private $registerRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->registerRepository = new RegisterRepository;
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->all();

        $validator = $this->registerRepository->validator($data);

        if ($validator->fails()) {
            return response([
                'success'   => false,
                'message'   => 'Validation errors',
                'data' => $validator->errors(),
            ]);
        }

        $RS_Row = $this->registerRepository->register($data);

        if (!empty($RS_Row)) {
            return response()->json([
                'success'   => true,
                'message'   => 'You have been successfully registered!. Please wait for the admin approval.',
                'data' => null,
            ]);
        } else {
            return response([
                'success'   => false,
                'message'   => 'Something went wrong, try after sometime',
                'data' => null,
            ]);
        }
    }
}
