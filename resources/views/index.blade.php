@extends('layouts.fullLayout', ['title' => 'BIMSYS Pelajar Juara'])

@section('content')
<div class="jumbotron border shadow bg-light p-0">
    <!-- nav header -->
    <section>
        <nav class="navbar navbar-expand-md navbar-light bg-light pb-0 ">
            <a class="navbar-brand mb-0 pl-3 w-100">Selamat Datang di BIMSYS</a>

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">{{ __('LOGIN')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <hr>

    <section>
        <div class="container mt-5 w-50 pb-5">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="img-fluid">
        </div>
    </section>
</div>
@endsection