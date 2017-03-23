<?php

namespace App\Http\Controllers;

use Auth;
use SocialAuth;
use App\Mail\WelcomeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logoutUser']);
    }

    public function authorizeUser()
    {
        return SocialAuth::authorize('github');
    }

    public function loginUser(Request $request)
    {
        $redirect = 'dashboard';
        try {
            SocialAuth::login('github', function ($user, $details) {
                $user->email = $details->email;
                $user->name = $details->full_name;
                $user->token = $details->access_token;
                $user->github_username = $details->nickname;
                if (! $user->exists) {
                    $redirect = 'sync';
                    $user->api_token = str_random(60);
                    Mail::to($user->email)->send(new WelcomeUser());
                }
                $user->save();
            });
        } catch (ApplicationRejectedException $e) {
            return redirect('login');
        } catch (InvalidAuthorizationCodeException $e) {
            return redirect('login');
        }
        $request->session()->regenerate();
        $user = Auth::user();

        return redirect()->intended($redirect)->withSuccess(trans('alerts.loggedin'));
    }

    public function logoutUser()
    {
        Auth::logout();

        return redirect('')->withSuccess('Sucessfully logged out!');
    }
}
