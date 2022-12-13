<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AshramVisitorController;
use Illuminate\Support\Facades\Artisan;
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

// clear cache start
/* Route::group(['prefix' => 'cache'], function () {
    //Clear Cache facade value:
    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        return '<h1>Cache facade value cleared</h1>';
    });

    //Reoptimized class loader:
    Route::get('/optimize', function () {
        $exitCode = Artisan::call('optimize');
        return '<h1>Reoptimized class loader</h1>';
    });

    //Route cache:
    Route::get('/route-cache', function () {
        $exitCode = Artisan::call('route:cache');
        return '<h1>Routes cached</h1>';
    });

    //Clear Route cache:
    Route::get('/route-clear', function () {
        $exitCode = Artisan::call('route:clear');
        return '<h1>Route cache cleared</h1>';
    });

    //Clear View cache:
    Route::get('/view-clear', function () {
        $exitCode = Artisan::call('view:clear');
        return '<h1>View cache cleared</h1>';
    });

    //Clear Config cache:
    Route::get('/config-cache', function () {
        $exitCode = Artisan::call('config:cache');
        return '<h1>Clear Config cleared</h1>';
    });
}); */
// clear cache end

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

//queuw work:
/* Route::get('/queue-work', function () {
    Artisan::call('queue:work --stop-when-empty');
    return '<h1>Queue Work</h1>';
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
Route::get('/ashram-visitor', [AshramVisitorController::class, 'index'])->name('Ashram.Visitor');
Route::post('/ashram-visitor', [AshramVisitorController::class, 'create']);
Route::put('/ashram-visitor', [AshramVisitorController::class, 'update']);

require __DIR__ . '/admin.php';
