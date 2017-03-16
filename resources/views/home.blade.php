@inject('users', 'App\User')
@inject('orgs', 'App\Org')
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
        <link href="{{ url('/css/sweetalert.css') }}" rel="stylesheet">
        @include('layouts.code')
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
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  	 viewBox="0 0 258 182.7" enable-background="new 0 0 258 182.7" xml:space="preserve">
  <g>
  	<g>
  		<path fill="#404040" d="M11.7,146.7C4.5,146.7,0,151.8,0,160c0,8.4,4.5,13.3,11.7,13.3c7.2,0,11.7-4.9,11.7-13.3
  			C23.4,151.8,18.9,146.7,11.7,146.7z M11.7,167.1c-3.2,0-5.2-2.6-5.2-7.1c0-4.4,2-7.1,5.2-7.1c3.3,0,5.2,2.7,5.2,7.1
  			C17,164.5,15,167.1,11.7,167.1z"/>
  		<path fill="#404040" d="M33.7,149.5v-2.2h-6.5v25.5h6.5v-14.2c0-4.4,2.1-5.5,4.4-5.5c2,0,3.4,0.6,4.6,1.5l0.9-5.9
  			c-1.4-1.2-3-1.9-5.2-1.9C35.9,146.7,34.4,147.9,33.7,149.5z"/>
  		<path fill="#404040" d="M59.6,148.6c-1.3-1.3-3.1-1.9-5.4-1.9c-6.2,0-10.6,5.1-10.6,13.3c0,8.9,4.4,13.4,10.5,13.4
  			c2,0,3.9-0.4,5.5-1.9v0.7c0,3.7-2.2,4.7-9.1,5.2l3.6,5.4c9.6-0.7,12-4.6,12-13.4v-22h-6.5V148.6z M59.6,165.1c-1,1.3-2.3,2-4.4,2
  			c-3.4,0-5.1-2.9-5.1-7.1c0-4.6,1.8-7.1,5.1-7.1c2.4,0,3.6,1.1,4.4,2.1V165.1z"/>
  		<path fill="#404040" d="M98,146.7c-3.2,0-6,1-7.8,3.6c-1.2-2.3-3.3-3.6-6.5-3.6c-2.7,0-4.6,1.1-6,2.9v-2.3h-6.5v25.5h6.5v-14
  			c0-4.1,1.4-5.9,4.4-5.9c2.9,0,4,1.7,4,5.9v13.9h6.5v-14c0-4.1,1.4-5.9,4.4-5.9c2.9,0,4,1.7,4,5.9v13.9h6.5v-16
  			C107.5,149.1,103.4,146.7,98,146.7z"/>
  		<path fill="#404040" d="M122.7,146.7c-4.4,0-8,1.3-10.4,3l2,5.2c2.4-1.6,4.9-2.5,7.9-2.5c2.9,0,4.6,1.2,4.6,4v1.3
  			c-1.5-0.7-3.4-1.2-5.8-1.2c-5,0-10.1,2.5-10.1,8.4c0,5.6,4.1,8.4,9.4,8.4c3.3,0,5.4-1.2,6.6-2.4v1.8h6.4v-16.3
  			C133.1,147.8,127.3,146.7,122.7,146.7z M126.7,165.6c-1.2,1.1-3,2.1-5.3,2.1c-2.8,0-4.3-1.1-4.3-2.7c0-2.1,2.2-2.9,4.9-2.9
  			c1.7,0,3.4,0.3,4.7,0.8V165.6z"/>
  		<path fill="#404040" d="M150.9,146.7c-3,0-5.2,1-6.8,3v-2.4h-6.5v25.5h6.5v-14.1c0-4,1.7-5.8,4.8-5.8c3,0,4.4,1.7,4.4,5.9v14h6.5
  			v-16.1C159.9,149.1,155.3,146.7,150.9,146.7z"/>
  		<path fill="#404040" d="M175,146.7c-4.4,0-8,1.3-10.4,3l2,5.2c2.4-1.6,4.9-2.5,7.9-2.5c2.9,0,4.6,1.2,4.6,4v1.3
  			c-1.5-0.7-3.4-1.2-5.8-1.2c-5,0-10.1,2.5-10.1,8.4c0,5.6,4.1,8.4,9.4,8.4c3.3,0,5.4-1.2,6.6-2.4v1.8h6.4v-16.3
  			C185.4,147.8,179.6,146.7,175,146.7z M179.1,165.6c-1.2,1.1-3,2.1-5.3,2.1c-2.8,0-4.3-1.1-4.3-2.7c0-2.1,2.2-2.9,4.9-2.9
  			c1.7,0,3.4,0.3,4.7,0.8V165.6z"/>
  		<path fill="#404040" d="M204.7,148.6c-1.3-1.3-3.1-1.9-5.4-1.9c-6.2,0-10.6,5.1-10.6,13.3c0,8.9,4.4,13.4,10.5,13.4
  			c2,0,3.9-0.4,5.5-1.9v0.7c0,3.7-2.2,4.7-9.1,5.2l3.6,5.4c9.6-0.7,12-4.6,12-13.4v-22h-6.5V148.6z M204.7,165.1c-1,1.3-2.3,2-4.4,2
  			c-3.4,0-5.1-2.9-5.1-7.1c0-4.6,1.8-7.1,5.1-7.1c2.4,0,3.6,1.1,4.4,2.1V165.1z"/>
  		<path fill="#404040" d="M226.9,146.7c-7.3,0-11.9,5.1-11.9,13.3c0,8.4,4.5,13.4,11.9,13.4c4.2,0,7.3-1.7,9.5-4.3l-4-4
  			c-1.4,1.8-3.1,2.6-5.5,2.6c-2.8,0-5.3-1.8-5.5-5.1h16.6c0.2-1.4,0.2-2.8,0.2-3.8C238.1,150.5,233.1,146.7,226.9,146.7z M221.4,157
  			c0.4-3.2,2.4-4.7,5.5-4.7c2.6,0,4.5,1.7,4.9,4.7H221.4z"/>
  		<path fill="#404040" d="M252.9,146.7c-2.5,0-4,1.2-4.7,2.8v-2.2h-6.5v25.5h6.5v-14.2c0-4.4,2.1-5.5,4.4-5.5c2,0,3.4,0.6,4.6,1.5
  			l0.9-5.9C256.6,147.4,255,146.7,252.9,146.7z"/>
  	</g>
  	<path fill="#0FAEC9" d="M134.3,2.2c-3-3-7.8-3-10.8,0L71.7,54c-3,3-3,7.9,0,10.8l52,52c3,3,7.8,3,10.8,0l51.7-51.7
  		c3-3,3-7.9,0-10.8L134.3,2.2z M166.2,71.9l-12.4-12.4l3.1-3.1l-9.3-9.3l-12.4,12.4l9.3,9.3l3.1-3.1L160,78.1l-12.4,12.4l-12.4-12.4
  		l3.1-3.1l-9.3-9.3l-12.4,12.4l9.3,9.3l3.1-3.1l12.4,12.4L129,109.2l-12.4-12.4l3.1-3.1l-15.5-15.5l18.6-18.6l-9.3-9.3l-3.1,3.1
  		L98,40.9l12.4-12.4l12.4,12.4l-3.1,3.1l9.3,9.3l18.6-18.6l15.5,15.5l3.1-3.1l12.4,12.4L166.2,71.9z"/>
  </g>
  </svg>
                <div class="links">
                    <p>@lang('home.description')</p>
                    @if (!Auth::check())
                    <p>@lang('home.logintext')<a href="{{ url('login') }}">@lang('home.login')</a>.</p>
                    <p>Used by {{ $users::count() }} users &amp; {{ $orgs::count() }} orgs, we have delivered {{ $orgs::sum('invitecount') }} invites</p>
                    @elseif (Auth::user()->orgs->count() == 0)
                    <p>It looks like you haven't got organizations on OrgManager!</p>
                    <p>@lang('empty.sync1') <a href="{{ url('sync') }}">@lang('empty.sync2')</a> @lang('empty.sync3')
                    <p>If your app isn't showing here after sync, <a href="https://github.com/settings/connections/applications/10b01d866046f040c9f1">check we've been given access to it</a>.</p>
                    <p>@lang('empty.problems') <a href="https://github.com/orgmanager/orgmanager/issues/new?labels=bug" target="_blank">@lang('empty.issue')</a>.</p>
                    @else
                    <p>Looks like you have organizations on OrgManager!</p>
                    <p>You can manage them on your <a href="{{ url('dashboard') }}">dashboard</a>.</p>
                    <p>@lang('empty.problems') <a href="https://github.com/orgmanager/orgmanager/issues/new?labels=bug" target="_blank">@lang('empty.issue')</a>.</p>
                    @endif
                    <a class="github-button" href="https://github.com/orgmanager/orgmanager" data-icon="octicon-star" data-style="mega" data-count-href="/orgmanager/orgmanager/stargazers" data-count-api="/repos/orgmanager/orgmanager#stargazers_count" data-count-aria-label="# stargazers on GitHub" aria-label="Star orgmanager/orgmanager on GitHub">Star</a>
                </div>
            </div>
        </div>
      <script src="{{ url('js/jquery.min.js') }}"></script>
      <script src="{{ url('js/sweetalert.min.js') }}"></script>
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
    </body>
</html>
