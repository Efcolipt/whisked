<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\lib\Db; 

class CollectionController extends  Controller{
	
	
	public function serialsAction()
	{	

		$vars = [];


		$pageCurrent = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$listSerials = Controller::getContent("https://api.themoviedb.org/3/tv/popular?api_key=".Controller::apiTokenDB."&language=ru-RU&page=".$pageCurrent."&append_to_response=imdb_id");

		if( $listSerials != false){
			$pageAll = $listSerials->total_pages;
			$vars = [
				'listSerials' => $listSerials,
				'pageAll'     => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
		}
		
		$this->view->render('Сериалы',$vars);
	}

	
	public function moviesAction()
	{	

		$vars = [];

		$pageCurrent = intval((isset($_GET['page'])) ? $_GET['page'] : 1);


		$listMovies  = Controller::getContent('https://api.themoviedb.org/3/movie/popular?api_key='.Controller::apiTokenDB.'&language=ru-RU&page='.$pageCurrent);

		if($listMovies != false){
			$pageAll = $listMovies->total_pages;
			$vars = [
				'listMovies'  => $listMovies,
				'pageAll'     => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
		}
		$this->view->render('Фильмы',$vars);

	}


}
 ?>