<?php 

require 'application/lib/Dev.php';


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