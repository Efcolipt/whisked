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
	public function userAction()
	{
		$getInfomationPerson = new GetInfomationPerson;
		if ($_SESSION['user']['login'] != Helper::filterString($this->route['user']) && (!$_SESSION['user']['isAdmin']))   View::errorCode(403);
		$vars = [
			'MessageError' => $this->model->userEditInfo(),
			'user' => $this->model->getUser($_SESSION['user']['login'])[0],
			'ip' => $getInfomationPerson->ip,
			'browser' => $getInfomationPerson->browser,
			'system' => $getInfomationPerson->operating_system,
			'systemVer' => $getInfomationPerson->os_version,
		];
		$this->view->render("Профиль пользователя",$vars);
	}
}
 ?>
