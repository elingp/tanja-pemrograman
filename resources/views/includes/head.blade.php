<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('tile') - Tanja Pemrograman</title>
<!-- Fonts -->
<link href="//fonts.gstatic.com" rel="dns-prefetch">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<link href="{{ asset('adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet" >
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" >

@stack('stylesheet')
