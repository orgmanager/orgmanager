@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $org->name }}</div>

                    <div class="panel-body">
                        <h4 class="text-center">{{ $org->name}} settings</h4>
                        <div class="row">
                            <div name="password" class="col-md-4 text-center">
                                <form id="password" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="org_passwd">Organization password</label>
                                        <input type="password" class="form-control" id="org_passwd" name="org_passwd"
                                               placeholder="@if(isset($org->password)) @lang('organizations.haspasswdtext') @else @lang('organizations.passwdtext') @endif">
                                        <br>
                                        <button type="submit"
                                                class="btn btn-primary">@lang('organizations.changepasswd')</button>
                                    </div>
                                </form>
                            </div>
                            <div name="sync" class="col-md-4">
                                <div id="title" class="text-center">Sync organization</div>
                                <div id="body" class="text-center">
                                    <br>
                                    <form id="sync" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-primary"><i
                                                    class="octicon octicon-sync"></i> Sync
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div name="delete" class="col-md-4">
                                <div id="title" class="text-center">Delete organization</div>
                                <div id="body" class="text-center">
                                    <br>
                                    <form id="delete" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-primary"><i
                                                    class="octicon octicon-trashcan"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <p>Want to add users to a team?</p>
                                <form action="{{ url('org/'.$org->id.'/teams') }}" method="GET">
                                    <button type="submit" class="btn btn-primary"><i
                                                class="octicon octicon-organization"></i> Team settings
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-6 text-center">
                                <p>Custom message</p>
                                <form action="{{ url('org/'.$org->id.'/message') }}" method="POST">
                                    {{ csrf_field() }}
                                    <textarea name="message" class="form-control"
                                              required="required">{{ old('message') }}</textarea>
                                    <small><a class="pull-left text-muted"
                                              href="https://guides.github.com/features/mastering-markdown/"
                                              target="_blank"><i class="octicon octicon-markdown"></i>Styling with
                                            Markdown is supported</a></small>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save message</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="flash">
                            <p class="text-center">TIP: Want a pretty URL for your users? Share <a
                                        href="{{ url('o/'.$org->name) }}" target="_blank">{{ url('o/'.$org->name) }}</a>
                                !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
