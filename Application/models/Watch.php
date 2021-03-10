<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;

class Watch extends Model
{
	public function rememberDataFilm($id)
	{
		$data = Helper::getCookie('history') ? str_replace("|".$id,"",Helper::getCookie('history'))."|".$id : $id;
		Helper::setCookie('history',$data,"/");
	}
}


?>
