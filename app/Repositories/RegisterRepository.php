<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Jobs\UserRegisterMailJob;

class RegisterRepository
{
    public function validator($data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'numeric', 'unique:users'],
            'gender' => ['required', 'string', 'max:10'],
            'birth_date' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:25'],
            'country' => ['required', 'string', 'max:25'],
            'occupation' => ['required', 'string', 'max:100'],
            'guru' => ['required', 'string', 'max:100'],
            'reference_person' => ['required', 'string', 'max:150'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'avatar.max' => 'The :attribute must not be greater than 5MB'
        ]);
    }

    public function register($data)
    {
        $filePath = null;
        if (!empty($data['avatar'])) {

            $image = $data['avatar'];
            $fileName = Str::slug($data['first_name'] . '-' . $data['last_name']) . '-' . time();

            $filePath = $fileName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $filePath);
        }

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'dial_code' => $data['dial_code'],
            'mobile_number' => $data['mobile_number'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'occupation' => $data['occupation'],
            'guru' => $data['guru'],
            'reference_person' => $data['reference_person'],
            'avatar' => $filePath,

        ]);

        $user->role()
            ->attach(
                Role::where('slug', 'user')->first()
            );

        UserRegisterMailJob::dispatch($user)->delay(now()->addSeconds(5));

        return $user;
    }
}
