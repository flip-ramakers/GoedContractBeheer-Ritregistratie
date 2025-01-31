<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admins', AdminController::class);
    Route::get('admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');

});

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::any('/logout', [LoginController::class, 'logout'])->name('login.logout');