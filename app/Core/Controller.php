<?php

namespace core;

use libs\Auth;
use libs\Captcha;
use libs\Cookie;
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
    $data = (new Auth)->user();//checkuser();
    return $data;
  }

  // Load view
  public function view($file, $data = [], $page = 'user')
  {
    $view = new View();
    if ($page == 'portal') {
      $view->view($file, $data);
    } elseif ($page == 'simple') {
      $view->simple($file, $data);
    } elseif ($page == 'admin') {
      $view->admin($file, $data);
    } else {
    $view->render($file, $data);
    }
  }

  public function captcha()
  {
      $html = (new Captcha)->html();
      return $html;
  }
  
  // Login From Password & Username
  public function csrf_token()
  {
      return Cookie::csrf_token();
  }

}