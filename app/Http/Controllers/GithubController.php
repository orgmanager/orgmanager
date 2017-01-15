<?php

namespace App\Http\Controllers;

use App\Org;
use App\Repo;
use Auth;
use GitHub;

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
                    $org->username = Auth::user()->github_username;
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
                $membership = GitHub::api('organizations')->members()->member($organization->name, $organization->username);
                $organization->role = $membership['role'];
                if ($membership['role'] == 'admin'){
                  $organization->token = Auth::user()->token;
                  $organization->save();
                } else {
                  $organization->delete();
                }
            }
        }
    }

    public function getReferers($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->referers($repo->owner, $repo->name);
    }

    public function getPaths($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->paths($repo->owner, $repo->name);
    }

    public function getViews($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->views($repo->owner, $repo->name);
    }

    public function getClones($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->clones($repo->owner, $repo->name);
    }
}
