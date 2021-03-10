<?php

namespace Application\lib;
use Application\lib\Db;
class Helper {

	public static function setCookie($name,$value,$path)
	{
		setcookie($name, gzcompress(gzcompress($value,9),9), time()+3600*24*31, $path);
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

	public static function getContent($path = '')
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

	public static function buildQueryUrl($url,$queryContent)
	{
		return $url."?".http_build_query($queryContent);
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
