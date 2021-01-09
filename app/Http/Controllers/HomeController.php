<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // dd(auth()->user()->role);
        // colour random
        $colors_array = [
            'primary',
            'success',
            'danger',
            'warning',
            'info',
            'secondary'
        ];

        // user
        $role = auth()->user()->role;

        if ($role === 'admin') {
            $users = User::where('role', '!=', 'admin')->get();
            $lessons = Lesson::all();
            $modules = Module::all();

            return view('pages.admin.home', [
                'users' => $users,
                'lessons' => $lessons,
                'modules' => $modules
            ]);
        } else if ($role === 'student') {
            $student = Student::where('user_id', auth()->user()->id)->firstOrFail();
            
            // random array
            $colors = Arr::random($colors_array, $student->lessons->count());

            return view('pages.student.home', [
                'student' => $student,
                'colors' => $colors
            ]);
        } else if ($role === 'teacher') {
            $teacher = Teacher::where('user_id', auth()->user()->id)->firstOrFail();
            $lessons = Lesson::where('teacher_id', $teacher->id)->get();

            // random array
            $colors = Arr::random($colors_array, $lessons->count());

            return view('pages.teacher.home', [
                'lessons' => $lessons,
                'colors' => $colors
            ]);
        }
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
