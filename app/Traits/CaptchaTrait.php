<?php

namespace App\Traits;

use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait
{
    public function captchaCheck(Request $request)
    {
        $remoteip = $request->ip();
        $secret = config('recaptcha.secret');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }
    }
}
