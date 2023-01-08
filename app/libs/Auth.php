<?php

namespace libs;

use models\users;
use libs\traits\Auth_user;

/*
* Check Visitor
*/
class Auth
{
    use Auth_user;

    public $data;

    // Verify User
    public function checkuser()
    {
        $this->checkDetails();
        $data = (new users)->getUserId1();
        return $data;
    }

    // Check Details
    public function checkDetails()
    {
        echo '<br>ip from auth';
        $user = $this->ip();
        echo '<pre>'.print_r($user, true).'</pre>';

        echo 'cookie from auth ';
        $cookie = $this->cookie();
        echo '<pre>'.print_r($cookie, true).'</pre>';
    }

}