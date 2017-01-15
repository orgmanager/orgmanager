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

    public function showDashboard()
    {
        $orgs = Org::where('userid', '=', Auth::id())->get();
        if (count($orgs) == 0) {
            return view('empty');
        }

        return view('orgs')->with('orgs', $orgs);
    }

    public function changePassword(Request $request, $id){
      
    }
}
