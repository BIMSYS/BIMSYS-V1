@extends('layouts.contentLayout', ['title' => 'Update Task'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.index') }}">Lessons</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.show', $module) }}">Modules</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.task.index', $module) }}">Task</a></li>
                    <li class="breadcrumb-item active">Update Task</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content mt-5">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card" style="width: 50rem;">
            <div class="card-header bg-primary">
                <h1 style="text-align:center;">Update Task</h1>
            </div>

            <div class="card-body">
                <fieldset>
                    <form method="POST" action="{{ route('teacher.task.update', $task) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="task_module" value="{{ $module->id }}">

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-book"></span>
                                    </div>
                                </div>

                                <input type="text" name="task_title"
                                    class="form-control @error('task_title') is-invalid @enderror"
                                    placeholder="Task Title" value="{{ $task->task_title }}" autocomplete="task_title"
                                    autofocus>

                                @error('task_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-book-open"></span>
                                    </div>
                                </div>

                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('task_file') is-invalid @enderror"
                                        id="task_file" name="task_file" value="{{ $task->task_file }}">
                                    <label class="custom-file-label" for="task_file">{{ $task->task_file }}</label>

                                    @error('task_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h6>Task Due Date</h6>
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-calendar-week"></span>
                                    </div>
                                </div>

                                <input type="date" name="task_due"
                                    class="form-control @error('task_due') is-invalid @enderror" placeholder="Task Due"
                                    value="{{ $task->task_due }}" autocomplete="task_due" autofocus>

                                @error('task_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <h6>Optional</h6>
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-link"></span>
                                    </div>
                                </div>

                                <input type="text" name="task_link"
                                    class="form-control @error('task_link') is-invalid @enderror"
                                    placeholder="Link Task" value="{{ $task->task_link }}" autocomplete="task_link"
                                    autofocus>

                                @error('task_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <ul class="nav justify-content-center">
                                <button type="submit" class="border-0 bg-transparent"><img
                                        src="{{ URL::asset('/img/check.png') }}" style="width: 50px; height: 50px;"
                                        class="mb-2 mr-3 mt-3" alt="Submit"></button>
                                <button type="reset" class="border-0 bg-transparent"><img
                                        src="{{ URL::asset('/img/cancel.png') }}" style="width: 50px; height: 50px;"
                                        class="mb-2 mr-3 mt-3" alt="Cancel"></button>
                            </ul>
                        </div>
                    </form>
                </fieldset>
            </div> <!-- tutup card body -->
        </div> <!-- tutup card -->
    </div> <!-- tutup col -->
</section>
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