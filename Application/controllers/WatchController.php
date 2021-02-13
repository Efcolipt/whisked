<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class WatchController extends  Controller{

	public function watchingAction()
	{
		isset($this->route['q']) ? $this->route['q'] = Helper::filterNumber($this->route['q']) : View::errorCode(404);
		$info = Helper::getContentWithBuildQuery($this->urlContentSearch, ['token' => $this->urlTokenContent,'kp' => $this->route['q']]);
		$info ?? View::errorCode(404);
		$this->view->render("Смотреть ",$info['results'][0]);
	}
}
 ?>
