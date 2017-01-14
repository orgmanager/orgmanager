@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="join">
            Enter your email adress to join {{ $org->name }}:<br><br>
              <form id="join" type="POST" href="{{ url('join/'.$org->id) }}">
                {{ csrf_field() }}
                <input type="email" name="email" class="email" placeholder="mail@example.com"><br><br>
                <button type="submit" class="submit-button" name="submit">Join!</button>
              </form>
          </div>
            </div>
        </div>
    </div>
</div>
@endsection
