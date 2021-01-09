@extends('layouts.contentLayout', ['title' => 'Tasks'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Tasks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.index') }}">Lessons</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.show', $module) }}">Modules</a></li>
                    <li class="breadcrumb-item active">Tasks</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Default box -->
<div class="container-start ml-3">
    <div class="row">
        <div class="col-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ URL::asset('/img/task.png') }}" class="mt-2" width="50px" height="50px"
                                alt="Murid">
                        </div>
                        <div class="col-8">
                            {{-- count module --}}
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{-- {{ $task->count() }} --}}
                                </b> Tasks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-5 d-flex justify-content-end" style="height: 100px; left:400px;">
            <a class="btn btn-primary mt-5" href="{{ route('teacher.task.create', $module) }}" role="button">
                <img src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Create New Task</a>
        </div>
    </div>
</div>

<div class="container-start ml-3 mr-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">TASK TITLE</th>
                <th scope="col">TASK FILE</th>
                <th scope="col">TASK LINK</th>
                <th scope="col">DUE DATE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($task))
            <tr class="align-middle">
                <td>{{ $task->task_title }}</td>
                <td>
                    <a href="{{ route('teacher.task.download', $task) }}">
                        <span class="fas fa-file-download" style="font-size: 35px"></span>
                    </a>
                </td>
                <td>
                    @if (!empty($task->task_link))
                    <a href="{{ $task->task_link }}">Link</a>
                    @else
                    -
                    @endif
                </td>
                <td>{{ $task->task_due }}</td>
                <td>
                    <a href="{{ route('teacher.task.edit', [
                        'task' => $task,
                        'module' => $module
                    ]) }}" role="button"><img src="{{ URL::asset('/img/edit.png') }}"
                            style="width: 30px; height: 30px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                    <a data-toggle="modal" data-target="#delete{{ $task->id }}" role="button"><img
                            src="{{ URL::asset('/img/delete.png') }}" style="width: 30px; height: 30px;"
                            class="mb-2 mt-3" alt="Delete"></a>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>
            @endif
        </tbody>
    </table>

    <h3 class="text-center">Student</h3>
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">NAMA LENGKAP</th>
                <th scope="col">TASK FILE</th>
                <th scope="col">TASK SUBMISSION</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($task))
            <tr class="align-middle">
                <td>{{ $task->task_title }}</td>
                <td>
                    <a href="{{ route('teacher.task.download', $task) }}">
                        <span class="fas fa-file-download" style="font-size: 35px"></span>
                    </a>
                </td>
                <td>
                    @if (!empty($task->task_link))
                    <a href="{{ $task->task_link }}">Link</a>
                    @else
                    -
                    @endif
                </td>
                <td>{{ $task->task_due }}</td>
                <td>
                    <a href="{{ route('teacher.task.edit', [
                        'task' => $task,
                        'module' => $module
                    ]) }}" role="button"><img src="{{ URL::asset('/img/edit.png') }}"
                            style="width: 30px; height: 30px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                    <a data-toggle="modal" data-target="#delete{{ $task->id }}" role="button"><img
                            src="{{ URL::asset('/img/delete.png') }}" style="width: 30px; height: 30px;"
                            class="mb-2 mt-3" alt="Delete"></a>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="col-6 d-flex" style="height: 100px;">
        <a class="btn btn-primary mt-5" href="{{ route('teacher.lesson.show', $module) }}" role="button"> <img
                src="{{ URL::asset('/img/back.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
            &nbsp; Back</a>
    </div>
</div>
@endsection