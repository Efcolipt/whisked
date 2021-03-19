<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Helper;
use Application\core\View;

class MainController extends  Controller{

	// public function homeAction()
	// {
	// 	$upcoming = Helper::getContent($this->urlContentMain,['token'=> $this->urlTokenContent, 'type'=>'film','year'=>'2020','resolution'=>'2160']);
	// 	$serials = Helper::getContent($this->urlContentMain,['token'=> $this->urlTokenContent, 'type'=>'serial','year'=>'2020','resolution'=>'1080']);
	// 	$anime = Helper::getContent($this->urlContentMain,['token'=> $this->urlTokenContent, 'type'=>'film','year'=>'2019','cat'=>'аниме']);
	// 	if (!$upcoming || !$serials || !$anime)  View::errorCode(404);
	// 	$this->view->render('Главная',$vars = [
	// 		'upcoming' => $upcoming['results'],
	// 		'serials' => $serials['results'],
	// 		'anime' => $anime['results'],
	// 	]);
	// }


	public function rightAction()
	{
		$this->view->render('Правообладателям');
	}

	public function contactsAction()
	{
		$vars = $this->model->contact();
		$this->view->render('Контакты',$vars);
	}

	public function qualityAction()
	{
		$this->view->render('Качество видео');
	}

}
 ?>
