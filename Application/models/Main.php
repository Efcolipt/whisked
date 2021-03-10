<?php

namespace Application\models;
use Application\core\Model;
use Application\lib\Helper;
// use Application\lib\ReCaptcha;


class Main extends Model{

  public function contact(){
    $data = $_POST;
    $MessageError = [];

    if (!empty($data['send'])) {
      if (mb_strlen($data['headline']) < 10  || mb_strlen($data['headline']) > 80) $MessageError['headline'] = 'Тема должна быть не меньше 10 и не больше 80 символов';
      if (mb_strlen($data['message']) < 10  || mb_strlen($data['message']) > 800) $MessageError['message'] = 'Сообщение должно быть не меньше 10 и не больше 800 символов';

      $data['headline'] = Helper::filterString($data['headline']);
      $data['message'] = Helper::filterString($data['message']);

      if (empty($MessageError) && Helper::checkCsrf() ) {

          $params = [
            'id_sendler' => $_SESSION['user']['id'],
            'email' => $_SESSION['user']['email'],
            'headline' => $data['headline'],
            'message' => $data['message']
          ];
          $insertData = $this->db->query("INSERT INTO questions (id_sendler,email,headline,message) VALUES (:id_sendler,:email,:headline,:message)",$params);
          if (!$insertData) return $MessageError['other'] = 'Повтороите попытку позже';

      }

    }
    return $MessageError;
  }

}


?>
