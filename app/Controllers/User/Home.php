<?php

namespace controllers\user;

use core\Controller;
/*
* Default Controller (Home Page)
*/
class Home extends Controller
{
    public $user;
    public function __construct()
    {
        // Verify User/Staff
        $this->user = $this->AuthUser(0, 2);
    }

    // Admincp Default Page
    public function index()
    {
        $this->view('/user/home', ['title' => Txt('Home')], 'user');
    }
}
