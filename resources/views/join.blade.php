<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('join.join') {{ $org->name }}</title>
    <!-- Styles -->
    <link href="{{ url('/css/join.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css" rel="stylesheet">
    @include('layouts.code.head')
    <script>
        function submitForm(token) {
            document.getElementById("join-form").submit();
        }

        function validate(event) {
            event.preventDefault();
            @if ($org->password != null && trim($org->password) != "")
            if (!document.getElementById('org_password').value) {
                sweetAlert("Oops...", "You need to enter the organization password.", "error");
            } else {
                grecaptcha.execute();
            }
            @else
            grecaptcha.execute();
            @endif
        }

        function onload() {
            var element = document.getElementById('btnSubmit');
            element.onclick = validate;
        }
    </script>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            <img src="{{ $org->avatar }}" class="logo"><br>
            @lang('join.join') <a href="{{ "https://github.com/$org->name" }}"
                                  target="_blank">{{ $org->pretty_name or $org->name }}</a>
            @if (isset($org->team))
                @if($org->team->privacy == 'closed')
                    <h6>You'll also join the <a
                                href="{{ url('https://github.com/orgs/'.$org->name.'/teams/'.str_slug($org->team->name)) }}"
                                target="_blank">{{ $org->team->name }}</a> team</h6>
                @else
                    <h6>You'll also join the private "{{ $org->team->name }}" team</h6>
                @endif
            @endif
            @if ($org->description)
                <blockquote>{{ $org->description }}</blockquote>
            @endif
        </div>
        <div class="join">
            @if ($org->password != null && trim($org->password) != "")
                <p>@lang('join.passwd') {{ $org->name }}:</p>
            @else
                <p>@lang('join.nopasswd') {{ $org->name }}</p><br>
            @endif
            <form id="join-form" method="POST" href="{{ url('join/'.$org->id) }}">
                {{ csrf_field() }}
                @if ($org->password != null && trim($org->password) != "")
                    <input type="password" name="org_password" id="org_password" class="textbox"
                           placeholder="@lang('join.pplace')"><br><br>
                @endif
                <div id='recaptcha' class="g-recaptcha" data-sitekey="{{ config('recaptcha.key') }}"
                     data-callback="submitForm" data-size="invisible"></div>
                <button class="btn btn-social btn-github" type="submit" id="btnSubmit"><i
                            class="octicon octicon-mark-github"></i> @lang('join.button')!
                </button>
            </form>
        </div>
    </div>
</div>
<script src="{{ url('js/landing.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script>onload();</script>
@if (count($errors) > 0)
    <script>
        sweetAlert("Oops...", "{{ $errors->first() }}", "error");
    </script>
@endif
@if (session('success'))
    <script>
        swal({title: "Good job!", text: '{!! session('success') !!}', type: "success", html: true})
    </script>
@endif
@include('layouts.code.footer')
</body>
</html>
