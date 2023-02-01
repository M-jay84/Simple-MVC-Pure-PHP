<?php

namespace core;

/*
* Return Templates For View
*/
class View
{
        
    // Load Template
    public function view($file, $data = [])
    {
        // Start With No Error
        $error = 0;
        if (file_exists("../app/views/$file.php")) {
            require_once "../app/views/$file.php";

            return;
        } else {
            $error = 1;
        }
    }
    // Load Template
    public function simple($file, $data = [])
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
            Redirect(Url(), Txt("View $file does not exist"));
        }
    }

    // Load Template
    public function render($file, $data = [])
    {
        // Start With No Error
        $error = 0;
        if (file_exists("../app/views/$file.php")) {
            // Template
            header1($data['title']);
            require_once "../app/views/$file.php";
            footer();
            return;
        } else {
            $error = 1;
        }

        // Error The View Isnt There !
        if ($error === 1) {
            Redirect(Url(), Txt("View $file does not exist"));
        }
    }
    
    // Load Template
    public function admin($file, $data = [])
    {
        // Start With No Error
        $error = 0;
        if (file_exists("../app/views/$file.php")) {
            // Template
            require_once APPROOT . "/views/admin/inc/admin_header.php";
            require_once "../app/views/$file.php";
            require_once APPROOT . "/views/admin/inc/admin_footer.php";
            return;
        } else {
            $error = 1;
        }

        // Error The View Isnt There !
        if ($error === 1) {
            Redirect(Url(), Txt("View $file does not exist"));
        }
    }
}