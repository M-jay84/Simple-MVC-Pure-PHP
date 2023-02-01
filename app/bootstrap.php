<?php

// Start Session
session_start();

// Load Config
require_once 'config/config.php';
$config = require_once 'config/settings.php';

// Load Langauge
$language = isset($_SESSION['language'])  ? $_SESSION['language'] : 'english';
require_once LANG."/$language.php";

// Error Reporting
error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
//ini_set('error_log', '../data/logs/errors_log.txt');

// Register custom exception handler
include "helpers/exception_helper.php";
set_exception_handler("handleUncaughtException");
//set_error_handler('runtime_error_handler');

// Load Helpers
require "helpers/general_helper.php";
require "helpers/datetime_helper.php";