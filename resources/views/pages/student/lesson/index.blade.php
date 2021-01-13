@extends('layouts.contentLayout', ['title' => 'Student Lesson'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lesson Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Lessons Menu</li>

                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<div class="container-start ml-3">
    <div class="row">
        <div class="col-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ URL::asset('/img/lesson.png') }}" class="mt-2" width="50px" height="50px"
                                alt="Murid">
                        </div>
                        <div class="col-8">
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{ count($lessons) }}
                                </b> Lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 d-flex justify-content-end" style="height: 100px; left:400px;">
            <a class="btn btn-primary mt-5" href="" data-toggle="modal" data-target="#enroll" role="button"><img
                    src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Enroll Class</a>

            {{-- enroll modal --}}
            <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enroll" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="delete">Enroll Class</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('student.lesson.add') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <div class="form-group ">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-primary">
                                                        <span class="fas fa-book"></span>
                                                    </div>
                                                </div>

                                                <input type="text" name="lesson_code"
                                                    class="form-control @error('lesson_code') is-invalid @enderror"
                                                    placeholder="Lesson Code" value="{{ old('lesson_code') }}"
                                                    autocomplete="lesson_code" autofocus>

                                                @error('lesson_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-primary">
                                                        <span class="fas fa-key"></span>
                                                    </div>
                                                </div>

                                                <input type="text" name="enroll_code"
                                                    class="form-control @error('enroll_code') is-invalid @enderror"
                                                    placeholder="Enroll Code" value="{{ old('enroll_code') }}"
                                                    autocomplete="enroll_code" autofocus>

                                                @error('enroll_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <ul class="nav justify-content-center">
                                    <button type="submit" class="border-0 bg-transparent"><img
                                            src="{{ URL::asset('/img/check.png') }}" style="width: 40px; height: 40px;"
                                            class="mb-2 mr-3 mt-3" alt="Submit"></button>
                                    <button type="reset" class="border-0 bg-transparent"><img
                                            src="{{ URL::asset('/img/cancel.png') }}" style="width: 40px; height: 40px;"
                                            class="mb-2 mr-3 mt-3" alt="Cancel"></button>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- index table --}}
<div class="container-start ml-3 mr-5">
    <table class="table bg-white"> 
        <thead>
            <tr>
                <th scope="col">LESSON NAME</th>
                <th scope="col">LESSON CODE</th>
                <th scope="col">LESSON DESCRIPTION</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
            <tr class="align-middle">
                <td>{{ $lesson->lesson_name }}</td>
                <td>{{ $lesson->lesson_code }}</td>
                <td>{{ $lesson->lesson_description }}</td>
                <td>
                    <a href="{{ route('student.lesson.show', $lesson) }}" role="button">
                        <i class="fas fa-eye mr-2 text-info" style="font-size: 28px"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $lessons->links('vendor.pagination.bootstrap-4', ['elements' => $lessons]) }}
    </div>
</div>

@endsection