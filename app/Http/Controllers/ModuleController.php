<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all module and paginate
        $modules = Module::orderBy('module_title')
            ->paginate(5);

        return view('admin.module.index', [
            'modules' => $modules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetch all lesson
        $lessons = Lesson::all();

        return view('admin.module.create', [
            'lessons' => $lessons
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
        //validation
        $request->validate([
            'module_title' => 'required|string|max:255',
            'module_lesson' => 'required',
            'module_file' => 'required|mimetypes:application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint',
            'module_description' => 'required|max:255',
            'module_link' => 'max:255'
        ]);

        if ($request['module_file']) {
            // cek file
            $file = $request->file('module_file');
            $fileName = rand() . '_' . $file->getClientOriginalName();
            $file->move('uploads', $fileName);
        } else {
            $fileName = null;
        }

        // create module
        $module = new Module;
        $module->module_title = ucwords(Str::lower($request['module_title']));
        $module->lesson_id = $request['module_lesson'];
        $module->module_description = $request['module_description'];
        $module->module_link = $request['module_link'];
        // file
        $module->module_file = $fileName;

        // save module
        $module->save();

        // message
        if ($module) {
            return redirect(route('admin.module.index'))->with('success', 'Module berhasil ditambah');
        } else {
            return redirect(route('admin.module.create'))->with('danger', 'Module gagal ditambah!');
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
    public function edit(Module $module)
    {
        $lessons = Lesson::all();

        // cek file name
        $file = $module->module_file;
        list($rand, $fileName) = explode("_", $file);

        return view('admin.module.update', [
            'module' => $module,
            'lessons' => $lessons,
            'file' => $fileName
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //validation
        $request->validate([
            'module_title' => 'required|string|max:255',
            'module_lesson' => 'required',
            'module_file' => 'required|mimetypes:application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint',
            'module_description' => 'required|max:255',
            'module_link' => 'max:255'
        ]);

        // cek file
        $file = $request->file('module_file');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        $oldFile = "uploads/$module->module_file";

        // update module
        $module->module_title = ucwords(Str::lower($request['module_title']));
        $module->lesson_id = $request['module_lesson'];
        $module->module_description = $request['module_description'];
        $module->module_link = $request['module_link'];
        // file
        $module->module_file = $fileName;

        // save module
        $module->save();

        // delete file from public
        if (File::exists(public_path($oldFile))) {
            File::delete(public_path($oldFile));
        }

        // message
        if ($module) {
            return redirect(route('admin.module.index'))->with('success', 'Module berhasil diupdate');
        } else {
            return redirect(route('admin.module.update'))->with('danger', 'Module gagal diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        // file path
        $oldFile = "uploads/$module->module_file";

        $module->delete();

        // delete file from public
        if (File::exists(public_path($oldFile))) {
            File::delete(public_path($oldFile));
        }

        // message
        if ($module) {
            return redirect(route('admin.module.index'))->with('success', 'Module berhasil didelete');
        } else {
            return redirect(route('admin.module.index'))->with('danger', 'Module gagal didelete!');
        }
    }

    public function download(Module $module)
    {
        $path = public_path("uploads/$module->module_file");
        $fileName = $module->module_file;
        $headers = [
            'Content-Type: application/pdf',
            'Content-Type: application/msword',
            'Content-Type: application/vnd.ms-excel',
            'Content-Type: application/vnd.ms-powerpoint'
        ];

        return response()->download($path, $fileName, $headers);
    }
}
