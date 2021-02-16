<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;
use Application\lib\ImageUpload;
use Application\core\View;

class Account extends Model
{
	public function auth()
	{
		$data = $_POST;
		$MessageError = [];

		if (!empty($data['send'])) {
			if (empty($data['login']) || empty($data['password'])) $MessageError['other'] = 'Неверный логин или пароль';
			if(!preg_match("/^[a-zA-Z0-9]+$/",$data['login'])) $MessageError['other'] = "Логин может состоять только из букв английского алфавита и цифр";

			$user = $this->getUser($data['login']);

			if (!empty($user) && empty($MessageError) && Helper::checkCsrf()) {
				if(password_verify($data['password'],$user[0]['password'])){

					if (isset($data['remember'])) {
						$params = [
							'cookie_token' => password_hash($user[0]['id'].$user[0]['password'].time(), PASSWORD_DEFAULT),
							'login' => $user[0]['login']
						];
						$this->db->query("UPDATE users SET cookie_token = :cookie_token WHERE login = :login",$params);
					  setcookie("cookie_token", $params['cookie_token'], (int) (time() + (1000 * 60 * 60 * 24 * 30)),"/");
					}

					$_SESSION['user'] = $user[0];
					View::redirect();

				}else
					$MessageError['other'] = 'Неверный логин или пароль';
			}else
				$MessageError['other'] = 'Неверный логин или пароль';

		}
		return $MessageError;
	}

	public function registration()
	{
		$data = $_POST;
		$MessageError = [];
		$pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
		if (!empty($data['send'])) {

			if (mb_strlen($data['login']) < 3  || mb_strlen($data['login']) > 30 ) $MessageError['login'] = 'Логин должен быть не меньше 3 и не больше 30 символов';
			if (mb_strlen($data['email']) < 5  || mb_strlen($data['email']) > 50 ) $MessageError['email'] = 'Не меньше 3 и не больше 50 символов';
			if (mb_strlen($data['password']) < 6 ) $MessageError['password'] = 'Длина пароля должна быть не меньше 6 символов';

			if (!preg_match("/^[a-zA-Z0-9]+$/",$data['login'])) $MessageError['login'] = 'Логин может состоять только из букв английского алфавита и цифр';
			if (!preg_match($pattern_email, $data['email'])) $MessageError['email'] = 'Введите корректный Email';

			if ($data['password'] != $data['rePassword']) $MessageError['rePassword'] = 'Пароли не совпадают';

			$data['login'] = Helper::filterString($data['login']);
			$data['email'] = Helper::filterEmail($data['email']);
			$params = ['login'=>$data['login'], 'email'=>$data['email']];
			$similar = $this->db->row('SELECT * FROM users WHERE login = :login OR email = :email',$params);
			if (!empty($similar)) $MessageError['other'] = 'Такой пользователь уже существует';

			if (empty($MessageError) && Helper::checkCsrf() ) {
				$params = [
					'login'=> $data['login'],
					'password'=> password_hash($data['password'], PASSWORD_DEFAULT),
					'email'=> $data['email'],
				];
				$insertData = $this->db->query("INSERT INTO users (login,password,email) VALUES (:login,:password,:email)",$params);
				$insertData ? View::redirect('account/login') : $MessageError['other'] = "Повтороите попытку позже";
			}

		}
			return $MessageError;
	}

	public function logout()
	{
		$params = ['login' => Helper::filterString($_SESSION['user']['login'])];
		$cookie_token = $this->db->query("UPDATE users SET cookie_token = '' WHERE login = :login",$params);
		if ($cookie_token) setcookie("cookie_token", "", time() - 3600,"/");
		session_destroy();
    View::redirect();
	}


	public function userEditInfo(){
		$data = $_POST;
		$MessageError = [];
		$ImageUpload = new ImageUpload;

		// if (isset($data['send'])) {
		//
		// }
		if (!empty($_FILES['poster']['name']) && isset($data['send']) && Helper::checkCsrf()) {
			$file = $ImageUpload->uploadFile($_FILES['poster'], Helper::filterString($_SESSION['user']['poster_path']));
			if ($file) {
				$params = ['poster_path' => $file, 'login' => Helper::filterString($_SESSION['user']['login'])];
				$insertData = $this->db->query('UPDATE users SET poster_path = :poster_path WHERE login = :login',$params);

				if (!$insertData)  $MessageError['file'] = "Повторите попытку позже";
				$_SESSION['user']['poster_path'] = $file;
			}else{
				$MessageError['file'] = "Выберите другое изображение";
			}
		}
		return $MessageError;
	}

}

?>
