<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ReferencePersonRepository;

class ReferencePersonController extends Controller
{
    private $referencePersonRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReferencePersonRepository $referencePersonRepository)
    {
        $this->referencePersonRepository = $referencePersonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $RS_Results = $this->referencePersonRepository->getAll($request->get('searchKeryword'));

        return response()->json([
            'success'   => true,
            'message'   => !empty($RS_Results) ? 'Reference person Fetch successfully' : 'Reference person not found',
            'data'    => $RS_Results,
        ]);
    }
}
