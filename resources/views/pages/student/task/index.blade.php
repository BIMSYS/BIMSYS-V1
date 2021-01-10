@extends('layouts.contentLayout', ['title' => 'Tasks'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $module->module_title }} Tasks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('student.lesson.index') }}">Lessons</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('student.lesson.show', $module->lesson) }}">Modules</a></li>
                    <li class="breadcrumb-item active">Tasks</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-start ml-3 mr-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">TASK TITLE</th>
                <th scope="col">TASK FILE</th>
                <th scope="col">TASK LINK</th>
                <th scope="col">DUE DATE</th>
                <th scope="col">TASK RESULT</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($task))
            <tr class="align-middle">
                <td>{{ $task->task_title }}</td>
                <td>
                    <a href="{{ route('student.task.download', $task) }}">
                        <span class="fas fa-file-download text-warning" style="font-size: 35px"></span>
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
                    <a href="" data-toggle="modal" data-target="#uploadTask" role="button"><span
                            class="fas fa-upload text-info" style="font-size: 28px"></span></a>
                </td>
            </tr>

            <!-- Upload Modal -->
            <div class="modal fade" id="uploadTask" tabindex="-1" aria-labelledby="uploadTaskLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadTaskLabel">Upload Task Result</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('student.task.result.upload', [
                            'task' => $task,
                            'module' => $module
                        ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="form-group ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-book-open"></span>
                                            </div>
                                        </div>

                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('task_result') is-invalid @enderror"
                                                id="task_result" name="task_result" value="{{ old('task_result') }}">
                                            <label class="custom-file-label" for="task_result">Choose
                                                File</label>

                                            @error('task_result')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <ul class="nav justify-content-center">
                                    <button type="submit" class="border-0 bg-transparent"><img
                                            src="{{ URL::asset('/img/check.png') }}" style="width: 40px; height: 40px;"
                                            class="mb-2 mr-3 mt-3" alt="Submit"></button>
                                    <button type="button" data-dismiss="modal" class="border-0 bg-transparent"><img
                                            src="{{ URL::asset('/img/cancel.png') }}" style="width: 40px; height: 40px;"
                                            class="mb-2 mr-3 mt-3" alt="Cancel"></button>
                                </ul>
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

    {{-- result --}}
    @if (!empty($task->task_result))
    <h4 class="text-center mt-5">TASK RESULT</h4>
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">TASK RESULT</th>
                <th scope="col">DATE SUBMISSION</th>
                <th scope="col">GRADE</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($task->task_result))
            <tr class="align-middle">
                <td>
                    <a href="{{ route('student.task.result.download', $task) }}">
                        <span class="fas fa-file-download" style="font-size: 35px"></span>
                    </a>
                </td>
                <td>
                    @if ($task->task_date > $task->task_due)
                    <p>{{ $task->task_date }} <strong class="text-danger">Overdue</strong></p>
                    @else
                    {{ $task->task_date }}
                    @endif
                </td>
                <td>
                    @if (!empty($task->grade))
                    {{ $task->grade->grade }}
                    @else
                    -
                    @endif
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
    @endif
    <div class="col-6 d-flex" style="height: 100px;">
        <a class="btn btn-primary mt-5" href="{{ route('student.lesson.show', $module->lesson) }}" role="button"> <img
                src="{{ URL::asset('/img/back.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
            &nbsp; Back</a>
    </div>
</div>
@endsection

@push('js')
<!-- File JS -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var name = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(name);
        });
    });
</script>
@endpush