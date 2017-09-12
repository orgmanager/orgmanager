@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Developer zone</div>
                    <div class="panel-body text-center">
                        <p>Want to integrate your application with Orgmanager? Now you can!</p>
                        <p>Introducing the Orgmanager API, that allows you to retrieve details about organizations, your
                            orgmanager installation or even invite users!</p>
                        @if (Auth::check())
                            <p>To start, <a href="{{ url('token') }}">grab your API token</a>.</p>
                        @else
                            <p>You need a Orgmanager account, so <a href="{{ url('login') }}">register</a> or <a
                                        href="{{ url('login') }}">login</a> and come back!</p>
                        @endif
                        <p>Also, you may want to <a href="{{ url('http://docs.orgmanager.miguelpiedrafita.com') }}"
                                                    target="_blank">access the API documentation</a>!</p>
                        <p>Good luck!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
