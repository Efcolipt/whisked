<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;

class Watch extends Model
{

	public function rememberDataFilm($info)
	{
		if ( isset($_SESSION['user']) ){
			$params = ['login' => Helper::filterString($_SESSION['user']['login'])];
			$data = $this->db->row('SELECT content_films FROM users WHERE login = :login',$params);
			if (!empty($data)) $data = base64_encode(str_replace(":".$info['kinopoisk_id'],"",base64_decode($data[0]['content_films'])).":".$info['kinopoisk_id']);
			else $data = base64_encode($info['kinopoisk_id']);
			$params = ['data' => $data,'login' => Helper::filterString($_SESSION['user']['login'])];
			$this->db->row('UPDATE users SET content_films = :data WHERE login = :login',$params);
		}
	}
}


?>
