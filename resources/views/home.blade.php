<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'OrgManager') }}</title>

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
                    {{ config('app.name', 'OrgManager') }}
                </div>

                <div class="links">
                    <p>OrgManager allows Github Organizations to share invite links</p>
                    <a href="https://github.com/m1guelpf/orgmanager">GitHub</a>
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
