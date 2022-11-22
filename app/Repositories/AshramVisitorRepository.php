<?php

namespace App\Repositories;

use App\Models\AshramVisitor;
use App\Models\User;

class AshramVisitorRepository
{
    public function getAll($perPage = 20)
    {
        return AshramVisitor::paginate($perPage);
    }

    public function getById($id)
    {
        return AshramVisitor::findOrFail($id);
    }

    public function store($data)
    {
        $RS_Row = new AshramVisitor();

        $RS_Row->user_id = auth()->user()->id;
        $RS_Row->checkin_date = $data->check_in_date;
        // $RS_Row->checkin_time = $data->check_in_time;
        $RS_Row->number_of_person = $data->number_of_person;

        $RS_Row->save();
        
        if( !empty($RS_Row) ):
            // user visitor status change
            $user = User::findOrFail(auth()->user()->id);
            $user->visitor_status = '1';
            $user->save();

            return array(
                'messageType' => 'success',
                'message' => 'Check In successfully.', 
                'id' => $RS_Row->id
            );
        else:
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t check in, try after sometime.', 
                'id' => 0
            );
        endif;
    }

    public function update($data, $id = 0)
    {
        $RS_Row = $this->getById(2);

        $RS_Row->checkout_date = $data->check_out_date;
        // $RS_Row->checkin_time = $data->check_in_time;

        $RS_Row->save();
        
        if( !empty($RS_Row) ):
            // user visitor status change
            $user = User::findOrFail(auth()->user()->id);
            $user->visitor_status = '0';
            $user->save();

            return array(
                'messageType' => 'success',
                'message' => 'Check Out successfully.', 
                'id' => $RS_Row->id
            );
        else:
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t check out, try after sometime.', 
                'id' => 0
            );
        endif;
    }
}
