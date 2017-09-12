<!DOCTYPE html>
<html lang="en-us" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{ url('css/404.min.css') }}">
    @include('layouts.code.head')
</head>
<body>
<canvas id="dotty" width="1920" height="854"></canvas>
<a href="{{ url('/') }}" class="logo-link">
    @orgmanagerIcon
</a>
<div class="content">
    <div class="content-box">
        <div class="big-content">
            <div class="list-square">
                <span class="square"></span>
                <span class="square"></span>
                <span class="square"></span>
            </div>
            <div class="list-line">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <i class="fa fa-search" aria-hidden="true"></i>
            <div class="clear"></div>
        </div>
        <h1>Oops! Error 404 not found.</h1>
        <p>The page you were looking for doesn't exist.</p>
    </div>
</div>
<footer class="light">
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('https://status.miguelpiedrafita.com/components/58c0fca18c48eb4923fc46bf') }}"
               target="_blank">Status Page</a></li>
        <li><a href="{{ url('https://github.com/orgmanager/orgmanager') }}" target="_blank">GitHub</a></li>
    </ul>
</footer>
<script src="{{ url('js/404.min.js') }}"></script>
@include('layouts.code.footer')
</body>
</html>
