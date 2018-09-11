<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/new.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @yield('header')
        @include('layouts.code.head')
    </head>
<body class="bg-grey-lightest font-sans border-t-2 border-brand antialiased @yield('body-classes')">
    <nav class="absolute pin-t pin-x w-full bg-white border-b">
        <div class="px-2 sm:px-0">
            <div class="my-4 mx-auto" style="height:28px;">
                <div class="flex border-b bg-white">
                    <a class="no-underline w-1/4 flex items-center ml-4 mb-4 -mt-1" href="{{ route('landing') }}">
                        <svg class="h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 344.5 83.2">
                            <path fill="#0FAEC9" d="M45.3 1.6a5.4 5.4 0 0 0-7.6 0L1.6 37.7a5.4 5.4 0 0 0 0 7.6l36.3 36.3a5.4 5.4 0 0 0 7.6 0l36.1-36.1a5.4 5.4 0 0 0 0-7.6L45.3 1.6zm22.3 48.7l-8.7-8.7 2.2-2.2-6.5-6.5-8.7 8.7 6.5 6.5 2.2-2.2 8.7 8.7-8.7 8.7-8.7-8.7 2.2-2.2-6.5-6.5-8.7 8.7 6.5 6.5 2.2-2.2 8.7 8.7-8.7 8.7-8.7-8.7 2.2-2.2-10.9-10.8 13-13-6.5-6.5-2.2 2.2-8.7-8.7 8.7-8.7 8.7 8.7-2.2 2.2 6.5 6.5 13-13 10.8 10.8 2.2-2.2 8.7 8.7-8.6 8.7z"/>
                            <path fill="#404040" d="M110.3 29.2c-6.8 0-11.1 4.8-11.1 12.7 0 8 4.3 12.7 11.1 12.7s11.1-4.7 11.1-12.7c0-7.9-4.3-12.7-11.1-12.7zm0 19.4c-3 0-5-2.5-5-6.7s1.9-6.8 5-6.8 5 2.6 5 6.8-1.9 6.7-5 6.7zM131.2 31.9v-2.1H125V54h6.2V40.5c0-4.2 2-5.2 4.2-5.2 1.9 0 3.3.6 4.4 1.4l.9-5.6a7.6 7.6 0 0 0-4.9-1.8c-2.5-.1-3.9 1.1-4.6 2.6zM155.8 31a7.3 7.3 0 0 0-5.2-1.8c-5.9 0-10.1 4.8-10.1 12.7 0 8.4 4.2 12.7 10 12.7 1.9 0 3.7-.4 5.2-1.8v.7c0 3.5-2.1 4.5-8.7 5l3.4 5.1c9.2-.7 11.4-4.4 11.4-12.8v-21h-6.2V31zm0 15.7c-.9 1.3-2.2 1.9-4.2 1.9-3.3 0-4.8-2.8-4.8-6.8 0-4.4 1.8-6.7 4.8-6.7a5 5 0 0 1 4.2 2v9.6zM192.3 29.2c-3 0-5.7 1-7.4 3.4-1.1-2.2-3.1-3.4-6.2-3.4A6.8 6.8 0 0 0 173 32v-2.2h-6.2V54h6.2V40.7c0-3.9 1.4-5.6 4.2-5.6 2.8 0 3.8 1.7 3.8 5.6V54h6.2V40.7c0-3.9 1.3-5.6 4.2-5.6 2.8 0 3.8 1.7 3.8 5.6V54h6.2V38.8c0-7.3-3.9-9.6-9.1-9.6zM215.8 29.2c-4.2 0-7.6 1.3-9.9 2.8l1.9 5c2.3-1.6 4.6-2.4 7.5-2.4 2.8 0 4.4 1.2 4.4 3.8v1.2c-1.5-.7-3.2-1.1-5.5-1.1-4.8 0-9.6 2.4-9.6 8 0 5.3 3.9 8 8.9 8 3.2 0 5.1-1.2 6.3-2.3V54h6.1V38.5c-.2-8.2-5.7-9.3-10.1-9.3zm3.8 18a7.2 7.2 0 0 1-5.1 2c-2.7 0-4.1-1-4.1-2.6 0-2 2.1-2.8 4.6-2.8 1.7 0 3.2.3 4.5.8v2.6zM242.6 29.2a8 8 0 0 0-6.5 2.8v-2.3H230V54h6.2V40.6c0-3.8 1.6-5.5 4.6-5.5 2.8 0 4.2 1.7 4.2 5.6V54h6.2V38.7c-.1-7.2-4.4-9.5-8.6-9.5zM265.6 29.2c-4.2 0-7.6 1.3-9.9 2.8l1.9 5c2.3-1.6 4.6-2.4 7.5-2.4 2.8 0 4.4 1.2 4.4 3.8v1.2c-1.5-.7-3.2-1.1-5.5-1.1-4.8 0-9.6 2.4-9.6 8 0 5.3 3.9 8 8.9 8 3.2 0 5.1-1.2 6.3-2.3V54h6.1V38.5c-.2-8.2-5.8-9.3-10.1-9.3zm3.8 18a7.2 7.2 0 0 1-5.1 2c-2.7 0-4.1-1-4.1-2.6 0-2 2.1-2.8 4.6-2.8 1.7 0 3.2.3 4.5.8v2.6zM293.8 31a7.3 7.3 0 0 0-5.2-1.8c-5.9 0-10.1 4.8-10.1 12.7 0 8.4 4.2 12.7 10 12.7 1.9 0 3.7-.4 5.2-1.8v.7c0 3.5-2.1 4.5-8.7 5l3.4 5.1c9.2-.7 11.4-4.4 11.4-12.8v-21h-6.2V31zm0 15.7c-.9 1.3-2.2 1.9-4.2 1.9-3.3 0-4.8-2.8-4.8-6.8 0-4.4 1.8-6.7 4.8-6.7a5 5 0 0 1 4.2 2v9.6zM314.8 29.2c-6.9 0-11.3 4.8-11.3 12.7 0 8 4.3 12.7 11.3 12.7 4 0 7-1.6 9-4.1l-3.8-3.8a6 6 0 0 1-5.2 2.5c-2.7 0-5-1.8-5.3-4.9h15.8c.2-1.3.2-2.7.2-3.7.1-7.8-4.7-11.4-10.7-11.4zm-5.2 9.9c.4-3 2.3-4.5 5.2-4.5 2.5 0 4.3 1.6 4.7 4.5h-9.9zM339.6 29.2c-2.4 0-3.8 1.2-4.5 2.7v-2.1h-6.2V54h6.2V40.5c0-4.2 2-5.2 4.2-5.2 1.9 0 3.3.6 4.4 1.4l.9-5.6a7.6 7.6 0 0 0-5-1.9z"/>
                        </svg>
                    </a>
                    <div class="w-1/2 flex justify-center">
                        <a href="{{ route('dashboard') }}" class="no-underline text-inherit mt-1 border-b-2 {{ Route::is('dashboard') ? 'border-brand hover:border-purple':'border-transparent hover:border-purple' }}">Dashboard</a>
                    </div>
                    <div class="w-1/4 text-right flex justify-center">
                        <a href="{{ route('logout') }}" class="no-underline mt-1 flex justify-center text-grey" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg class="h-4 w-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M266.264 330.704c-6.256 6.248-6.256 16.376 0 22.624 3.128 3.128 7.216 4.688 11.312 4.688s8.184-1.56 11.312-4.688l94.504-97-94.504-97.008c-6.248-6.248-16.376-6.248-22.624 0-6.256 6.248-6.256 16.376 0 22.624l57.872 57.88H15.92c-8.84 0-16 7.168-16 16s7.16 16 16 16h309.224l-58.88 58.88zM480.08 0h-288c-17.68 0-32.008 14.328-32.008 32v144h32.216V51.512c0-10.688 8.672-19.36 19.36-19.36H460c10.704 0 19.36 8.672 19.36 19.36l.504 409.144c0 10.688-8.656 19.36-19.36 19.36H211.656c-10.688 0-19.36-8.672-19.36-19.36V335.472l-32.216.04V480c0 17.672 14.328 32 32.008 32h288c17.672 0 32-14.328 32-32V32c-.008-17.672-14.336-32-32.008-32z"/></svg>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen w-full flex flex-col items-center justify-center px-2">
        @yield('content')
    </div>
    <!-- Scripts -->
    @if (count($errors) > 0)
        <script>
            swal("Oops...", "{{ $errors->first() }}", "error");
        </script>
    @endif
    @if (session('success'))
        <script>
            swal("Good job!", "{{ session('success') }}", "success")
        </script>
    @endif
    @yield('footer')
    @include('layouts.code.footer')
</body>
</html>
