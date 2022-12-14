<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AshramVisitorController;
use App\Http\Controllers\FrontHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontHomeController::class, 'index'])
    ->name('front.home');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

/* Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery'); */
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-and-condition', function () {
    return view('terms-and-condition');
})->name('terms-and-condition');

Route::get('/user-autocomplete-search', [UserController::class, 'autocompleteSearch'])->name('user.autocomplete.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
Route::get('/ashram-visitor', [AshramVisitorController::class, 'index'])->name('Ashram.Visitor');
Route::post('/ashram-visitor', [AshramVisitorController::class, 'create']);
Route::put('/ashram-visitor', [AshramVisitorController::class, 'update']);

require __DIR__ . '/admin.php';
require __DIR__ . '/artisan-command.php';
