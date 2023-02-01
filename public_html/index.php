<?php
// Get Config/Paths
require('../app/bootstrap.php');

// Autoload Classes
require('../app/autoload.php');

// Run App
use core\Router;
$app = new Router();