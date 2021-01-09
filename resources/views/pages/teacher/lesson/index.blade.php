@extends('layouts.contentLayout', ['title' => 'Lessons'])

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

<!-- Default box -->
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
                            {{-- count lesson --}}
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{ $lessons_count }}
                                </b> Lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-start ml-3 mr-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">LESSON NAME</th>
                <th scope="col">LESSON CODE</th>
                <th scope="col">LESSON ENROLL</th>
                <th scope="col">LESSON DESCRIPTION</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
            <tr class="align-middle">
                <td>{{ $lesson->lesson_name }}</td>
                <td>{{ $lesson->lesson_code }}</td>
                <td>{{ $lesson->lesson_enroll }}</td>
                <td>{{ $lesson->lesson_description }}</td>
                <td>
                    <a href="{{ route('teacher.lesson.show', $lesson) }}" role="button">
                        <i class="fas fa-eye mr-2 text-info" style="font-size: 28px"></i>
                    </a>
                    <a href="{{ route('teacher.participant.index', $lesson) }}" role="button">
                        <i class="fas fa-users text-success" style="font-size: 28px"></i>
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