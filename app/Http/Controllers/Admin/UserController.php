<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
        $this->userRepository = new UserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $users = $this->userRepository->getAll(20, 'user');
        dd($users); */

        if ($request->ajax()) {

            $users = $this->userRepository->getAll(5, 'user', 'Active');

            return response()
                ->json([
                    'users' => view('admin.users.list', compact('users'))->render()
                ]);
        } else {
            return view('admin.users.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $RS_Row = $this->userRepository->getByID($id);
        
        return view('admin.users.show', compact('RS_Row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display a listing of the resource not arrpoval user.
     *
     * @return \Illuminate\Http\Response
     */
    public function waitingApproval(Request $request)
    {
        if ($request->ajax()) {

            $users = $this->userRepository->getAll(5, 'user', 'Deactivate');

            return response()
                ->json([
                    'users' => view('admin.users.list', compact('users'))->render()
                ]);
        } else {
            return view('admin.users.waiting-approval');
        }
    }

    /**
     * change user status
     */
    public function changeStatus(Request $request)
    {
        $status = $request->status == 1 ? 'Active' : 'Deactivate';
        $user = $this->userRepository->getById($request->id)
            ->update(['status' => $status]);

        if (!empty($user)) {
            return response()->json(['messageType' => 'success', 'message' => 'Successfully']);
        } else {
            return response()->json(['messageType' => 'error', 'message' => 'Error']);
        }
    }
}
