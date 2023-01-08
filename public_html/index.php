<?php
// Get Config/Paths
require('../app/config/config.php');

// Autoload Classes
require('../app/autoload.php');

// Run App
use core\Router;
$app = new Router();