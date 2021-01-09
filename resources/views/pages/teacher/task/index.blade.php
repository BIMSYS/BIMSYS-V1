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
                                    {{ $tasks->count() }}
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
                <th scope="col">TASK DUE</th>
                <th scope="col">TASK DATE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
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
                    @if (!empty($task->task_date))
                    {{ $task->task_date }}
                    @else
                    -
                    @endif
                </td>
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

            <!-- Delete Modal -->
            <div class="modal fade" id="delete{{ $task->id }}" tabindex="-1" aria-labelledby="delete{{ $task->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $task->id }}">Delete task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are You Sure Want to Delete?
                        </div>
                        <form action="{{ route('teacher.task.destroy', [
                            'task' => $task,
                            'module' => $module
                        ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer text-right">
                                <button type="submit" class="btn btn-success">Yes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="col-6 d-flex" style="height: 100px;">
        <a class="btn btn-primary mt-5" href="{{ route('teacher.lesson.show', $module) }}" role="button"> <img
                src="{{ URL::asset('/img/back.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
            &nbsp; Back</a>
    </div>

    <div class="d-flex justify-content-center">

    </div>
</div>
@endsection