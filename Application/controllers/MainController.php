<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Helper;
use Application\core\View;

class MainController extends  Controller{

	public function rightAction()
	{
		$this->view->render('Правообладателям | Whisked');
	}

	public function contactsAction()
	{
		$vars = $this->model->contact();
		$this->view->render('Контакты | Whisked',$vars);
	}

	public function qualityAction()
	{
		$this->view->render('Качество видео | Whisked');
	}

}
 ?>
