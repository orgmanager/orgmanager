<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/new.css') }}">
    @include('layouts.code.head')
</head>
<body class="border-t-2 border-brand bg-grey-lightest">
    <div class="min-w-full min-h-screen flex items-center justify-center w-full px-2">
        <div class="flex min-h-screen flex-col justify-center items-center text-center w-full">
        <div class="flex-1 w-full mt-12 ">
            <svg class="sm:w-104 sm:h-24 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 344.5 83.2">
                <path fill="#0FAEC9" d="M45.3 1.6c-2-2-5.5-2-7.6 0l-36 36c-2.2 2.2-2.2 5.6 0 7.7l36.2 36.3c2 2 5.4 2 7.5 0l36-36c2.2-2.2 2.2-5.6 0-7.7L45.4 1.5zm22.3 48.7L59 41.6l2-2.2-6.4-6.5-8.7 8.6 6.4 6.5 2.2-2 8.7 8.6-8.7 8.7-8.7-8.7 2-2.2-6.4-6.5-8.7 8.6 6.4 6.5 2.2-2 8.7 8.6-8.7 8.7-8.7-8.7 2-2.2-10.8-10.8 13-13-6.5-6.5-2.2 2.3-8.7-8.7 8.7-8.7 8.7 8.6-2.2 2.2 6.5 6.5 13-13L65.3 35l2.2-2 8.7 8.6-8.6 8.7z"/>
                <path fill="#404040" d="M110.3 29.2c-6.8 0-11 4.8-11 12.7 0 8 4.2 12.6 11 12.6s11-4.7 11-12.7c0-8-4.2-12.8-11-12.8zm0 19.4c-3 0-5-2.5-5-6.7s2-7 5-7 5 2.7 5 7-2 6.6-5 6.6zM131.2 32v-2.2H125V54h6.2V40.5c0-4.2 2-5.2 4.2-5.2 2 0 3.3.6 4.4 1.4l1-5.6c-1.5-1-3-1.7-5-1.7-2.5 0-4 1-4.6 2.6zM155.8 31c-1.3-1.2-3-1.8-5.2-1.8-6 0-10 4.8-10 12.7 0 8.3 4 12.6 10 12.6 1.8 0 3.6-.4 5-1.8v.7c0 3.5-2 4.5-8.6 5l3.4 5c9.2-.6 11.4-4.3 11.4-12.7v-21h-6.2V31zm0 15.7c-1 1.3-2.2 2-4.2 2-3.3 0-4.8-3-4.8-7 0-4.3 1.8-6.6 4.8-6.6 2.3 0 3.5 1.2 4.2 2v9.7zM192.3 29.2c-3 0-5.7 1-7.4 3.4-1.2-2.2-3.2-3.4-6.3-3.4-2.6 0-4.4 1-5.7 2.8v-2.2h-6.2V54h6.2V40.7c0-4 1.4-5.6 4.2-5.6 2.8 0 3.8 1.8 3.8 5.7V54h6.2V40.7c0-4 1.3-5.6 4.2-5.6 2.8 0 3.8 1.8 3.8 5.7V54h6.2V38.8c0-7.3-4-9.6-9-9.6zM215.8 29.2c-4.2 0-7.6 1.3-10 2.8l2 5c2.3-1.6 4.6-2.4 7.5-2.4 2.8 0 4.4 1.2 4.4 3.8v1.2c-1.5-.7-3.2-1-5.5-1-4.8 0-9.6 2.3-9.6 8 0 5.2 4 8 9 8 3 0 5-1.3 6.2-2.4V54h6V38.5c0-8.2-5.6-9.3-10-9.3zm3.8 18c-1.2 1-2.8 2-5 2-2.8 0-4.2-1-4.2-2.6 0-2 2-2.8 4.6-2.8 1.7 0 3.2.3 4.5.8v2.6zM242.6 29.2c-2.8 0-5 1-6.5 2.8v-2.3h-6V54h6.2V40.6c0-3.8 1.6-5.5 4.6-5.5 2.8 0 4.2 1.8 4.2 5.7V54h6.2V38.7c0-7.2-4.4-9.5-8.6-9.5zM265.6 29.2c-4.2 0-7.6 1.3-10 2.8l2 5c2.3-1.6 4.6-2.4 7.5-2.4 3 0 4.5 1.2 4.5 3.8v1.2c-1.5-.7-3.2-1-5.5-1-4.8 0-9.6 2.3-9.6 8 0 5.2 4 8 9 8 3 0 5-1.3 6.2-2.4V54h6V38.5c0-8.2-5.7-9.3-10-9.3zm3.8 18c-1.2 1-2.8 2-5 2-2.8 0-4.2-1-4.2-2.6 0-2 2-2.8 4.6-2.8 1.7 0 3.2.3 4.5.8v2.6zM293.8 31c-1.3-1.2-3-1.8-5.2-1.8-6 0-10 4.8-10 12.7 0 8.3 4 12.6 10 12.6 1.8 0 3.6-.4 5-1.8v.7c0 3.5-2 4.5-8.6 5l3.4 5c9.2-.6 11.4-4.3 11.4-12.7v-21h-6.2V31zm0 15.7c-1 1.3-2.2 2-4.2 2-3.3 0-4.8-3-4.8-7 0-4.3 1.8-6.6 4.8-6.6 2.3 0 3.5 1.2 4.2 2v9.7zM314.8 29.2c-7 0-11.3 4.8-11.3 12.7 0 8 4.3 12.6 11.3 12.6 4 0 7-1.6 9-4l-3.8-4c-1.4 2-3 2.6-5.2 2.6-2.7 0-5-1.8-5.3-5h15.8c.2-1.2.2-2.6.2-3.6 0-7.8-4.7-11.4-10.7-11.4zm-5.2 10c.4-3 2.3-4.6 5.2-4.6 2.5 0 4.3 1.6 4.7 4.5h-10zM339.6 29.2c-2.4 0-3.8 1.2-4.5 2.7v-2.2h-6V54h6V40.5c0-4.2 2-5.2 4.3-5.2 2 0 3.3.6 4.4 1.4l1-5.6c-1.6-1-3-1.8-5-1.8z"/>
            </svg>
            <p class="text-black-light font-sans leading-loose text-xl mb-8">{{ config('app.name') }} allows Github Organizations to share invite links for free!</p>
            <div class="flex items-center justify-around">
                    <a href="{{ route('login') }}" class="flex items-center text-center no-underline bg-brand border-2 border-brand hover:bg-white text-white hover:text-brand font-bold px-6 py-2 self-stretch rounded-full">
                        Try it out!
                    </a>
                    <a href="https://github.com/orgmanager/orgmanager" target="_blank" rel="noopener noreferrer" class="no-underline bg-black-light border-2 border-black-light hover:bg-white text-white hover:text-black-light font-bold py-2 px-6 self-stretch rounded-full">
                        <div class="flex items-center items-stretch">
                            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path d="M12 .3C5.4.3 0 5.7 0 12.3c0 5.3 3.4 9.8 8.2 11.4.6 0 .8-.3.8-.6v-2c-3.3.8-4-1.5-4-1.5-.6-1.4-1.4-1.8-1.4-1.8-1-.7 0-.7 0-.7 1.3 0 2 1.2 2 1.2 1 1.8 2.8 1.3 3.5 1 .2-.8.5-1.3.8-1.6-2.7-.3-5.5-1.3-5.5-6 0-1.2.5-2.3 1.3-3-.2-.5-.6-1.7 0-3.3 0 0 1-.3 3.4 1.2 1-.3 2-.4 3-.4s2 .2 3 .5c2.3-1.5 3.3-1.2 3.3-1.2.6 1.6.2 2.8 0 3.2 1 .8 1.3 2 1.3 3.2 0 4.6-2.8 5.6-5.5 6 .6.3 1 1 1 2v3.4c0 .4 0 .8.8.7 4.8-1.6 8.2-6 8.2-11.4 0-6.6-5.4-12-12-12"/>
                            </svg>
                            <p class="inline-flex items-center">GitHub</p>
                        </div>
                    </a>
            </div>
            <div class="mt-8 flex items-center justify-around">
                <div class="w-32 border-b border-black-dark"></div>
                <p class="text-black-darker text-base leading-loose">Lastest Release: v2.0 (Feb 19, 2017)</p>
                <div class="w-32 border-b border-black-dark"></div>
            </div>
            <div class="mt-8 flex items-center justify-around text-center mb-8 md:mb-0">
                <div>
                    <div class="rounded-full m-2">
                        <svg class="w-6 h-6 text-center text-grey-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z"/></svg>
                    </div>
                    <p class="text-grey-dark">Multi-user support</p>
                </div>
                <div>
                    <div class="rounded-full m-2">
                        <svg class="w-6 h-6 text-center text-grey-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"/></svg>
                    </div>
                    <p class="text-grey-dark">Share invite links</p>
                </div>
                <div>
                    <div class="rounded-full m-2">
                        <svg class="w-6 h-6 text-center text-grey-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3.94 6.5L2.22 3.64l1.42-1.42L6.5 3.94c.52-.3 1.1-.54 1.7-.7L9 0h2l.8 3.24c.6.16 1.18.4 1.7.7l2.86-1.72 1.42 1.42-1.72 2.86c.3.52.54 1.1.7 1.7L20 9v2l-3.24.8c-.16.6-.4 1.18-.7 1.7l1.72 2.86-1.42 1.42-2.86-1.72c-.52.3-1.1.54-1.7.7L11 20H9l-.8-3.24c-.6-.16-1.18-.4-1.7-.7l-2.86 1.72-1.42-1.42 1.72-2.86c-.3-.52-.54-1.1-.7-1.7L0 11V9l3.24-.8c.16-.6.4-1.18.7-1.7zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                    </div>
                    <p class="text-grey-dark">Control your team!</p>
                </div>
            </div>
        </div>
        <footer class="w-full bg-white border-t border-dark-light h-24 flex items-center justify-around">
            <div>
                <p class="text-black-darker">Used by <span class="text-grey-darkest">{{ \App\User::count() }} users &amp; {{ \App\Org::count() }} orgs</span>, we have delivered <span class="text-grey-darkest">{{ \App\Org::sum('invitecount') }}</span> invites</p>
            </div>
            <div>
                <a class="hidden sm:block text-black-light no-underline" href="https://github.com/orgmanager/orgmanager" target="_blank" rel="noopener noreferrer">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 .3C5.4.3 0 5.7 0 12.3c0 5.3 3.4 9.8 8.2 11.4.6 0 .8-.3.8-.6v-2c-3.3.8-4-1.5-4-1.5-.6-1.4-1.4-1.8-1.4-1.8-1-.7 0-.7 0-.7 1.3 0 2 1.2 2 1.2 1 1.8 2.8 1.3 3.5 1 .2-.8.5-1.3.8-1.6-2.7-.3-5.5-1.3-5.5-6 0-1.2.5-2.3 1.3-3-.2-.5-.6-1.7 0-3.3 0 0 1-.3 3.4 1.2 1-.3 2-.4 3-.4s2 .2 3 .5c2.3-1.5 3.3-1.2 3.3-1.2.6 1.6.2 2.8 0 3.2 1 .8 1.3 2 1.3 3.2 0 4.6-2.8 5.6-5.5 6 .6.3 1 1 1 2v3.4c0 .4 0 .8.8.7 4.8-1.6 8.2-6 8.2-11.4 0-6.6-5.4-12-12-12"/>
                    </svg>
                </a>
            </div>
        </footer>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    @include('layouts.code.footer')

    @if (count($errors) > 0)
        <script>swal("Oops...", "{{ $errors->first() }}", "error")</script>
    @endif
    @if (session('success'))
        <script>swal("Good job!", "{{ session('success') }}", "success")</script>
    @endif
</body>
</html>
