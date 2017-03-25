<?php

namespace App\Http\Controllers;

use GitHub;
use App\Org;
use App\Traits\CaptchaTrait;
use Illuminate\Http\Request;
use App\Http\Requests\JoinOrgRequest;
use Illuminate\Support\Facades\Artisan;

class JoinController extends Controller
{
    use CaptchaTrait;

    public function index(Org $org)
    {
        return view('join')->with('org', $org);
    }

    public function inviteUser(JoinOrgRequest $request, Org $org)
    {
        $validation = $this->validateRequest($request, $org);
        if ($validation) {
            return $validation;
        }
        Artisan::call('orgmanager:joinorg', [
            'org'      => $org->id,
            'username' => $request->github_username,
        ]);

        return redirect('join/'.$org->id)->withSuccess(trans('alerts.invite').$request->github_username.trans('alerts.inbox'), trans('alerts.sent'));
    }

    public function redirect($name)
    {
        $org = Org::where('name', $name)->firstOrFail();

        return redirect('join/'.$org->id);
    }

    protected function isMember(Org $org, $username)
    {
        Github::authenticate($org->user->token, null, 'http_token');
        try {
            Github::api('organization')->members()->show($org->name, $username);
        } catch (Github\Exception\RuntimeException $e) {
            return false;
        }

        return true;
    }

    protected function validateRequest(Request $request, Org $org)
    {
        if (! $this->captchaCheck($request)) {
            return redirect('join/'.$org->id)->withErrors('You need to prove you are not a robot!');
        }
        if ($org->password && trim($org->password) != '') {
            if (! $request->has('org_password')) {
                return redirect('join/'.$org->id)->withErrors(trans('alerts.passwd1'));
            }
            if (! password_verify($request->org_password, $org->password)) {
                return redirect('join/'.$org->id)->withErrors(trans('alerts.passwd2'));
            }
        }
        if ($this->isMember($org, $request->github_username)) {
            return redirect('join/'.$org->id)->withErrors('You are already a member of '.$org->name);
        }
    }
}
