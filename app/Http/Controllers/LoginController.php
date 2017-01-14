<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
                $user->github_username = $details->nickname;
                $user->save();
            });
        } catch (ApplicationRejectedException $e) {
            return redirect('login');
        } catch (InvalidAuthorizationCodeException $e) {
            return redirect('login');
        }

    // Current user is now available via Auth facade
    $user = Auth::user();
    $notification = array(
    	'message' => 'Sucessfully logged in!',
    	'alert-type' => 'success'
    );
        return redirect('dashboard')->with($notification);
    }

    public function logoutUser()
    {
        Auth::logout();

        return redirect('');
    }
}
