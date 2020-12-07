<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Auth\PasswordController;

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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile/{student}', [StudentsController::class, 'show'])->name('profile');

    Route::get('/profile/{student}/edit', [StudentsController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{student}/edit', [StudentsController::class, 'update'])->name('profile.edit');

    Route::get('/profile/{student}/password', [PasswordController::class, 'index'])->name('password.edit');
    Route::patch('/profile/{student}/password', [PasswordController::class, 'update'])->name('password.edit');
});
