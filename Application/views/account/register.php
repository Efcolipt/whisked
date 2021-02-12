<?php use Application\lib\Helper; ?>

<div class="form_send">
  <form method="post">
    <?php Helper::insertCsrf(); ?>
    <div class="control_form">
      <label for="login">Придумайте логин </label>
      <input class="input_control_form" type="text" name="login" required  value = "<?=isset($_POST['login']) ? htmlspecialchars($_POST['login']) : "" ;?>">
      <small class="control_form_error"><?=isset($vars['login']) ? htmlspecialchars($vars['login']):"";  ?></small>
    </div>

    <div class="control_form">
      <label for="email">Ваш Email </label>
      <input class="input_control_form" type="email" name="email" required value = "<?=isset($_POST['email']) ? htmlspecialchars($_POST['email']):""; ?>">
      <small class="control_form_error"><?=isset($vars['email'])?htmlspecialchars($vars['email']):"";  ?></small>

    </div>

    <div class="control_form">
      <label for="password"> Придумайте пароль </label>
      <input class="input_control_form" type="password" name="password" required>
      <small class="control_form_error"><?=isset($vars['password'])?htmlspecialchars($vars['password']):"";  ?></small>
    </div>

    <div class="control_form">
      <label for="rePassword"> Повторите пароль </label>
      <input class="input_control_form" type="password" name="rePassword" required>
      <small class="control_form_error"><?=isset($vars['rePassword'])?htmlspecialchars($vars['rePassword']):"";  ?></small>
    </div>

    <div class="control_form">
      <input class="input_control_form" type="submit" name="send" value="Зарегистрироваться">
    </div>
    <div class="control_form" style="text-align:center;">
      <small class="control_form_error"><?=isset($vars['other'])?htmlspecialchars($vars['other']):"";  ?></small>
    </div>
    <div class="other_info_form">
      <a href="/account/login" class="other_info_form_link">
        <img src="/public/images/errors/arrow-back.png" alt="Перейти">
        <span>Уже зарегистрированы ?</span>
      </a>
    </div>
  </form>

</div>
