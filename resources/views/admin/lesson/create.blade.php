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
                    <li class="breadcrumb-item"><a href="">Lesson</a></li>
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
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">
                                        <span class="fas fa-id-card-alt"></span>
                                    </div>
                                </div>

                                <input type="text" name="lesson_code" class="form-control @error('lesson_code') is-invalid @enderror"
                                     placeholder="Lesson Code" value="{{ old('name') }}" autocomplete="name"
                                    autofocus>
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
                                        <span class="fas fa-book"></span>
                                    </div>
                                </div>

                                <input type="text" name="lesson_name"
                                    class="form-control @error('lesson_name') is-invalid @enderror" name="lesson_name"
                                    placeholder="Lesson Name" value="{{ old('lesson_name') }}" autocomplete="lesson_name"
                                    autofocus>
                                @error('lesson_name')
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
                                    class="form-control @error('lesson_description') is-invalid @enderror" name="lesson_description"
                                    placeholder="Lesson Description" value="{{ old('lesson_description') }}" autocomplete="lesson_description" autofocus>
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

@push('js')
<!-- Img JS -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var name = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(name);
        });
    });
</script>
@endpush