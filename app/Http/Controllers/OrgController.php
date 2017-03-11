<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrgPasswordRequest;
use App\Org;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OrgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Org $org)
    {
        $this->authorize('update', $org);

        return view('settings', compact('org'));
    }

    public function changePassword(OrgPasswordRequest $request, Org $org)
    {
        $this->authorize('update', $org);
        $org->password = bcrypt($request->input('org_passwd'));
        $org->save();

        return redirect('org/'.$org->id)->withSuccess('The organization password was successfully updated.');
    }

    public function update(Request $request, Org $org)
    {
        $this->authorize('update', $org);
        Artisan::call('orgmanager:updateorg', [
          'org' => $org->id,
        ]);

        return redirect('org/'.$org->id)->withSuccess('The organization was successfully updated.');
    }

    public function delete(Request $request, Org $org)
    {
        $this->authorize('delete', $org);
        $org->delete();

        return redirect('dashboard')->withSuccess('The organization was successfully deleted.');
    }
}
