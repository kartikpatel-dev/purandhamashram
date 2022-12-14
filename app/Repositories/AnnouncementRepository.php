<?php

namespace App\Repositories;

use App\Models\Announcement;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AnnouncementRepository
{
    public function getAll($perPage = 20, $status = '')
    {
        $RS_Results = Announcement::latest();

        if (!empty($status)) {
            $RS_Results->where('status', $status);
        }

        return $RS_Results->paginate($perPage);
    }

    public function getById($id)
    {
        return Announcement::findOrFail($id);
    }

    public function store($data)
    {
        $RS_Row = $this->StoreUpdate($data);

        if (!empty($RS_Row)) :
            return array(
                'messageType' => 'success',
                'message' => 'Announcement creaded successfully.',
                'id' => $RS_Row
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t create announcement, try after sometime.',
                'id' => 0
            );
        endif;
    }

    public function update($data, $id = 0)
    {
        $RS_Row = $this->StoreUpdate($data, $id);

        if (!empty($RS_Row)) :
            return array(
                'messageType' => 'success',
                'message' => 'Announcement updated successfully.',
                'id' => $RS_Row
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t update announcement, try after sometime.',
                'id' => 0
            );
        endif;
    }

    private function StoreUpdate($data, $id = 0)
    {
        $RS_Row = empty($id) ? new Announcement() : $this->getById($id);

        $RS_Row->user_id = auth()->user()->id;
        $RS_Row->title = $data->title;
        $RS_Row->slug = Str::slug($data->title, '-');
        $RS_Row->description = $data->description;
        $RS_Row->created_at = Carbon::parse($data->created_at)->format('Y-m-d H:i:s');

        $RS_Row->save();

        return $RS_Row->id;
    }

    public function delete($id)
    {
        $RS_Row = $this->getByID($id)
            ->delete($id);

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
}
