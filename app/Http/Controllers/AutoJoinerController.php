<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AutoJoinerController extends Controller
{
    public function index(Request $request)
    {
        abort_unless($this->requestSignatureIsValid(), 403);

        if ($request->header('X-Github-Event') != 'pull_request') {
            return 'Not a Pull Request';
        }
        $org = Org::findOrFail($this->getOrgId($request));
        if ($request->action != 'closed' || $request->pull_request['merged_at'] == null) {
            return 'Pull Request was not merged';
        }
        Artisan::call('orgmanager:joinorg', [
            'org'      => $org->id,
            'username' => ($request->pull_request['user'])['login'],
        ]);

        return Artisan::output();
    }

    protected function requestSignatureIsValid() : bool
    {
        $gitHubSignature = request()->header('X-Hub-Signature');
        list($usedAlgorithm, $gitHubHash) = explode('=', $gitHubSignature, 2);
        $payload = file_get_contents('php://input');
        $calculatedHash = hash_hmac($usedAlgorithm, $payload, config('auth.github_secret'));

        return $calculatedHash === $gitHubHash;
    }

    protected function getOrgId(Request $request) : int
    {
        return ((($request->pull_request['base'])['repo'])['owner'])['id'];
    }
}
