<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [LoginController::class, 'show'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {return view('admin.pages.welcome');})->name('admin-welcome');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('profile', ProfileController::class);
        //Route::get('/user-management', [UserProfileController::class, 'index'])->name('user-profile.index');
        Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
        //Route::get('/user-management', [ProfileController::class, 'index'])->name('profile.index');
        //Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
        //Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
        //Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
        //Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        //Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        //Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
        Route::get('/{page}', [PageController::class, 'index'])->name('page');
    });
});
