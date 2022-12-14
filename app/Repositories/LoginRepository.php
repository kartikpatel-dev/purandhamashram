<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LoginRepository
{
    protected function destinationPath()
    {
        return storage_path('app/public/');
    }

    public function validator($data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email' => 'Enter Email Address / Mobile Number'
        ]);
    }

    public function login($data)
    {
        $login = $data['email'];

        if (is_numeric($login)) {
            $field = 'mobile_number';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'email';
        }

        if (Auth::attempt([$field => $login, 'password' => $data['password']])) {

            $RS_Row = Auth::user()->load(['role', 'modules']);
            
            $RS_Row->avatar = !empty($RS_Row->avatar) && File::exists($this->destinationPath() . $RS_Row->avatar) ? config('app.url') . Storage::url('app/public/' . $RS_Row->avatar) : null;

            $RS_Row->accessTokens()->delete();

            if ($RS_Row->status == 'Deactivate') {
                Auth::logout();

                return [
                    'success'   => false,
                    "message" => 'You account is not approved yet, please contact admin.',
                    'data' => null,
                ];
            }

            $token = $RS_Row->createToken('HariramGrantClient')->accessToken;

            $RS_Row->device_type = $data['device_type'];
            $RS_Row->device_token = $data['device_token'];
            $RS_Row->save();

            return [
                'success'   => true,
                "message" => 'Login Successfully',
                'data' => $RS_Row,
                'token' => $token,
            ];
        } else {
            return [
                'success'   => false,
                "message" => 'These credentials do not match our records',
                'data' => null,
            ];
        }
    }

    public function logout()
    {
        $RS_Row = Auth::guard('api')->user();

        if (!empty($RS_Row->accessTokens)) {
            $RS_Row->accessTokens()->delete();
        }

        Auth::logout();

        return [
            'success'   => true,
            "message" => 'You have been successfully logged out!',
            'data' => null,
        ];
    }
}
