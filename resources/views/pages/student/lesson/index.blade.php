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
                    <li class="breadcrumb-item">Home</li>
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
                            <img src="{{ URL::asset('/img/lesson.png') }}" class="mt-2" width="50px" height="50px" alt="Murid">
                        </div>
                        <div class="col-8">

                            <span class="text-end"><b style="font-size: 50px;">
                                    50
                                </b> Lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 d-flex justify-content-end" style="height: 120px; left:400px;">
            <a class="btn btn-primary mt-5" href="" data-toggle="modal" data-target="#enroll" role="button"> <img src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Enroll Class</a>
            <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enroll" aria-hidden="true">
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

                                            <input type="text" name="task_title" class="form-control @error('task_title') is-invalid @enderror" placeholder="Task Title" value="{{ old('task_title') }}" autocomplete="task_title" autofocus>

                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-primary">
                                                    <span class="fas fa-book-open"></span>
                                                </div>
                                            </div>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('module_file') is-invalid @enderror" id="task_file" name="task_file" value="{{ old('task_file') }}">
                                                <label class="custom-file-label" for="module_file">Choose File</label>

                                                @error('task_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-primary">
                                                    <span class="fas fa-link"></span>
                                                </div>
                                            </div>

                                            <input type="text" name="task_link" class="form-control @error('task_link') is-invalid @enderror" placeholder="Link Task" value="{{ old('task_link') }}" autocomplete="task_link" autofocus>
                                            @error('task_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h6 class="ml">Task Due/Task Date</h6>

                                    <div class="form-row ">
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-primary">
                                                        <span class="fas fa-book"></span>
                                                    </div>
                                                </div>

                                                <input type="date" name="task_due" class="form-control @error('task_due') is-invalid @enderror" placeholder="Task Due" value="{{ old('task_due') }}" autocomplete="task_due" autofocus>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-primary">
                                                        <span class="fas fa-book"></span>
                                                    </div>
                                                </div>

                                                <input type="date" name="task_due" class="form-control @error('task_due') is-invalid @enderror" placeholder="Task Due" value="{{ old('task_due') }}" autocomplete="task_due" autofocus>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
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
        </div>
    </div>
</div>

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
            <tr class="align-middle">
                <td>Fisika</td>
                <td>F1234</td>
                <td>Fisika adalah mata pelajaran apa aja dah </td>
                <td>
                    <a href="" role="button">
                        <i class="fas fa-eye mr-2 text-info" style="font-size: 28px"></i>
                    </a>
                    <a href="" role="button">
                        <i class="fas fa-users text-success" style="font-size: 28px"></i>
                    </a>
                </td>
            </tr>

            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">

    </div>
</div>
@endsection