<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Org;

class OrgController extends Controller
{
    public function index($id)
    {
      return Org::findOrFail($id);
    }
}
