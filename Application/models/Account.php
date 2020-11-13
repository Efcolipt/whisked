<?php

namespace Application\models;
use Application\core\Model;

class Account extends Model
{
	public function auth()
	{
		$data = $_POST;
		$MessageError = array();

		if (!empty($data['send'])) {

			$data['login'] = stripslashes($data['login']);
			$data['login'] = htmlspecialchars($data['login']);
			$data['password'] = htmlspecialchars($data['password']);
			$data['password']= stripslashes($data['password']);


			if (strlen($data['login']) < 3  && !(strlen($data['login']) > 25) ) {
				$MessageError[] = 'Логин должен быть не меньше 3 символов и не больше 25';
			}

			if (strlen($data['password']) < 6 ) {
				$MessageError[] = 'Длина пароля должна быть не меньше 6 символов';
			}

			$params = [
				'login' => $data['login'],
			];

			$user['data'] = $this->db->row("SELECT * FROM users WHERE login = :login",$params);
			if (!empty($user) && empty($MessageError)) {
				if(password_verify($data['password'],$user['data'][0]['password'])){
					
					if (isset($data['remember'])) {
						$cookie_token = md5($user['data'][0]['id'].$user['data'][0]['password'].time());
						$params = [
							'cookie_token' => $cookie_token,
							'login' => $data['login'],
						];
						$update_cookie_token = $this->db->query("UPDATE users SET cookie_token = :cookie_token WHERE login = :login",$params);
						if (!$update_cookie_token) {
							$MessageError[] = "Возникла ошибка";
						}else{
							$_SESSION['user'] = $user['data'][0];
							setcookie("cookie_token", $cookie_token, (int) (time() + (1000 * 60 * 60 * 24 * 30)),"/");
							echo("<script>location.href = '/';</script>");
						}
					}else{
						if(isset($_COOKIE["cookie_token"])){
 							$params = [
								'login' => $data['login'],
							];
					       $update_cookie_token = $this->db->query("UPDATE users SET cookie_token = '' WHERE login = :login",$params);
					 		$_SESSION['user'] = $user['data'][0];
					        setcookie("cookie_token", "", time() - 3600,"");
							echo("<script>location.href = '/';</script>");
					    }else{
					    	$_SESSION['user'] = $user['data'][0];
					    	echo("<script>location.href = '/';</script>");
					    }
					}
				}else{
					$MessageError[] = 'Неверный логин или пароль';
				}

			}else{
				$MessageError[] = 'Неверный логин или пароль';
			}

		}
		return $MessageError;
	}

	public function registration()
	{
		$data = $_POST;
		$MessageError = array();
		if (!empty($data['send'])) {
			// $data['firstName'] = stripslashes($data['firstName']);
			// $data['firstName'] = htmlspecialchars($data['firstName']);
			// $data['lastName'] = stripslashes($data['lastName']);
			// $data['lastName'] = htmlspecialchars($data['lastName']);
			$data['login'] = stripslashes($data['login']);
			$data['login'] = htmlspecialchars($data['login']);
			$data['email'] = stripslashes($data['email']);
			$data['email'] = htmlspecialchars($data['email']);
			$data['password'] = htmlspecialchars($data['password']);
			$data['password']= stripslashes($data['password']);
			$data['rePassword']= stripslashes($data['rePassword']); 
			$data['rePassword'] = htmlspecialchars($data['rePassword']);





			if (strlen($data['login']) < 3  && !(strlen($data['login']) > 25) ) {
				$MessageError[] = 'Логин должен быть не меньше 3 символов и не больше 25';
			}

			if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
		        $MessageError[] = "Логин может состоять только из букв английского алфавита и цифр";
		    }

			// if (strlen($data['firstName']) < 2  && !(strlen($data['firstName']) > 33) ) {
			// 	$MessageError[] = 'Имя должно быть не меньше 2 символов и не больше 33';
			// }

			// if (strlen($data['lastName']) < 2  && !(strlen($data['lastName']) > 33) ) {
			// 	$MessageError[] = 'Фамилия должна быть не меньше 2 символов и не больше 33';
			// }

			if (mb_strlen($data['email']) < 3 && !mb_strlen($data['email']) > 25 ) {
				$MessageError[] = 'Не меньше 3 символов и не больше 25';
			}
			$pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
			if (!(mb_strlen($data['email']) > 3)) {
				$MessageError[] = 'Введите Email';
			}
			if (!preg_match($pattern_email, $data['email'])) {
				$MessageError[] = 'Введите корректный Email';
			}

			if (mb_strlen($data['password']) < 6 ) {
				$MessageError[] = 'Длина пароля должна быть не меньше 6 символов';
			}
			
			if ($data['password'] != $data['rePassword']) {
				$MessageError[] = 'Пароли не совпадают';
			}


			$paramsL = [
				'login'=>$data['login'],
			];
			$paramsE = [
				'email'=>$data['email'],
			];
			

			$similar_login = $this->db->row('SELECT * FROM users WHERE login = :login',$paramsL);
			$similar_email = $this->db->row('SELECT * FROM users WHERE email = :email',$paramsE);
			if (!empty($similar_login) || !empty($similar_email) ) {
				$MessageError[] = 'Такой пользователь уже существует';
			}

			if (empty($MessageError)) {
				$pass_hash = password_hash($data['password'], PASSWORD_DEFAULT);
				$params = [
					'login'=>$data['login'],
					// 'firstName'=>$data['firstName'],
					// 'lastName'=>$data['lastName'],
					'password'=>$pass_hash,
					'email'=>$data['email']
				];

				$insertData = $this->db->query("INSERT INTO users (login,password,email) VALUES (:login,:password,:email)",$params);

				if ($insertData) {
					$user['data'] = $this->db->row("SELECT * FROM users WHERE login = :login",$paramsL);
					header("Location: /account/login");
				}else{
					$MessageError[] = "Ошибка, повторите позже";
					return $MessageError;
				}

			}   

		}
			return $MessageError;
	}

}
?>
