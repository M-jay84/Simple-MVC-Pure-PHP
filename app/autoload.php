<?php
// Load All Classes
spl_autoload_register(function ($className) {
    $filename = APPROOT . DIRECTORY_SEPARATOR . str_replace('\\', '/', $className) . '.php';
    if (file_exists($filename)) {
        require_once($filename);
    }
});