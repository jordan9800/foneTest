<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::post('/', [NotificationController::class, 'store'])->name('store');
        Route::get('/{id?}', [NotificationController::class, 'index'])->name('index');
        Route::post('/mark-read', [NotificationController::class, 'markRead'])->name('mark.read');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    });
});

Route::impersonate();

require __DIR__.'/auth.php';
