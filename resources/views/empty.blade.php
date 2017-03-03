@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Organizations</div>

                <div class="panel-body">
                  <table>
                    <tbody>
                      <div class="blankslate">
                        <span class="mega-octicon octicon-telescope blankslate-icon"></span>
                        <h3>@lang('empty.heading')</h3>
                        <p>@lang('empty.sync1') <a href="{{ url('sync') }}">@lang('empty.sync2')</a> @lang('empty.sync3')
                        <p>If your app isn't showing here after sync, <a href="https://github.com/settings/connections/applications/10b01d866046f040c9f1">check we've been given access to it</a>.</p>
                        <p>@lang('empty.problems') <a href="https://github.com/orgmanager/orgmanager/issues/new?labels=bug" target="_blank">@lang('empty.issue')</a>.</p>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
