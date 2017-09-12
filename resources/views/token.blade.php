@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->name }}'s token</div>
                    <div class="panel-body">
                        <div id="token" class="text-center">
                            <h4>{{ Auth::user()->name }}'s token:</h4>
                            <input id="token" class="form-control text-center" type="text" disabled="disabled"
                                   value="{{ Auth::user()->api_token }}">
                            <span id="helpBlock" class="help-block">You should never share this. Treat it like a password. With it, anyone can change the organization password, delete organizations from Orgmanager and invite users without knowing the password.</span>
                        </div>
                        <br>
                        <div class="flash flash-error text-center">
                            <h4>Danger zone:</h4> You should only use this option if your token security has been
                            compromised. This will regenerate your token, and will cause all the applications using it
                            to stop working.
                        </div>
                        <br>
                        <div class="center-block text-center">
                            <form id="regenerate-token" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger text-center centered" type="submit">Regenerate token
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
