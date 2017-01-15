@extends('layouts.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ url('css/materialize.min.css') }}"  media="screen,projection"/>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Organizations</div>
                <div class="panel-body">
                      <table id="paths" class="highlight centered responsive-table">
                        <thead>
                            <tr>
                              <th data-field="icon"></th>
                              <th data-field="id">Name</th>
                              <th data-field="id">Link</th>
                              <th data-field="name">Password</th>
                              <th data-field="button">Submit</th>
                              <th data-field="button">Sync</th>
                            </tr>
                        </thead>
                        <tbody>
                      @foreach ($orgs as $org)
                      <tr>
                      <td><span class="octicon octicon-organization"></span></td>
                      <td>{{ $org->name }}</td>
                      <td><a href="{{ url('join/'.$org->id) }}" target="_blank">{{ url('join/'.$org->id) }}</td>
                      <form id="password" method="POST" action="{{ url('password/'.$org->id) }}">
                      {{ csrf_field() }}
                      <td><span class="octicon octicon-lock"@if($org->password) onclick="toggle_visibility('passwordview');" @endif ></span><div id="passwordview" style="display: none">{{ $org->password }}</div><input type="text" name="password" class="password" value="{{ $org->password }}" placeholder="Protect the invites!"></td>
                      <td><button class="btn waves-effect waves-light" type="submit" name="action"><i class="material-icons center">send</i></button></td>
                      </form>
                      <form id="sync" method="POST" action="{{ url('sync/'.$org->id) }}">
                      {{ csrf_field() }}
                      <td><button class="btn waves-effect waves-light" type="submit" name="sync"><span class="octicon octicon-sync"></span></button></td>
                      </tr>
                      @endforeach
                      </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ url('js/materialize.min.js') }}"></script>
<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>
@endsection
