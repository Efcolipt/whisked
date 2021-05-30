<?php

namespace Application\controllers;

use Application\core\Controller;
use Application\core\View;
use Application\lib\Helper;

class WatchController extends  Controller{

	public function watchingAction()
	{
		isset($this->route['q']) ? $this->route['q'] = Helper::filterNumber($this->route['q']) : View::errorCode(404);
		$info = Helper::getContent($this->urlContentSearch, ['token' => $this->urlTokenContent,'kp' => $this->route['q']]);
		if (!$info) View::errorCode(404);
		$this->view->render("Смотреть ".$info['results'][0]['info']['rus']." в хорошем качестве | Whisked", $info['results'][0]);
	}
}
 ?>
