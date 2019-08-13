@extends('layouts.new')

@section('skip-nav-border', true)

@section('content')
        <div class="bg-blue border-brand rounded-b text-white px-4 py-3" role="alert">
            <div class="flex items-center">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-white mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Don't see the organization you need?</p>
                    <p class="text-sm mt-1 leading-normal">Double check <a href="https://github.com/settings/connections/applications/{{ config('services.github.client_id') }}" class="text-inherit" target="_blank" rel="noopener noreferrer">we have been given access to it</a> and then sync again.</p>
                </div>
            </div>
        </div>
        <div class="mx-2">
            <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-between my-8 w-full px-2">
                <p class="text-black-light text-2xl mb-4 sm:mb-0">Your organizations</p>
                <form action="{{ route('sync') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="bg-brand hover:bg-brand-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                        <div class="inline-block">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M14.7 15.7A8 8 0 1 1 17 10h-2a6 6 0 1 0-1.8 4.2l1.5 1.5zM12 10h8l-4 4-4-4z"/>
                                </svg>
                                <span>Sync your organizations</span>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
            <div class="w-full flex flex-wrap justify-around">
                @foreach ($orgs as $org)
                    <div class="max-w-sm bg-white rounded flex flex-col items-center justify-around mb-4 shadow p-3">
                        <div class="flex items-center justify-between w-full mb-4">
                            <div class="flex items-center">
                                    <img src="{{ $org->avatar }}" alt="{{ $org->name }}" class="w-10 h-10 rounded-full mr-2">
                                    <p class="text-base text-black-light">{{ $org->pretty_name ?? $org->name }}</p>
                            </div>
                            <a href="{{ route('org', $org) }}" class="no-underline bg-grey hover:bg-grey-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                                <div class="inline-block">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M4 6.5L2.1 3.6l1.4-1.4L6.5 4a7 7 0 0 1 1.7-.7L9 0h2l.8 3.2a7 7 0 0 1 1.7.7l2.9-1.7 1.4 1.4L16 6.5l.7 1.7L20 9v2l-3.2.8a7 7 0 0 1-.7 1.7l1.7 2.9-1.4 1.4-2.9-1.7a7 7 0 0 1-1.7.7L11 20H9l-.8-3.2a7 7 0 0 1-1.7-.7l-2.9 1.7-1.4-1.4L4 13.5a7 7 0 0 1-.7-1.7L0 11V9l3.2-.8A7 7 0 0 1 4 6.5zm6 6.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="flex mb-4">
                            <p class="text-base text-grey mr-1">Invite Link:</p>
                            <a class="text-base text-brand-darker" href="{{ route('join', $org) }}" target="_blank" rel="noopener noreferrer">{{ route('join', $org) }}</a>
                        </div>  
                    </div>
    
            
            
                @endforeach
            </div>
        </div>
    {{-- <div class="fixed pin-x pin-b mb-2 w-screen text-center">
        <p class="text-grey-dark">TIP: Don't see the organization you want? Double check we have access to it and then sync again</p>
    </div> --}}
@endsection
