<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AshramVisitorController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\ReferencePersonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/reference-person', [ReferencePersonController::class, 'index']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::get('/announcement', [AnnouncementController::class, 'index']);

    Route::post('/visitor-check-in', [AshramVisitorController::class, 'store']);
    Route::post('/visitor-check-out', [AshramVisitorController::class, 'update']);
});
