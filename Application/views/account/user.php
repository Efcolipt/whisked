<?php use Application\lib\Helper;?>
<div class="profile_index">
  <div class="top_profile_index">
    <div class="side_profile_index">
      <div class="img_profile_index">
        <img src="#" alt="">
      </div>
      <div class="btns_info_profile_index">
        <a class="btn_info_profile_index" href="javascript:void(0)">История</a>
        <a class="btn_info_profile_index" href="javascript:void(0)">Смотрю</a>
      </div>
    </div>
    <div class="side_profile_index">
      <div class="headline_profile_index">
        <h2>Редактирование профиля</h2>
      </div>
      <div class="edit_about_me_profile_index">
        <form method="post" enctype="multipart/form-data">
          <?php Helper::insertCsrf(); ?>
          <div class="control_form">
            <label for="password">Ваш логин</label>
            <input class="input_control_form" type="text" name="login" value="<?=$user['login']?>">
            <small class="control_form_error"><?=isset($vars['headline'])? Helper::filterString($vars['headline']):"";  ?></small>
          </div>

          <div class="control_form">
            <label for="password">Ваш email</label>
            <input class="input_control_form" type="text" name="email" value="<?=$user['email']?>">
            <small class="control_form_error"><?=isset($vars['headline'])? Helper::filterString($vars['headline']):"";  ?></small>
          </div>

          <div class="control_form">
            <label for="password">Сменить аватарку</label>
            <input class="input_control_form" type="file" name="poster" accept="image/*" >
            <small class="control_form_error"><?=isset($vars['headline'])? Helper::filterString($vars['headline']):"";  ?></small>
          </div>
          <div class="control_form">
                <input class="input_control_form" type="submit" name="send" value="Сохранить">
          </div>
        </form>
      </div>
    </div>
    <div class="side_profile_index">
      <div class="headline_profile_index">
        <h2>Информация о профиле  </h2>
      </div>
      <div class="about_me_profile_index">
          <div class="small_info_about_me_between_headline_profile_index">
            <p>Активность</p>
          </div>
          <div class="small_info_about_me_profile_index">
            <p><small>Зарегистрирован: <span><?=$user['date_register'];?></span></small> </p>
          </div>
          <div class="small_info_about_me_profile_index">
            <p><small>Последний вход: <span><?=$lastEnter ?></span></small> </p>
          </div>
          <div class="small_info_about_me_between_headline_profile_index">
            <p>Система</p>
          </div>
          <div class="small_info_about_me_profile_index">
            <p><small>IP: <span><?=$ip;  ?></span></small> </p>
          </div>
          <div class="small_info_about_me_profile_index">
            <p><small>OS: <span><?=$systemVer;  ?> <?=$system;  ?></span></small> </p>
          </div>
          <div class="small_info_about_me_profile_index">
            <p><small>Браузер: <span><?=$browser;  ?> </span></small> </p>
          </div>
          <div class="small_info_about_me_between_headline_profile_index">
            <p>Биба</p>
          </div>
          <div class="small_info_about_me_profile_index">
            <p><small>Двухфакторная авторизация:  <span>Нет</span></small></p>
          </div>
      </div>

    </div>
  </div>


</div>
