@extends('layouts.new')

@section('content')
    <div class="w-full h-full mt-8 max-w-2xl mx-auto">
        <div class="flex items-center justify-between w-full mb-4">
            <div class="flex items-center">
                <img src="{{ $org->avatar }}" class="w-10 h-10 rounded-full mr-3">
                <p class="text-2xl">{{ $org->pretty_name ?? $org->name }}'s settings</p>
            </div>
            <div>
                <form action="{{ route('sync.org', $org) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-brand hover:bg-brand-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                        <div class="inline-block">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M14.7 15.7A8 8 0 1 1 17 10h-2a6 6 0 1 0-1.8 4.2l1.5 1.5zM12 10h8l-4 4-4-4z"/>
                                </svg>
                                <span>Sync Organization</span>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xl text-grey-darkest">Organization Password</p>
                <p class="text-sm text-grey-darker">This is some helper text to explain what this thing right below does. It's long & stuff.</p>
            </div>
            <form method="POST" action="{{ route('org.password', $org) }}">
                @csrf
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="hunter2">
                <div class="flex justify-end mt-2">
                    <button type="submit" class="bg-grey hover:bg-grey-dark text-white font-bold py-2 px-3 rounded-full focus:outline-none">
                        <span>Set Password</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 mt-6">
            <div class="mb-4">
                <p class="text-xl text-grey-darkest text-center mb-2">Team settings</p>
                <p class="text-grey-darker max-w-xl mx-auto text-center">OrgManager v3 introduces Teams, a new function that allows you to specify a team your invited users will go into. Please note that this feature is still in a beta version, so use the report widget if you find any bugs.</p>
            </div>
            <form method="POST" action="{{ route('org.teams.sync', $org) }}" class="text-center">
                <button type="submit" class="bg-grey hover:bg-grey-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                    <div class="flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M14.7 15.7A8 8 0 1 1 17 10h-2a6 6 0 1 0-1.8 4.2l1.5 1.5zM12 10h8l-4 4-4-4z"/>
                        </svg>
                        <span>Sync Teams</span>
                    </div>
                </button>
            </form>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 mt-6">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xl text-grey-darkest">Remove Organization</p>
                <p class="text-sm text-grey-darker">This is some helper text to explain what this thing right below does. It's long & stuff.</p>
            </div>

            <form method="POST" action="{{ route('org.delete', $org) }}" class="text-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red hover:bg-red-dark text-white font-bold py-3 px-4 rounded-full focus:outline-none">
                    <div class="flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        <span>Delete Organization</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
    {{-- <div class="container">
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
                                              target="_blank" rel="noopener noreferrer"><i class="octicon octicon-markdown"></i>Styling with
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
                                        href="{{ url('o/'.$org->name) }}" target="_blank" rel="noopener noreferrer">{{ url('o/'.$org->name) }}</a>
                                !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
