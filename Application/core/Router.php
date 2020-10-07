<?php 

namespace application\core;

use application\core\View;
class Router {

	protected $routes = [];
	protected $params = [];


		
	public function __construct(){
		$arr = require 'application/config/routes.php';
		foreach ($arr as $key => $val) {
			$this->addRegEXP($key,$val);
		}
	}

	 public function addRegEXP($route,$params){
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}

	 public function matchRoute(){ 
		$url = trim($_SERVER['REQUEST_URI'], '/');
		$url = strtok($url, '?');
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url,$matches)) {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	 public function runRouter(){
	 	if ($this->matchRoute()) {
	 		$path = 'Application\controllers\\'.ucfirst($this->params['controller']).'Controller';
	 		if (class_exists($path)) {
	 			$action = $this->params['action'].'Action';
	 			if (method_exists($path, $action )) {
	 				$controller = new $path($this->params);
	 				// var_dump($controller);
	 				$controller->$action();
	 			}else{
	 				View::errorCode(404);
	 			}
	 		}else{
	 			View::errorCode(404);
	 		}
	 		
	 	}else{
	 		View::errorCode(404);
	 	}
	}
}







 ?>