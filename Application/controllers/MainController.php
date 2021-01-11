<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;

class MainController extends  Controller{

	public function homeAction()
	{
		$helper = new Helper;
		$upcoming = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=film&page=1&year=2020&resolution=2160');
		$upcoming ? $vars['upcoming'] = $upcoming->results : View::errorCode(404);
		$this->view->render('Главная',$vars);
	}


	public function rightAction()
	{
		$this->view->render('Правообладателям');
	}

	public function contactsAction()
	{
		$this->view->render('Контакты');
	}

	public function qualityAction()
	{
		$this->view->render('Качество видео');
	}

}
 ?>
