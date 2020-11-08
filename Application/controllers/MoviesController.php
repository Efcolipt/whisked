<?php 

namespace Application\controllers; 

use Application\core\Controller; 
use Application\lib\Db; 

class MoviesController extends  Controller{
	
	public function indexAction()
	{	

		// $vars = [
		// 	'name'=>'Вася',
		// 	'Age'=> '88',
		// 	'array'=>[1,2,3],
		// ];
		
		$db = new Db;
		$params = [];

		$listMovies = 'https://api.themoviedb.org/3/movie/popular?api_key='.Controller::apiToken.'&language=ru-RU&page=1';
	
		$this->view->render('Фильмы',$vars );

	}



}
 ?>