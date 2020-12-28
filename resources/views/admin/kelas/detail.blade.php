@extends('layouts.contentLayout', ['title' => 'Super Admin'])

@section('content')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto?query=ROBOTO&selection.family=Roboto:wght@700">

    <style>
        th {
            font-family: 'Roboto', sans-serif;
        }
    </style>

</head>

<body>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" >
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="col d-flex justify-content-center">
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary"> 
                        <h1 style="text-align:center;">Detail User</h1>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img width="400" height="300" style="transform: translateY(7mm) translateX(20mm);" src="" alt=""> 
                        </div>

                        <div class="col-md-6">
                            <div class="container">
                            <div class="card-body">
                                <fieldset>
                                    <div class="form-group ">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button type="" class="btn btn-primary">Nama</button>
                                            </div>
                                                <!-- /btn-group -->
                                            <input type="text" name="nama" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="" class="btn btn-primary">No HP</button>
                                                </div>
                                                            <!-- /btn-group -->
                                                <input type="text" name="" class="form-control">
                                            </div>
                                    </div>

                                    <div class="form-group ">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="" class="btn btn-primary">Role</button>
                                                </div>
                                                            <!-- /btn-group -->
                                                <input type="text" name="role" class="form-control">
                                            </div>  
                                    </div>
                            
                                    <div class="form-group ">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button type="" class="btn btn-primary">Username</button>
                                            </div>
                                                <!-- /btn-group -->
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button type="" class="btn btn-primary">Email</button>
                                            </div>
                                                <!-- /btn-group -->
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="" class="btn btn-primary">Password</button>
                                                </div>
                                                            <!-- /btn-group -->
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                    </div>


                                            <div>
                                                <ul class="nav justify-content-end">
                                                    <a class="" href="#" role="button"><img src="{{ URL::asset('/img/cancel.png') }}" style="width: 50px; height: 50px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                                                </ul>
                                            </div>
                                </fieldset>
                            </div> <!-- tutup card body -->
                        </div>
        </div>
                    </div> <!-- tutup card -->
                </div>
        </div>
        </div> <!-- tutup col -->
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>
@endsection