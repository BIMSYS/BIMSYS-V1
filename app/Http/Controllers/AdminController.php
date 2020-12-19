<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        $student = Student::where('user_id', auth()->user()->id )->first();
        return view('admin/kelas/create', compact('student'));
    }

    public function detail()
    {
        $student = Student::where('user_id', auth()->user()->id )->first();
        return view('admin/kelas/detail', compact('student'));
    }
}
