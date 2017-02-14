<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Org;

class OrgController extends Controller
{
    public function index($id)
    {
        return Org::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
      $org = Org::findOrFail($id);
      $this->authorize('update', $org);
      if ($request->has('password')){
        $org->password = $request->input('password');
        $org->save();
      }
      return $org->makeVisible('password')->makeHidden('user')->toArray();
    }
}
