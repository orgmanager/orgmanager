<?php

namespace App\Http\Controllers;

use App\Org;
use Auth;
use Illuminate\Http\Request;
use Toastr;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orgs = Org::where('userid', '=', Auth::id())->paginate(15);
        if (count($orgs) == 0) {
            return view('empty');
        }

        return view('orgs')->with('orgs', $orgs);
    }
}
