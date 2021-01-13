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
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.show', $module->lesson) }}">Modules</a></li>
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
                            <img src="{{ URL::asset('/img/task.png') }}" class="mt-2" width="50px" height="50px" alt="Murid">
                        </div>
                        <div class="col-8">
                            {{-- count module --}}
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{ count($students) }}
                                </b> Students</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (empty($task))
        <div class="col-5 d-flex justify-content-end" style="height: 100px; left:400px;">
            <a class="btn btn-primary mt-5" href="{{ route('teacher.task.create', $module) }}" role="button">
                <img src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Create New Task</a>
        </div>
        @endif
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
                    ]) }}" role="button"><img src="{{ URL::asset('/img/edit.png') }}" style="width: 30px; height: 30px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                    <a data-toggle="modal" data-target="#delete{{ $task->id }}" role="button"><img src="{{ URL::asset('/img/delete.png') }}" style="width: 30px; height: 30px;" class="mb-2 mt-3" alt="Delete"></a>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="delete{{ $task->id }}" tabindex="-1" aria-labelledby="delete{{ $task->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $task->id }}">Delete Task</h5>
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
            @else
            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>
            @endif
        </tbody>
    </table>

    <h3 class="text-center">Students Grade</h3>
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">NAMA LENGKAP</th>
                <th scope="col">TASK RESULT</th>
                <th scope="col">TASK SUBMISSION</th>
                <th scope="col">GRADE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
            <tr class="align-middle">
                <td>{{ $student->student_fullname }}</td>
                <td>
                    @if (!empty($task->task_result))
                    <a href="{{ route('teacher.task.participant.download', $task) }}">
                        <span class="fas fa-file-download" style="font-size: 35px"></span>
                    </a>
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if(!empty($task->task_date))
                    {{ $task->task_date }}
                    @if($task->task_date > $task->task_result)
                    <p><strong class="text-danger"> Overdue</strong>
                        @endif
                        @else
                        -
                        @endif
                </td>
                <td>
                    @if (!empty($task->grade->grade))
                    {{ $task->grade->grade }}

                    @php
                    $grade = $task->grade->id
                    @endphp
                    @else
                    -
                    @php
                    $grade = '-'
                    @endphp
                    @endif
                </td>
                <td>
                    <a data-toggle="modal" data-target="#grade{{ $grade }}" role="button">
                        <span class="fas fa-star text-warning" style="font-size: 28px"></span>
                    </a>
                </td>
            </tr>

            {{-- grade modal --}}
            <div class="modal fade" id="grade{{ $grade }}" tabindex="-1" aria-labelledby="grade{{ $grade }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="grade{{ $grade }}">
                                @if (!empty($task->grade))
                                Update Grade
                                @else
                                Add Grade
                                @endif
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @if (empty($task->grade))
                        <form action="{{ route('teacher.grade.participant.store', [
                            'student' => $student,
                            'task' => $task
                        ]) }}" method="POST">
                            @else
                            <form action="{{ route('teacher.grade.participant.update', [
                                'grade' => $task->grade,
                                'task' => $task,
                                'student' => $student
                            ]) }}" method="POST">
                                @method('PATCH')
                                @endif
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group ">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-primary">
                                                    <span class="fas fa-star"></span>
                                                </div>
                                            </div>

                                            <input type="number" name="task_grade" step=".01" class="form-control @error('task_grade') is-invalid @enderror" placeholder="Task Grade" value="@if(!empty($task->grade)){{ $task->grade->grade }}@else{{ old('task_result') }}@endif" autocomplete="task_grade" autofocus>

                                            @error('task_grade')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer text-right">
                                    <button type="submit" class="btn btn-success">
                                        @if (!empty($task->grade))
                                        Update
                                        @else
                                        Submit
                                        @endif
                                    </button>
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
        <a class="btn btn-primary mt-5" href="{{ route('teacher.lesson.show', $module->lesson) }}" role="button"> <img src="{{ URL::asset('/img/back.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
            &nbsp; Back</a>
    </div>

    <div class="d-flex justify-content-center">
        {{ $students->links('vendor.pagination.bootstrap-4', ['elements' => $students]) }}
    </div>
</div>
@endsection