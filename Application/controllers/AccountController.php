<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;
use Application\core\View;

class AccountController extends  Controller {

	public function loginAction()
	{
		$vars = [];
		$db = new Db;
		$vars = $this->model->auth();
		$this->view->render('Авторизация',$vars);
	}


	public function registerAction()
	{
		$vars = [];
		$db = new Db;
		$vars = $this->model->registration();
		$this->view->render('Регистрация',$vars);
	}

	public function logoutAction()
	{

		$db = new Db;
		isset($_SESSION['user']['login']) ? $params = ['login' => $_SESSION['user']['login']] : View::errorCode(403);
		session_destroy();
		$cookie_token = $db->query("UPDATE users SET cookie_token = '' WHERE login = :login",$params);
		if ($cookie_token) setcookie("cookie_token", "", time() - 3600,"/");
    View::redirect();
	}
	public function userAction()
	{
		$db = new Db;
		$params = ['login' => filter_var($this->route['user'], FILTER_SANITIZE_STRING)];
		$query = $db->row('SELECT * FROM users WHERE login = :login',$params);
		if ($query) {
			$vars['user'] = $query[0];
			(!empty($_SESSION['user']['id']) && $_SESSION['user']['id'] == $vars['user']['id']) ? $this->view->render('Страница пользователя',$vars) : View::errorCode(403);
		}else{
			View::errorCode(403);
		}
	}
}
 ?>
