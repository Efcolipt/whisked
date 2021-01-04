<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\lib\Db;
use Application\lib\Helper;
use Application\core\View;

class CollectionController extends  Controller{

	public function serialsAction()
	{

				$vars = [];
				$pageCurrent = (isset($_GET['page']) && intval($_GET['page']) > 0)  ? intval($_GET['page']) : 1;
				$helper = new Helper;
				$info  = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=serial&page='.$pageCurrent);
				if($info){
					$vars = [
						'pageCurrent' => $pageCurrent,
						'info' 			=> $info->results,
					];
				}else{
					 View::errorCode(404);
				}
				$this->view->render('Сериалы',$vars);
	}


	public function moviesAction()
	{
		$vars = [];
		$pageCurrent = (isset($_GET['page']) && intval($_GET['page']) > 0)  ? intval($_GET['page']) : 1;
		$helper = new Helper;
		$info  = $helper->getContent('https://bazon.cc/api/json?token='.Controller::tokenDB.'&type=film&page='.$pageCurrent);

		if($info){
			$vars = [
				'pageCurrent' => $pageCurrent,
				'info' 			=> $info->results,
			];
		}else{
			 View::errorCode(404);
		}
		$this->view->render('Фильмы',$vars);
	}

	public function searchAction()
	{

		$vars = [];
		$helper = new Helper;
		$query = !empty($_GET['q']) ? strip_tags($_GET['q']) : false;
		$title = $query;
		if ($query) {
			$query = http_build_query(array('query' => $query));
			$info = $helper->getContent('https://bazon.cc/api/search?token='.Controller::tokenDB.'&title='.$query);
			$vars['info'] = $info ? $info->results : "";
		}else{
			View::errorCode(404);
		}
		$this->view->render('Поиск по запросу '.$title,$vars);
	}

}
 ?>
