@extends('layouts.new')

@if (count($orgs) > 5)
    @section('body-classes', 'overflow-y-scroll')
@endif

@section('content')
    <div>
        <div class="w-screen flex items-center justify-around mb-8">
            <div class="">
                    <p class="text-black-light text-2xl">Your organizations</p>
            </div>
            <form action="{{ route('sync') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="bg-grey hover:bg-grey-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                    <div class="inline-block">
                        <div class="flex items-center justify-center">
                            <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M14.7 15.7A8 8 0 1 1 17 10h-2a6 6 0 1 0-1.8 4.2l1.5 1.5zM12 10h8l-4 4-4-4z"/>
                            </svg>
                            <span>Sync your organizations</span>
                        </div>
                    </div>
                </button>
            </form>
        </div>
        <div>
            <table class="flex items-center justify-center" style="border-spacing: 1rem">
                <tbody>
                    @foreach ($orgs as $org)
                    <tr class="bg-white rounded flex justify-around mb-4">
                        <td class="flex items-center text-center">
                            <img src="{{ $org->avatar }}" alt="{{ $org->name }}" class="w-10 h-10">
                        </td>
                        <td class="flex items-center text-center">
                            <p class="text-base text-black-light w-64">{{ $org->pretty_name or $org->name }}</p>
                        </td>
                        <td class="flex items-center justify-center">
                            <p class="text-base text-grey mr-3">Invite Link</p>
                            <a class="text-base text-brand-darker mr-6" href="{{ route('join', $org) }}" target="_blank" rel="noopener noreferrer">{{ route('join', $org) }}</a>
                            <a href="{{ route('org', $org) }}" class="no-underline bg-brand hover:bg-brand-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                                <div class="inline-block">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M4 6.5L2.1 3.6l1.4-1.4L6.5 4a7 7 0 0 1 1.7-.7L9 0h2l.8 3.2a7 7 0 0 1 1.7.7l2.9-1.7 1.4 1.4L16 6.5l.7 1.7L20 9v2l-3.2.8a7 7 0 0 1-.7 1.7l1.7 2.9-1.4 1.4-2.9-1.7a7 7 0 0 1-1.7.7L11 20H9l-.8-3.2a7 7 0 0 1-1.7-.7l-2.9 1.7-1.4-1.4L4 13.5a7 7 0 0 1-.7-1.7L0 11V9l3.2-.8A7 7 0 0 1 4 6.5zm6 6.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <!-- <div class="">
                    <div class="">
                    </div>
                    <div class="flex items-center justify-center">
                    </div>
                </div> -->
        </div>
        <div class="flex items-center justify-center mt-8">
            <div class="bg-blue-lightest border-t-4 border-brand rounded-b text-teal-darkest px-4 py-3 shadow-md w-1/2" role="alert">
                <div class="flex items-center">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                    <p class="font-bold">Don't see the organization you need?</p>
                    <p class="text-sm mt-1">Double check <a href="https://github.com/settings/connections/applications/{{ config('services.github.client_id') }}" class="no-underline text-inherit link-shadow link-transition" target="_blank" rel="noopener noreferrer">we have been given access to it</a> and then sync again.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="fixed pin-x pin-b mb-2 w-screen text-center">
        <p class="text-grey-dark">TIP: Don't see the organization you want? Double check we have access to it and then sync again</p>
    </div> -->
@endsection
