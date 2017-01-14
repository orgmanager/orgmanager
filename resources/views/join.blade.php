<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Join {{ $org->name }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
    <link href="{{ url('/css/join.css') }}" rel="stylesheet">
    <link href="{{ url('/css/flatty.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Join {{ $org->name }}
                </div>
                <div class="join">
                  Enter your email adress to join {{ $org->name }}:<br><br>
                    <form id="join" type="POST" href="{{ url('join/'.$org->id) }}">
                      {{ csrf_field() }}
                      <input type="email" name="email" class="email" placeholder="mail@example.com"><br><br>
                      <button type="submit" class="submit-button" name="submit">Join!</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/toastr.min.js') }}"></script>
        {!! Toastr::render() !!}
    </body>
</html>
