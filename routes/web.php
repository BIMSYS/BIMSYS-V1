<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/admin/kelas/create',[AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/kelas/detail',[AdminController::class, 'detail'])->name('admin.detail');
    Route::get('/admin',[AdminController::class, 'index'])->name('admin');

    Route::get('/profile/{student}', [StudentsController::class, 'show'])->name('profile');

    Route::get('/profile/{student}/edit', [StudentsController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{student}/edit', [StudentsController::class, 'update'])->name('profile.edit');

    Route::get('/profile/{student}/password', [PasswordController::class, 'index'])->name('password.edit');
    Route::patch('/profile/{student}/password', [PasswordController::class, 'update'])->name('password.edit');
});