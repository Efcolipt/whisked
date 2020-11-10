<?php 

namespace Application\Controllers; 

use Application\Core\Controller; 
use Application\lib\Db; 

class MainController extends  Controller{
	
	public function indexAction()
	{	

		
		
		$db     = new Db;
		$params = [];
		$vars   = [];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;
		
		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);
		
		$upcomingMovies = Controller::getContent('https://api.themoviedb.org/3/movie/upcoming?api_key='.Controller::apiTokenDB.'&language=ru-RU&page=1');
		$topMovies      = Controller::getContent('https://api.themoviedb.org/3/movie/top_rated?api_key='.Controller::apiTokenDB.'&language=ru-RU&page=1');
		
		if( $topMovies != false){
			$vars['topMovies'] = $topMovies;
		}

		if( $upcomingMovies != false){
			$vars['upcomingMovies'] = $upcomingMovies;
		}
		
		
		$this->view->render('Главная',$vars );

	}



}
 ?>