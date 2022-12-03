<?php

namespace App\Repositories;

use App\Models\AshramVisitor;
use App\Models\User;
use Illuminate\Support\Carbon;

class AshramVisitorRepository
{
    public function getAll($perPage = 20, $search = array())
    {
        $RS_Results = AshramVisitor::latest()
            ->with(['visitedUser']);

        if (!empty($search['search_keryword'])) {
            $searchKeyword = $search['search_keryword'];

            $RS_Users = User::select('id')
                ->where('first_name', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('last_name', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('email', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('city', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('country', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('occupation', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('guru', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('reference_person', 'LIKE', '%' . $searchKeyword . '%')
                ->get();

            $RS_Results->whereIn('user_id', $RS_Users->pluck('id')->toArray());
        }

        if (!empty($search['check_in_date']) && !empty($search['check_out_date'])) {
            $check_in_date = $search['check_in_date'];
            $check_out_date = $search['check_out_date'];

            $RS_Results->where('checkin_date', '>=', $check_in_date)
                ->where('checkout_date', '<=', $check_out_date);
        } else {
            if (!empty($search['check_in_date'])) {
                $check_in_date = $search['check_in_date'];

                $RS_Results->where('checkin_date', '>=', $check_in_date);
            }

            if (!empty($search['check_out_date'])) {
                $check_out_date = $search['check_out_date'];

                $RS_Results->where('checkout_date', '<=', $check_out_date);
            }
        }

        return $RS_Results->paginate($perPage);
    }

    public function getById($id)
    {
        return AshramVisitor::findOrFail($id);
    }

    public function store($data)
    {
        if (!empty(auth()->user()->visitor_status)) {
            $RS_Row = $this->checkIn()->visitorCheckIn;
            $RS_Row->visitor_status = '1';

            return array(
                'messageType' => 'success',
                'message' => 'Already Check In',
                'data' => $RS_Row
            );
        }

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

            $RS_Row->visitor_status = '1';

            return array(
                'messageType' => 'success',
                'message' => 'Check In successfully.',
                'data' => $RS_Row
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t check in, try after sometime.',
                'data' => null
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
                'data' => null
            );
        else :
            return array(
                'messageType' => 'error',
                'message' => 'Can\'t check out, try after sometime.',
                'data' => null
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
