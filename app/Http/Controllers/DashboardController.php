<?php

namespace App\Http\Controllers;

use App\Org;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orgs = Org::where('userid', '=', Auth::id())->get();

        return count($orgs) == 0 ? view('empty') : view('orgs')->withOrgs($orgs);
    }
}
