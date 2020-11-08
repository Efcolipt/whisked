<?php 

namespace Application\controllers; 

use Application\core\Controller; 
use Application\lib\Db; 

class SerialsController extends  Controller{
	
	public function indexAction()
	{	

		$vars = [
			'name'=>'Вася',
			'Age'=> '88',
			'array'=>[1,2,3],
		];
		
		$db = new Db;
		$params = [];

		$listSerials = "https://api.themoviedb.org/3/tv/popular?api_key=".Controller::apiToken."&language=ru-RU&page=1&append_to_response=imdb_id";

		$listSerials = @file_get_contents($listSerials);
		$dataListSerials = json_decode($listSerials);

		// if( $listSerials != false && !is_null($dataListSerials)){
		//     foreach($dataListSerials as $k => $e){
		//         echo '<p>'  . $e . '</p>';
		//     }
		// }
		// debug($dataListSerials);
		
		$this->view->render('Сериалы',$vars );
	}


}
 ?>