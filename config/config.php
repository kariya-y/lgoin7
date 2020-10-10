<?php

ini_set('display_errors',1);
define('DSN','mysql:host=localhost;dbname=login7');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/login7/');
require_once(__DIR__.'/../lib/functions.php');
require_once(__DIR__.'/autoload.php');
session_start();