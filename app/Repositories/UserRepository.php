<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Jobs\UserApproveMailJob;

class UserRepository
{
    protected function destinationPath()
    {
        return storage_path('app/public/');
    }

    public function getAll($perPage = 20, $roleSlug = '', $status = '', $search = array())
    {
        $RS_Results = User::latest();

        if ($roleSlug) {
            $RS_Results_Role = Role::with('users')->where('slug', $roleSlug)
                ->firstOrFail();

            $RS_Results = $RS_Results_Role->users()->latest();
        }

        if (!empty($status)) {
            $RS_Results->where('status', $status);
        }

        if (!empty($search['search_keryword'])) {
            $searchKeyword = $search['search_keryword'];

            $RS_Results->where('first_name', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('last_name', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('email', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('city', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('country', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('occupation', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('guru', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('reference_person', 'LIKE', '%' . $searchKeyword . '%');
        }

        return $RS_Results->paginate($perPage);
    }

    public function getById($id)
    {
        return User::with('role')->findOrFail($id);
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
                    Role::whereIn('slug', $data->role)->get()
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
                    Role::whereIn('slug', $data->role)->get()
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

    public function changeStatus($data)
    {
        $status = $data->status == 1 ? 'Active' : 'Deactivate';
        $RS_Row = $this->getById($data->id)
            ->update(['status' => $status]);

        if (!empty($RS_Row)) {
            $user = $this->getById($data->id);

            if ($user->status == 'Active') {
                UserApproveMailJob::dispatch($user)->delay(now()->addSeconds(5));
            }

            return array(
                'messageType' => 'success',
                'message' => 'Successfully'
            );
        } else {
            return array(
                'messageType' => 'error',
                'message' => 'Error'
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
