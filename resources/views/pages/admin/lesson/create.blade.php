@extends('layouts.contentLayout', ['title' => 'Create Lesson'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.lesson.index') }}">Lesson</a></li>
                    <li class="breadcrumb-item active">Create Lesson</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content mt-5">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card" style="width: 50rem;">
            <div class="card-header bg-primary">
                <h1 style="text-align:center;">Create New Lesson</h1>
            </div>

            <div class="card-body">
                <fieldset>
                    <form method="POST" action="{{ route('admin.lesson.store') }}">
                        @csrf
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-book"></span>
                                    </div>
                                </div>

                                <input type="text" name="lesson_name"
                                    class="form-control @error('lesson_name') is-invalid @enderror" name="lesson_name"
                                    placeholder="Lesson Name" value="{{ old('lesson_name') }}"
                                    autocomplete="lesson_name" autofocus>
                                @error('lesson_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group mb-3 mx-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-chalkboard-teacher"></span>
                                    </div>
                                </div>
                                <select class="form-control custom-select @error('lesson_teacher') is-invalid @enderror"
                                    id="lesson_teacher" name="lesson_teacher" autocomplete="lesson_teacher" autofocus>
                                    <option value="#">Choose Teacher..</option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->teacher_fullname }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('lesson_teacher')
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
                                        <span class="fas fa-id-card-alt"></span>
                                    </div>
                                </div>

                                <input type="text" name="lesson_code"
                                    class="form-control @error('lesson_code') is-invalid @enderror"
                                    placeholder="Lesson Code" value="{{ old('lesson_code') }}"
                                    autocomplete="lesson_code" autofocus>
                                @error('lesson_code')
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
                                        <span class="fas fa-quote-right"></span>
                                    </div>
                                </div>

                                <input type="text" name="lesson_description"
                                    class="form-control @error('lesson_description') is-invalid @enderror"
                                    name="lesson_description" placeholder="Lesson Description"
                                    value="{{ old('lesson_description') }}" autocomplete="lesson_description" autofocus>
                                @error('lesson_description')
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
                                <a href="{{ route('admin.lesson.index') }}" ><img
                                            src="{{ URL::asset('/img/cancel.png') }}" style="width: 50px; height: 50px;"
                                            class="mb-2 mr-3 mt-3" alt="Cancel"></a>
                            </ul>
                        </div>
                    </form>
                </fieldset>
            </div> <!-- tutup card body -->
        </div> <!-- tutup card -->
    </div> <!-- tutup col -->

</section>
@endsection