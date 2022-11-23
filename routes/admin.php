<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [LoginController::class, 'index'])->name('login');

    // login user access route
    Route::group(['middleware' => ['admin.auth']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});
