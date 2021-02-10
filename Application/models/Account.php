<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;
use Application\core\View;

class Account extends Model
{
	public function auth()
	{
		$data = $_POST;
		$MessageError = [];

		if (!empty($data['send'])) {
			$data['login'] = filter_var(trim($data['login'], " "), FILTER_SANITIZE_STRING);
			$data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
			// $data['login'] = stripslashes($data['login']);
			// $data['login'] = htmlspecialchars($data['login']);
			// $data['password'] = htmlspecialchars($data['password']);
			// $data['password']= stripslashes($data['password']);

			$params = ['login' => $data['login']];
			if (empty($data['login']) || empty($data['password'])) $MessageError['other'] = 'Неверный логин или пароль';
			if(!preg_match("/^[a-zA-Z0-9]+$/",$data['login'])) $MessageError['other'] = "Логин может состоять только из букв английского алфавита и цифр";

			$user['data'] = $this->db->row("SELECT * FROM users WHERE login = :login",$params);
			if (!empty($user['data']) && empty($MessageError) && Helper::check_csrf()) {
				if(password_verify($data['password'],$user['data'][0]['password'])){

					if (isset($data['remember'])) {
						$params = [
							'cookie_token' => password_hash($user['data'][0]['id'].$user['data'][0]['password'].time(), PASSWORD_DEFAULT),
							'login' => $data['login']
						];
						$update_cookie_token = $this->db->query("UPDATE users SET cookie_token = :cookie_token WHERE login = :login",$params);
						(!$update_cookie_token) ? $MessageError['other'] = "Возникла ошибка" : setcookie("cookie_token", $params['cookie_token'], (int) (time() + (1000 * 60 * 60 * 24 * 30)),"/");
					}
					// }else{
					// 	if(isset($_COOKIE["cookie_token"])){
 					// 		$params = ['login' => $data['login']];
			    //     $update_cookie_token = $this->db->query("UPDATE users SET cookie_token = '' WHERE login = :login",$params);
			    //     setcookie("cookie_token", "", time() - 3600,"/");
				  //   }
					// }

					$_SESSION['user'] = $user['data'][0];
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
		if (!empty($data['send'])) {
			$data['login'] = filter_var(trim($data['login'], " "), FILTER_SANITIZE_STRING);
			$data['email'] = filter_var(trim($data['email'], " "), FILTER_SANITIZE_STRING);
			$data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
			$data['rePassword'] = filter_var($data['rePassword'], FILTER_SANITIZE_STRING);

			// $data['login'] = stripslashes($data['login']);
			// $data['login'] = htmlspecialchars($data['login']);
			// $data['email'] = stripslashes($data['email']);
			// $data['email'] = htmlspecialchars($data['email']);
			// $data['password'] = htmlspecialchars($data['password']);
			// $data['password']= stripslashes($data['password']);
			// $data['rePassword']= stripslashes($data['rePassword']);
			// $data['rePassword'] = htmlspecialchars($data['rePassword']);



			$pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

			if (mb_strlen($data['login']) < 3  && !mb_strlen($data['login']) > 30 ) $MessageError['login'] = 'Логин должен быть не меньше 3 символов и не больше 30';
			if (mb_strlen($data['email']) < 3  && !mb_strlen($data['email']) > 32 ) $MessageError['email'] = 'Не меньше 3 символов и не больше 32';
			if (mb_strlen($data['password']) < 6 ) $MessageError['password'] = 'Длина пароля должна быть не меньше 6 символов';

			if(!preg_match("/^[a-zA-Z0-9]+$/",$data['login'])) $MessageError['login'] = 'Логин может состоять только из букв английского алфавита и цифр';
			if (!preg_match($pattern_email, $data['email'])) $MessageError['email'] = 'Введите корректный Email';

			if ($data['password'] != $data['rePassword']) $MessageError['rePassword'] = 'Пароли не совпадают';

			$params = ['login'=>$data['login'], 'email'=>$data['email']];
			$similar = $this->db->row('SELECT * FROM users WHERE login = :login OR email = :email',$params);
			if (!empty($similar)) $MessageError['other'] = 'Такой пользователь уже существует';

			if (empty($MessageError) && Helper::check_csrf() ) {
				$params = [
					'login'=> $data['login'],
					'password'=> password_hash($data['password'], PASSWORD_DEFAULT),
					'email'=> $data['email'],
				];

				$insertData = $this->db->query("INSERT INTO users (login,password,email) VALUES (:login,:password,:email)",$params);

				if ($insertData) {
					$params = ['login'=> $data['login']];
					$user['data'] = $this->db->row("SELECT * FROM users WHERE login = :login", $params);
				if ($user['data']) View::redirect('account/login');
				}else{
					$MessageError['other'] = "Ошибка, повторите позже";
				}
			}else{
				$MessageError['other'] = "Ошибка, повторите позже";
			}

		}
			return $MessageError;
	}

}
?>
