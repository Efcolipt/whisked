<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;

class AccountController extends  Controller {

	public function loginAction()
	{

		$db = new Db;
		$result = $this->model->auth();
		var_dump($result);
		$this->view->render('Авторизация');
	}


	public function registerAction()
	{

		$db = new Db;
		$result = $this->model->registration();
		var_dump($result);
		$this->view->render('Регистрация');
	}
	
	public function logoutAction()
	{
		session_destroy();
		header("Location:/");
	}
}
 ?>
