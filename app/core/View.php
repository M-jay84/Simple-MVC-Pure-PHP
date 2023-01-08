<?php

namespace core;

/*
* Return Templates For View
*/
class View
{
    
    // Load Template
    public function render($file, $data = [])
    {
        // Start With No Error
        $error = 0;
    
        if (file_exists("../app/views/$file.php")) {
            // Template
            require_once "../app/views/$file.php";
            return;
        } else {
            $error = 1;
        }

        // Error The View Isnt There !
        if ($error === 1) {
            echo "<br>View $file does not exist<br>";
        }
    }
}