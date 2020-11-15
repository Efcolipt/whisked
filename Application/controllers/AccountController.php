<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;

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
		if (isset($_SESSION['user']['login'])) {
			$params = [
				'login' => $_SESSION['user']['login']
			];
		}else{
			header('Location: /');
		}

		session_destroy();
		$db = new Db;
		$cookie_token = $db->query("UPDATE users SET cookie_token = '' WHERE login = :login",$params);
		if ($cookie_token) {
        	setcookie("cookie_token", "", time() - 3600,"/");
		}
        echo("<script>location.href = '/';</script>");
	}
}
 ?>
