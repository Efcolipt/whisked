<?php


namespace Application\lib;
use Application\lib\Db;

class Helper {


	public function getContent($path = '')
	{
		$content = @file_get_contents($path);
    $dataContent = json_decode($content);
    if ($content != false && !is_null($dataContent) && !property_exists($dataContent,'error')) return $dataContent;
    return false;
	}

	public static function checkAuth()
	{

		if (isset($_COOKIE['cookie_token']) && !isset($_SESSION['user'])) {
			$db = new Db;
			$params = ['cookie_token' => $_COOKIE['cookie_token']];
			$user['user'] = $db->row("SELECT * FROM users WHERE cookie_token = :cookie_token",$params);
			$_SESSION['user'] = $user ? $user['user'][0] : NULL;
		}

	}


}



 ?>
