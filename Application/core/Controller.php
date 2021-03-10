<?php

namespace Application\core;

use Application\core\View;
use Application\lib\Db;
use Application\lib\Helper;

abstract class Controller {

	public $route;
	public $view;
	public $acl;

	public $urlTokenContent  = "7250d60740fc5811592ea4fcf893239f";
	public $urlContentMain   = "https://bazon.cc/api/json";
	public $urlContentSearch = "https://bazon.cc/api/search";


	public function __construct($route){
		Helper::genereteCsrf();
		Helper::setTimeEnter();
		self::checkAuth();

		$this->route = $route;
		$this->view = new View($route);
		if(!$this->checkAcl()) View::errorCode(403);
		$this->model = $this->loadModel($route['controller']);
	}


	public function loadModel($name){
		$path = 'Application\models\\'.ucfirst($name);
		if (class_exists($path)) return new $path;
	}





	public function checkAcl()
	{
		$this->acl = require dirname(__DIR__,2).'/Application/acl/'.$this->route['controller'].'.php';
		if ($this->isAcl('all')) return true;
		elseif(empty($_SESSION['user']['id']) and $this->isAcl('guest')) return true;
		elseif (!empty($_SESSION['user']['isAdmin'])) return true;
		elseif(!empty($_SESSION['user']['id']) and $this->isAcl('authorize')) return true;
		return false;
	}

	public function isAcl($key)
	{
		return in_array($this->route['action'], $this->acl[$key]);
	}

	public static function checkAuth()
	{
		$db = new Db();
		if (isset($_COOKIE['cookie_token']) && !isset($_SESSION['user'])) {
			$user = $db->row("SELECT * FROM users WHERE cookie_token = :cookie_token",[
				'cookie_token' => $_COOKIE['cookie_token']
			]);
			if($user) $_SESSION['user'] = $user[0];
		}
	}


}

 ?>
