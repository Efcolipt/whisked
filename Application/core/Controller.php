<?php 

namespace Application\Core; 

use Application\Core\View;
use Application\lib\Db;

abstract class Controller {
	
	public $route;
	public $view;
	const apiTokenDB = "a74fc0e2e97b235f41c374ac30a95209";
	const apiTokenVideo = "05kYgyT9G4Z2hggKfwX0hDgbAeUrJumY098";


	public function __construct($route){
		$this->route = $route;
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);

	}

	public function loadModel($name){
		$path = 'Application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}


	public function getContent($path = '')
	{
		$content = @file_get_contents($path);
	    $dataContent = json_decode($content);
	    if ($content != false && !is_null($dataContent)) {
	    	return $dataContent;
	    }
	    return false;
	}

	
}

 ?>