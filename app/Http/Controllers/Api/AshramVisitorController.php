<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AshramVisitor;
use Illuminate\Http\Request;
use App\Http\Requests\AshramVisitorCreateRequest;
use App\Http\Requests\AshramVisitorUpdateRequest;
use App\Repositories\AshramVisitorRepository;

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
        $this->ashramVisitorRepository = $ashramVisitorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AshramVisitorCreateRequest $request)
    {
        // Retrieve the validated input data...
        if (empty(auth()->user()->visitor_status)) {
            if (!empty($request->validator) && $request->validator->fails()) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Validation errors',
                    'data'    => $request->validator->errors(),
                ]);
            }
        }

        $response = $this->ashramVisitorRepository->store($request);

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AshramVisitor  $ashramVisitor
     * @return \Illuminate\Http\Response
     */
    public function show(AshramVisitor $ashramVisitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AshramVisitor  $ashramVisitor
     * @return \Illuminate\Http\Response
     */
    public function update(AshramVisitorUpdateRequest $request, AshramVisitor $ashramVisitor)
    {
        // Retrieve the validated input data...
        if (!empty($request->validator) && $request->validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'    => $request->validator->errors(),
            ]);
        }

        $response = $this->ashramVisitorRepository->update($request);

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AshramVisitor  $ashramVisitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(AshramVisitor $ashramVisitor)
    {
        //
    }
}
