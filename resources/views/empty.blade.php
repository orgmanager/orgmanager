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
                        <h3>Looks like there's nothing here...</h3>
                        <p>You can try to <a href="{{ url('/sync') }}">sync</a> the data from GitHub.
                        <p>Make sure you authorized OrgManager to access your organization data.</p>
                        <p>Having problems? <a href="https://github.com/m1guelpf/orgmanager/issues/new?labels=bug" target="_blank">Open an issue</a>.</p>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
