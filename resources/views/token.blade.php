@extends('layouts.new')

@section('content')
    <div>
        <div class="max-w-lg rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-center">Your token</div>
                    <p class="text-grey-darker text-base leading-tight mb-2">You'll find your token below. Remember to treat it like a password, as it gives anyone the ability to invite anyone to your organization. You can use the button below to reset it if you need to.</p>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 text-center" id="token" value="{{ Auth::user()->api_token }}" readonly>
                </div>
                <div class="px-6 py-4 text-center">
                    <form id="regenerate-token" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="bg-red hover:bg-red-dark text-white font-bold py-2 px-4 rounded focus:outline-none">Reset token</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
