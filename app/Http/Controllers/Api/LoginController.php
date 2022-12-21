<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\LoginRepository;

class LoginController extends Controller
{
    private $loginRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
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
    public function login(Request $request)
    {
        $data = $request->all();

        $validator = $this->loginRepository->validator($data);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => $validator->errors()->first(),
                'data' => NULL,
            ]);
        }

        $response = $this->loginRepository->login($data);

        return response()->json($response);
    }

    public function logout()
    {
        $response = $this->loginRepository->logout();

        return response()->json($response);
    }
}
