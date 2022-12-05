<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AnnouncementRepository;

class FrontHomeController extends Controller
{
    private $announcementRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RS_Results = $this->announcementRepository->getAll(10, 'Active');

        return view('welcome', compact('RS_Results'));
    }
}
