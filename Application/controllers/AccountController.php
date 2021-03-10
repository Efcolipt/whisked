<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;
use Application\lib\GetInfomationPerson;
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

	public function profileAction()
	{
		$infomationPerson = new GetInfomationPerson;
		$this->view->render("Профиль пользователя",$vars = [
			'MessageError' => $this->model->profileEditInfo(),
			'user' => $_SESSION['user'],
			'ip' => $infomationPerson->ip,
			'browser' => $infomationPerson->browser,
			'os' => $infomationPerson->operating_system,
			'osVersion' => $infomationPerson->os_version,
		]);
	}

	public function historyAction()
	{
		$this->view->render("История",$vars = []);
	}
}
 ?>
