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
		if ($_SESSION['user']['login'] != Helper::filterString($this->route['user'])) View::errorCode(403);
		if (empty($_SESSION['user']['poster_path']))  $_SESSION['user']['poster_path'] = 'public/images/default/users/no-img.jpg';
		$vars = [
			'MessageError' => $this->model->userEditInfo(),
			'user' => $_SESSION['user'],
			'ip' => $getInfomationPerson->ip,
			'browser' => $getInfomationPerson->browser,
			'system' => $getInfomationPerson->operating_system,
			'systemVer' => $getInfomationPerson->os_version,
		];
		$this->view->render("Профиль пользователя",$vars);
	}
}
 ?>
