<div class="form_send">
  <form method="post">
    <div class="control_form">
      <label for="login">Имя</label>
      <input class="input_control_form" type="text" name="name" required  value = "<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : "" ;?>">
      <small class="control_form_error"><?=isset($vars['login']) ? htmlspecialchars($vars['name']):"";  ?></small>
    </div>

    <div class="control_form">
      <label for="email">Ваш Email </label>
      <input class="input_control_form" type="email" name="email" required value = "<?=isset($_POST['email']) ? htmlspecialchars($_POST['email']):""; ?>">
      <small class="control_form_error"><?=isset($vars['email'])?htmlspecialchars($vars['email']):"";  ?></small>

    </div>

    <div class="control_form">
      <label for="password">Тема</label>
      <input class="input_control_form" type="text" name="headline" required>
      <small class="control_form_error"><?=isset($vars['headline'])?htmlspecialchars($vars['headline']):"";  ?></small>
    </div>

    <div class="control_form">
      <label for="password">Сообщение</label>
      <textarea class="input_control_form" type="text" name="message" required></textarea>
      <small class="control_form_error"><?=isset($vars['message'])?htmlspecialchars($vars['message']):"";  ?></small>
    </div>



    <div class="control_form">
      <input class="input_control_form" type="submit" name="send" value="Отправить">
    </div>
    <?php if (isset($vars['other'])):?>
    <div class="control_form" style="text-align:center;">
      <small class="control_form_error"><?=isset($vars['other'])?htmlspecialchars($vars['other']):"";  ?></small>
    </div>
    <?php endif; ?>
  </form>

</div>
