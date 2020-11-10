<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\PaginateNavigationBuilder;
use Application\lib\Db;

class LoginController extends  Controller {

	public function indexAction()
	{

		$vars = [];
		$db = new Db;
		$params = [];

		$pageCurrent = intval((isset($_GET['page'])) ? $_GET['page'] : 1);

		if(isset($_POST))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
		}

		$params = ['username' => "Me"];

		$this->view->render('Авторизация', $vars);
	}
}
 ?>
