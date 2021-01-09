<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function lesson_add(Request $request)
    {
        $request->validate([
            'lesson_code' => 'required|max:3|min:3',
            'enroll_code' => 'required'
        ]);

        // cek lesson_code
        $lesson = Lesson::where('lesson_code', $request['lesson_code'])->first();

        if (empty($lesson)) {
            return redirect(route('student.lesson.index'))->with('danger', 'Lesson Code tidak Sesuai!');
        } else {
            $student = Student::where('user_id', auth()->user()->id)->firstOrFail();

            if ($request['enroll_code'] === $lesson->lesson_enroll) {
                // attach
                $lesson->students()->attach($student);

                if ($lesson) {
                    return redirect(route('student.lesson.index'))->with('success', 'Lesson berhasil ditambah!');
                } else {
                    return redirect(route('student.lesson.index'))->with('danger', 'Lesson gagal ditambah!');
                }
            } else {
                return redirect(route('student.lesson.index'))->with('danger', 'Enroll Code tidak Sesuai!');
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            // count data
            $lessons_count = Lesson::all();
            $lessons_count = count($lessons_count);

            // fetch all lesson and paginate
            $lessons = Lesson::orderBy('lesson_name')
                ->paginate(5);

            return view('pages.admin.lesson.index', [
                'lessons' => $lessons,
                'lessons_count' => $lessons_count
            ]);
        } elseif (auth()->user()->role === 'teacher') {
            // teacher
            $teacher = Teacher::where('user_id', auth()->user()->id)->firstOrFail();

            // count data
            $lessons_count = Lesson::where('teacher_id', $teacher->id)->get();
            $lessons_count = count($lessons_count);

            // fetch lesson
            $lessons = Lesson::where('teacher_id', $teacher->id)->orderBy('lesson_name')->paginate(5);

            return view('pages.teacher.lesson.index', [
                'lessons' => $lessons,
                'lessons_count' => $lessons_count
            ]);
        } elseif (auth()->user()->role === 'student') {
            $student = auth()->user()->student;
            // lessons
            $lessons = $student->lessons()->orderBy('lesson_name')->paginate(5);

            return view('pages.student.lesson.index', [
                'lessons' => $lessons
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetch all teacher
        $teachers = Teacher::all();

        return view('pages.admin.lesson.create', [
            'teachers' => $teachers
        ]);
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
            'lesson_name' => 'required|string|max:255',
            'lesson_code' => 'required|string|max:3|min:3|alpha_dash|unique:lessons,lesson_code',
            'lesson_description' => 'required|string|max:255',
            'lesson_teacher' => 'required'
        ]);

        // create lesson
        $lesson = new Lesson;
        $lesson->lesson_name = ucwords(Str::lower($request['lesson_name']));
        $lesson->lesson_code = Str::upper($request['lesson_code']);
        $lesson->lesson_description = $request['lesson_description'];
        $lesson->lesson_enroll = Str::random(6);
        $lesson->teacher_id = $request['lesson_teacher'];

        // save lesson
        $lesson->save();

        // message
        if ($lesson) {
            return redirect(route('admin.lesson.index'))->with('success', 'Lesson berhasil ditambah');
        } else {
            return redirect(route('admin.lesson.create'))->with('danger', 'Lesson gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $modules = Module::where('lesson_id', $lesson->id);
        $modules_count = count($modules->get());

        $modules = $modules->paginate(5);

        return view('pages.teacher.module.index', [
            'lesson' => $lesson,
            'modules' => $modules,
            'modules_count' => $modules_count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        // fetch lesson
        $lesson = $lesson::where('id', $lesson->id)->firstOrFail();

        // fetch all teacher
        $teachers = Teacher::all();

        return view('pages.admin.lesson.update', [
            'lesson' => $lesson,
            'teachers' => $teachers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        // lesson code unique cek
        if ($request['lesson_code'] != $lesson->lesson_code) {
            $code = 'unique:lessons,lesson_code';
        } else {
            $code = null;
        }

        // validation
        $request->validate([
            'lesson_name' => 'required|string|max:255',
            'lesson_code' => "required|string|max:3|min:3|alpha_dash|$code",
            'lesson_description' => 'required|string|max:255',
            'lesson_teacher' => 'required'
        ]);

        // update lesson
        $lesson->lesson_name = ucwords(Str::lower($request['lesson_name']));
        $lesson->lesson_code = Str::upper($request['lesson_code']);
        $lesson->lesson_description = $request['lesson_description'];
        $lesson->lesson_enroll = Str::random(6);
        $lesson->teacher_id = $request['lesson_teacher'];

        // save lesson
        $lesson->save();

        // message
        if ($lesson) {
            return redirect(route('admin.lesson.index'))->with('success', 'Lesson berhasil diupdate');
        } else {
            return redirect(route('admin.lesson.edit', $lesson))->with('danger', 'Lesson gagal diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        // delete lesson
        $lesson::where('id', $lesson->id)->delete();

        // message
        if ($lesson) {
            return redirect(route('admin.lesson.index'))->with('success', 'Lesson berhasil dihapus');
        } else {
            return redirect(route('admin.lesson.index'))->with('danger', 'Lesson gagal dihapus!');
        }
    }
}
