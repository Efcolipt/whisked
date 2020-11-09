<?php 

namespace Application\controllers; 

use Application\core\Controller; 
use Application\lib\Db; 

class SerialsController extends  Controller{
	
	public function indexAction()
	{	

		$vars = [];
		
		$db = new Db;
		$params = [];
		$pageCurrent = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$listSerials = "https://api.themoviedb.org/3/tv/popular?api_key=".Controller::apiToken."&language=ru-RU&page=".$pageCurrent."&append_to_response=imdb_id";

		$listSerials = @file_get_contents($listSerials);
		$dataListSerials = json_decode($listSerials);

		if( $listSerials != false && !is_null($dataListSerials)){
			$pageAll = $dataListSerials->total_pages;
			$vars =[
				'listSerials' => $dataListSerials,
				'pageAll' => $pageAll,
				'pageCurrent' => $pageCurrent,
			];
		}
		
		$this->view->render('Сериалы',$vars);
	}

}
 ?>