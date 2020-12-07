@extends('layouts.authLayout', ['title' => 'Reset Password'])

@section('content')
<div class="login-box">
    <div class="card">
        <div class="login-logo">
            <img src="../../img/logo.png" alt="logo" width="300px" class="mt-3 img-fluid">
        </div>
        <!-- /.login-logo -->

        <div class="card-body login-card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form action="{{ route('password.update') }}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input type="email" class="form-control border-primary @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required
                        autocomplete="email" autofocus>
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
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection