<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class WatchController extends  Controller{

	public function watchingAction()
	{
		$helper = new Helper;
		$q  		= strip_tags(htmlspecialchars($this->route['q']));
		$vars   = [];
		if (!empty($q) && $q > 0 && !is_int($q)) {
			$info = $helper->getContent('https://bazon.cc/api/search?token='.Controller::tokenDB.'&kp='.$q);
			if ($info) {
					$vars['info'] = $info->results[0];
			}else{
				View::errorCode(404);
			}
		}else{
			View::errorCode(404);
		}

		$this->view->render("Смотреть ".$vars['info']->info->rus,$vars);
	}
}
 ?>
