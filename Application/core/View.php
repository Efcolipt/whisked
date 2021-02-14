<?php

namespace Application\core;

class View {

	public $path;
	public $route;
	public $layout = 'default';


	public function __construct($route){
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];

		$closed = require dirname(__DIR__,2).'/Application/config/closed.php';
		if (in_array($this->path, $closed)) $this->pageClosed();
	}

 	public function render($title,$vars = []){
	 	extract($vars);
	 	$path = dirname(__DIR__,2).'/Application/views/'.$this->path.'.php';
	 	if (file_exists($path)) {
			$lastEnter = isset($_COOKIE['lastEnter']) ? $_COOKIE['lastEnter'] : "";
			setcookie('lastEnter', date('Y-m-d H:i:s'), time()+3600*24*31, '/');
	 		ob_start();
	 		require $path;
	 		$content = ob_get_clean();
	 		require dirname(__DIR__,2).'/Application/views/layouts/'.$this->layout.'.php';

	 	} else{
	 		View::errorCode(404);
	 	}

 }
	public static function errorCode($code){
    http_response_code($code);
		$path = dirname(__DiR__,2).'/Application/views/errors/'.$code.'.php';
		if (file_exists($path)) require $path ;
		exit;
	}

	public static function redirect($url = ''){
		header('Location: /'.$url);
		exit;
	}

	public static function pageClosed(){
	  require dirname(__DiR__,2).'/Application/views/site_closed/closed.php';
		exit;
	}


}
?>
