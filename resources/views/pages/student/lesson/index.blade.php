@extends('layouts.contentLayout',['title'=>'Lesson'])

@section('content')

<section>
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


</section>

@endsection