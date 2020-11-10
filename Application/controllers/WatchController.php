<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\lib\Db; 

class WatchController extends  Controller{
	
	public function indexAction()
	{	

		
		
		$db     = new Db;
		$params = [];
		$vars   = [];

		$movie  =  isset($_GET['movie']) ? true : false;
		$serial = isset($_GET['serial']) ? true : false;
		

		if ((isset($movie) && $movie == true && is_bool($movie)) && ( (!isset($serial) || $serial == false ) && is_bool($serial))) {
			$movieInfo = Controller::getContent('https://api.themoviedb.org/3/movie/'.$this->route['id'].'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
			if ($movieInfo != false) {
				$movieVideo = Controller::getContent("https://videocdn.tv/api/short?imdb_id=".$movieInfo->imdb_id."&api_token=".Controller::apiTokenVideo);
					$vars = [
						'poster'      => $movieInfo->poster_path,
						'title'       => $movieInfo->title,
						'average'     => $movieInfo->vote_average,
						'date'        => $movieInfo->release_date,
						'desctiption' => $movieInfo->overview,
						'genres'      => $movieInfo->genres,
						'budget'      => $movieInfo->budget,
						'companies'   => $movieInfo->production_countries,
					];
				if ($movieVideo != false && sizeof($movieVideo->data)) {
					$vars['video'] = $movieVideo->data[0]->iframe_src;
				}
			}
		}else if(( (!isset($movie) || $movie == false) && is_bool($movie)) && (isset($serial) && $serial == true && is_bool($serial))){
			$serialInfo = Controller::getContent('https://api.themoviedb.org/3/tv/'.$this->route['id'].'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
			$imdb_id = Controller::getContent("https://api.themoviedb.org/3/tv/".$this->route['id']."/external_ids?api_key=".Controller::apiTokenDB);

			if($serialInfo != false && $imdb_id != false){
				$serialVideo = Controller::getContent("https://videocdn.tv/api/short?imdb_id=".$imdb_id->imdb_id."&api_token=".Controller::apiTokenVideo);
					$vars = [
						'video'        => $serialVideo->data[0]->iframe_src,
						'poster'       => $serialInfo->poster_path,
						'title'        => $serialInfo->name,
						'average'      => $serialInfo->vote_average,
						'date'         => $serialInfo->first_air_date,
						'desctiption'  => $serialInfo->overview,
						'genres'       => $serialInfo->genres,
						'episodes_run' => $serialInfo->episode_run_time[0],
						'seasons'      => $serialInfo->number_of_seasons,
						'episodes'     => $serialInfo->number_of_episodes,
					];
				if ($serialVideo != false  && sizeof($serialVideo->data)) {
					$vars['video'] = $serialVideo->data[0]->iframe_src;
				}
			}
		}else{
			$this->view->redirect('home');
		}

		$this->view->render(isset($vars['title']) ? $vars['title'] : 'Смотреть',$vars);
	}



}
 ?>