@extends('layouts.contentLayout', ['title' => 'Profile'])

@push('css')
<style>
    #id {
        font-weight: 100;
        font-size: x-small;
    }
</style>
@endpush

@section('content')
<section class="content-header">
    <div class="container">
        <div class="card mb-3"
            style="background-image: linear-gradient(150deg, #7df9ff, #2c75ff, #3137fd); height: 250px;">
            <div class="container d-flex justify-content-center">
                <img src="
                @if (auth()->user()->role === 'teacher')
                {{ URL::asset(auth()->user()->teacher->teacher_image)}}
                @elseif(auth()->user()->role === 'student')
                {{ URL::asset(auth()->user()->student->student_image)}}
                @endif
                " style="height: 75px; width: 75px; border-radius: 50%;" class="card-img-top mt-5 " alt="..."
                    id="profpict">
            </div>
            <h3 class="text-center text-light mt-3">
                @if (auth()->user()->role === 'teacher')
                {{ auth()->user()->teacher->teacher_fullname }}
                @elseif(auth()->user()->role === 'student')
                {{ auth()->user()->student->student_fullname }}
                @endif
            </h3>
        </div>
</section>

<section>
    <div class="container">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                            aria-selected="true">About Me</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                            href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                            aria-selected="false">Edit Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                            href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                            aria-selected="false">Change Password</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">
                        <h6 style="font-weight: bold;">Username</h6>
                        <p>{{ auth()->user()->username }}</p>
                        <hr>
                        <h6 style="font-weight: bold;">Email Address</h6>
                        <p>{{ auth()->user()->email }}</p>
                        <hr>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col d-flex justify-content-center mt-5">
                                    <img src="
                                    @if (auth()->user()->role === 'teacher')
                                    {{ URL::asset(auth()->user()->teacher->teacher_image)}}
                                    @elseif(auth()->user()->role === 'student')
                                    {{ URL::asset(auth()->user()->student->student_image)}}
                                    @endif" alt="{{ auth()->user()->username }}" style="height: 250px; width: 250px;">
                                </div>
                                <div class="col mt-5">
                                    <div class="mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="far fa-user" style="width: 20px;"></span>
                                            </div>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Name" value="@if (auth()->user()->role === 'teacher'){{ auth()->user()->teacher->teacher_fullname }}
                                                @elseif(auth()->user()->role === 'student'){{ auth()->user()->student->student_fullname }}
                                                @endif" autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-portrait" style="width: 20px;"></span>
                                            </div>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Username" value="{{ auth()->user()->username }}"
                                                autocomplete="username" autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group-prepend mb-3">
                                        <div class="input-group-text bg-primary">
                                            <span class="fas fa-envelope" style="width: 20px;"></span>
                                        </div>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" value="{{ auth()->user()->email }}" autocomplete="email"
                                            autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-primary">
                                            <span class="fas fa-image" style="width: 20px;"></span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                id="image" name="image" value="{{ old('image') }}">
                                            <label class="custom-file-label" for="image">Choose Image</label>

                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary" style="border-radius: 5%;"><img
                                            src="{{URL::asset('/img/edit.png')}}" style="width: 25px; height: 25px;"
                                            class="mb-1" alt="">&nbsp; &nbsp; Submit</button>
                                </div>
                        </form>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                            <div class="container">
                                <div class="col-md-6 mb-3" style="margin-left:300px;">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>

                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="New Password" autocomplete="password" autofocus>

                                     
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3" style="margin-left:300px;">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>

                                        <input type="password" name="confirmpassword"
                                            class="form-control @error('password') is-invalid @enderror" name="confirmpassword"
                                            placeholder="Confirm New Password" autocomplete="confirmpassword" autofocus>

                                     
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" style="border-radius: 5%; margin-left:310px;"><img
                                            src="{{URL::asset('/img/edit.png')}}" style="width: 25px; height: 25px;"
                                            class="mb-1" alt="">&nbsp; &nbsp; OK</button>
                            </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
    </div>
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