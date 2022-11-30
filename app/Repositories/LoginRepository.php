<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRepository
{
    public function validator($data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email' => 'Enter Email Address / Mobile Number'
        ]);
    }

    public function store($data)
    {
        $RS_Row = User::with(['role', 'modules'])->where('email', $data['email'])->first();

        if (!empty($RS_Row)) {
            if (Hash::check($data['password'], $RS_Row->password)) {
                // $token = $RS_Row->createToken('Hariram Password Grant Client')->accessToken;

                return [
                    'success'   => true,
                    "message" => 'Login Successfully',
                    'data' => $RS_Row,
                    // 'token' => $token,
                ];

                /* $response = ['token' => $token];
                return response($response, 200); */
            } else {
                return [
                    'success'   => false,
                    "message" => 'These credentials do not match our records',
                    'data' => [],
                ];
            }
        } else {
            return [
                'success'   => false,
                "message" => 'These credentials do not match our records',
                'data' => [],
            ];
        }
    }
}
