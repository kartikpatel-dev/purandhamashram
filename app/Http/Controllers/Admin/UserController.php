<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Traits\DialCodeTrait;
use App\Traits\GuruListTrait;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $userRepository;
    use DialCodeTrait, GuruListTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('admin.auth');
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $users = $this->userRepository->getAll(20, 'user');
        dd($users->total()); */

        if ($request->ajax()) {

            $users = $this->userRepository->getAll(20, 'user', 'Active', $request->all());

            return response()
                ->json([
                    'users' => view('admin.users.list', compact('users'))->render(),
                    'total_count' => $users->total()
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
        $dialCodes = $this->dialCodes();
        $guruLists = $this->guruList();

        return view('admin.users.create-edit', compact('dialCodes', 'guruLists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->userRepository->store($request);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return !empty($response['id']) ?
            Redirect::route('admin.users.show', $response['id']) :
            Redirect::back();
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
        $dialCodes = $this->dialCodes();
        $guruLists = $this->guruList();

        $RS_Row = $this->userRepository->getByID($id);
        $roles = array_column($RS_Row->role->toArray(), 'slug');

        return view('admin.users.create-edit', compact('dialCodes', 'guruLists', 'RS_Row', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->userRepository->update($request, $id);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return !empty($response['id']) ?
            Redirect::route('admin.users.show', $response['id']) :
            Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->userRepository->delete($id);

        return response()->json([
            'messageType' => $response['messageType'],
            'message' => $response['message']
        ]);
    }


    /**
     * Display a listing of the resource not arrpoval user.
     *
     * @return \Illuminate\Http\Response
     */
    public function waitingApproval(Request $request)
    {
        if ($request->ajax()) {

            $users = $this->userRepository->getAll(20, 'user', 'Deactivate');

            return response()
                ->json([
                    'users' => view('admin.users.list', compact('users'))->render()
                ]);
        } else {
            return view('admin.users.waiting-approval');
        }
    }

    /**
     * change status
     */
    public function changeStatus(Request $request)
    {
        $response = $this->userRepository->changeStatus($request);

        return response()->json([
            'messageType' => $response['messageType'],
            'message' => $response['message']
        ]);
    }
}
