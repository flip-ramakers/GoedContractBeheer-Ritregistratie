<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ClientenController;
use App\Http\Controllers\DaycaresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobileClientenController;
use App\Http\Controllers\MobileLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('admins', AdminController::class);
        Route::get('admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');

        Route::resource('chauffeurs', ChauffeurController::class);
        Route::resource('daycares', DaycaresController::class);
        Route::resource('clients', ClientenController::class);
        Route::post('/client/{client}/add-daycare', [ClientenController::class, 'addDaycare'])->name('client.addDaycare');
        Route::get('/client/{client}/add-daycare', [ClientenController::class, 'addDaycareForm'])->name('client.addDaycareForm');


        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});


// Route::prefix('chauffeur')->group(function () {
//     Route::group(['middleware' => ['mobile']], function () {
//     }); 
//     Route::get('/login', [MobileLoginController::class, 'showLoginForm'])->name('chauffeur.login');
//     ;
// });

Route::prefix('chauffeur')->group(function () {
    Route::group(['middleware' => ['mobile']], function () {});
    Route::get('/login', [MobileLoginController::class, 'showLoginform'])->name('login.show');
    Route::post('/login', [MobileLoginController::class, 'login'])->name('login');
    Route::get('/verify-login/{token}', [MobileLoginController::class, 'verifyLogin'])->name('verify-login');

    Route::post('/clienten', [MobileClientenController::class, 'index'])->name('chauffeur.clienten');
    Route::post('/mobile-client', [MobileClientenController::class, 'show'])->name('chauffeur.clienten.show');
    Route::get('/chauffeur/mobile-client/{client?}', [MobileClientenController::class, 'show'])->name('mobile-client.show');
});
