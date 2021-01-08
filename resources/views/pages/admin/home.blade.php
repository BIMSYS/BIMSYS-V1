@extends('layouts.contentLayout', ['title' => 'Home'])

@push('css')
<style>
  #topcard {
    width: auto;
    height: 350px;
  }

  #pelajar {
    position: absolute;
    object-fit: cover;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0.6;
  }

  #logo {
    height: 250px;
    width: 450px;

  }

  h5 {
    font-family: 'Anton', sans-serif;

  }

  .lesson-overview {
    width: 500px;
  }
</style>

<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
@endpush

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header p-0">
  <div class="card mb-3" id="topcard">
    <img src="{{URL::asset('/img/quotes.jpg')}}" alt="" id="pelajar">
    <div class="row g-0">
      <div class="col">
        <div class="container d-flex justify-content-center mt-5">
          <img src="{{URL::asset('/img/logo.png')}}" alt="..." id="logo">
        </div>
      </div>
      <div class="col">
        <div class="card-body mt-3">
          <h5 class="card-title" style="font-size: xx-large;">PELAJAR JUARA</h5>
          <br> <br>
          <p class="card-text">Bimbingan belajar dengan kualitas guru dan materi terbaik! BIMSYS Pilihannya !</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <section class="content">
    <div class="container border rounded bg-white p-3 mb-3">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <p>Users</p>

              <h3 class="inline">{{ $users->count() }} <small>Users</small></h3>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.user.index') }}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-primary">
            <div class="inner">
              <p>Lessons</p>

              <h3 class="inline">{{ $lessons->count() }} <small>Lessons</small></h3>
            </div>
            <div class="icon">
              <i class="fas fa-book-reader"></i>
            </div>
            <a href="{{ route('admin.lesson.index') }}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <p>Modules</p>

              <h3 class="inline">{{ $modules->count() }} <small>Modules</small></h3>
            </div>
            <div class="icon">
              <i class="fas fa-book-open"></i>
            </div>
            <a href="{{ route('admin.module.index') }}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection