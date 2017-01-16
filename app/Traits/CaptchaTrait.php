<?php
namespace App\Traits;

use Input;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {

    public function captchaCheck()
    {

        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RECAPTCHA_PRIVATE_KEY');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

}
