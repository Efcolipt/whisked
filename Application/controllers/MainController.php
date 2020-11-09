<?php 

namespace Application\controllers; 

use Application\core\Controller; 
use Application\lib\Db; 

class MainController extends  Controller{
	
	public function indexAction()
	{	

		
		
		$db = new Db;
		$params = [];
		$vars = [];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;
		
		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);
		
		$upcomingMovies = 'https://api.themoviedb.org/3/movie/upcoming?api_key='.Controller::apiToken.'&language=ru-RU&page=1';
		$topMovies = 'https://api.themoviedb.org/3/movie/top_rated?api_key='.Controller::apiToken.'&language=ru-RU&page=1';
		
		$topMovies = @file_get_contents($topMovies);
		$upcomingMovies = @file_get_contents($upcomingMovies);

		$dataTopMovies = json_decode($topMovies);
		$dataUpcomingMovies = json_decode($upcomingMovies);


		if( $topMovies != false && !is_null($dataTopMovies)){
			array_push($vars,$dataTopMovies);
		}


		if( $upcomingMovies != false && !is_null($dataUpcomingMovies)){
			array_push($vars,$dataUpcomingMovies);
		}
		
		// debug($dataUpcomingMovies);
		// debug($dataTopMovies);
		
		$this->view->render('Главная',$vars );

	}



}
 ?>