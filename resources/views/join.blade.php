<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Join {{ $org->pretty_name or $org->name }}</title>

    <link href="{{ mix('css/new.css') }}" rel="stylesheet">

    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script>
       function onSubmit(token) {
         document.getElementById("join-form").submit();
       }
    </script>

    @include('layouts.code.head')
</head>

<body class="bg-grey-lightest bg-pattern border-t-2 border-teal overflow-hidden">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white transition">
            <div class="px-6 py-4 text-center">
                <div class="text-center">
                    <img src="{{ $org->avatar }}" class="w-24 h-24 rounded-full mb-4">
                </div>

                <h1 class="font-bold text-2xl mb-2 text-center text-grey-darkest">Join <a class="no-underline text-inherit link-shadow link-transition" href="https://github.com/{{ $org->name }}" target="_blank" rel="noopener noreferrer">{{ $org->pretty_name or $org->name }}</a></h1>

                @if (optional($org->team)->exists)
                    @if ($org->team->privacy == 'closed')
                        <h1 class="text-sm mb-4 text-center text-grey-darker font-medium">You will also join the <a href="https://github.com/orgs/{{ $org->name }}/teams/{{ str_slug($org->team->name) }}" target="_blank" rel="noopener noreferrer" class="no-underline text-inherit link-shadow link-transition">{{ $org->team->name }}</a> team</h1>
                    @else
                        <h1 class="text-sm mb-4 text-center text-grey-darker font-medium">You will also join the private {{ $org->team->name }} team</h1>
                    @endif
                @endif

                @if ($org->description)
                    <p class="text-grey-darker text-base">{{ $org->description or '' }}</p>
                @endif
            </div>
            <div class="border-b mb-4"></div>
            <form id="join-form" method="POST" href="{{ route('join.post', $org) }}">
                {{ csrf_field() }}
                @if ($org->hasPassword())
                    <div class="px-6 pb-4">
                        <p class="text-grey-darker text-base mb-2">Enter the organization password to join {{ $org->pretty_name or $org->name }}:</p>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="org_password" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    </div>
                @endif
                <div class="text-center mb-4">
                    <button type="submit" data-sitekey="{{ config('recaptcha.key') }}" class="bg-grey-darkest hover:bg-black-github text-white font-bold py-2 px-4 rounded g-recaptcha" data-callback="onSubmit">
                    <div class="flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 .3C5.4.3 0 5.7 0 12.3c0 5.3 3.4 9.8 8.2 11.4.6 0 .8-.3.8-.6v-2c-3.3.8-4-1.5-4-1.5-.6-1.4-1.4-1.8-1.4-1.8-1-.7 0-.7 0-.7 1.3 0 2 1.2 2 1.2 1 1.8 2.8 1.3 3.5 1 .2-.8.5-1.3.8-1.6-2.7-.3-5.5-1.3-5.5-6 0-1.2.5-2.3 1.3-3-.2-.5-.6-1.7 0-3.3 0 0 1-.3 3.4 1.2 1-.3 2-.4 3-.4s2 .2 3 .5c2.3-1.5 3.3-1.2 3.3-1.2.6 1.6.2 2.8 0 3.2 1 .8 1.3 2 1.3 3.2 0 4.6-2.8 5.6-5.5 6 .6.3 1 1 1 2v3.4c0 .4 0 .8.8.7 4.8-1.6 8.2-6 8.2-11.4 0-6.6-5.4-12-12-12"></path>
                        </svg>
                        <span>Join with GitHub</span>
                    </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ mix('js/landing.js') }}"></script>
    @if (count($errors) > 0)
        <script>
            swal("Oops...", "{{ $errors->first() }}", "error");
        </script>
    @endif
    @if (session('success'))
        <script>
            swal({title: "Good job!", html: '{!! session('success') !!}', type: "success"})
        </script>
    @endif

    @include('layouts.code.footer')
</body>

</html>