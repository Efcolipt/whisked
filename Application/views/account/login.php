<?php use Application\lib\Helper; ?>

<div class="form_send">
	<form method="post">
		<?php Helper::insertCsrf(); ?>
		<div class="control_form">
			<label for="login">Логин </label>
			<input class="input_control_form" type="text" name="login" required value = "<?=isset($_POST['login']) ? htmlspecialchars($_POST['login']):"";?>">
		</div>

		<div class="control_form">
			<label for="password"> Пароль </label>
			<input class="input_control_form" type="password"  name="password" required>
		</div>
		<div class="control_form">
			<input type="submit" name="send" value="Войти">
		</div>
		<div class="control_form checkbox_control_form">
			<input type="checkbox" id="remember_control_form" name="remember" checked="checked" />
			<label for="remember_control_form">Запомнить меня</label>
		</div>
		<div class="control_form_error_block">
      		<small class="control_form_error" ><?=isset($vars['other']) ? htmlspecialchars($vars['other']):"";  ?></small>
		</div>
		<div class="other_info_form">
			<a href="/account/register" class="other_info_form_link">
				<img src="/public/images/errors/arrow-back.png" alt="Перейти">
				<span>Создать новый аккаунт</span>
			</a>
		</div>
	</form>

</div>
