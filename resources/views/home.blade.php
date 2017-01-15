<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ url('/css/home.css') }}" rel="stylesheet">
        <link href="{{ url('/css/flatty.min.css') }}" rel="stylesheet">
        <link href="{{ url('/css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <div class="using-github">
                  Using <span class="octicon octicon-logo-github"></span>
                </div>
            </div>
        </div>
      <script src="{{ url('js/jquery.min.js') }}"></script>
      <script src="{{ url('js/toastr.min.js') }}"></script>
      {!! Toastr::render() !!}
    </body>
</html>
