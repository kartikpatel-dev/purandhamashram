<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AnnouncementRepository;
use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
    private $announcementRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->middleware('admin.auth');
        $this->announcementRepository = $announcementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $RS_Results = $this->announcementRepository->getAll();

            return response()
                ->json([
                    'RS_Results' => view('admin.announcements.list', compact('RS_Results'))->render()
                ]);
        } else {
            return view('admin.announcements.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcements.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementStoreRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->announcementRepository->store($request);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return !empty($response['id']) ?
            Redirect::route('admin.announcements.show', $response['id']) :
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
        $RS_Row = $this->announcementRepository->getByID($id);

        return view('admin.announcements.show', compact('RS_Row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RS_Row = $this->announcementRepository->getByID($id);

        return view('admin.announcements.create-edit', compact('RS_Row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementUpdateRequest $request, $id)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->announcementRepository->update($request, $id);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return !empty($response['id']) ?
            Redirect::route('admin.announcements.show', $response['id']) :
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
        $response = $this->announcementRepository->delete($id);

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
        $response = $this->announcementRepository->changeStatus($request);

        return response()->json([
            'messageType' => $response['messageType'],
            'message' => $response['message']
        ]);
    }
}
