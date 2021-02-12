<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Helper;
use Application\core\View;

class MainController extends  Controller{

	public function homeAction()
	{
		$upcoming = Helper::getContentWithBuildQuery($this->urlContentMain,['token'=> $this->urlTokenContent, 'type'=>'film','year'=>'2020','resolution'=>'2160']);
		$serials = Helper::getContentWithBuildQuery($this->urlContentMain,['token'=> $this->urlTokenContent, 'type'=>'serial','year'=>'2020','resolution'=>'1080']);
		$anime = Helper::getContentWithBuildQuery($this->urlContentMain,['token'=> $this->urlTokenContent, 'type'=>'film','year'=>'2019','cat'=>'аниме']);
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
		$vars = $this->model->contact();
		debug($vars);
		$this->view->render('Контакты',$vars);
	}

	public function qualityAction()
	{
		$this->view->render('Качество видео');
	}

}
 ?>
