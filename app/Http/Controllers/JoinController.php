<?php

namespace App\Http\Controllers;

use App\Org;
use GitHub;
use Illuminate\Http\Request;
use Toastr;

class JoinController extends Controller
{
    public function showPage($id)
    {
        $org = Org::find($id);
        if (!$org) {
            Toastr::error("We couldn't find that organization!", 'Error');

            return redirect('');
        }

        return view('join')->with('org', $org);
    }

    public function inviteUser(Request $request, $id)
    {
        $org = Org::find($id);
        if (!$org) {
            Toastr::error("We couldn't find that organization!", 'Error');

            return redirect('');
        }
        if (!$request->has('github_username')) {
            Toastr::error('You need to submit an username!', 'Username required');

            return redirect('join/'.$id);
        }
        if ($org->password && trim($org->password) != '') {
            if (!$request->has('org_password')) {
                Toastr::error('You need a password!', 'Password required');

                return redirect('join/'.$id);
            }
            if ($request->org_password != $org->password) {
                Toastr::error('Wrong Password!', 'Wrong Password');

                return redirect('join/'.$id);
            }
        }
        $username = $request->github_username;
        $this->sendInvite($username, $id);
        Toastr::success('We have sent an invite for '.$username.'. Check your inbox!', 'Invite sent!', ['positionClass' => 'toast-top-full-width']);

        return redirect('join/'.$id);
    }

    public function sendInvite($username, $id)
    {
        $org = Org::find($id);
        Github::authenticate($org->user->token, null, 'http_token');
        Github::api('organization')->members()->add($org->name, $username);
        $org->invitecount++;
        $org->save();
    }
}
