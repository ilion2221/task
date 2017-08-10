<?php
/**FRONT CONTROLLER*/

session_start();
//General settings
ini_set('display_errors', 0);
error_reporting(E_ALL);

//System Files Connections
define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/Autoload.php';
//Setings Database Connection

//Call the Router
$router = new Router();
$router->run();