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
                <div class="col-sm-6">
                    <h1>Admin Menu</h1>
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

        <!-- Default box -->
        <div class="container-start ml-3">
            <div class="row">
                <div class="col-3">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ URL::asset('/img/graduated.png') }}" class="mt-2" width="50px" height="50px" alt="Murid">
                                </div>
                                <div class="col-8">
                                    <span class="text-end"><b style="font-size: 50px;">100</b> Murid</span>
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
                                    <img src="{{ URL::asset('/img/coaching.png') }}" class="mt-2" width="50px" height="50px" alt="Guru">
                                </div>
                                <div class="col-8">
                                    <span class="text-end"><b style="font-size: 50px;">50</b> Guru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 d-flex justify-content-end" style="height: 115px;">
                    <a class="btn btn-primary mt-5" href="#" role="button"> <img src="{{ URL::asset('/img/plus.png') }}" class="" alt="Plus" style="width: 35px; height: 35px;"> &nbsp; Create New Data</a>
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
                    <tr>
                        <th scope="row"><img src="{{ URL::asset('/img/profile-user.png') }}" style="width: 50px; height: 50px;" class="mt-2 mb-2 ml-2" alt=""></th>
                        <td class="align-middle">Rafi Adinegoro</td>
                        <td class="align-middle">rafiadinegoro30@gmail.com</td>
                        <td class="align-middle">Murid</td>
                        <td>
                            <a class="" href="#" role="button"><img src="{{ URL::asset('/img/edit.png') }}" style="width: 30px; height: 30px;" class="mb-2 mr-3 mt-3" alt="Edit"></a>
                            <a class="" href="#" role="button"><img src="{{ URL::asset('/img/delete.png') }}" style="width: 30px; height: 30px;" class="mb-2 mt-3" alt="Delete"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>








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