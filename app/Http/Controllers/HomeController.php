<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
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
        $role = Auth::user()->role;
        if ($role === 'admin') {
            $auth = Auth::user();
        } else if ($role === 'student') {
            $auth = Student::where('user_id', auth()->user()->id)->first();
        } else if ($role === 'teacher') {
            $auth = Teacher::where('user_id', auth()->user()->id)->first();
        }

        return view('home', ['auth' => $auth]);
    }
}
