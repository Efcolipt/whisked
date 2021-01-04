<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;

class MainController extends  Controller{

	public function homeAction()
	{



		$db     = new Db;
		$helper = new Helper;
		$params = [];
		$vars   = [];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;

		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);

		// $upcomingMovies = $helper->getContent('https://api.themoviedb.org/3/movie/upcoming?api_key='.Controller::apiTokenDB.'&language=ru-RU&page=1');
		$upcoming = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=film&page=1&year=2020&resolution=2160');
		if($upcoming){
			$vars['upcoming'] = $upcoming->results;
		}else{
				View::errorCode(404);
		}

		// if( $upcomingMovies != false){
		// 	$vars['upcomingMovies'] = $this->model->reArray($upcomingMovies->results);
		// }


		$this->view->render('Главная',$vars);

	}




}
 ?>
