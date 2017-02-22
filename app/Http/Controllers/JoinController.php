<?php

namespace App\Http\Controllers;

use App\Org;
use App\Traits\CaptchaTrait;
use GitHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Toastr;

class JoinController extends Controller
{
    use CaptchaTrait;

    public function showPage($id)
    {
        $org = Org::find($id);
        if (!$org) {
            Toastr::error(trans('alerts.orgnotfound'), trans('alerts.error'));

            return redirect('');
        }

        return view('join')->with('org', $org);
    }

    public function inviteUser(Request $request, $id)
    {
        if (!$this->captchaCheck()) {
            Toastr::error(trans('alerts.captcha'), trans('alerts.captchat'));

            return redirect('join/'.$id);
        }
        $org = Org::find($id);
        if (!$org) {
            Toastr::error(trans('alerts.orgnotfound'), trans('alerts.error'));

            return redirect('');
        }
        if (!$request->has('github_username')) {
            Toastr::error(trans('alerts.username'), trans('alerts.usernamet'));

            return redirect('join/'.$id);
        }
        if ($org->password && trim($org->password) != '') {
            if (!$request->has('org_password')) {
                Toastr::error(trans('alerts.passwd1'), trans('alerts.passwdt1'));

                return redirect('join/'.$id);
            }
            if (!password_verify($request->org_password, $org->password)) {
                Toastr::error(trans('alerts.passwd2'), trans('alerts.passwdt2'));

                return redirect('join/'.$id);
            }
        }
        if ($this->checkMembership($org, $request->github_username)) {
            Toastr::error('You are already a member of '.$org->name, 'Already a member!');

            return redirect('join/'.$id);
        }
        Artisan::call('orgmanager:joinorg', [
        'org'      => $org->id,
        'username' => $request->github_username,
        ]);
        Toastr::success(trans('alerts.invite').$request->github_username.trans('alerts.inbox'), trans('alerts.sent'));

        return redirect('join/'.$id);
    }

    protected function checkMembership(Org $org, $username)
    {
        Github::authenticate($org->user->token, null, 'http_token');
        try {
            Github::api('organization')->members()->show($org->name, $username);
        } catch (Github\Exception\RuntimeException $e) {
            return false;
        }

        return true;
    }
}
