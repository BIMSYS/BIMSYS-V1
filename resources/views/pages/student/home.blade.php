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
          <p class="card-text">Bimbigan belajar dengan kualitas guru dan materi terbaik!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <section class="content">
    <div class="container border rounded bg-white p-3 mb-3">
      <div class="row">

        @php
        $i = 0;
        @endphp
        @foreach ($student->lessons as $lesson)
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-{{ $colors[$i++] }}">
            <div class="inner">
              <p>{{ $lesson->lesson_name }}</p>

              <h3 class="inline">{{ $lesson->modules->count() }} <small>Modules</small></h3>
            </div>
            <div class="icon">
              <i class="fas fa-book-reader"></i>
            </div>
            <a href="{{ route('student.lesson.show', $lesson) }}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        @endforeach

      </div>
    </div>

    <div class="container border rounded bg-white p-3 mb-3">
      {{-- <div class="col mb-4"> --}}
      <p class="text-center">
        <strong>Lesson Overview</strong>
      </p>

      <div class="d-flex justify-content-center pt-2">
        <div class="list-group list-group-flush lesson-overview">

          @php
          $i = 0;
          @endphp
          @foreach ($student->lessons as $lesson)
          <a href="{{ route('student.lesson.show', $lesson) }}" class="list-group-item 
            list-group-item-action 
            d-flex 
            justify-content-between 
            align-items-center 
            list-group-item-{{ $colors[$i++] }}">
            {{ $lesson->lesson_name }}
            <span class="badge badge-primary badge-pill">{{ $lesson->modules->count() }} Modules</span>
          </a>
          @endforeach

        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
@endsection