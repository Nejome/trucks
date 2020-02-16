<!DOCTYPE html>
<html lang="AR">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>الشاحنات - لوحة التحكم</title>

    <link href="{{asset('cp/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('cp/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('cp/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">

</head>
<body>

@include('admin.layouts.sidebar')

<div class="main-content">

    @include('admin.layouts.header')

    @yield('content')

</div>

<script src="{{asset('cp/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('cp/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('cp/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('cp/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<script src="{{asset('cp/assets/js/argon.js?v=1.0.0')}}"></script>

</body>
</html>
