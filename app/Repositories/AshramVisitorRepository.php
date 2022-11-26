<?php

namespace App\Repositories;

use App\Models\AshramVisitor;
use App\Models\User;
use Illuminate\Support\Carbon;

class AshramVisitorRepository
{
    public function getAll($perPage = 20)
    {
        return AshramVisitor::latest()
            ->with(['visitedUser'])
            ->paginate($perPage);
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
        $RS_Row->checkin_time = Carbon::parse($data->check_in_time)->format('H:i:s');
        $RS_Row->checkout_date = $data->check_out_date;
        $RS_Row->checkout_time = Carbon::parse($data->check_out_time)->format('H:i:s');
        $RS_Row->number_of_person = $data->number_of_person;

        $RS_Row->save();

        if (!empty($RS_Row)) :
            // user visitor status change
            $user = User::findOrFail(auth()->user()->id);
            $user->visitor_status = '1';
            $user->save();

            return array(
                'messageType' => 'success',
                'message' => 'Check In successfully.',
                'id' => $RS_Row->id
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t check in, try after sometime.',
                'id' => 0
            );
        endif;
    }

    public function update($data, $id = 0)
    {
        $RS_Row = $this->getById($data->ashram_visitor_id);

        $RS_Row->checkout_date = $data->check_out_date;
        $RS_Row->checkout_time = Carbon::parse($data->check_out_time)->format('H:i:s');

        $RS_Row->save();

        if (!empty($RS_Row)) :
            // user visitor status change
            $user = User::findOrFail(auth()->user()->id);
            $user->visitor_status = '0';
            $user->save();

            return array(
                'messageType' => 'success',
                'message' => 'Check Out successfully.',
                'id' => $RS_Row->id
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t check out, try after sometime.',
                'id' => 0
            );
        endif;
    }

    public function checkIn()
    {
        $RS_Row = array();
        if (!empty(auth()->user()->visitor_status)) {
            $RS_Row = auth()->user()->load(['visitorCheckIn']);
        }

        return $RS_Row;
    }

    public function dailyCheckOut()
    {
        /* $RS_Row = new AshramVisitor();

        $RS_Row->user_id = 2;
        $RS_Row->checkin_date = Carbon::now()->format('Y-m-d');
        $RS_Row->checkin_time = Carbon::now()->format('H:i:s');
        $RS_Row->checkout_date = Carbon::now()->addDays(rand(1, 55));
        $RS_Row->checkout_time = Carbon::now()->format('H:i:s');

        $RS_Row->save(); */

        $RS_Results = User::with(['ashramVisit'])
            ->where('visitor_status', '1')
            ->get();

        if (!empty($RS_Results)) {
            foreach ($RS_Results as $RS_Row) {
                if (!empty($RS_Row->ashramVisit)) {
                    $RS_Row->update(['visitor_status' => '0']);
                }
            }
        }
    }
}
