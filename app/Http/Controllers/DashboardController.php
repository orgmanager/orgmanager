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

    public function showDashboard()
    {
        $orgs = Org::where('userid', '=', Auth::id())->paginate(15);
        if (count($orgs) == 0) {
            return view('empty');
        }

        return view('orgs')->with('orgs', $orgs);
    }

    public function changePassword(Request $request, $id)
    {
        $org = Org::find($id);
        if (!$org) {
            Toastr::error(trans('alerts.orgnotfound'), trans('alerts.error'));

            return redirect('dashboard');
        }
        if ($org->userid != Auth::id()) {
            Toastr::error(trans('alerts.notauth'), trans('alerts.authfail'));

            return redirect('dashboard');
        }
        if (!$request->has('password') || trim($request->password) == '') {
            Toastr::error(trans('alerts.notchanged'), trans('alerts.error'));

            return redirect('dashboard');
        }
        $org->password = bcrypt($request->password);
        $org->save();
        Toastr::success($org->name.trans('alerts.passwdchange'), trans('alerts.changed'));

        return redirect('dashboard');
    }
}
