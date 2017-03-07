<?php

namespace App\Http\Controllers;

use App\Org;

class TeamController extends Controller
{
    public function index(Org $org)
    {
        return view('teams', ['org' => $org]);
    }
}
