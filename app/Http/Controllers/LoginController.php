<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Snowfire\Beautymail\Beautymail;
use SocialAuth;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function authorizeUser()
    {
        return SocialAuth::authorize('github');
    }

    public function loginUser(Request $request)
    {
        try {
            SocialAuth::login('github', function ($user, $details) {
                $user->email = $details->email;
                $user->name = $details->full_name;
                $user->token = $details->access_token;
                $user->save();
                if (!$user->exists) {
                    $this->sendWelcome();
                }
            });
        } catch (ApplicationRejectedException $e) {
            return redirect('login');
        } catch (InvalidAuthorizationCodeException $e) {
            return redirect('login');
        }

    // Current user is now available via Auth facade
    $user = Auth::user();

        return Redirect::intended();
    }

    public function logoutUser()
    {
        Auth::logout();

        return redirect('');
    }

    public function sendWelcome($user)
    {
        if (Auth::user()['recieveMails']) {
            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('emails.welcome', ['user' => $user], function ($message) {
                $message
            ->from('laragit@miguelpiedrafita.com')
            ->to($user->email, $user->name)
            ->subject('Welcome!');
            });
        }
    }
}
