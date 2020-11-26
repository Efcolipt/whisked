<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;

class MainController extends  Controller{

	public function indexAction()
	{



		$db     = new Db;
		$helper = new Helper;
		$params = [];
		$vars   = [];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;

		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);

		$upcomingMovies = $helper->getContent('https://api.themoviedb.org/3/movie/upcoming?api_key='.Controller::apiTokenDB.'&language=ru-RU&page=1');
		$topMovies      = $helper->getContent('https://api.themoviedb.org/3/movie/top_rated?api_key='.Controller::apiTokenDB.'&language=ru-RU&page=1');

		if( $topMovies != false){
			$vars['topMovies'] = $this->model->reArray($topMovies->results,true);
		}

		if( $upcomingMovies != false){
			$vars['upcomingMovies'] = $this->model->reArray($upcomingMovies->results,true);
		}


		$this->view->render('Главная',$vars );

	}




}
 ?>
