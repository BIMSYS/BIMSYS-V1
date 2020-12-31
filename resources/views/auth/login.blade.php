@extends('layouts.authLayout', ['title' => 'Login'])

@section('content')
<div class="login-box">
    <div class="card">
        <div class="login-logo">
            <img src="img/logo.png" alt="logo" width="300px" class="mt-3 img-fluid">
        </div>
        <!-- /.login-logo -->

        <div class="card-body login-card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control border-primary @error('username') is-invalid @enderror"
                        name="username" placeholder="Username" required autocomplete="username" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text border-primary">
                            <span class="fas fa-user"></span>
                        </div>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control border-primary @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" required autocomplete="password" autofocus>
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

                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>

                    @if (Route::has('password.request'))
                    <p class="my-2 text-center">
                        <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
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
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection