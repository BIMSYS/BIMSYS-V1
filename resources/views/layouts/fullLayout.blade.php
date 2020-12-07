<!DOCTYPE html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Logo Web -->
    <link rel="icon" type="{{ asset('img/logo-rounded.png') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('adminLTE/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        body {
            background-color: #E9ECEF;
        }
    </style>
</head>

<body class="hold-transition d-flex flex-column h-100">

    <main role="main" class="flex-shrink-0">
        <div class="container" style="margin-top: 10%;">

            @yield('content')

        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto pb-4">
        <!-- Copyright -->
        <div class="container text-center">
            copyright @2020 BIMSYS
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- jQuery -->
    <script src="{{url('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('adminLTE/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('adminLTE/dist/js/demo.js')}}"></script>
</body>

</html>