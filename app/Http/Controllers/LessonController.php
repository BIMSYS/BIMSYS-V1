<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::orderBy('lesson_name')
            ->paginate(5);

        return view('admin.lesson.index', [
            'lessons' => $lessons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lesson_name' => 'required|string|max:255',
            'lesson_code' => 'required|string|max:3|min:3|alpha_dash|unique:lessons,lesson_code',
            'lesson_description' => 'required|string|max:255'
        ]);

        // create lesson
        $lesson = new Lesson;
        $lesson->lesson_name = ucwords(Str::lower($request['lesson_name']));
        $lesson->lesson_code = Str::upper($request['lesson_code']);
        $lesson->lesson_description = $request['lesson_description'];
        $lesson->lesson_enroll = Str::random(6);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lesson = $lesson::where('id', $lesson->id)->firstOrFail();

        return view('admin.lesson.update', [
            'lesson' => $lesson
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
        $request->validate([
            'lesson_name' => 'required|string|max:255',
            'lesson_code' => 'required|string|max:3|min:3|alpha_dash|unique:lessons,lesson_code',
            'lesson_description' => 'required|string|max:255'
        ]);

        // update lesson
        $lesson->lesson_name = ucwords(Str::lower($request['lesson_name']));
        $lesson->lesson_code = Str::upper($request['lesson_code']);
        $lesson->lesson_description = $request['lesson_description'];
        $lesson->lesson_enroll = Str::random(6);

        // save lesson
        $lesson->save();

        // message
        if ($lesson) {
            return redirect(route('admin.lesson.index'))->with('success', 'Lesson berhasil diupdate');
        } else {
            return redirect(route('admin.lesson.create'))->with('danger', 'Lesson gagal diupdate!');
        }
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
