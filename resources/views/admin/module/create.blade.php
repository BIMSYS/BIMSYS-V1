@extends('layouts.contentLayout', ['title' => 'Create Module'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.module.index') }}">Lesson</a></li>
                    <li class="breadcrumb-item active">Create Module</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content mt-5">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card" style="width: 50rem;">
            <div class="card-header bg-primary">
                <h1 style="text-align:center;">Create New Module</h1>
            </div>

            <div class="card-body">
                <fieldset>
                    <form method="POST" action="{{ route('admin.lesson.store') }}">
                      
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-book"></span>
                                    </div>
                                </div>

                                <input type="text" name="module_title"
                                    class="form-control @error('module_title') is-invalid @enderror" name="module_title"
                                    placeholder="Module Title" value="{{ old('module_title') }}"
                                    autocomplete="module_title" autofocus>
                                @error('module_title')
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
                                        <span class="fas fa-book-reader"></span>
                                    </div>
                                </div>

                                <select class="form-control custom-select @error('lesson_id') is-invalid @enderror" id="lesson_id"
                                    name="role" autocomplete="role" autofocus>
                                    <option value="#">Choose Lesson..</option>
                                    <option value="">lesson 1</option>
                                </select>
                                @error('role')
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
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                        id="module_file" name="module_file" value="{{ old('image') }}">
                                    <label class="custom-file-label" for="module_file">Choose Module File</label>

                                    @error('module_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-link"></span>
                                    </div>
                                </div>

                                <input type="text" name="module_link"
                                    class="form-control @error('module_link') is-invalid @enderror"
                                    placeholder="Link Module" value="{{ old('module_link') }}"
                                    autocomplete="module_link" autofocus>
                                @error('module_link')
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