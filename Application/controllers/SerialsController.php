<?php 

namespace Application\controllers; 

use Application\Core\Controller; 

class SerialsController extends  Controller{
	
	public function indexAction()
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

}
 ?>