<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ManagerRepository;
use App\Traits\DialCodeTrait;
use App\Traits\GuruListTrait;
use App\Http\Requests\ManagerStoreRequest;
use App\Http\Requests\ManagerUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Mail\UserApproveMail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\ModuleRepository;

class ManagerController extends Controller
{
    private $managerRepository, $moduleRepository;
    use DialCodeTrait, GuruListTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
        $this->managerRepository = new ManagerRepository;
        $this->moduleRepository = new ModuleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $RS_Results = $this->managerRepository->getAll(20, 'manager');

            return response()
                ->json([
                    'RS_Results' => view('admin.managers.list', compact('RS_Results'))->render()
                ]);
        } else {
            return view('admin.managers.index');
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
        $modules = $this->moduleRepository->getAll();

        return view('admin.managers.create-edit', compact('dialCodes', 'guruLists', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerStoreRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->managerRepository->store($request);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return !empty($response['id']) ?
            Redirect::route('admin.managers.show', $response['id']) :
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
        $RS_Row = $this->managerRepository->getByID($id);

        return view('admin.managers.show', compact('RS_Row'));
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
        $modules = $this->moduleRepository->getAll();

        $RS_Row = $this->managerRepository->getByID($id);

        return view('admin.managers.create-edit', compact('dialCodes', 'guruLists', 'RS_Row', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerUpdateRequest $request, $id)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->managerRepository->update($request, $id);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return !empty($response['id']) ?
            Redirect::route('admin.managers.show', $response['id']) :
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
        $response = $this->managerRepository->delete($id);

        return response()->json([
            'messageType' => $response['messageType'],
            'message' => $response['message']
        ]);
    }

    /**
     * change status
     */
    public function changeStatus(Request $request)
    {
        $status = $request->status == 1 ? 'Active' : 'Deactivate';
        $RS_Row = $this->managerRepository->getById($request->id)
            ->update(['status' => $status]);

        if (!empty($RS_Row)) {
            $user = $this->managerRepository->getById($request->id);

            if ($user->status == 'Active') {
                Mail::to($user->email)->send(new UserApproveMail($user));
            }

            return response()->json(['messageType' => 'success', 'message' => 'Successfully']);
        } else {
            return response()->json(['messageType' => 'error', 'message' => 'Error']);
        }
    }
}
