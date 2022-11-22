<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /*
    * user autocomplete search
    */
    public function autocompleteSearch(Request $request)
    {
        $users = User::select(DB::raw("CONCAT(first_name, ' ', last_name) as full_name"))
            ->orderBy('first_name', 'ASC');

        $searchKeyword = $request->get('searchKeryword');
        if ($searchKeyword != '') {
            $users->where(function ($query) use ($searchKeyword) {
                $query->where('first_name', 'LIKE', '%' . $searchKeyword . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchKeyword . '%');
            });
        }

        $users = $users->get();

        return response()
            ->json([
                'users' => view('reference-person-list', compact('users'))->render()
            ]);
        // return response()->json($users->get());
    }
}
