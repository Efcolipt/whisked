<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\Core\View;

class WatchController extends  Controller{
	
	public function movieAction()
	{	

		$movie  =  isset($_GET['q']) ? $_GET['q'] : 0;
		$vars   = [];

		if (!empty($movie) && $movie > 0) {
			$movieInfo = Controller::getContent('https://api.themoviedb.org/3/movie/'.$movie.'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
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
				if ($movieVideo != false && !empty($movieVideo->data)) {
					$vars['video'] = $movieVideo->data[0]->iframe_src;
				}else{
					$vars['video'] = NULL;
				}
			}
		}else{
			View::errorCode(480);
		}
		

		if (!count($vars)) {
			View::errorCode(480);
		}


		$this->view->render(isset($vars['title']) ? $vars['title'] : 'Смотреть',$vars);
	}

	public function serialAction()
	{
		
		$serial  =  isset($_GET['q']) ? $_GET['q'] : 0;
		$vars    = [];

		if( !empty($serial) && $serial > 0 ){
			$serialInfo = Controller::getContent('https://api.themoviedb.org/3/tv/'.$serial.'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
			$imdb_id = Controller::getContent("https://api.themoviedb.org/3/tv/".$serial."/external_ids?api_key=".Controller::apiTokenDB);

			if($serialInfo != false && $imdb_id != false){
				$serialVideo = Controller::getContent("https://videocdn.tv/api/short?imdb_id=".$imdb_id->imdb_id."&api_token=".Controller::apiTokenVideo);
					$vars = [
						'poster'       => $serialInfo->poster_path,
						'title'        => $serialInfo->name,
						'average'      => $serialInfo->vote_average,
						'date'         => $serialInfo->first_air_date,
						'desctiption'  => $serialInfo->overview,
						'genres'       => $serialInfo->genres,
						'episodes_run' => $serialInfo->episode_run_time,
						'seasons'      => $serialInfo->number_of_seasons,
						'episodes'     => $serialInfo->number_of_episodes,
					];
				if ($serialVideo != false  && !empty($serialVideo->data)) {
					$vars['video'] = $serialVideo->data[0]->iframe_src;
				}else{
					$vars['video'] = NULL;
				}
			}
		}else{
			View::errorCode(480);
		}

		if (!count($vars)) {
			View::errorCode(480);
		}

		$this->view->render(isset($vars['title']) ? $vars['title'] : 'Смотреть',$vars);
	}
	

}
 ?>