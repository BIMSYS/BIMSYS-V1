<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Task;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
        $task = Task::where('module_id', $module->id)->first();

        $lesson = Lesson::where('id', $module->lesson_id)->first();

        $students = $lesson->students()->orderBy('student_fullname')->paginate(5);

        return view('pages.teacher.task.index', [
            'task' => $task,
            'module' => $module,
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Module $module)
    {
        return view('pages.teacher.task.create', [
            'module' => $module
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
            'task_title' => 'required|max:255',
            'task_file' => 'required|mimetypes:application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint',
            'task_link' => 'max:255',
            'task_due' => 'required|date'
        ]);

        if ($request['task_file']) {
            // cek file
            $file = $request->file('task_file');
            $fileName = rand() . '_' . $file->getClientOriginalName();
            $file->move('uploads', $fileName);
        } else {
            $fileName = null;
        }

        // create task
        $task = new Task();
        $task->module_id = $request['task_module'];
        $task->task_title = ucwords(Str::lower($request['task_title']));
        $task->task_due = $request['task_due'];
        $task->task_link = $request['task_link'];

        // task file
        $task->task_file = $fileName;

        // task save
        $task->save();

        if ($task) {
            return redirect(route("teacher.task.index", $request['task_module']))->with('success', 'Task berhasil ditambah');
        } else {
            return redirect(route("teacher.task.create", $request['task_module']))->with('danger', 'Task gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, Module $module)
    {
        return view('pages.teacher.task.update', [
            'task' => $task,
            'module' => $module
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // validation
        $request->validate([
            'task_title' => 'required|max:255',
            'task_file' => 'mimetypes:application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint',
            'task_link' => 'max:255',
            'task_due' => 'required|date',
            'task_grade' => 'required|double'
        ]);

        // update task
        $task->task_title = ucwords(Str::lower($request['task_title']));
        $task->task_due = $request['task_due'];
        $task->task_link = $request['task_link'];

        if ($request['task_file'] !== null) {
            // cek file
            $file = $request->file('task_file');
            $fileName = rand() . '_' . $file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $oldFile = "uploads/$task->task_file";

            // file
            $task->task_file = $fileName;

            // delete file from public
            if (File::exists(public_path($oldFile))) {
                File::delete(public_path($oldFile));
            }
        }

        // task save
        $task->save();

        if ($task) {
            return redirect(route("teacher.task.index", $request['task_module']))->with('success', 'Task berhasil diupdate');
        } else {
            return redirect(route("teacher.task.edit", $request['task_module']))->with('danger', 'Task gagal diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, Module $module)
    {
        // file path
        $oldFile = "uploads/$task->task_file";

        $task->delete();

        // delete file from public
        if (File::exists(public_path($oldFile))) {
            File::delete(public_path($oldFile));
        }

        if ($task) {
            return redirect(route("teacher.task.index", $module))->with('success', 'Task berhasil dihapus');
        } else {
            return redirect(route("teacher.task.index", $module))->with('danger', 'Task gagal dihapus!');
        }
    }

    public function task_download(Task $task)
    {
        $path = public_path("uploads/$task->task_file");
        $fileName = $task->task_file;
        $headers = [
            'Content-Type: application/pdf',
            'Content-Type: application/msword',
            'Content-Type: application/vnd.ms-excel',
            'Content-Type: application/vnd.ms-powerpoint'
        ];

        return response()->download($path, $fileName, $headers);
    }

    public function result_download(Task $task)
    {
        $path = public_path("uploads/$task->task_result");
        $fileName = $task->task_result;
        $headers = [
            'Content-Type: application/pdf',
            'Content-Type: application/msword',
            'Content-Type: application/vnd.ms-excel',
            'Content-Type: application/vnd.ms-powerpoint'
        ];

        return response()->download($path, $fileName, $headers);
    }
}
