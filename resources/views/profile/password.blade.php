@extends('layouts.profileLayout')

@section('profile-content')
<form method="post">
    @csrf
    @method('PATCH')

    <div class="input-group mb-3">
        <input type="password" class="form-control border-primary" name="old_password" required
            autocomplete="old-password" placeholder="Old Password">
        <div class="input-group-append">
            <div class="input-group-text border-primary">
                <span class="fas fa-lock"></span>
            </div>
        </div>

        @error('old_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control border-primary" name="password" required
            autocomplete="new-password" placeholder="New Password">
        <div class="input-group-append">
            <div class="input-group-text border-primary">
                <span class="fas fa-lock"></span>
            </div>
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control border-primary" name="password_confirmation" required
            autocomplete="new-password" placeholder="Confirm Password">

        <div class="input-group-append">
            <div class="input-group-text border-primary">
                <span class="fas fa-check-circle"></span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Change Password</button>
</form>
@endsection