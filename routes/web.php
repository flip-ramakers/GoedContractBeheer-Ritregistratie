<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ClientenController;
use App\Http\Controllers\DaycaresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobileClientenController;
use App\Http\Controllers\MobileLoginController;
use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MobileLoginController::class, 'showLoginform'])->name('login.show');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth'],], function () {
        Route::resource('admins', AdminController::class);
        Route::get('admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');

        Route::resource('chauffeurs', ChauffeurController::class);
        Route::post('chauffeurs/{chauffeur}/login', [ChauffeurController::class, 'loginAsChauffeur'])->name('chauffeurs.login');
        Route::resource('daycares', DaycaresController::class);
        Route::resource('clients', ClientenController::class);
        Route::post('/client/{client}/add-daycare', [ClientenController::class, 'addDaycare'])->name('client.addDaycare');
        Route::get('/client/{client}/add-daycare', [ClientenController::class, 'addDaycareForm'])->name('client.addDaycareForm');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logoutadmin');

        Route::get('rides', [RideController::class, 'index'])->name('rides.index');
        Route::post('rides/export', [RideController::class, 'export'])->name('admin.rides.export');
        Route::get('rides/{ride}', [RideController::class, 'show'])->name('admin.rides.show');
        Route::delete('rides/{ride}', [RideController::class, 'destroy'])->name('admin.rides.destroy');
    });

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});


Route::prefix('chauffeur')->group(function () {
    Route::group(['middleware' => ['auth:chauffeur']], function () {
        Route::match(['get', 'post'], '/clienten', [MobileClientenController::class, 'index'])->name('chauffeur.clienten');
        Route::post('/mobile-client', [MobileClientenController::class, 'show'])->name('chauffeur.clienten.show');

        Route::get('/mobile-client/{client}', [MobileClientenController::class, 'show'])->name('mobile-client.show');

        Route::post('/rides', [RideController::class, 'store'])->name('rides.store');

        Route::get('/rides/{ride}', [RideController::class, 'show'])->name('rides.show');
    });

    Route::get('login', [MobileLoginController::class, 'showLoginform'])->name('login.show');

    Route::post('login', [MobileLoginController::class, 'login'])->name('login');

    Route::get('/verify-login/{token}', [MobileLoginController::class, 'verifyLogin'])->name('verify-login');

    Route::match(['get', 'post'], 'logout', [MobileLoginController::class, 'logout'])->name('logout');
});
