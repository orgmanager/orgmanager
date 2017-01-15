<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Http\Request;
use Toastr;
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
      $org = Org::find($id);
      if (!$org) {
          Toastr::error("We couldn\'t find that organization!", 'Error');

          return redirect('dashboard');
      }
      if ($org->userid != Auth::id()){
        Toastr::error("You tried to edit an organization you don\'t have access to!", 'Auth Error');

        return redirect('dashboard');
      }
      if(!$request->has('password') || trim($request->password) == "" || $request->password == $org->password){
        if ($org->password != "" && $request->password != $org->password){
          $org->password = null;
          $org->save();
          Toastr::success($org->name."\'s password was changed", 'Password Changed');
          return redirect('dashboard');
        }
        Toastr::error("You didn\'t change anything!", 'Error');
        return redirect('dashboard');
      }
      $org->password = $request->password;
      $org->save();
      Toastr::success($org->name."\'s password was changed", 'Password Changed');
      return redirect('dashboard');
    }
}
