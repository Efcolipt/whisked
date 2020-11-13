<?php 

namespace Application\Core;
use Application\Lib\Db;

abstract class Model {
	
	public $db;
	public function __construct(){
		$this->db = new Db;
		Model::checkAuth();
	}


	public  function checkAuth()
	{
		if (isset($_COOKIE['cookie_token'])) {
		
			$params = [
				'cookie_token' => $_COOKIE['cookie_token']
			];
			
			$user['user'] = $this->db->row("SELECT * FROM users WHERE cookie_token = :cookie_token",$params);

			if ($user) {
				$_SESSION['user'] = $user['user'][0];
			}	
		}
	}
}

 ?>
