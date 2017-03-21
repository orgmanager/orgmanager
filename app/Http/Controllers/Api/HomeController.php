<?php

namespace App\Http\Controllers\Api;

use App\Org;
use App\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $endpoints = (object) [];
        $endpoints->user = url('api/user');
        $endpoints->user_orgs = url('api/user/orgs');
        $endpoints->org = url('api/org/{id}');
        $endpoints->org_password = url('api/org/{id}');
        $endpoints->update_org = url('api/org/{id}');
        $endpoints->join = url('api/join/{id}');
        $endpoints->stats = url('api/stats');
        $endpoints->docs = url('http://docs.orgmanager.miguelpiedrafita.com');

        return response()->json($endpoints);
    }

    public function org()
    {
        $endpoints = (object) [];
        $endpoints->org = url('api/org/{id}');
        $endpoints->docs = url('http://docs.orgmanager.miguelpiedrafita.com');

        return response()->json($endpoints);
    }

    public function stats()
    {
        $stats = (object) [];
        $stats->users = User::count();
        $stats->orgs = Org::count();
        $stats->invites = Org::sum('invitecount');
        $stats->version = config('app.orgmanager.version');

        return response()->json($stats);
    }
}
