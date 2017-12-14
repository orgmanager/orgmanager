<?php

namespace App\Http\Controllers;

use Auth;

class DeveloperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteToken()
    {
        $user = Auth::user();
        $user->api_token = str_random(60);
        $user->save();

        return redirect()->back()->withSuccess('Your token has been regenerated successfully.');
    }
}
