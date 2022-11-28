<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GalleryRepository;
use App\Http\Requests\GalleryStoreRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    private $galleryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
        $this->galleryRepository = new GalleryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $RS_Results = $this->galleryRepository->getAll();

            return response()
                ->json([
                    'RS_Results' => view('admin.galleries.list', compact('RS_Results'))->render()
                ]);
        } else {
            return view('admin.galleries.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStoreRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $response = $this->galleryRepository->store($request);

        Session::flash('messageType', $response['messageType']);
        Session::flash('message', $response['message']);

        return Redirect::route('admin.galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('admin.galleries.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Redirect::route('admin.galleries.index');
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
        return Redirect::route('admin.galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->galleryRepository->delete($id);

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
        $response = $this->galleryRepository->changeStatus($request);

        return response()->json([
            'messageType' => $response['messageType'],
            'message' => $response['message']
        ]);
    }

    /**
     * change status
     */
    public function changePermission(Request $request)
    {
        $response = $this->galleryRepository->changePermission($request);

        return response()->json([
            'messageType' => $response['messageType'],
            'message' => $response['message']
        ]);
    }
}
