<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\Lib\Db; 

class MoviesController extends  Controller{
	
	public function indexAction()
	{	

		$vars   = [];
		$db     = new Db;
		$params = [];

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