<?php 

ini_set('display_errors', 1);

define('ABSPATH', __DIR__);
define('SCRIPT_PATH', '/scripts');

session_start();

require_once ABSPATH.'/config/database.php';
require_once SCRIPT_PATH.'/read.php';
require_once SCRIPT_PATH.'/user.php';