<?php

namespace App\Http\Controllers;

use App\Org;
use Toastr;

class JoinController extends Controller
{
    public function showPage($id)
    {
        $org = Org::find($id);
        if (!$org) {
            $notification = [
      'message'    => 'Error! That organization is not in our database!',
      'alert-type' => 'error',
  ];

            return redirect('')->with($notification);
        }
        Toastr::info('Test', 'Test Title');

        return view('join')->with('org', $org);
    }
}
