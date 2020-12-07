@extends('layouts.authLayout', ['title' => 'Forgot Password'])

@section('content')
<div class="login-box">
    <div class="card">
        <div class="login-logo">
            <img src="../img/logo.png" alt="logo" width="300px" class="mt-3 img-fluid">
        </div>
        <!-- /.login-logo -->

        <div class="card-body login-card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" class="form-control border-primary @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" required autocomplete="email" autofocus>
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

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                    <!-- /.col -->
                </div>

                @if (Route::has('login'))
                <p class="my-2 text-center">
                    <a class="btn btn-link text-center" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </p>
                @endif

                <hr>

                @if (Route::has('register'))
                <p class="mb-0 text-center">
                    Belum Punya Akun?
                    <a class="text-center" href="{{ route('register') }}">
                        {{ __('Registrasi') }}
                    </a>
                </p>
                @endif
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection