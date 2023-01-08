<?php

namespace models;

use core\Model;
use PDO;

/*
* Get users Data
*/
class users extends Model
{
    public function getUserId1() {
        return $this->run("SELECT * FROM users WHERE id = ?", [1])->fetch(PDO::FETCH_OBJ);
    }
}