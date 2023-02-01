<?php

namespace controllers\user;

use core\Controller;
use libs\traits\Auth_user;

/*
* User/Guest Pages
*/
class User extends Controller
{
    use Auth_user;

    // Verify User/Guest
    public function __construct()
    {
       $this->AuthUser(0, 0);
    }

    // Get ip   
    public function index()
    {
        $data = [
            'title' => Txt("Test"),
        ];
        $this->view('user/user', $data, 'user');
    }

    // Login Page
    public function login()
    {
        $data = [
            'title' => Txt("LOGIN"),
            'csrf' => $this->csrf_token(),
            'captcha' => $this->captcha(),
        ];
        $this->view('user/login', $data, 'user');
    }

    // Login Form Submit
    public function loginsubmit()
    {
        $this->auth_user_login();
    }

    // Logout Page
    public function logout()
    {
        $this->auth_user_logout();
    }

    // Signup Page
    public function signup()
    {
        // Is Invite ?
        $invite_row = $this->auth_user_signupcheck();

        $data = [
            'title' => Txt("SIGNUP"),
            'invite' => $invite_row,
        ];
        $this->view('user/user', $data, 'user');
    }

    // Signup Form Submit
    public function signupsubmit()
    {
        $this->auth_user_signup();
    }

}