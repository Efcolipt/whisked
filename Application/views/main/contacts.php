<?php use Application\lib\Helper; ?>
<div class="form_send">
  <form method="post">
    <?php Helper::insertCsrf(); ?>
    <div class="control_form">
      <label for="login">Имя</label>
      <input class="input_control_form" type="text" name="name" required  value = "<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : "" ;?>">
      <small class="control_form_error"><?=isset($vars['name']) ? Helper::filterString($vars['name']):"";  ?></small>
    </div>

    <div class="control_form">
      <label for="email">Ваш Email </label>
      <input class="input_control_form" type="email" name="email" required value="<?=isset($_POST['email']) ? htmlspecialchars($_POST['email']):""; ?>">
      <small class="control_form_error"><?=isset($vars['email']) ? Helper::filterString($vars['email']):"";  ?></small>

    </div>

    <div class="control_form">
      <label for="password">Тема</label>
      <input class="input_control_form" type="text" name="headline" required>
      <small class="control_form_error"><?=isset($vars['headline'])? Helper::filterString($vars['headline']):"";  ?></small>
    </div>

    <div class="control_form">
      <label for="password">Сообщение</label>
      <textarea class="input_control_form" type="text" name="message" required></textarea>
      <small class="control_form_error"><?=isset($vars['message']) ? Helper::filterString($vars['message']):"";  ?></small>
    </div>


    <div class="control_form">
      <input class="input_control_form" type="submit" name="send" value="Отправить">
    </div>
    <?php if (isset($vars['other'])):?>
    <div class="control_form" style="text-align:center;">
      <small class="control_form_error"><?=isset($vars['other']) ? Helper::filterString($vars['other']):"";  ?></small>
    </div>
    <?php endif; ?>
    <?php if (empty($vars) && !empty($_POST)):?>
    <div class="control_form" style="text-align:center;">
      <small class="control_form_success">Сообщение отправлено!</small>
    </div>
    <?php endif; ?>
  </form>

</div>
