<?php 

require '/Application/lib/Dev.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use application\core\Router;

spl_autoload_register(function($class){
	$path = str_replace('\\','/',$class.'.php');
	if(file_exists($path)){
		require $path;
	}
	
});

session_start();
// debug() use everywhere in code , check file dev.php in lib/dev.php
$router = new Router;
$router->runRouter();









?>