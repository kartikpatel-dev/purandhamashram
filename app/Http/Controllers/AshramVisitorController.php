<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AshramVisitorCreateRequest;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\AshramVisitorRepository;
use App\Http\Requests\AshramVisitorUpdateRequest;
use Illuminate\Support\Facades\Session;

class AshramVisitorController extends Controller
{
    private $ashramVisitorRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->ashramVisitorRepository = new AshramVisitorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RS_Result = $this->ashramVisitorRepository->checkIn();
        
        return view('ashram-visitor', compact('RS_Result'));
    }

    /**
     * insert check in record.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AshramVisitorCreateRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->ashramVisitorRepository->store($request);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return redirect::back();
    }

    /**
     * update check checkout record.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AshramVisitorUpdateRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->ashramVisitorRepository->update($request);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return redirect::back();
    }
}
