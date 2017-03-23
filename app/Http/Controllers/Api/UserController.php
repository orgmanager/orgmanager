<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return Auth::user();
    }

    public function orgs()
    {
        return Auth::user()->orgs;
    }

    public function token()
    {
        $user = Auth::user();
        $token = str_random(60);
        $user->api_token = $token;
        $user->save();

        return response()->json($token);
    }
}
