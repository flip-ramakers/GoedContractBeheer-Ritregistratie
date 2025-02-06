<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ClientenController;
use App\Http\Controllers\DaycaresController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('admins', AdminController::class);
        Route::get('admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
        
        Route::resource('chauffeurs', ChauffeurController::class);
        Route::resource('daycares', DaycaresController::class);
        Route::resource('clienten', ClientenController::class);
        
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });


    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});
