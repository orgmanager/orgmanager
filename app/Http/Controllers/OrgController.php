<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\OrgPasswordRequest;
use App\Http\Requests\CustomMessageRequest;

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

    public function update(Org $org)
    {
        $this->authorize('update', $org);
        Artisan::call('orgmanager:updateorg', [
            'org' => $org->id,
        ]);

        return redirect('org/'.$org->id)->withSuccess('The organization was successfully updated.');
    }

    public function delete(Org $org)
    {
        $this->authorize('delete', $org);
        $org->delete();

        return redirect('dashboard')->withSuccess('The organization was successfully deleted.');
    }

    public function message(CustomMessageRequest $request, Org $org)
    {
        $this->authorize('update', $org);

        $org->custom_message = $request->input('message');

        $org->save();

        return redirect('org/'.$org->id)->withSuccess('The message was successfully updated.');
    }
}
