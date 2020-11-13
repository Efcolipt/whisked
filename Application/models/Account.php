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
					$_SESSION['admin'] = $user['data'][0]['status'];
					$_SESSION['id'] =  $user['data'][0]['id'];
					$_SESSION['login'] =  $user['data'][0]['login'];
					$_SESSION['email'] =  $user['data'][0]['email'];
					$_SESSION['auth'] =  true;
					header("Location: /");
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
			$data['firstName'] = stripslashes($data['firstName']);
			$data['firstName'] = htmlspecialchars($data['firstName']);
			$data['lastName'] = stripslashes($data['lastName']);
			$data['lastName'] = htmlspecialchars($data['lastName']);
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

			if (strlen($data['firstName']) < 2  && !(strlen($data['firstName']) > 33) ) {
				$MessageError[] = 'Имя должно быть не меньше 2 символов и не больше 33';
			}

			if (strlen($data['lastName']) < 2  && !(strlen($data['lastName']) > 33) ) {
				$MessageError[] = 'Фамилия должна быть не меньше 2 символов и не больше 33';
			}

			if (strlen($data['email']) < 3 && !strlen($data['email']) > 25 ) {
				$MessageError[] = 'Не меньше 3 символов и не больше 25';
			}
			$pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
			if (!(strlen($data['email']) > 3)) {
				$MessageError[] = 'Введите Email';
			}
			if (!preg_match($pattern_email, $data['email'])) {
				$MessageError[] = 'Введите корректный Email';
			}

			if (strlen($data['password']) < 6 ) {
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
					'firstName'=>$data['firstName'],
					'lastName'=>$data['lastName'],
					'password'=>$pass_hash,
					'email'=>$data['email']
				];

				$insertData = $this->db->query("INSERT INTO users (first_name,last_name,login,password,email) VALUES (:firstName,:lastName,:login,:password,:email)",$params);

				if ($insertData) {
					$user['data'] = $this->db->row("SELECT * FROM users WHERE login = :login",$paramsL);
					header("Location: /account/login");
					// debug($user['data']);
					// $_SESSION['admin'] = $user['data'][0]['status'];
					// $_SESSION['id'] =  $user['data'][0]['id'];
					// $_SESSION['login'] =  $user['data'][0]['login'];
					// $_SESSION['email'] =  $user['data'][0]['email'];
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
