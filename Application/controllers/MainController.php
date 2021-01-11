<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Helper;
use Application\core\View;

class MainController extends  Controller{

	public function homeAction()
	{
		$helper = new Helper;
		$upcoming = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=film&year=2020&resolution=2160');
		$serials = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=serial&year=2020&resolution=1080');
		$anime = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=film&year=2019&cat=аниме');
		$upcoming ? $vars['upcoming'] = $upcoming->results : View::errorCode(404);
		$serials ? $vars['serials'] = $serials->results : View::errorCode(404);
		$anime ? $vars['anime'] = $anime->results : View::errorCode(404);
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
