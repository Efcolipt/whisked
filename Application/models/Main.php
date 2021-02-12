<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;


class Main extends Model{

  public function contact(){
    $data = $_POST;
    $MessageError = [];
    $pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    $secret = "6LdDSlUaAAAAALm6lRr4pL_zU5zdgBdJI9Ww5dJD";
    $response = null;
    $reCaptcha = new Application\lib\Recaptcha($secret);

    if (!empty($data['send'])) {
      if (mb_strlen($data['name']) < 2  || mb_strlen($data['name']) > 32) $MessageError['name'] = 'Слишком маленькое или большое имя';
      if (mb_strlen($data['headline']) < 10  || mb_strlen($data['headline']) > 80) $MessageError['headline'] = 'Тема должна быть не больше 80 и не меньше 10 символов';
      if (mb_strlen($data['name']) < 5  || mb_strlen($data['name']) > 90) $MessageError['email'] = 'Слишком маленький или большой email';
      if (mb_strlen($data['message']) < 10  || mb_strlen($data['message']) > 800) $MessageError['message'] = 'Сообщение должно быть не больше 800 и не меньше 10 символов';

      $data['name'] = Helper::filterString($data['name']);
      $data['headline'] = Helper::filterString($data['headline']);
      $data['email'] = Helper::filterEmail($data['email']);
      $data['message'] = Helper::filterString($data['message']);

      if (!preg_match($pattern_email, $data['email'])) $MessageError['email'] = 'Введите корректный Email';
      if (!preg_match("/[а-я]/i", $data['name']) && !preg_match("/[a-z]/i", $data['name'])) $MessageError['name'] = "Имя может состоять только из букв русского или английского алфавита";



      if (empty($MessageError) && Helper::checkCsrf() && !empty($data['g-recaptcha-response'])) {

        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $data["g-recaptcha-response"]
          );

          if ($response != null && $response->success) {
            $params = [
              'name' => $data['name'],
              'headline' => $data['headline'],
              'email' => $data['email'],
              'message' => $data['message']
            ];
            $insertData = $this->db->query("INSERT INTO questions (name,email,headline,message) VALUES (:name,:email,:headline,:message)",$params);
            if (!$insertData) return $MessageError['other'] = 'Повтороите попытку позже';
          }else{
            $MessageError['other'] = 'Капча не пройдена';
          }

      }

    }
    return $MessageError;
  }

}


?>
