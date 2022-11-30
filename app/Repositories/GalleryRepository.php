<?php

namespace App\Repositories;

use App\Models\Gallery;

use App\Repositories\Interfaces\GalleryRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryRepository implements GalleryRepositoryInterface
{
    protected function destinationPath()
    {
        return storage_path('app/public/');
    }

    public function getAll($perPage = 20, $permission = '', $status = '', $sort = array())
    {
        $RS_Results = Gallery::latest();

        if (!empty($sort['sort_field']) && !empty($sort['sort_value'])) {
            $RS_Results = Gallery::orderBy($sort['sort_field'], $sort['sort_value']);
        }

        if (!empty($permission)) {
            $RS_Results->where('permission', $permission);
        }

        if (!empty($status)) {
            $RS_Results->where('status', $status);
        }

        return $RS_Results->paginate($perPage);
    }

    public function getById($id)
    {
        return Gallery::findOrFail($id);
    }

    public function count()
    {
        return Gallery::count();
    }

    public function store($data)
    {
        if ($this->count() >= 200) {
            return array(
                'messageType' => 'error',
                'message' => 'Maximum gallery image 200 limit',
                'id' => 0
            );
        }

        if ($data->has('gallery_image')) {

            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif', 'svg'];

            $files = $data->file('gallery_image');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension, $allowedfileExtension);

                if (!empty($check)) {

                    $file_name = $file->getClientOriginalName();
                    $fileName = Str::slug($file_name) . '-' . time();
                    $fileSize = $file->getSize();

                    $fileFullName = $fileName . '.' . $extension;

                    $file->storeAs('public', $fileFullName);

                    // insert into DB
                    $RS_Row = new Gallery();

                    $RS_Row->user_id = auth()->user()->id;
                    $RS_Row->file_name = $file_name;
                    $RS_Row->file_path = $fileFullName;
                    $RS_Row->file_size = $fileSize;
                    $RS_Row->permission = $data->permission;

                    $RS_Row->save();
                }
            }

            return array(
                'messageType' => 'success',
                'message' => 'Gallery image added successfully.',
                'id' => 0
            );
        }

        return array(
            'messageType' => 'error',
            'message' => 'Can\'t add gallery image, try after sometime.',
            'id' => 0
        );
    }

    public function update($data, $id = 0)
    {
        return null;
    }

    public function delete($id)
    {
        $RS_Row = $this->getByID($id);

        $this->deleteAttachment($RS_Row->file_path);

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

    public function changePermission($data)
    {
        $RS_Row = $this->getById($data->id)
            ->update(['permission' => $data->permission]);

        if (!empty($RS_Row)) {
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

    public function uploadAttachment($attachment, $file_name = '')
    {
        if (!empty($attachment['avatar'])) {

            $this->deleteAttachment($file_name);

            $image = $attachment['avatar'];
            $fileName = Str::slug($file_name) . '-' . time();

            $fileFullName = $fileName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $fileFullName);

            return $fileFullName;
        }

        return null;
    }

    public function deleteAttachment($file_name)
    {
        if (!empty($file_name) && File::exists($this->destinationPath() . $file_name)) {
            File::delete($this->destinationPath() . $file_name);
        }

        return null;
    }
}
