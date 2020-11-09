<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\Lib\Db; 

class MoviesController extends  Controller{
	
	public function indexAction()
	{	

		$vars = [];
		$db = new Db;
		$params = [];

		$pageCurrent = intval((isset($_GET['page'])) ? $_GET['page'] : 1);


		$listMovies = 'https://api.themoviedb.org/3/movie/popular?api_key='.Controller::apiToken.'&language=ru-RU&page='.$pageCurrent;

		$listMovies = @file_get_contents($listMovies);
		$dataListMovies = json_decode($listMovies);

		if( $listMovies != false && !is_null($dataListMovies)){
			$pageAll = $dataListMovies->total_pages;
			$vars =[
				'listMovies' => $dataListMovies,
				'pageAll' => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
		}
		
		$this->view->render('Фильмы',$vars);

	}



}
 ?>