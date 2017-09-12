@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('organizations.heading')</div>
                    <div class="text-center">
                        <table id="paths" class="table table-hover table-responsive text-center">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">@lang('organizations.name')</th>
                                <th class="text-center">@lang('organizations.link')</th>
                                <th class="text-center">@lang('organizations.options')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orgs as $org)
                                <tr>
                                    <td class="text-center"><span class="octicon octicon-organization"></span></td>
                                    <td class="text-center">{{ $org->name }}</td>
                                    <td class="text-center"><a href="{{ url('join/'.$org->id) }}"
                                                               target="_blank">{{ url('join/'.$org->id) }}</td>
                                    <td class="text-center"><a class="btn btn-primary text-center" role="button"
                                                               name="options" href="{{ url('org/'.$org->id)}}"><span
                                                    class="octicon octicon-settings"></span></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <center>{{ $orgs->links() }}</center>
                        <div class="flash">
                            <form action="{{ url('sync') }}" method="POST">
                                {{ csrf_field() }}
                                <p class="text-center">TIP: Don't see the organization you want? Double check <a
                                            href="{{ url('https://github.com/settings/connections/applications/10b01d866046f040c9f1') }}"
                                            target="_blank">we have access to it</a> and then
                                    <button type="submit" class="btn-link">sync</button>
                                    again!
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
