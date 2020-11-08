<?php 

namespace Application\controllers; 

use Application\core\Controller; 
use Application\lib\Db; 

class MainController extends  Controller{
	
	public function indexAction()
	{	

		// $vars = [
		// 	'name'=>'Вася',
		// 	'Age'=> '88',
		// 	'array'=>[1,2,3],
		// ];
		
		$db = new Db;
		$params =[];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;
		
		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);
		
		$upcomingMovies = 'https://api.themoviedb.org/3/movie/upcoming?api_key='.Controller::apiToken.'&language=ru-RU&page=1';
		$topMovies = 'https://api.themoviedb.org/3/movie/top_rated?api_key='.Controller::apiToken.'&language=ru-RU&page=1';
		
		$this->view->render('Главная',$vars );

	}



}
 ?>