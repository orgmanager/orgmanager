<?php

namespace App\Http\Controllers;

use App\Org;
use Illuminate\Http\Request;

class AutoJoinerController extends Controller
{
    public function index(Request $request)
    {
        abort_unless($this->requestSignatureIsValid(), 403);

        // (CONSIDER checking against integration_installation for analytics)
        if ($request->header('X-Github-Event') != 'pull_request') {
            return 'Not a Pull Request';
        }
        $data = json_decode($request->pull_request); // TODO Check this decodes data
        $org = Org::findOrFail($data->base->repo->owner->id);
        if ($request->action != 'closed' || $data->merged_at == null) {
            return 'Pull Request was not merged';
        }
        // Get github username of the user to invite ($json->pull_request->user->login)
        // Invite user to organization
    }

    protected function requestSignatureIsValid() : bool
    {
        $gitHubSignature = request()->header('X-Hub-Signature');
        list($usedAlgorithm, $gitHubHash) = explode('=', $gitHubSignature, 2);
        $payload = file_get_contents('php://input');
        $calculatedHash = hash_hmac($usedAlgorithm, $payload, config('auth.github_secret'));

        return $calculatedHash === $gitHubHash;
    }
}
