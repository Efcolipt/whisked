<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\lib\Db; 
use Application\lib\Helper; 

class CollectionController extends  Controller{
	
	
	public function serialsAction()
	{	

		$vars = [];

		$helper = new helper;
		$pageCurrent = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$listSerials = $helper->getContent("https://api.themoviedb.org/3/tv/popular?api_key=".Controller::apiTokenDB."&language=ru-RU&page=".$pageCurrent."&append_to_response=imdb_id");

		if($listSerials != false){
			$pageAll = $listSerials->total_pages;
			$vars = [
				'pageAll'     => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
			$vars['results'] = $this->model->reArray($listSerials->results,true);
		}
		
		$this->view->render('Сериалы',$vars);
	}

	
	public function moviesAction()
	{	

		$vars = [];

		$pageCurrent = intval((isset($_GET['page'])) ? $_GET['page'] : 1);

		$helper = new Helper;
		$listMovies  = $helper->getContent('https://api.themoviedb.org/3/movie/popular?api_key='.Controller::apiTokenDB.'&language=ru-RU&page='.$pageCurrent);

		if($listMovies != false){
			$pageAll = $listMovies->total_pages;
			$vars = [
				'pageAll'     => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
			$vars['results'] = $this->model->reArray($listMovies->results,false);
		}

		$this->view->render('Фильмы',$vars);

	}


}
 ?>