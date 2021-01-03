@extends('layouts.contentLayout', ['title' => 'Lessson'])

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
                        
                            <span class="text-end"><b style="font-size: 50px;">
                                    
                                </b> Lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-5 d-flex justify-content-end" style="height: 100px; left:400px;">
            <a class="btn btn-primary mt-5" href="" role="button"> <img
                    src="{{ URL::asset('/img/plus.png') }}" alt="Create New Data" style="width: 35px; height: 35px;">
                &nbsp; Create New Data</a>
        </div>
    </div>
</div>

<div class="container-start ml-3 mr-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">LESSON CODE</th>
                <th scope="col">LESSON NAME</th>
                <th scope="col">LESSON DESCRIPTION</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">1</th>
                <th scope="row">LESSONCODE</th>
                
                <th scope="row">LESSONNAME</th>
                <th scope="row">LESSONdesc</th>
                
                <td>
                    <a href="" role="button"><img src="{{ URL::asset('/img/edit.png') }}"
                            style="width: 30px; height: 30px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                    <a href="#" role="button"><img src="{{ URL::asset('/img/delete.png') }}"
                            style="width: 30px; height: 30px;" class="mb-2 mt-3" alt="Delete"></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
  
    </div>
</div>
@endsection