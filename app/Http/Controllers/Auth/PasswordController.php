<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Student;

class PasswordController extends Controller
{
    public function index(Student $student)
    {
        return view('profile.password', compact('student'));
    }

    public function update() {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if(Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);

            return redirect(route('home'))->with('status', 'You are changed your password');
        } else {
            return back()->withErrors('old_password', 'Make sure you fill your current password');
        }
    }
}
