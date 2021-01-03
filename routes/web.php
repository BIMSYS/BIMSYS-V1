<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;

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

// guest home
Route::view('/', 'index')->middleware('guest');

// auth
Auth::routes();

// middleware login auth
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

    // role admin
    Route::group(['middleware' => 'role:admin'], function () {
        // user menu
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user?}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::patch('/{user?}/update', [UserController::class, 'update'])->name('admin.user.update');
            Route::delete('/{user?}/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');
        });

        Route::group(['prefix' => 'lesson'], function () {
            Route::get('/', [LessonController::class, 'index'])->name('admin.lesson.index');
            Route::get('/create', [LessonController::class, 'create'])->name('admin.lesson.create');
            Route::post('/store', [LessonController::class, 'store'])->name('admin.lesson.store');
            Route::get('/{lesson?}/edit', [LessonController::class, 'edit'])->name('admin.lesson.edit');
            Route::patch('/{lesson?}/update', [LessonController::class, 'update'])->name('admin.lesson.update');
            Route::delete('/{lesson?}/destroy', [LessonController::class, 'destroy'])->name('admin.lesson.destroy');
        });

        Route::group(['prefix' => 'module'], function () {
            Route::get('/', [ModuleController::class, 'index'])->name('admin.module.index');
            Route::get('/create', [ModuleController::class, 'create'])->name('admin.module.create');
            Route::post('/store', [ModuleController::class, 'store'])->name('admin.module.store');
            Route::get('/{module?}/edit', [ModuleController::class, 'edit'])->name('admin.module.edit');
            Route::patch('/{module?}/update', [ModuleController::class, 'update'])->name('admin.module.update');
            Route::delete('/{module?}/destroy', [ModuleController::class, 'destroy'])->name('admin.module.destroy');
            Route::get('/{module?}/download', [ModuleController::class, 'download'])->name('admin.module.download');
        });
    });
});
