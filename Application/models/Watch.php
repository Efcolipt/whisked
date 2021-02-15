<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;

class Watch extends Model
{

	public function rememberDataFilm($id)
	{
		if ( isset($_SESSION['user']) ){
			$data = $_SESSION['user']['content_films'];

			if (!empty($data)) $data = base64_encode(str_replace(":".$id,"",base64_decode($data)).":".$id);
			else $data = base64_encode($id);
			
			$_SESSION['user']['content_films'] = $data;
			$params = ["content_films" => $data, "login" => Helper::filterString($_SESSION['user']['login']) ];
			$this->db->row('UPDATE users SET content_films = :content_films WHERE login = :login',$params);
		}
	}
}


?>
