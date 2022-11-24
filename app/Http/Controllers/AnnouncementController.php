<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AnnouncementRepository;

class AnnouncementController extends Controller
{
    private $announcementRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->announcementRepository = new AnnouncementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RS_Results = $this->announcementRepository->getAll(10, 'Active');

        return view('announcement', compact('RS_Results'));
    }
}
