<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    private $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisson = !empty(auth()->user()) ? '' : '1';
        $RS_Results = $this->galleryRepository->getAll(12, $permisson, 'Active');

        return response()->json([
            'success' => true,
            'message' => 'Gallery Fetch successfully',
            'image_prefix_url' => config('app.url') . Storage::url('app/public/'),
            'data' => $RS_Results,
        ]);
    }
}
