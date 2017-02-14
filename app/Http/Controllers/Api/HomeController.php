<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
      $endpoints = (object) array();
      $endpoints->user = url('api/user');
      $endpoints->user_orgs = url('api/user/orgs');
      $endpoints->org = url('api/org/{id}');
      $endpoints->docs = url('https://github.com/m1guelpf/orgmanager/wiki').' (TODO)';
      return response()->json($endpoints);
    }

    public function org()
    {
      $endpoints = (object) array();
      $endpoints->org = url('api/org/{id}');
      $endpoints->docs = url('https://github.com/m1guelpf/orgmanager/wiki').' (TODO)';
      return response()->json($endpoints);
    }
}
