<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class WatchController extends  Controller{

	public function watchingAction()
	{
			$info = Helper::getContent('https://bazon.cc/api/search?token='.Controller::tokenDB.'&kp='.$this->route['q']);
			$info ? $vars['info'] = $info->results[0] : View::errorCode(404);
			$this->view->render("Смотреть ".$vars['info']->info->rus,$vars);
	}
}
 ?>
