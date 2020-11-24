<?php 

namespace Application\core; 

class View {
	
	public $path;
	public $route;
	public $layout = 'default';


public function __construct($route)
{
	$this->route = $route;
	$this->path = $route['controller'].'/'.$route['action'];
}
 
 public function render($title,$vars = []){
 	//extract($vars); Output
 	$path = dirname(__DIR__,2).'/Application/views/'.$this->path.'.php';
 	if (file_exists($path)) {
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
		if (file_exists($path)) {
				require $path ;
			}	
		
	}

	public function redirect($url){
		header('Location: /'.$url);
		exit;
	}


}
?>