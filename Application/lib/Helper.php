<?php

namespace Application\lib;
use Application\lib\Db;

class Helper {



	public static function  getContent($path = '')
	{
		$content = @file_get_contents($path);
    $dataContent = json_decode($content);
    if ($content != false && !is_null($dataContent) && !property_exists($dataContent,'error')) return $dataContent;
    return false;
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
	public static function check_csrf() {
		if (!array_key_exists('csrf', $_POST) || $_POST['csrf'] !== $_SESSION['csrf']) {
			return false;
		}
		return true;
	}

	public static function csrf_html() {
			printf('<input type="hidden" name="csrf" value="%s" />', filter_var($_SESSION['csrf'],FILTER_SANITIZE_STRING));
	}

	public static function gen_csrf($replace = false) {
			if ($replace || !array_key_exists('csrf', $_SESSION)) {
				$_SESSION['csrf'] = Helper::randomString(50);
			}
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
