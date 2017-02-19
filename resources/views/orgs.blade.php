@extends('layouts.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ url('css/materialize.min.css') }}"  media="screen,projection"/>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('organizations.heading')</div>
                <div class="panel-body">
                      <table id="paths" class="highlight centered responsive-table">
                        <thead>
                            <tr>
                              <th data-field="icon"></th>
                              <th data-field="id">@lang('organizations.name')</th>
                              <th data-field="id">@lang('organizations.link')</th>
                              <th data-field="name">@lang('organizations.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                      @foreach ($orgs as $org)
                      <tr>
                      <td><span class="octicon octicon-organization"></span></td>
                      <td>{{ $org->name }}</td>
                      <td><a href="{{ url('join/'.$org->id) }}" target="_blank">{{ url('join/'.$org->id) }}</td>
                      <td><a class="btn waves-effect waves-light" role="button" name="options" href="{{ url('org/'.$org->id)}}"><span class="octicon octicon-settings"></span></a></td>
                      </tr>
                      @endforeach
                      </tbody>
                      </table>
                      <center>{{ $orgs->links() }}</center>
                      <div class="flash">
                      <p class="text-center">TIP: Don't see the organization you want? Double check <a href="{{ url('https://github.com/settings/connections/applications/10b01d866046f040c9f1') }}" target="_blank">we have access to it</a> and then <a href="{{ url('sync') }}">sync</a> again!</p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ url('js/materialize.min.js') }}"></script>
@endsection
