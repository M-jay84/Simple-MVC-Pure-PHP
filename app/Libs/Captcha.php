<?php

namespace libs;

/*
* Check Visitor
*/

class Captcha
{
    private $key;
    private $secret;

    public function __construct()
    {
        $this->key = config('CAPTCHA_KEY');
        $this->secret = config('CAPTCHA_SECRET');
    }

    // Captcha Response
    public function response($captcha)
    {
        if (config('CAPTCHA_ON')) {
            if (!$captcha) {
                    Redirect(Url('user/login'), Txt('CAPTCHA'));
            }
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $this->secret . '&response=' . $captcha);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                // its successfull so let it go
            }
        }
    }

    // Display Captcha
    public function html()
    {
        if (config('CAPTCHA_ON')) {
            return print("<center><div class='g-recaptcha' data-theme='light' data-sitekey='" . $this->key . "'></div><center>");
        }
    }

}