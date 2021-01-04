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
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.index') }}">Lessons</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.show', $lesson) }}">Lesson Modules</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
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
                    <form method="POST" action="{{ route('teacher.module.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-book-reader"></span>
                                    </div>
                                </div>

                                <span class="ml-2">{{ $lesson->lesson_name }}</span>
                                <input type="hidden" name="module_lesson" class="form-control-plaintext ml-2" readonly
                                    value="{{ $lesson->id }}">
                            </div>
                        </div>

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

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-book-open"></span>
                                    </div>
                                </div>

                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('module_file') is-invalid @enderror"
                                        id="module_file" name="module_file" value="{{ old('module_file') }}">
                                    <label class="custom-file-label" for="module_file">Choose File</label>

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
                                        <span class="fas fa-quote-right"></span>
                                    </div>
                                </div>

                                <input type="text" name="module_description"
                                    class="form-control @error('module_description') is-invalid @enderror"
                                    name="module_description" placeholder="Module Description"
                                    value="{{ old('module_description') }}" autocomplete="module_description" autofocus>
                                @error('module_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <h6 class="ml-5">Optional</h6>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-link"></span>
                                    </div>
                                </div>

                                <input type="text" name="module_link"
                                    class="form-control @error('module_link') is-invalid @enderror"
                                    placeholder="Link Lesson" value="{{ old('module_link') }}"
                                    autocomplete="module_link" autofocus>
                                @error('module_link')
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