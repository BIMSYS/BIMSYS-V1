<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id )->first();
        return view('admin/kelas/index', compact('student'));
    }
}
