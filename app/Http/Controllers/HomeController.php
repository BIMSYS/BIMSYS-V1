<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // user
        $role = Auth::user()->role;
        if ($role === 'admin') {
            $auth = Auth::user();
        } else if ($role === 'student') {
            $auth = Student::where('user_id', auth()->user()->id)->firstOrFail();
        } else if ($role === 'teacher') {
            $auth = Teacher::where('user_id', auth()->user()->id)->firstOrFail();
        }

        return view('pages/home', ['auth' => $auth]);
    }

    public function teacher()
    {
        $auth = Teacher::where('user_id', auth()->user()->id)->firstOrFail();
        $lessons = Lesson::where('teacher_id', $auth->id)->get();

        // count
        $count_lessons = $lessons->count();

        // colour random
        $colors_array = [
            'primary',
            'success',
            'danger',
            'warning',
            'info',
            'secondary'
        ];

        // random array
        $colors = Arr::random($colors_array, $count_lessons);
        
        return view('pages.home', [
            'auth' => $auth,
            'lessons' => $lessons,
            'colors' => $colors
        ]);
    }
}
