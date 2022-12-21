<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AshramVisitorRepository;
use Illuminate\Support\Facades\Redirect;

class AshramVisitorController extends Controller
{
    private $ashramVisitorRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AshramVisitorRepository $ashramVisitorRepository)
    {
        $this->middleware('admin.auth');
        $this->ashramVisitorRepository = $ashramVisitorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $RS_Visitor_Count = $this->ashramVisitorRepository->expectedNextDayVisitorCount($request->all());
        // dd($RS_Visitor_Count);

        // $RS_Results = $this->ashramVisitorRepository->getAll(20, $request->all());
        // dd($RS_Results[0]);

        if ($request->ajax()) {
            $RS_Results = $this->ashramVisitorRepository->getAll(20, $request->all());

            return response()
                ->json([
                    'RS_Results' => view('admin.ashram-visitors.list', compact('RS_Results'))->render()
                ]);
        } else {
            return view('admin.ashram-visitors.index', compact('RS_Visitor_Count'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Redirect::route('admin.visitors.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Redirect::route('admin.visitors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('admin.visitors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Redirect::route('admin.visitors.index');
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
        return Redirect::route('admin.visitors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Redirect::route('admin.visitors.index');
    }

    /**
     * create PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createPdf(Request $request)
    {
        $response = $this->ashramVisitorRepository->createPdf($request->all());

        return $response;
    }
}
