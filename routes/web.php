<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//use App\Http\Controllers\ResetPassword;
//use App\Http\Controllers\ChangePassword;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('welcome');

Route::middleware([
    'auth:web',
    /*'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',*/
])->group(function () {
    Route::get('/home', function () {
        return Inertia::render('Home');
    })->name('home');
});

require 'admin.php';

/*
Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];

    if (!Auth::attempt($credentials)) {
        $user = new User();

        $user->name = 'admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $basicToken = $user->createToken('basic-token');

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken,
            ];
        }
    }
    return redirect('/admin/dashboard');
}); */
