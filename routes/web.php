<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

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

Route::get('/', function () {
    return view('welcome');
})->name('front.home');

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
