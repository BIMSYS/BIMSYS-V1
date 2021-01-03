@extends('layouts.contentLayout', ['title' => 'Users'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Menu</li>
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
                            <img src="{{ URL::asset('/img/graduated.png') }}" class="mt-2" width="50px" height="50px"
                                alt="Murid">
                        </div>
                        <div class="col-8">
                            {{-- Student Count --}}
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{ count($students) }}
                                </b> Murid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ URL::asset('/img/coaching.png') }}" class="mt-2" width="50px" height="50px"
                                alt="Guru">
                        </div>
                        <div class="col-8">
                            {{-- Teacher Count --}}
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{ count($teachers) }}
                                </b> Guru</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 d-flex justify-content-end ml-4" style="height: 100px;">
            <a class="btn btn-primary mt-5" href="{{ route('user.create') }}" role="button"> <img
                    src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Create New Data</a>
        </div>
    </div>
</div>

<div class="container-start ml-3 mr-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">FOTO</th>
                <th scope="col">NAMA LENGKAP</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                @if ($user->role === 'student')
                <th scope="row"><img src="{{ URL::asset( $user->student->student_image ) }}"
                        style="width: 50px; height: 50px;" class="mt-2 mb-2 ml-2"
                        alt="{{ $user->student->student_fullname }}"></th>
                <td class="align-middle">{{ $user->student->student_fullname }}</td>
                @elseif($user->role === 'teacher')
                <th scope="row"><img src="{{ URL::asset( $user->teacher->teacher_image ) }}"
                        style="width: 50px; height: 50px;" class="mt-2 mb-2 ml-2"
                        alt="{{ $user->teacher->teacher_fullname }}"></th>
                <td class="align-middle">{{ $user->teacher->teacher_fullname }}</td>
                @endif

                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">{{ $user->role }}</td>
                <td>
                    <a href="{{ route('user.edit', $user) }}" role="button"><img src="{{ URL::asset('/img/edit.png') }}"
                            style="width: 30px; height: 30px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                    <a data-toggle="modal" data-target="#delete{{ $user->id }}" role="button"><img
                            src="{{ URL::asset('/img/delete.png') }}" style="width: 30px; height: 30px;"
                            class="mb-2 mt-3" alt="Delete"></a>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-labelledby="delete{{ $user->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $user->id }}">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are You Sure Want to Delete?
                        </div>
                        <form action="{{ route('user.destroy', $user) }}" method="POST">
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
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links('vendor.pagination.bootstrap-4', ['elements' => $users]) }}
    </div>
</div>
@endsection