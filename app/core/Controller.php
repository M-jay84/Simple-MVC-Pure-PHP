<?php

namespace core;

use libs\Auth;
use core\View;

/*
* Controller Extends For Common Controller Functions
*/
class Controller
{
  public $data;

  // Verify User
  public function AuthUser()
  {
    $data = (new Auth)->checkuser();
    return $data;
  }

  // Load view
  public function view($view, $data = [])
  {
    $view = new View();
    $view->render('home', ['tasks' => '$data']);
  }

}