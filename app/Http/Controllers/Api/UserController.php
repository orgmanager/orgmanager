<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;

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
