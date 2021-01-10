@extends('layouts.contentLayout', ['title' => 'Lesson Modules'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $lesson->lesson_name }} Modules</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('student.lesson.index') }}">Lessons</a></li>
                    <li class="breadcrumb-item active">Lesson Modules</li>
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
                            <img src="{{ URL::asset('/img/module.png') }}" class="mt-2" width="50px" height="50px"
                                alt="Murid">
                        </div>
                        <div class="col-8">
                            <span class="text-end"><b style="font-size: 50px;">
                                    {{ $modules_count }}
                                </b> Module</span>
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
                <th scope="col">MODULE TITLE</th>
                <th scope="col">MODULE DESCRIPTION</th>
                <th scope="col">MODULE FILE</th>
                <th scope="col">LINK</th>
                <th scope="col">TASK MODULE</th>
<<<<<<< HEAD
                <th scope="col">TASK RESULT</th>
                
=======

>>>>>>> 3dc9308ffe81f50a8a849f59cb14bd9d91dae50a
            </tr>
        </thead>
        <tbody>
            @forelse ($modules as $module)
            <tr class="align-middle">
<<<<<<< HEAD
                <td>MODULE TITLE</td>
                <td>MODULE DESCRIPTION</td>
=======
                <td>{{ $module->module_title }}</td>
                <td>{{ $module->module_description }}</td>
>>>>>>> 3dc9308ffe81f50a8a849f59cb14bd9d91dae50a
                <td>
                    <a href="{{ route('student.module.download', $module) }}">
                        <span class="fas fa-file-download" style="font-size: 35px"></span>
                    </a>
                </td>
                <td>
                    @if (!empty($module->module_link))
                    <a href="{{ $module->module_link }}">Link</a>
                    @else
                    -
                    @endif
                </td>
                <td>
<<<<<<< HEAD
                    <a href="" role="button" data-toggle="modal" data-target="#uploadtask">Click here for upload ur task</a>
                    <div class="modal fade" id="uploadtask" tabindex="-1" aria-labelledby="uploadtask" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="delete">Enroll Class</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

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

                                                    <input type="text" name="Lesson Code" class="form-control @error('Lesson Code') is-invalid @enderror" placeholder="Lesson Code" value="{{ old('Lesson Code') }}" autocomplete="Lesson Code" autofocus>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-primary">
                                                            <span class="fas fa-book"></span>
                                                        </div>
                                                    </div>

                                                    <input type="text" name="Enroll Code" class="form-control @error('Enroll Code') is-invalid @enderror" placeholder="Enroll Code" value="{{ old('Enroll Code') }}" autocomplete="Enroll Code" autofocus>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <ul class="nav justify-content-center">
                                        <button type="submit" class="border-0 bg-transparent"><img src="{{ URL::asset('/img/check.png') }}" style="width: 40px; height: 40px;" class="mb-2 mr-3 mt-3" alt="Submit"></button>
                                        <button type="reset" class="border-0 bg-transparent"><img src="{{ URL::asset('/img/cancel.png') }}" style="width: 40px; height: 40px;" class="mb-2 mr-3 mt-3" alt="Cancel"></button>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>disini ntar yang udah diupload ya</td>
                
            </tr>
=======
                    @if (!empty($module->task))
                    <a href="{{ route('student.task.index', $module) }}">Click here for ur task</a>
                    @else
                    -
                    @endif
                </td>
>>>>>>> 3dc9308ffe81f50a8a849f59cb14bd9d91dae50a

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

    <div class="col-6 d-flex" style="height: 100px;">
        <a class="btn btn-primary mt-5" href="{{ route('student.lesson.index') }}" role="button"> <img
                src="{{ URL::asset('/img/back.png') }}" alt="Back" style="width: 35px; height: 35px;">
            &nbsp; Back</a>
    </div>

    <div class="d-flex justify-content-center">
        {{ $modules->links('vendor.pagination.bootstrap-4', ['elements' => $modules]) }}
    </div>
</div>
@endsection