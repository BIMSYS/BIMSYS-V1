<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile_index()
    {
        return view('pages.profile.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all data
        $users = User::all();

        // set array students and teachers
        $students = [];
        $teachers = [];

        // for count data
        foreach ($users as $user) {
            if ($user->role === 'student') {
                $students[] = $user->student;
            } elseif ($user->role === 'teacher') {
                $teachers[] = $user->teacher;
            }
        }

        // paginate and fetch all data without admin
        $users = User::where('role', '!=', 'admin')
            ->with(['student', 'teacher'])
            ->orderBy('created_at', 'DESC')
            ->paginate(5);


        return view('pages.admin.user.index', [
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
        return view('pages.admin.user.create');
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

        // cek user_id
        $user = User::where('email', $request['email'])->firstOrFail();

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
            return redirect(route('admin.user.index'))->with('success', 'User berhasil ditambah');
        } else {
            return redirect(route('admin.user.create'))->with('danger', 'User gagal ditambah!');
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
    public function edit(User $user)
    {
        // fetch user data
        $user = $user::where('id', $user->id)->firstOrFail();

        // set role data
        if ($user->role === 'student') {
            $name = $user->student->student_fullname;
            $image = $user->student->student_image;
        } elseif ($user->role === 'teacher') {
            $name = $user->teacher->teacher_fullname;
            $image = $user->teacher->teacher_image;
        }

        if ($image !== "img/profile-user.png") {
            // image name
            list($images, $uploads, $imgNameRand) = explode("/", $image);
            list($rand, $imgName) = explode("_", $imgNameRand);
        } else {
            $imgName = $image;
        }

        return view('pages.admin.user.update', [
            'user' => $user,
            'name' => $name,
            'image' => $imgName
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // cek request unique data
        if ($user->username !== $request['username'] || $user->email !== $request['email']) {
            $validation = 'unique:users';
        } else {
            $validation = null;
        }

        // validation
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:teacher,student',
            'username' => "required|alpha_dash|string|max:255|$validation",
            'email' => "required|string|email|max:255|$validation",
            'password' => 'string|min:8|confirmed',
            'image' => 'image|nullable'
        ]);

        // set image for delete img
        if ($user->role === 'student') {
            $image = $user->student->student_image;
        } elseif ($user->role === 'teacher') {
            $image = $user->teacher->teacher_image;
        }

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

        // user update
        $user = $user::find($user->id);
        $user->username = Str::lower($request['username']);
        $user->email = $request['email'];
        $user->role = $request['role'];

        if ($request['password'] !== null) {
            $user->password = Hash::make($request['password']);
        }

        // save user data
        $user->save();

        // role cek
        if ($request['role'] === 'student') {
            $student = Student::where('user_id', $user->id)->firstOrFail();

            $student->user_id = $user->id;
            $student->student_fullname = ucwords(Str::lower($request['name']));
            $student->student_image = $path;

            $user->student()->save($student);
        } elseif ($request['role'] === 'teacher') {
            $teacher = Teacher::where('user_id', $user->id)->firstOrFail();

            $teacher->user_id = $user->id;
            $teacher->teacher_fullname = ucwords(Str::lower($request['name']));
            $teacher->teacher_image = $path;

            $user->teacher()->save($teacher);
        }

        // delete image from public
        if (File::exists(public_path($image)) && $image !== "img/profile-user.png") {
            File::delete(public_path($image));
        }

        // message
        if ($user || $student || $teacher) {
            return redirect(route('admin.user.index'))->with('success', 'User berhasil diupdate');
        } else {
            return redirect(route('admin.user.edit', $user))->with('danger', 'User gagal diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->role === "student") {
            $image = $user->student->student_image;
        } elseif ($user->role === "teacher") {
            $image = $user->teacher->teacher_image;
        }

        // delete user
        $user::where('id', $user->id)->delete();

        // delete image from public
        if (File::exists(public_path($image)) && $image !== "img/profile-user.png") {
            File::delete(public_path($image));
        }

        // message
        if ($user) {
            return redirect(route('admin.user.index'))->with('success', 'User berhasil dihapus');
        } else {
            return redirect(route('admin.user.index'))->with('danger', 'User gagal dihapus!');
        }
    }
}
