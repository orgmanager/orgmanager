<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Org;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OrgController extends Controller
{
    public function index($id)
    {
        return Org::findOrFail($id);
    }

    public function password(Request $request, $id)
    {
        $org = Org::findOrFail($id);
        $this->authorize('update', $org);
        if (!$request->has('password')) {
          abort(400);
        }
        $org->password = $request->input('password');
        $org->save();
        return $org->makeVisible('password')->makeHidden('user')->toArray();
    }

    public function update($id)
    {
        $org = Org::findOrFail($id);
        $this->authorize('update', $org);
        Artisan::call('orgmanager:updateorg', [
        'org' => $org->id,
        ]);

        return response(null, 204);
    }

    public function join(Request $request, $id)
    {
      $org = Org::findOrFail($id);
      // CONSIDER: Allow users to join other users organizations with their tokens?
      // (15/02/2017) Miguel Piedrafita
      $this->authorize('join', $org);
      if (!$request->has('username')) {
        abort(400);
      }
      Artisan::call('orgmanager:joinorg', [
      'org' => $org->id,
      'username' => $request->input('username'),
      ]);

      return response(null, 204);
    }
}
