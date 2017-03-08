<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GitHub;
use App\Org;
use App\Team;

class TeamController extends Controller
{
    public function index(Org $org)
    {
      return view('teams', compact('org'));
    }

    public function syncTeams(Org $org)
    {
      Github::authenticate($org->user->token, null, 'http_token');
      $teams = Github::api('teams')->all($org->name);
      foreach ($teams as $data)
      {
        if (!Team::where('id', '=', $data['id'])->exists()) {
          $team = new Team;
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
}
