<?php 

namespace Application\core; 

use Application\core\View;
use Application\lib\Db;
use Application\lib\Helper;

abstract class Controller {
	
	public $route;
	public $view;
	public $acl;
	const apiTokenDB = "a74fc0e2e97b235f41c374ac30a95209";
	const apiTokenVideo = "05kYgyT9G4Z2hggKfwX0hDgbAeUrJumY098";


	public function __construct($route){
		$this->route = $route;
		Helper::checkAuth();
		if(!$this->checkAcl()){
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name){
		$path = 'Application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl()
	{
		$this->acl = require dirname(__DIR__,2).'/Application/acl/'.$this->route['controller'].'.php';
		if ($this->isAcl('all')) {
			return true;
		}elseif(empty($_SESSION['user']['id']) and $this->isAcl('guest')){
			return true;
		}elseif(!empty($_SESSION['user']['id']) and $this->isAcl('authorize')){
			return true;
		}elseif(!empty($_SESSION['admin']['id']) and $this->isAcl('admin')){
			return true;
		}

		return false;
	}

	public function isAcl($key)
	{
		return in_array($this->route['action'], $this->acl[$key]);
	}
	
}

 ?>