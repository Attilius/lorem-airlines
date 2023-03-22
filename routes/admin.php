<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Filter\CustomerFilterController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [LoginController::class, 'show'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {return view('admin.pages.welcome');})->name('admin-welcome');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('profile', ProfileController::class);
        Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
        Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
        Route::get('/{page}', [PageController::class, 'index'])->name('page');
        Route::post('/profile', [CustomerFilterController::class, 'store'])->name('customer-filter');
        Route::delete('/profile', [CustomerFilterController::class, 'destroy'])->name('filter-delete');
    });

});
