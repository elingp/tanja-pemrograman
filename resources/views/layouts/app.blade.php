<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-boxed sidebar-collapse">

    <!-- Site wrapper -->
    <div class="wrapper">

        @include('includes.navbar')
        @include('includes.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>

    @include('sweetalert::alert')

    @stack('scripts')
</body>

</html>
