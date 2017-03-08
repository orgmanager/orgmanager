@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Teams - {{ $org->name }}</div>

                <div class="panel-body">
                  <h4 class="text-center">{{ $org->name}}'s Teams</h4>
                  <p class="text-center">OrgManager v3 introduces Teams, a new function that allows you to specify a team your invited users will go into. Please note that this feature is still in a beta version, so use the report widget if you find any bugs.</p>
                  <div class="row">
                    <div class="col-md-4 text-center">
                      <p>Step 1:<br>Sync organization teams</p>
                      <form id="sync-teams" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary"><i class="octicon octicon-sync"></i> Sync Teams</button>
                      </form>
                    </div>
                    <div class="col-md-4 text-center">
                      <p>Step 2:<br>Select the team users will go into</p>
                      <form id="select-team" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @if (isset($teams) && count($teams) > 0)
                          <select id="team_id" type="teams" class="form-control" name="team_id">
                            <option value="">Select a team</option>
                            @foreach ($teams as $team)
                              <option value="{{ $team->id }}">{{ ucfirst($team->name) }}</option>
                            @endforeach
                        </select>
                        @else
                          <select id="team_id" type="teams" class="form-control" name="team_id" disabled="disabled">
                            <option value="">Select a team</option>
                          </select>
                        @endif
                      </form>
                    </div>
                    <div class="col-md-4 text-center">
                      <p>Status:</p>
                      @if (!isset($org->team_id))
                        <div class="flash">
                          <p>Your organization is not currently adding users to any team.</p>
                        </div>
                      @else
                        <div class="flash">
                          <p>Your organization is adding users to the <b>{{ $org->team->name }}</b> team.</p>
                        </div>
                      @endif
                    </div>
                  </div>
                  <br>
                  <div class="flash">
                  <p class="text-center">TIP: Want a pretty URL for your users? Share <a href="{{ url('o/'.$org->name) }}" target="_blank">{{ url('o/'.$org->name) }}</a> !</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
