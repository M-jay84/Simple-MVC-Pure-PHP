<?php

// DB Details
define("DB_HOST", "localhost");
define("DB_USER", "dbusername");
define("DB_PASS", "dbpassword");
define("DB_NAME", "dbname");
define('DB_CHAR', 'utf8mb4');

// URL Root
define('URLROOT', 'http://localhost/Simple-MVC-Pure-PHP');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// Paths
define('LANG', '../data/languages');
define('LOGGER', '../data/logs');

// Quick Time
define('TT_TIME', time());
define('TT_DATE', date("Y-m-d H:i:s"));

// Version
define('VERSION', 'PDO');

// File Charset
define('CHARSET', 'utf-8');

// Set User Group
define('_USER', 1);
define('_POWERUSER', 2);
define('_VIP', 3);
define('_UPLOADER', 4);
define('_MODERATOR', 5);
define('_SUPERMODERATOR', 6);
define('_ADMINISTRATOR', 7);