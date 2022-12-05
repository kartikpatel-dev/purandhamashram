<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        return response()->json([
            'success'   => true,
            'message'   => 'Announcement Fetch successfully',
            'data'    => $RS_Results,
        ]);
    }
}
