<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="SHORTCUT ICON" href="{{ asset('img/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/fontawesome-all.min.css') }}">
</head>
<body>
<div class="body">
    <div class="col-xs-12" style="margin-bottom: 15px;">@include('Frontend.Main.Head')</div>
    <div class="col-xs-3">@include('Frontend.Main.Sidebar')</div>
    <div class="col-xs-9">@yield('content')</div>
    <div class="col-xs-12">@include('Frontend.Main.Foot')</div>
</div>
<script type="text/javascript" src="{{ asset('bootstrap/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@yield('script')
</body>
</html>
