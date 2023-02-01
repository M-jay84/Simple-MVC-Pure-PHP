<?php

namespace controllers;

use core\Controller;

/*
* Default Controller (Home Page)
*/
class Home extends Controller
{
    public function index()
    {
        // Verify User
        $auth = $this->AuthUser();
        echo '<br>'.$auth->email.'<br>';
    }
}