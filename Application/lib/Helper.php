<?php

namespace Application\lib;
use Application\lib\Db;
class Helper {

	public static function setCookie($name,$value,$path)
	{

		setcookie($name, gzcompress(gzcompress($value,9),9),[
			'expires' => time()+3600*24*31,
			'path' => $path,
			'samesite' => 'Strict'
		]);
	}

	public static function getCookie($name)
	{
		return isset($_COOKIE[$name]) ? gzuncompress(gzuncompress($_COOKIE[$name])) : false;
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

	public static function getContent($url = '', $query = '')
	{
		$path = self::buildQueryUrl($url,$query);
		$content = @file_get_contents($path);
		$data = json_decode($content,true);
		if ($content != false && !is_null($data)) return $data;
		return false;
	}

	public static function buildQueryUrl($url,$query)
	{
		return $url."?".http_build_query($query);
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
			$_SESSION['csrf'] = bin2hex(random_bytes(20));
		}
	}

}



?>
