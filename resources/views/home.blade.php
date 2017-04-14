@inject('users', 'App\User')
@inject('orgs', 'App\Org')
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OrgManager - Invite System for GitHub Organizations</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('styles/main.css') }}">

  </head>
  <body>
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="container">
      <div class="header home">
         <img class="logo" src="/images/logo@2x.png" alt="OrgManager">
         <h2>OrgManager allows Github Organizations to share invite links for free!</h2>

        <p class="btn-header btn-toolbar">
          <a class="btn navbar-btn btn-primary" href="login.html">Try it out!</a>
          <a class="btn navbar-btn btn-default" target="blank" href="https://github.com/orgmanager/orgmanager">
            <img src="images/github.png" alt=""><span>Github</span>
          </a>
        </p>
        <p class="background-line"><span>Latest Release: {{ config('app.orgmanager.version') }} (Feb 19, 2017)</span></p>
      </div>
    </div>
      <script src="{{ url('js/app.js') }}"></script>
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
