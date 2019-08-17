<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function password(Org $org)
    {
        $this->authorize('update', $org);

        request()->validate([
            'password' => 'required|string'
        ]);

        return tap($org, function($org) {
            $org->update(['password' => Hash::make(request('password'))]);
        });
    }

    public function removePassword(Org $org)
    {
        $this->authorize('update', $org);

        return tap($org, function($org) {
            $org->update(['password' => null]);
        });
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
