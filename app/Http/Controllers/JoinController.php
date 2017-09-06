<?php

namespace App\Http\Controllers;

use Github;
use App\Org;
use Socialite;
use App\Traits\CaptchaTrait;
use Illuminate\Http\Request;
use App\Http\Requests\JoinOrgRequest;
use Illuminate\Support\Facades\Artisan;
use Laravel\Socialite\Two\InvalidStateException;

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

        return Socialite::driver('github')->setScopes([])->redirectUrl(route('join.callback', $org))->redirect();
    }

    public function callback(Request $request, Org $org)
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (InvalidStateException $e) {
            return redirect('join/'.$org->id)->withErrors('Something went wrong when authenticating with GitHub. Please try again later or open an issue.');
        }
        if ($this->isMember($org, $user = $user->getNickname())) {
            return redirect('join/'.$org->id)->withErrors(trans('alerts.member'));
        }

        Artisan::call('orgmanager:joinorg', [
          'org'      => $org->id,
          'username' => $user,
      ]);

        return redirect(url("https://github.com/orgs/$org->name/invitation/"));
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
    }
}
