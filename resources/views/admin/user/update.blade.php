@extends('layouts.contentLayout', ['title' => 'Create User'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Update User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content mt-5">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card" style="width: 65rem;">
            <div class="card-header bg-primary">
                <h1 style="text-align:center;">Update User</h1>
            </div>

            <div class="row no-gutters">
                <div class="col-md-5 d-flex align-items-center justify-content-center">
                    <img src="@if($user->role === 'student') 
                    {{ asset($user->student->student_image) }} 
                    @elseif($user->role === 'teacher')
                    {{ asset($user->teacher->teacher_image) }} 
                    @endif" width="200px" height="200px" alt="Profile Image" class="rounded-circle">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <fieldset>
                            <form method="POST" action="{{ route('user.update', $user) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="far fa-user"></span>
                                            </div>
                                        </div>

                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" value="{{ $name }}" autocomplete="name" autofocus>
                                        @error('name')
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
                                                <span class="fas fa-user-tag"></span>
                                            </div>
                                        </div>

                                        <input type="text" name="role"
                                            class="form-control-plaintext ml-2 @error('role') is-invalid @enderror"
                                            name="role" placeholder="Role" value="{{ $user->role }}" autocomplete="role"
                                            autofocus>
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
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>

                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            placeholder="Username" value="{{{ $user->username }}}"
                                            autocomplete="username" autofocus>
                                        @error('username')
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
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>

                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="Email" value="{{ $user->email }}" autocomplete="email"
                                            autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-primary">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>

                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password" autocomplete="password"
                                                autofocus>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-primary">
                                                    <span class="fas fa-check-circle"></span>
                                                </div>
                                            </div>

                                            <input id="password_confirmation" type="password" class="form-control"
                                                name="password_confirmation" placeholder="Confirm Password"
                                                autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-image"></span>
                                            </div>
                                        </div>

                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                id="image" name="image" value="{{ $image }}">
                                            <label class="custom-file-label" for="image">{{ $image }}</label>

                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <ul class="nav justify-content-center">
                                        <button type="submit" class="border-0 bg-transparent"><img
                                                src="{{ URL::asset('/img/check.png') }}"
                                                style="width: 50px; height: 50px;" class="mb-2 mr-3 mt-3"
                                                alt="Submit"></button>
                                        <button type="reset" class="border-0 bg-transparent"><img
                                                src="{{ URL::asset('/img/cancel.png') }}"
                                                style="width: 50px; height: 50px;" class="mb-2 mr-3 mt-3"
                                                alt="Cancel"></button>
                                    </ul>
                                </div>
                            </form>
                        </fieldset>
                    </div> <!-- tutup card body -->
                </div>
            </div>
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