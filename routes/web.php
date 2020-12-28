<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\UserController;

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

Route::view('/', 'index')->middleware('guest');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Student Menu
    Route::group(['middleware' => 'role:student'], function () {
        Route::get('/profile/{auth}', [ProfileController::class, 'show'])->name('profile');

        Route::get('/profile/{student}', [StudentsController::class, 'show'])->name('profile');
        Route::get('/profile/{auth}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/{auth}/edit', [ProfileController::class, 'update'])->name('profile.edit');

        Route::get('/profile/{auth}/password', [PasswordController::class, 'index'])->name('password.edit');
        Route::patch('/profile/{auth}/password', [PasswordController::class, 'update'])->name('password.edit');
    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/kelas/create', [UserController::class, 'create'])->name('user.create');
        Route::get('/user/kelas/detail', [UserController::class, 'detail'])->name('user.detail');
    });
});
