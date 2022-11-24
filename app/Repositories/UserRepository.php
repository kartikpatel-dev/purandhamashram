<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected function destinationPath()
    {
        return storage_path('app/public/');
    }

    public function getAll($perPage = 20, $roleSlug = '', $status = '')
    {
        $users = User::latest();

        if ($roleSlug) {
            $RS_Results_Role = Role::with('users')->where('slug', $roleSlug)
                ->firstOrFail();

            $users = $RS_Results_Role->users()->latest();
        }

        if (!empty($status)) {
            $users->where('status', $status);
        }

        return $users->paginate($perPage);
    }

    public function getById($orderId)
    {
        return User::with('role')->findOrFail($orderId);
    }

    public function store($data)
    {
        $RS_Row = new User();

        $RS_Row->first_name = $data->first_name;
        $RS_Row->last_name = $data->last_name;
        $RS_Row->email = $data->email;
        $RS_Row->password = Hash::make($data->password);
        $RS_Row->mobile_number = $data->mobile_number;
        $RS_Row->dial_code = $data->dial_code;
        $RS_Row->gender = $data->gender;
        $RS_Row->birth_date = $data->birth_date;
        $RS_Row->address = $data->address;
        $RS_Row->city = $data->city;
        $RS_Row->country = $data->country;
        $RS_Row->occupation = $data->occupation;
        $RS_Row->guru = $data->guru;
        $RS_Row->reference_person = $data->reference_person;
        $RS_Row->status = $data->status;

        if ($data->has('avatar')) {
            $fileName = $this->fileUpload($data->file(), $data->first_name . '-' . $data->last_name, $RS_Row->avatar);

            $RS_Row->avatar = $fileName;
        }

        $RS_Row->save();

        if (!empty($RS_Row)) :
            $RS_Row->role()
                ->sync(
                    Role::where('slug', $data->role)->first()
                );

            return array(
                'messageType' => 'success',
                'message' => 'User created successfully.',
                'id' => $RS_Row->id
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t create user, try after sometime.',
                'id' => 0
            );
        endif;
    }

    public function update($data, $id = 0)
    {
        $RS_Row = $this->getById($id);

        $RS_Row->first_name = $data->first_name;
        $RS_Row->last_name = $data->last_name;
        $RS_Row->email = $data->email;
        $RS_Row->mobile_number = $data->mobile_number;
        $RS_Row->dial_code = $data->dial_code;
        $RS_Row->gender = $data->gender;
        $RS_Row->birth_date = $data->birth_date;
        $RS_Row->address = $data->address;
        $RS_Row->city = $data->city;
        $RS_Row->country = $data->country;
        $RS_Row->occupation = $data->occupation;
        $RS_Row->guru = $data->guru;
        $RS_Row->reference_person = $data->reference_person;
        $RS_Row->status = $data->status;

        if ($data->has('avatar')) {
            $fileName = $this->fileUpload($data->file(), $data->first_name . '-' . $data->last_name, $RS_Row->avatar);

            $RS_Row->avatar = $fileName;
        }

        $RS_Row->save();

        if (!empty($RS_Row)) :
            $RS_Row->role()
                ->sync(
                    Role::where('slug', $data->role)->first()
                );

            return array(
                'messageType' => 'success',
                'message' => 'User updated successfully.',
                'id' => $RS_Row->id
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t udpate user, try after sometime.',
                'id' => 0
            );
        endif;
    }

    public function delete($id)
    {
        $RS_Row = $this->getByID($id);

        if (!empty($RS_Row->avatar) && File::exists($this->destinationPath() . $RS_Row->avatar)) {
            File::delete($this->destinationPath() . $RS_Row->avatar);
        }

        $RS_Row->delete($id);

        if (!empty($RS_Row)) {
            return array(
                'messageType' => 'success',
                'message' => 'Record deleted successfully!',
                'id' => $id
            );
        } else {
            return array(
                'messageType' => 'error',
                'message' => 'Record not delete, please try again later',
                'id' => 0
            );
        }
    }

    public function fileUpload($attachment, $file_name = '', $file_name_db = '')
    {
        if (!empty($attachment['avatar'])) {

            if (!empty($file_name_db) && File::exists($this->destinationPath() . $file_name_db)) {
                File::delete($this->destinationPath() . $file_name_db);
            }

            $image = $attachment['avatar'];
            $fileName = Str::slug($file_name) . '-' . time();

            $fileFullName = $fileName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $fileFullName);

            return $fileFullName;
        }

        return null;
    }
}
