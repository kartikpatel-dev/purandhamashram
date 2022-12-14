<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReferencePersonRepository;

class UserController extends Controller
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
    public function index()
    {
    }

    /*
    * user autocomplete search
    */
    public function autocompleteSearch(Request $request)
    {
        $users = $this->referencePersonRepository->getAll($request->get('searchKeryword'));

        return response()
            ->json([
                'users' => view('reference-person-list', compact('users'))->render()
            ]);
    }
}
