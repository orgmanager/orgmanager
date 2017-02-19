<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Toastr;

class DeveloperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        return view('developer');
    }

    public function token()
    {
        return view('token');
    }

    public function deleteToken(Request $request)
    {
        $user = Auth::user();
        $user->api_token = str_random(60);
        $user->save();
        Toastr::success('Your token has been regenerated successfully', 'Token regenerated!');

        return redirect()->back();
    }
}
