<div class="form_account">
  <form method="post">
   <!--  <div class="control_form_account">
      <label for="firstName"> Ваше имя </label>
      <input class="input_control_form" type="text" name="firstName" required >
    </div>

    <div class="control_form_account">
      <label for="lastName"> Ваша фамилия </label>
      <input class="input_control_form" type="text" name="lastName" required >
    </div> -->

    <div class="control_form_account">
      <label for="login">Придумайте логин </label>
      <input class="input_control_form" type="text" name="login" required  value = "<?=isset($_POST['login']) ? htmlspecialchars($_POST['login']) : "" ;?>">
      <small class="control_form_account_error"><?=isset($vars['login']) ? htmlspecialchars($vars['login']):"";  ?></small>
    </div> 

    <div class="control_form_account">
      <label for="email">Ваш Email </label>
      <input class="input_control_form" type="email" name="email" required value = "<?=isset($_POST['email']) ? htmlspecialchars($_POST['email']):""; ?>">
      <small class="control_form_account_error"><?=isset($vars['email'])?htmlspecialchars($vars['email']):"";  ?></small>

    </div>

    <div class="control_form_account">
      <label for="password"> Придумайте пароль </label>
      <input class="input_control_form" type="password" name="password" >
      <small class="control_form_account_error"><?=isset($vars['password'])?htmlspecialchars($vars['password']):"";  ?></small>
    </div>

    <div class="control_form_account">
      <label for="rePassword"> Повторите пароль </label>
      <input class="input_control_form" type="password" name="rePassword" >
      <small class="control_form_account_error"><?=isset($vars['rePassword'])?htmlspecialchars($vars['rePassword']):"";  ?></small>
    </div>

    <div class="control_form_account">
      <input class="input_control_form" type="submit" name="send" value="Войти">
    </div>
    <div class="control_form_account">
      <small class="control_form_account_error"><?=isset($vars['other'])?htmlspecialchars($vars['other']):"";  ?></small>
    </div>
    <div class="other_info_form_account">
      <a href="/account/login" class="other_info_form_account_link">
        <img src="/public/images/errors/arrow-back.png" alt="Перейти"> 
        <span>Уже зарегистрированы ?</span>
      </a>
    </div>
  </form>

</div>