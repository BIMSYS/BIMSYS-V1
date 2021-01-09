<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;

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
Route::view('/', 'pages.index')->middleware('guest');

Route::view('/studentlesson', 'pages.student.lesson.index');
// auth
Auth::routes();
Route::view('/profileguru', 'pages/teacher/profile/profileguru');
// middleware login auth
Route::group(['middleware' => ['auth']], function () {
     Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Role Student
    Route::group(['middleware' => 'student', 'prefix' => 'student'], function () {
        Route::get('/profile/{auth}', [ProfileController::class, 'show'])->name('profile');

        Route::get('/profile/{student}', [StudentsController::class, 'show'])->name('profile');
        Route::get('/profile/{auth}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/{auth}/edit', [ProfileController::class, 'update'])->name('profile.edit');

        Route::get('/profile/{auth}/password', [PasswordController::class, 'index'])->name('password.edit');
        Route::patch('/profile/{auth}/password', [PasswordController::class, 'update'])->name('password.edit');
    });

    // Role Teacher
    Route::group(['middleware' => 'role:teacher'], function () {
        Route::get('/home', [HomeController::class, 'teacher'])->name('home');
        Route::get('/profile', [TeacherController::class, 'index'])->name('profile');

        // profile update
        Route::patch('/profile/update', [UserController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'teacher'], function () {
            Route::group(['prefix' => 'lesson'], function () {
                // lesson index and detail
                Route::get('/', [LessonController::class, 'index'])->name('teacher.lesson.index');
                Route::get('/{lesson?}/show', [LessonController::class, 'show'])->name('teacher.lesson.show');

                // lesson module
                Route::get('/{lesson?}/create', [ModuleController::class, 'create'])->name('teacher.module.create');
                Route::post('/store', [ModuleController::class, 'store'])->name('teacher.module.store');
                Route::get('/{module?}/edit', [ModuleController::class, 'edit'])->name('teacher.module.edit');
                Route::patch('/{module?}/update', [ModuleController::class, 'update'])->name('teacher.module.update');
                Route::delete('/{module?}/destroy', [ModuleController::class, 'destroy'])->name('teacher.module.destroy');
                Route::get('/{module?}/download', [ModuleController::class, 'download'])->name('teacher.module.download');

                // lesson participant
                Route::group(['prefix' => 'participant'], function () {
                    Route::get('/{lesson?}', [StudentController::class, 'index'])->name('teacher.participant.index');
                    Route::delete('/{student?}/destroy', [StudentController::class, 'destroy'])->name('teacher.participant.destroy');
                });
            });

            // lesson task
            Route::group(['prefix' => 'task'], function () {
                Route::get('/', [TaskController::class, 'index'])->name('teacher.task.index');
                Route::get('/create', [TaskController::class, 'create'])->name('teacher.task.create');
                Route::post('/store', [TaskController::class, 'store'])->name('teacher.task.store');
                Route::get('/{task?}/edit', [TaskController::class, 'edit'])->name('teacher.task.edit');
                Route::patch('/{task?}/update', [TaskController::class, 'update'])->name('teacher.task.update');
                Route::delete('/{task?}/destroy', [TaskController::class, 'destroy'])->name('teacher.task.destroy');
            });
        });
    });

    // Role admin
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        // user menu
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user?}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::patch('/{user?}/update', [UserController::class, 'update'])->name('admin.user.update');
            Route::delete('/{user?}/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');
        });

        // lesson menu
        Route::group(['prefix' => 'lesson'], function () {
            Route::get('/', [LessonController::class, 'index'])->name('admin.lesson.index');
            Route::get('/create', [LessonController::class, 'create'])->name('admin.lesson.create');
            Route::post('/store', [LessonController::class, 'store'])->name('admin.lesson.store');
            Route::get('/{lesson?}/edit', [LessonController::class, 'edit'])->name('admin.lesson.edit');
            Route::patch('/{lesson?}/update', [LessonController::class, 'update'])->name('admin.lesson.update');
            Route::delete('/{lesson?}/destroy', [LessonController::class, 'destroy'])->name('admin.lesson.destroy');
        });

        // module menu
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
