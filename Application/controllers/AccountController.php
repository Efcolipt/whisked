<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;
use Application\core\View;

class AccountController extends  Controller {

	public function loginAction()
	{
		$vars = $this->model->auth();
		$this->view->render('Авторизация',$vars);
	}


	public function registerAction()
	{
		$vars = $this->model->registration();
		$this->view->render('Регистрация',$vars);
	}

	public function logoutAction()
	{
		$this->model->logout();
	}
	public function userAction()
	{
		$this->view->render(ucfirst($this->route['user']));
	}
}
 ?>
