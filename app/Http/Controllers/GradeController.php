<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Grade;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student, Task $task)
    {
        // validation
        $request->validate([
            'task_grade' => 'required|max:5'
        ]);

        $module = Module::where('id', $task->module_id)->first();

        // add grade
        $grade = new Grade;
        $grade->student_id = $student->id;
        $grade->teacher_id = auth()->user()->teacher->id;
        $grade->task_id = $task->id;
        $grade->grade = $request['task_grade'];

        // save
        $grade->save();

        if ($grade) {
            return redirect(route("teacher.task.index", $module))->with('success', "Grade $student->student_fullname berhasil ditambah");
        } else {
            return redirect(route("teacher.task.index", $module))->with('danger', "Grade $student->student_fullname gagal ditambah");
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
    public function update(Request $request, Grade $grade, Task $task, Student $student)
    {
        // validation
        $request->validate([
            'task_grade' => 'required|max:5'
        ]);

        $module = Module::where('id', $task->module_id)->first();

        // update grade
        $grade->grade = $request['task_grade'];

        // save
        $grade->save();

        if ($grade) {
            return redirect(route("teacher.task.index", $module))->with('success', "Grade $student->student_fullname berhasil diupdate!");
        } else {
            return redirect(route("teacher.task.index", $module))->with('danger', "Grade $student->student_fullname gagal diupdate!");
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
