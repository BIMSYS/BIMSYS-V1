@extends('layouts.contentLayout', ['title' => 'Modules'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Modules</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.lesson.index') }}">Lessons</a></li>
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
                
            </tr>
        </thead>
        <tbody>
            
            <tr class="align-middle">
                <td></td>
                <td></td>
                <td>
                    <a href="">
                        <span class="fas fa-file-download" style="font-size: 35px"></span>
                    </a>
                </td>
                <td>
                   
                    <a href="">Link</a>
                    
                    -
                   
                </td>
                <td>
                    <a href="" role="button">Click here for ur task</a>
                </td>
                
            </tr>


            
            <tr>
                <td colspan="5">
                    <h4 class="text-center">Data Empty</h4>
                </td>
            </tr>
            

        </tbody>
    </table>

    <div class="col-6 d-flex" style="height: 100px;">
        <a class="btn btn-primary mt-5" href="{{ route('teacher.lesson.index') }}" role="button"> <img
                src="{{ URL::asset('/img/back.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
            &nbsp; Back</a>
    </div>

    <div class="d-flex justify-content-center">
        
    </div>
</div>
@endsection