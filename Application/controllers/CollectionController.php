<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class CollectionController extends  Controller{


	public function moviesAction()
	{
		(isset($_GET['page'])) ? $page = Helper::filterNumber($_GET['page']) : $page = 1;
		$info = Helper::getContent($this->urlContentMain,['token' => $this->urlTokenContent,'type'=>'film','page'=> $page]);
		$info ? $vars = ['page' =>  $page,'info'	=> $info['results'], 'pageLast' => 500] : View::errorCode(404);
		$this->view->render('Фильмы',$vars);
	}

	public function serialsAction()
	{
		(isset($_GET['page'])) ? $page = Helper::filterNumber($_GET['page']) : $page = 1;
		$info = Helper::getContent($this->urlContentMain,['token' => $this->urlTokenContent,'type'=>'serial','page'=>  $page]);
		$info ? $vars = ['page' =>  $page,'info'	=> $info['results'], 'pageLast' => 500] : View::errorCode(404);
		$this->view->render('Сериалы',$vars);
	}

	public function animeAction()
	{
		(isset($_GET['page'])) ? $page = Helper::filterNumber($_GET['page']) : $page = 1;
		$info = Helper::getContent($this->urlContentMain,['token' => $this->urlTokenContent,'type'=>'film','cat'=>'аниме','page'=>  $page]);
		$info ? $vars = ['page' =>  $page,'info'	=> $info['results'], 'pageLast' => 500] : View::errorCode(404);
		$this->view->render('Аниме',$vars);
	}


	public function searchAction()
	{
		isset($_GET['q']) ? $query = Helper::filterString($_GET['q']) : View::errorCode(404);
		$info = Helper::getContent($this->urlContentSearch,['token'=> $this->urlTokenContent, 'title' => $query]);
		$this->view->render('Поиск по запросу '.$query, $vars = [
			'info' => $info['results']
		]);
	}

}
 ?>
