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

    @include('includes.scripts')
</body>

</html>
