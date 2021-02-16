<?php

namespace Application\lib;
use Application\lib\Db;
class Helper {

	public function  __construct()
	{
		self::checkAuth();
	}


	public static function filterString($value='')
	{
		return htmlspecialchars(filter_var($value, FILTER_SANITIZE_STRING));
	}

	public static function filterEmail($value='')
	{
		return htmlspecialchars(filter_var($value, FILTER_SANITIZE_EMAIL));
	}

	public static function filterNumber($value='')
	{
		return htmlspecialchars(filter_var($value, FILTER_SANITIZE_NUMBER_INT));
	}

	public static function  getContent($path = '')
	{
		$content = @file_get_contents($path);
    $dataContent = json_decode($content,true);
    if ($content != false && !is_null($dataContent)) return $dataContent;
    return false;
	}

	public static function getContentWithBuildQuery($url,$queryContent)
	{
			$url = self::buildQueryUrl($url,$queryContent);
			return self::getContent($url);
	}

	public static function  buildQueryUrl($url,$queryContent)
	{
		return $url."?".http_build_query($queryContent);
	}


	public static function randomString($strength = 16)
	{
				$input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $input_length = strlen($input);
		    $random_string = '';
		    for($i = 0; $i < $strength; $i++) {
		        $random_character = $input[mt_rand(0, $input_length - 1)];
		        $random_string .= $random_character;
		    }

		    return $random_string;
	}


	public static function checkCsrf() {
		if (!array_key_exists('csrf', $_POST) || $_POST['csrf'] !== $_SESSION['csrf']) {
			return false;
		}
		return true;
	}

	public static function insertCsrf() {
			printf('<input type="hidden" name="csrf" value="%s" />', $_SESSION['csrf']);
	}

	public static function genereteCsrf($replace = false) {
			if ($replace || !array_key_exists('csrf', $_SESSION)) {
				$_SESSION['csrf'] = self::randomString(50);
			}
	}


	public static function checkAuth()
	{

		if (isset($_COOKIE['cookie_token']) && !isset($_SESSION['user'])) {
			$db = new Db;
			$params = ['cookie_token' => $_COOKIE['cookie_token']];
			$user = $db->row("SELECT * FROM users WHERE cookie_token = :cookie_token",$params);
			$_SESSION['user'] = $user ? $user[0] : NULL;
		}

	}

	public static function pagination($countPages = 10,$active = 12, $countShowPages = 5,$url = '/index.php', $urlPage = 'index.php?page=')
	{
	  if ($countPages > 1) {
		    $left = $active - 1;
		    $right = $countPages - $active;
		    if ($left < floor($countShowPages / 2)) $start = 1;
		    else $start = $active - floor($countShowPages / 2);
		    $end = $start + $countShowPages - 1;
		    if ($end > $countPages) {
		      $start -= ($end - $countPages);
		      $end = $countPages;
		      if ($start < 1) $start = 1;
	    }
		}



	}

}



 ?>
