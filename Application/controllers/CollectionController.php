<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;
use Application\core\View;

class CollectionController extends  Controller{


	public function serialsAction()
	{

		$vars = [];

		$helper = new helper;
		$pageCurrent = (isset($_GET['page']) && intval($_GET['page']) > 0)  ? intval($_GET['page']) : 1;
		$listSerials = $helper->getContent("https://api.themoviedb.org/3/tv/popular?api_key=".Controller::apiTokenDB."&language=ru-RU&page=".$pageCurrent."&append_to_response=imdb_id");

		if($listSerials){
			$pageAll = $listSerials->total_pages;
			$vars = [
				'pageAll'     => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
			$vars['results'] = $this->model->reDataSerials($listSerials->results);
		}

		$this->view->render('Сериалы',$vars);
	}


	public function moviesAction()
	{

		$vars = [];
		$pageCurrent = (isset($_GET['page']) && intval($_GET['page']) > 0)  ? intval($_GET['page']) : 1;
		$helper = new Helper;
		$listMovies  = $helper->getContent('https://api.themoviedb.org/3/movie/popular?api_key='.Controller::apiTokenDB.'&language=ru-RU&limit=10&page='.$pageCurrent);
		if($listMovies){
			$pageAll = $listMovies->total_pages;
			$vars = [
				'pageAll'     => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
			$vars['results'] = $this->model->reDataMovies($listMovies->results);
		}

		$this->view->render('Фильмы',$vars);

	}

	public function searchAction()
	{

		$vars = [];
		$helper = new Helper;

		$query = !empty($_POST['query']) ? strip_tags($_POST['query']) : "";

		$title = $query;

		if (!empty($query)) {
			$query = http_build_query(array('query' => $query));
			$query = $helper->getContent('https://api.themoviedb.org/3/search/multi?api_key='.Controller::apiTokenDB.'&language=ru-RU&'.$query);
			if (!empty($query->results)) {
				$vars['results'] = $this->model->reDataSearch($query->results);
			}else{
				$vars['results'] = NULL;
			}
		}else{
			View::errorCode(404);
		}


		$this->view->render('Поиск по запросу '.$title,$vars);
	}

}
 ?>
