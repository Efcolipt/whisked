<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class CollectionController extends  Controller{


	public function moviesAction()
	{
		$this->view->render('Смотреть фильмы онлайн в хорошем качестве | Whisked');
	}

	public function serialsAction()
	{
		$this->view->render('Смотреть сериалы онлайн в хорошем качестве | Whisked');
	}

	public function animeAction()
	{
		$this->view->render('Смотреть аниме онлайн в хорошем качестве | Whisked');
	}


}
 ?>
