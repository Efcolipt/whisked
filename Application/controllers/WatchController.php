<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\lib\Db; 

class WatchController extends  Controller{
	
	public function indexAction()
	{	

		
		
		$db = new Db;
		$params = [];
		$vars = [];


		if ((isset($_GET['movie']) && $_GET['movie'] == true) && (!isset($_GET['serial']) || $_GET['serial'] == false)) {
			$movieInfo = $this->model->getContent('https://api.themoviedb.org/3/movie/'.$this->route['id'].'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
			if ($movieInfo != false) {
				$movieVideo = $this->model->getContent("https://videocdn.tv/api/short?imdb_id=".$movieInfo->imdb_id."&api_token=".Controller::apiTokenVideo);
				if ($movieVideo != false) {
					$vars = [
						'video' => $movieVideo,
						'data' => $movieInfo,
					];
				}else{
					$vars = [
						'video' => 500,
						'data' => $movieInfo,
					];
				}
			}
		}else if((!isset($_GET['movie']) || $_GET['movie'] == false) && (isset($_GET['serial']) && $_GET['serial'] == true)){
			$serialInfo = $this->model->getContent('https://api.themoviedb.org/3/tv/'.$this->route['id'].'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
			$imdb_id = $this->model->getContent("https://api.themoviedb.org/3/tv/".$this->route['id']."/external_ids?api_key=".Controller::apiTokenDB);

			if($serialInfo != false && $imdb_id != false){
				$serialVideo = $this->model->getContent("https://videocdn.tv/api/short?imdb_id=".$imdb_id->imdb_id."&api_token=".Controller::apiTokenVideo);
				if ($serialVideo != false) {
					$vars = [
						'video' => $serialVideo,
						'data' => $serialInfo,
					];
				}else{
					$vars = [
						'video' => 500,
						'data' => $serialInfo,
					];
				}
			}
		}else{
			$this->view->redirect('home');
		}

		
		$this->view->render('Смотреть',$vars );
	}



}
 ?>