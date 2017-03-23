<?php

namespace App\Http\Controllers\Api;

use App\Org;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class OrgController extends Controller
{
    public function index(Org $org)
    {
        return $org;
    }

    public function password(Request $request, Org $org)
    {
        $this->authorize('update', $org);
        if (! $request->has('password')) {
            abort(400);
        }
        $org->password = $request->input('password');
        $org->save();

        return $org->makeVisible('password')->makeHidden('user')->toArray();
    }

    public function update(Org $org)
    {
        $this->authorize('update', $org);
        Artisan::call('orgmanager:updateorg', [
        'org' => $org->id,
        ]);

        return response(null, 204);
    }

    public function delete(Org $org)
    {
        $this->authorize('delete', $org);
        $org->delete();

        return response(null, 204);
    }

    public function join(Request $request, Org $org)
    {
        // CONSIDER: Allow users to join other users organizations with their tokens?
        // (15/02/2017) Miguel Piedrafita
        $this->authorize('join', $org);
        if (! $request->has('username')) {
            abort(400);
        }
        Artisan::call('orgmanager:joinorg', [
        'org'      => $org->id,
        'username' => $request->input('username'),
        ]);

        return response(null, 204);
    }
}
