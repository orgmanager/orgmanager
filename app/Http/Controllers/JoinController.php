<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Http\Request;
use Toastr;

class JoinController extends Controller
{
    public function showPage($id)
    {
        $org = Org::find($id);
        if (!$org) {
        Toastr::error("We couldn't find that organization!", "Error");
        return redirect('');
        }
        return view('join')->with('org', $org);
    }

    public function inviteUser(Request $request, $id)
    {
      $org = Org::find($id);
      if (!$org) {
      Toastr::error("We couldn't find that organization!", "Error");
      return redirect('');
      }
      if ($org->password && trim($org->password) != ""){
        if (!$request->password){
          Toastr::error("You need a password!", "Password required");
          return redirect('join/'.$id);
        }
        if ($request->password != $org->password){
          Toastr::error("Wrong Password!", "Wrong Password");
          return redirect('join/'.$id);
        }
      }
      $email = $request->email;
      $this->sendInvite($email, $id);
      Toastr::success("We have sent an invite to ".$email.". Check your inbox!", "Invite sent!", array("positionClass" => "toast-top-full-width"));
      return redirect('join/'.$id);
    }

    public function sendInvite($email, $id){
      
    }
}
