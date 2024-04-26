<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/flone/flone/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Dec 2021 08:47:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->                                      {{--- asset(): Point to the public folder ---}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href= "{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/icons.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>

   @php
       $currentRoute= Route::currentRouteName();
       $currentRoute=Str::after($currentRoute, '.')
   @endphp



@include('layouts.header')
@if ($currentRoute !==null  && $currentRoute !=='home')
@include('layouts.breadcrumb')
@endif



{{-- @if ($currentRoute =='home')
@include('layouts.slider')
@include('layouts.suppoer')
@endif --}}

@includeWhen($currentRoute=='home', 'layouts.slider' )
@includeWhen($currentRoute=='home', 'layouts.suppoer')



@yield('content')

@include('layouts.footer')
















<!-- All JS is here
============================================ -->

<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-v3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-v3.3.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>


<!-- Mirrored from template.hasthemes.com/flone/flone/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Dec 2021 08:47:32 GMT -->
</html>
