<?php

namespace libs\traits;

/*
* Trait To Group Classes
*/
trait Auth_user
{
    // Get ip   
    public function ip() {
        echo '<br>hello trait ip<br>';
    }

    // Get cookie
    public function cookie() {
        echo '<br>hello trait cookie<br>';
    }
}