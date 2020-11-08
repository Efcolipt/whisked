<?php 

namespace Application\controllers; 

use Application\core\Controller; 
use Application\lib\Db; 

class MoviesController extends  Controller{
	
	public function indexAction()
	{	

		$vars = [
			'name'=>'Вася',
			'Age'=> '88',
			'array'=>[1,2,3],
		];
		
		$db = new Db;
		$params = [];

		$listMovies = 'https://api.themoviedb.org/3/movie/popular?api_key='.Controller::apiToken.'&language=ru-RU&page=1';

		$listMovies = @file_get_contents($listMovies);
		$dataListMovies = json_decode($listMovies);


		// if( $listMovies != false && !is_null($dataListMovies)){
		//     foreach($dataListMovies as $k => $e){
		//         echo '<p>'  . $e . '</p>';
		//     }
		// }
		
		// debug($dataListMovies);
		$this->view->render('Фильмы',$vars );

	}



}
 ?>