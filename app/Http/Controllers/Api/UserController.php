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
}
