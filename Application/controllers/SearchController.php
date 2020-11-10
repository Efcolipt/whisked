<?php 

namespace Application\controllers; 

use Application\Core\Controller; 
use Application\Lib\Db; 

class SearchController extends  Controller{
	
	public function indexAction()
	{	

		$vars = [];

		$query = strip_tags($_POST['query']);
		$title = $query;
		if (isset($query)) {
			$query = http_build_query(array('query' => $query));
			$query =Controller::getContent('https://api.themoviedb.org/3/search/multi?api_key='.Controller::apiTokenDB.'&language=ru-RU&'.$query);
			if (sizeof($query->results)) {
				$vars['results'] = $query->results;
			}
		}
		debug($vars['results']);
		$this->view->render('Поиск по запросу '.$title,$vars);
	}

}
 ?>