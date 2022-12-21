<?php

namespace App\Repositories;

use App\Models\AshramVisitor;
use App\Models\User;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Support\Facades\Storage;

class AshramVisitorRepository
{
    /* private function _destinationPath()
    {
        return storage_path('app/public/');
    } */

    private function _search($RS_Results, $search)
    {
        if (!empty($search['search_keryword'])) {
            $searchKeyword = $search['search_keryword'];

            $RS_Users = User::select('id')
                ->where('first_name', 'LIKE', '%' . $searchKeyword . '%')
                ->orWhere('middle_name', 'LIKE', '%' . $searchKeyword . '%')
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
            $check_in_date = Carbon::parse($search['check_in_date'])->format('Y-m-d');
            $check_out_date = Carbon::parse($search['check_out_date'])->format('Y-m-d');

            $RS_Results->where('checkin_date', '>=', $check_in_date)
                ->where('checkout_date', '<=', $check_out_date);
        } else {
            if (!empty($search['check_in_date'])) {
                $check_in_date = Carbon::parse($search['check_in_date'])->format('Y-m-d');

                $RS_Results->where('checkin_date', '>=', $check_in_date);
            }

            if (!empty($search['check_out_date'])) {
                $check_out_date = Carbon::parse($search['check_out_date'])->format('Y-m-d');

                $RS_Results->where('checkout_date', '<=', $check_out_date);
            }
        }

        return $RS_Results;
    }

    private function _getAllInstance($search)
    {
        $RS_Results = AshramVisitor::latest('checkin_date')
            ->latest('checkin_time')
            ->with(['visitedUser']);

        $this->_search($RS_Results, $search);

        return $RS_Results;
    }

    public function getAll($perPage = 20, $search = array())
    {
        $RS_Results = $this->_getAllInstance($search);

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
            if (!empty($RS_Row)) {
                $RS_Row->visitor_status = '1';
            }

            return array(
                'messageType' => 'success',
                'message' => 'Already Check In',
                'data' => $RS_Row
            );
        }

        $RS_Row = new AshramVisitor();

        $RS_Row->user_id = auth()->user()->id;
        $RS_Row->checkin_date = Carbon::parse($data->check_in_date)->format('Y-m-d');
        $RS_Row->checkin_time = Carbon::parse($data->check_in_time)->format('H:i:s');
        $RS_Row->checkout_date = Carbon::parse($data->check_out_date)->format('Y-m-d');
        $RS_Row->checkout_time = Carbon::parse($data->check_out_time)->format('H:i:s');
        $RS_Row->number_of_person = $data->number_of_person;

        if (Carbon::parse($data->check_out_date)->format('Y-m-d') < Carbon::now()->subDays(1)) {
            $RS_Row->checkin_status = '0';
        } else {
            $RS_Row->checkin_status = '1';
        }

        $RS_Row->save();

        if (!empty($RS_Row)) :
            // user visitor status change
            if (Carbon::parse($data->check_out_date)->format('Y-m-d') < Carbon::now()->subDays(1)) {
                $RS_Row->visitor_status = '0';
            } else {
                $user = User::findOrFail(auth()->user()->id);
                $user->visitor_status = '1';
                $user->save();

                $RS_Row->visitor_status = '1';
            }

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

        $RS_Row->checkout_date = Carbon::parse($data->check_out_date)->format('Y-m-d');
        $RS_Row->checkout_time = Carbon::parse($data->check_out_time)->format('H:i:s');
        $RS_Row->checkin_status = '0';

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

            if (empty($RS_Row->visitorCheckIn)) {
                auth()->user()->update(['visitor_status' => '0']);
            }
        }

        return $RS_Row;
    }

    public function dailyCheckOut()
    {
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

    public function expectedNextDayVisitorCount($search = array())
    {
        $checkInDate = !empty($search['check_in_date']) ?
            Carbon::parse($search['check_in_date']) :
            Carbon::now();

        $RS_Results = AshramVisitor::where('checkin_date', '=', $checkInDate->addDay()->format('Y-m-d'))
            ->where('checkin_status', '1');

        $this->_search($RS_Results, $search);

        $RS_Count = $RS_Results->sum('number_of_person');

        return $RS_Count;
    }

    public function createPdf($search = array())
    {
        $RS_Results = $RS_Results = $this->_getAllInstance($search);;

        $RS_Results = $RS_Results->get();

        // $fileName = 'Visitor_History_' . Carbon::now()->format('Y-m-d_H.i.s') . '.pdf';
        $fileName = 'Visitor_History.pdf';

        $pdf = Pdf::loadView('admin.ashram-visitors.pdf', compact('RS_Results'))
            ->setPaper('a4', 'landscape');
            // ->save($this->_destinationPath() . $fileName);

        return $pdf->stream($fileName);
        // return config('app.url') . Storage::url('app/public/' . $fileName);
    }
}
