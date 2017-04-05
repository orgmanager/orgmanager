<?php

namespace App\Http\Controllers;

class AutoJoinerController extends Controller
{
    public function index(Request $request)
    {
		abort_unless($this->requestSignatureIsValid(), 403);
		
		//
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
