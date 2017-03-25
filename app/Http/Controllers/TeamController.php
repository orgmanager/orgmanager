<?php

namespace App\Http\Controllers;

use Github;
use App\Org;
use App\Team;
use App\Http\Requests\SetTeamRequest;

class TeamController extends Controller
{
    public function index(Org $org)
    {
        $this->authorize('update', $org);

        return view('teams', compact('org'));
    }

    public function syncTeams(Org $org)
    {
        $this->authorize('update', $org);
        Github::authenticate($org->user->token, null, 'http_token');
        $teams = Github::api('teams')->all($org->name);
        foreach ($teams as $data) {
            if (! Team::where('id', '=', $data['id'])->exists()) {
                $team = new Team();
                $team->id = $data['id'];
                $team->org_id = $org->id;
                $team->description = $data['description'];
                $team->privacy = $data['privacy'];
                $team->name = $data['name'];
                $team->permission = $data['permission'];
                $team->save();
            } else {
                $team = Team::findOrFail($data['id']);
                $team->description = $data['description'];
                $team->privacy = $data['privacy'];
                $team->name = $data['name'];
                $team->permission = $data['permission'];
                $team->save();
            }
        }

        return redirect('org/'.$org->id.'/teams');
    }

    public function setTeam(SetTeamRequest $request, Org $org)
    {
        $this->authorize('update', $org);
        $team = Team::findOrFail($request->input('team_id'));
        if ($team->org_id != $org->id) {
            return redirect()->back()->withInput()->withErrors(['The specified team doesn\'t belong to this organization.']);
        }
        $org->team_id = $team->id;
        $org->save();

        return redirect('org/'.$org->id.'/teams');
    }

    public function deleteTeams(Org $org)
    {
        $this->authorize('update', $org);
        foreach ($org->teams as $team) {
            $team->delete();
        }
        $org->team_id = null;
        $org->save();

        return redirect('org/'.$org->id);
    }
}
