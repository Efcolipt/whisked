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
		$this->view->render('Авторизация | Whisked',$vars = $this->model->auth());
	}


	public function registerAction()
	{
		$this->view->render('Регистрация | Whisked',$vars = $this->model->registration());
	}

	public function logoutAction()
	{
		$this->model->logout();
	}

	public function profileAction()
	{
		$infomationPerson = new GetInfomationPerson;
		$this->view->render("Профиль пользователя | Whisked",$vars = [
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
		$this->view->render("История | Whisked",$vars = []);
	}
}
 ?>
