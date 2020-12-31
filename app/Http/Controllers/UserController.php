<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            if ($user->role === 'student') {
                $students[] = $user->student;
            } elseif ($user->role === 'teacher') {
                $teachers[] = $user->teacher;
            }
        }

        $users = User::where('role', '!=', 'admin')
            ->leftJoin('students', 'students.user_id', '=', 'users.id')
            ->orderBy('student_fullname')
            ->leftJoin('teachers', 'teachers.user_id', '=', 'users.id')
            ->orderBy('teacher_fullname')
            ->paginate(5);

        return view('admin.user.index', [
            'users' => $users,
            'students' => $students,
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:teacher,student',
            'username' => 'required|alpha_dash|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'image|nullable'
        ]);

        // create user
        $user = new User;
        $user->username = Str::lower($request['username']);
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = $request['role'];

        // save data
        $user->save();

        // cek user_id
        $user = User::where('email', $request['email'])->firstOrFail();

        // cek image
        if ($request['image']) {
            // file upload
            $file = $request->file('image');
            $fileName = rand() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('img/profile-img', $fileName);
            $file->move('img/profile-img', $fileName);
        } else {
            $path = 'img/profile-user.png';
        }

        // save table student/teacher
        if ($request['role'] === 'student') {
            $student = new Student();

            $student->user_id = $user['id'];
            $student->student_fullname = ucwords(Str::lower($request['name']));
            $student->student_image = $path;

            $user->student()->save($student);
        } elseif ($request['role'] === 'teacher') {
            $teacher = new Teacher();

            $teacher->user_id = $user['id'];
            $teacher->teacher_fullname = ucwords(Str::lower($request['name']));
            $teacher->teacher_image = $path;

            $user->teacher()->save($teacher);
        }

        // message
        if ($user || $student || $teacher) {
            return redirect(route('user.index'))->with('success', 'User berhasil ditambah');
        } else {
            return redirect(route('user.create'))->with('danger', 'User gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
