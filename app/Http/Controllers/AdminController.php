<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;

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
      
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id )->first();
        return view('admin/kelas/index', compact('student'));
    }
}
