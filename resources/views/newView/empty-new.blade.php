@extends('layouts.new')

@section('content')
    <div>
        <div class="flex items-center justify-center">
            <svg class="h-16 w-16 text-black-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M507.3 484.5L352 328.1a200 200 0 1 0-22.4 22.8l155.2 156.3a16 16 0 0 0 22.6-22.7zm-309-116.2a168.3 168.3 0 1 1 0-336.6 168.3 168.3 0 0 1 0 336.6z"/>
            </svg>
        </div>
        <div class="mt-15">
            <p class="text-black-light text-2xl m-4 text-center">Looks like there's nothing here</p>
            <p class="text-base text-black-darker mb-2 text-center">Try to  sync the from your Github account, using the sync button below.</p>
            <p class="text-base text-black-darker text-center">If your  organizations aren't showing here after sync, check <a class="no-underline text-inherit link-shadow link-transition" href="https://github.com/settings/connections/applications/{{ config('services.github.client_id') }}" target="_blank" rel="noopener noreferrer">we’ve been given access to them</a>.</p>
        </div>
        <div class="mt-8 text-center">
            <form action="{{ route('sync') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="bg-brand hover:bg-brand-dark text-white font-bold py-4 px-8 rounded-full focus:outline-none">
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
    </div>
@endsection
