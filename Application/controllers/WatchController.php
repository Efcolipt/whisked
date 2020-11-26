<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class WatchController extends  Controller{

	public function movieAction()
	{
		$helper = new Helper;
		$movie  =  (!empty($_GET['q']) && !is_int($_GET['q'])) ? $_GET['q'] : 0;
		$vars   = [];
		if (!empty($movie) && $movie > 0) {
			$movieInfo = $helper->getContent('https://api.themoviedb.org/3/movie/'.$movie.'?api_key='.Controller::apiTokenDB.'&language=ru-RU');
			if ($movieInfo) {
				$movieVideo = $helper->getContent("https://videocdn.tv/api/short?imdb_id=".$movieInfo->imdb_id."&api_token=".Controller::apiTokenVideo);
					$vars = [
						'poster'      => $movieInfo->poster_path,
						'backdrop'    => $movieInfo->backdrop_path,
						'title'       => $movieInfo->title,
						'average'     => $movieInfo->vote_average,
						'date'        => $movieInfo->release_date,
						'description' => $movieInfo->overview,
						'genres'      => $movieInfo->genres,
						'budget'      => $movieInfo->budget,
						'companies'   => $movieInfo->production_countries,
					];
				if ($movieVideo && !empty($movieVideo->data)) {
					$vars['video'] = $movieVideo->data[0]->iframe_src;
					$vars['id'] = $movieVideo->data[0]->id;
				}else{
					$vars['video'] = NULL;
					$vars['id'] = NULL;
				}
			}else{
				View::errorCode(404);
			}
		}else{
			View::errorCode(404);
		}



		$this->view->render(isset($vars['title']) ? $vars['title'] : 'Смотреть',$vars);
	}

	public function serialAction()
	{

		$serial  =  (!empty($_GET['q'])  && !is_int($_GET['q'])) ? $_GET['q'] : 0;
		$vars    = [];
		$helper = new Helper;
		if( !empty($serial) && $serial > 0 ){
			$serialInfo = $helper->getContent('https://api.themoviedb.org/3/tv/'.$serial.'?api_key='.Controller::apiTokenDB.'&language=ru-RU&append_to_response=external_ids');
			if($serialInfo != false){
				$serialVideo = $helper->getContent("https://videocdn.tv/api/short?imdb_id=".$serialInfo->external_ids->imdb_id."&api_token=".Controller::apiTokenVideo);
					$vars = [
						'poster'       => $serialInfo->poster_path,
						'title'        => $serialInfo->name,
						'average'      => $serialInfo->vote_average,
						'date'         => $serialInfo->first_air_date,
						'description'  => $serialInfo->overview,
						'genres'       => $serialInfo->genres,
						'episodes_run' => $serialInfo->episode_run_time,
						'seasons'      => $serialInfo->number_of_seasons,
						'episodes'     => $serialInfo->number_of_episodes,

					];
				if ($serialVideo != false  && !empty($serialVideo->data)) {
					$vars['video'] = $serialVideo->data[0]->iframe_src;
					$vars['id']    = $serialVideo->data[0]->id;
				}else{
					$vars['video'] = NULL;
					$vars['id'] = NULL;
				}
			}else{
				View::errorCode(404);
			}
		}else{
			View::errorCode(404);
		}



		$this->view->render(isset($vars['title']) ? $vars['title'] : 'Смотреть',$vars);
	}


}
 ?>
