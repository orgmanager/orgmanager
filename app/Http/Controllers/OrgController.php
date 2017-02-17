<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Toastr;

class OrgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPage(Org $org)
    {
        $this->authorize('update', $org);

        return view('settings', compact('org'));
    }

    public function changePassword(Request $request, Org $org)
    {
        $this->authorize('update', $org);
        $this->validate($request, [
        'org_passwd' => 'required',
      ]);
        $org->password = bcrypt($request->input('org_passwd'));
        $org->save();
        Toastr::success('The organization password was successfully updated.', 'Password updated!');

        return redirect('org/'.$org->id);
    }

    public function updateOrg(Request $request, Org $org)
    {
        $this->authorize('update', $org);
        Artisan::call('orgmanager:updateorg', [
        'org' => $org->id,
      ]);
        Toastr::success('The organization was successfully updated.', 'Organization updated!');

        return redirect('org/'.$org->id);
    }

    public function deleteOrg(Request $request, Org $org)
    {
        $this->authorize('delete', $org);
        $org->delete();
        Toastr::success('The organization was successfully deleted.', 'Organization deleted');

        return redirect('dashboard');
    }
}
