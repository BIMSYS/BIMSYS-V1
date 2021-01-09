<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;

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

// auth
Auth::routes();

// middleware login auth
Route::group(['middleware' => ['auth']], function () {

    //home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Role Student
    Route::group(['middleware' => 'role:student'], function () {
        Route::group(['prefix' => 'student'], function () {
            // student profile
            Route::get('/profile', [UserController::class, 'profile_index'])->name('profile.student');
            Route::patch('/profile/{user?}/update', [UserController::class, 'profile_update'])->name('profile.student.update');
            Route::patch('/password/{user?}/update', [UserController::class, 'password_update'])->name('password.student.update');

            // lesson
            Route::group(['prefix' => 'lesson'], function () {
                Route::get('/', [LessonController::class, 'index'])->name('student.lesson.index');
                Route::post('/add', [LessonController::class, 'lesson_add'])->name('student.lesson.add');
            });
        });
    });

    // Role Teacher
    Route::group(['middleware' => 'role:teacher'], function () {
        Route::group(['prefix' => 'teacher'], function () {
            // teacher profile
            Route::get('/profile', [UserController::class, 'profile_index'])->name('profile.teacher');
            Route::patch('/profile/update', [UserController::class, 'update'])->name('profile.teacher.update');

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
                Route::get('/{module?}', [TaskController::class, 'index'])->name('teacher.task.index');
                Route::get('/{module?}/create', [TaskController::class, 'create'])->name('teacher.task.create');
                Route::post('/store', [TaskController::class, 'store'])->name('teacher.task.store');
                Route::get('/{task?}/edit/{module?}', [TaskController::class, 'edit'])->name('teacher.task.edit');
                Route::patch('/{task?}/update', [TaskController::class, 'update'])->name('teacher.task.update');
                Route::delete('/{task?}/destroy/{module?}', [TaskController::class, 'destroy'])->name('teacher.task.destroy');
                Route::get('/{task?}/download', [TaskController::class, 'task_download'])->name('teacher.task.download');

                // task participant grade
                Route::group(['prefix' => 'participant'], function () {
                    Route::get('/{task?}/download', [TaskController::class, 'result_download'])->name('teacher.task.participant.download');
                    Route::post('/{student?}/store/{task?}', [GradeController::class, 'store'])->name('teacher.grade.participant.store');
                    Route::patch('/{grade?}/update/{task?}/{student?}', [GradeController::class, 'update'])->name('teacher.grade.participant.update');
                });
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
