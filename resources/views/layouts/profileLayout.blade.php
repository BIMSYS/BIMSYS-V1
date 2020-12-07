@extends('layouts.contentLayout', ['title' => 'Profile'])

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container pt-5">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <img src="{{ URL::asset($student->foto) }}" class="img-circle elevation-2 ml-2 " weight="80px"
                        height="80px" alt="avatar">
                </li>
                <li class="nav-item">
                    <h3 class="mt-3 ml-3 font-weight-normal">{{ $student->nama_lengkap }}</h3>
                </li>
        </div>
    </div>
</div>

<div class="container">
    <div class="card text-center register-card-body">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is("profile/$student->id") ? ' active' : '' }}"
                        href="{{ route('profile', ['student' => $student->id]) }}">About me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is("profile/$student->id/edit") ? ' active' : '' }}"
                        href="{{ route('profile.edit', ['student' => $student->id]) }}">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is("profile/$student->id/password") ? ' active' : '' }}"
                        href="{{ route('password.edit', ['student' => $student->id]) }}">Edit Password</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row pb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    @yield('profile-content')

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>

@endsection