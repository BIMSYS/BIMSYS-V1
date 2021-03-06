@extends('layouts.contentLayout', ['title' => 'Lesson'])

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
                    <li class="breadcrumb-item active">Lesson Menu</li>
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

        <div class="col-5 d-flex justify-content-end" style="height: 100px; left:400px;">
            <a class="btn btn-primary mt-5" href="{{ route('admin.lesson.create') }}" role="button"> <img
                    src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Create New Data</a>
        </div>
    </div>
</div>

<div class="container-start ml-3 mr-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">LESSON NAME</th>
                <th scope="col">LESSON CODE</th>
                <th scope="col">LESSON TEACHER</th>
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
                <td>{{ $lesson->teacher->teacher_fullname }}</td>
                <td>{{ $lesson->lesson_enroll }}</td>
                <td>{{ $lesson->lesson_description }}</td>
                <td>
                    <a href="{{ route('admin.lesson.edit', $lesson) }}" role="button"><img
                            src="{{ URL::asset('/img/edit.png') }}" style="width: 30px; height: 30px;"
                            class="mb-2 mr-3 mt-3" alt="Edit"></a>
                    <a data-toggle="modal" data-target="#delete{{ $lesson->id }}" role="button"><img
                            src="{{ URL::asset('/img/delete.png') }}" style="width: 30px; height: 30px;"
                            class="mb-2 mt-3" alt="Delete"></a>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="delete{{ $lesson->id }}" tabindex="-1" aria-labelledby="delete{{ $lesson->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $lesson->id }}">Delete Lesson</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are You Sure Want to Delete?
                        </div>
                        <form action="{{ route('admin.lesson.destroy', $lesson) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer text-right">
                                <button type="submit" class="btn btn-success">Yes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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