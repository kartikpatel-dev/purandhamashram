<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AshramVisitorController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\GalleryController;

Route::get('/admin-login', [LoginController::class, 'index'])->name('admin.login');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // login user access route
    Route::group(['middleware' => ['admin.auth']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resources(['managers' => ManagerController::class]);
        Route::post('manager-change-status', [ManagerController::class, 'changeStatus'])->name('managers.change.status');

        Route::resources(['users' => UserController::class]);
        Route::get('users-waiting-approval', [UserController::class, 'waitingApproval'])->name('users.waiting.approval');
        Route::post('user-change-status', [UserController::class, 'changeStatus'])->name('users.change.status');
        Route::get('users-pdf', [UserController::class, 'createPdf'])->name('users.pdf');

        Route::resources(['visitors' => AshramVisitorController::class]);
        Route::get('visitors-pdf', [AshramVisitorController::class, 'createPdf'])->name('visitors.pdf');

        Route::resources(['announcements' => AnnouncementController::class]);
        Route::post('announcement-change-status', [AnnouncementController::class, 'changeStatus'])->name('announcements.change.status');

        Route::resources(['galleries' => GalleryController::class]);
        Route::post('gallery-change-status', [GalleryController::class, 'changeStatus'])->name('galleries.change.status');
        Route::post('gallery-permission', [GalleryController::class, 'changePermission'])->name('galleries.permission');
    });
});
