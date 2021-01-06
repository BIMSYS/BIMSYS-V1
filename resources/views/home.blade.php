@extends('layouts.contentLayout', ['title' => 'Home'])
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

@section('content')
<!-- Content Header (Page header) -->
@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
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

  #pengumuman {
    transform: translateX(17px);
    width: 800px;
  }
</style>
@endpush

<section class="content-header">
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
          <p class="card-text">Bimbigan belajar dengan kualitas guru dan materi terbaik!</p>
        </div>
        <div class="container">
          <div class="card card-primary" id="pengumuman">
            <div class="card-header">
              <h3 class="card-title">Latest Announcements</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content" data-load-on-init="false"><i class="fas fa-sync-alt"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              (No announcements have been posted yet.)
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>150</h3>

          <p>Partisipan</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>150</h3>

          <p>Partisipan</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>150</h3>

          <p>Partisipan</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>150</h3>

          <p>Partisipan</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </div>


</section>
<!-- /.content -->
@endsection