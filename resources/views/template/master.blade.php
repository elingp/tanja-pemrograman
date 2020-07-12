<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Boxed Layout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @stack('stylesheet')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  @stack('cssDatatable')
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-boxed sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">

    @include('template.navbar')
    @include('template.sidebar')

  <div class="content-wrapper">
    @yield('content')
  </div>


@include('template.footer')


</div>
<!-- ./wrapper -->

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@stack('jsDatatable')
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
@stack('scripts')
</body>
</html>
