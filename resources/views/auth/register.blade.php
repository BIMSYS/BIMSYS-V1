@extends('layouts.authLayout', ['title' => 'Registrasi'])

@section('content')

<div class="register-box">
    <div class="card">
        <div class="register-logo">
            <img src="img/logo.png" alt="logo" width="300px" class="mt-3 img-fluid">
        </div>
        <!-- /.Register-logo -->
        <div class="card-body register-card-body">
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control border-primary @error('name') is-invalid @enderror"
                        name="name" placeholder="Nama" value="{{ old('name') }}" required autocomplete="name">

                    <div class="input-group-append">
                        <div class="input-group-text border-primary">
                            <span class="fas fa-user"></span>
                        </div>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control border-primary @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" {{ old('email') }} required autocomplete="email">

                    <div class="input-group-append">
                        <div class="input-group-text border-primary">
                            <span class="fas fa-envelope"></span>
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control border-primary @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    <div class="input-group-append">
                        <div class="input-group-text border-primary">
                            <span class="fas fa-lock"></span>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control border-primary" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Ketik ulang password">

                    <div class="input-group-append">
                        <div class="input-group-text border-primary">
                            <span class="fas fa-check-circle"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>

                <hr>

                @if (Route::has('login'))
                <p class="my-2 text-center">
                    <a class="btn btn-link text-center" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </p>
                @endif
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection