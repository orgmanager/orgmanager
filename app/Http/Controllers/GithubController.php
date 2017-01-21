<?php

namespace App\Http\Controllers;

use App\Org;
use App\Repo;
use Auth;
use GitHub;
use Toastr;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function syncOrgs()
    {
        $this->listOrgs();
        $this->checkPerm();
        Toastr::success(trans('alerts.alldb'), trans('alerts.sync'));

        return redirect('dashboard');
    }

    public function syncOrg($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $org = Org::find($id);
        $orgdata = GitHub::api('organization')->show($org->name);
        $org->name = $orgdata['login'];
        $org->description = $orgdata['description'];
        $this->checkPerm();
        Toastr::success($org->name.trans('alerts.updated'), trans('alerts.sync'));

        return redirect('dashboard');
    }

    public function listOrgs()
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $orgs = GitHub::api('user')->orgs();
        $this->storeOrgs($orgs);
    }

    public function storeOrgs($orgs)
    {
        foreach ($orgs as $organization) {
            if (!Org::where('id', '=', $organization['id'])->exists()) {
                if (Org::find($organization['id']) == null) {
                    $org = new Org();
                    $org->id = $organization['id'];
                    $org->name = $organization['login'];
                    $org->url = $organization['url'];
                    $org->description = $organization['description'];
                    $org->avatar = 'https://avatars.githubusercontent.com/u/'.$organization['id'];
                    $org->userid = Auth::id();
                    $org->save();
                }
            }
        }
    }

    public function checkPerm()
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $orgs = Org::where('userid', '=', Auth::id())->get();
        foreach ($orgs as $organization) {
            if ($organization->role != 'admin') {
                $membership = GitHub::api('organizations')->members()->member($organization->name, $organization->user->github_username);
                $organization->role = $membership['role'];
                if ($membership['role'] == 'admin') {
                    $organization->save();
                } else {
                    $organization->delete();
                }
            }
        }
    }
}
