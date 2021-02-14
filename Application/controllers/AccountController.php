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
		$vars = [
			'user' => $this->model->getUser($_SESSION['user']['login'])[0],
			'ip' => $getInfomationPerson->ip,
			'browser' => $getInfomationPerson->browser,
			'system' => $getInfomationPerson->operating_system,
			'systemVer' => $getInfomationPerson->os_version,
		];
		if ($vars['user']['login'] != Helper::filterString($this->route['user']) && (!$vars['user']['isAdmin']))   View::errorCode(403);
		$this->view->render("Профиль пользователя",$vars);
	}
}
 ?>
