<?php

namespace controllers\admin;

use core\Controller;

/*
* Default Controller (Home Page)
*/

class Admincp extends Controller
{

    public $user;
    public function __construct()
    {
        // Verify User/Staff
        $this->user = $this->AuthUser(_MODERATOR, 2);
    }

    // Admincp Default Page
    public function index()
    {
        // Init Data
        $data = [
            'title1' => Txt('STAFF'),
            'title' => Txt('Staff'),
        ];

        // Load View
        $this->view('admin/adminhome', $data, 'admin');
    }
    
}