@inject('users', 'App\User')
@inject('orgs', 'App\Org')
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'OrgManager') }}</title>

    <!-- Styles -->
    <link href="{{ url('/css/landing.css') }}" rel="stylesheet">
    @include('layouts.code.head')
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
        @orgmanagerVertical
        <div class="links">
            <p>@lang('home.description')</p>
            @if (!Auth::check())
                <p>@lang('home.logintext')<a href="{{ url('login') }}">@lang('home.login')</a>.</p>
                <p>Used by {{ $users::count() }} users &amp; {{ $orgs::count() }} orgs, we have
                    delivered {{ $orgs::sum('invitecount') }} invites</p>
            @elseif (Auth::user()->orgs->count() == 0)
                <p>It looks like you haven't got organizations on OrgManager!</p>
                <form action="{{ url('sync') }}" method="POST">
                    {{ csrf_field() }}
                    <p>@lang('empty.sync1')
                            <button type="submit" role="link"
                                    class="btn-link">@lang('empty.sync2')</button> @lang('empty.sync3')
                </form>
                <p>If your app isn't showing here after sync, <a
                            href="https://github.com/settings/connections/applications/10b01d866046f040c9f1">check we've
                        been given access to it</a>.</p>
                <p>@lang('empty.problems') <a href="https://github.com/orgmanager/orgmanager/issues/new?labels=bug"
                                              target="_blank">@lang('empty.issue')</a>.</p>
            @else
                <p>Looks like you have organizations on OrgManager!</p>
                <p>You can manage them on your <a href="{{ url('dashboard') }}">dashboard</a>.</p>
                <p>@lang('empty.problems') <a href="https://github.com/orgmanager/orgmanager/issues/new?labels=bug"
                                              target="_blank">@lang('empty.issue')</a>.</p>
            @endif
            <a class="github-button" href="https://github.com/orgmanager/orgmanager" data-icon="octicon-star"
               data-size="large" data-show-count="true" aria-label="Star orgmanager/orgmanager on GitHub">Star</a>
        </div>
    </div>
</div>
<script src="{{ url('js/landing.js') }}"></script>
<script async defer src="{{ url('https://buttons.github.io/buttons.js') }}"></script>
@if (count($errors) > 0)
    <script>
        sweetAlert("Oops...", "{{ $errors->first() }}", "error");
    </script>
@endif
@if (session('success'))
    <script>
        swal("Good job!", "{{ session('success') }}", "success")
    </script>
@endif
@include('layouts.code.footer')
</body>
</html>
