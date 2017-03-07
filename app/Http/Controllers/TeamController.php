<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Org;

class TeamController extends Controller
{
    public function index(Org $org)
    {
      return view('teams', ['org' => $org]);
    }
}
