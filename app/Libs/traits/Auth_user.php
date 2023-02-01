<?php

namespace libs\traits;

use models\M_accounts;
use libs\Cookie;
use libs\Captcha;
use libs\Input;
use libs\DB;
use libs\Ip;

/*
* Trait To Group User/Guest
*/
trait Auth_user
{
    // Login From Password & Username
    public function auth_user_login()
    {
        if (Input::exist() && Cookie::csrf_check()) {
            // Check Inputs
            (new Captcha)->response(Input::get('g-recaptcha-response'));
            $username = Input::get("username");
            $password = Input::get("password");
            if (empty($username) || empty($password)) {
                Redirect(Url(), Txt("MISSING_FORM_DATA"));
            }
            // Find User
            M_accounts::login($username, $password);
            Redirect(Url(), Txt("SUCCESS"));
        }
        Redirect(Url(), Txt("MISSING_FORM_DATA"));
    }

    // Logout - Delete Session/Cookies
    public function auth_user_logout()
    {
        // Destroy $_COOKIE/$_SESSION
        Cookie::destroyAll();

        // Go To Login Page
        Redirect(Url('user/login'));
    }

    // Signup From Form Inputs 
    public function auth_user_signup()
    {
        // Check Input Else Return To Form
        if (Input::exist() && Cookie::csrf_check()) {
            // Check Input
            (new Captcha)->response($_POST['g-recaptcha-response']);
            $data = [
                'passagain' => Input::get("passagain"),
                'invite' => Input::get("invite"),
                'username' => Input::get("wantusername"),
                'email' => Input::get("email"),
                'password' => Input::get("wantpassword"),
                'country' => Input::get("country"),
                'gender' => Input::get("gender"),
                'client' => Input::get("client"),
                'age' => Input::get("age"),
                'secret' => Input::get("secret")
            ];
            // Sign User Up
            M_accounts::signupUser($data);
        } else {
            Redirect(Url('signup'));
        }
    }
    
    // Signup - Check If Invite
    public function auth_user_signupcheck()
    {
        // Check IP
        if (config('IPCHECK')) {
            Ip::checkIP();
        }

        // Check Invite
        $invite = Input::get("invite");
        $secret = Input::get("secret");
        $invite_row = 0;
        if (!is_int($invite) || strlen($secret) != 20) {
            if (config('INVITEONLY')) {
                Redirect(Url(), "<center>" . Txt("INVITE_ONLY_MSG") . "<br></center>");
            }
        } else {
            $invite_row = DB::select('users', 'id', ['id' => $invite, 'secret' => $secret]);
            if (!$invite_row) {
                Redirect(Url(), Txt("INVITE_ONLY_NOT_FOUND") . "" . (config('SIGNUPTIMEOUT') / 86400) . "days.");
            }
        }
        return $invite_row;
    }

}