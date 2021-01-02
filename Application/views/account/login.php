<div class="form_account">
	<form method="post">
		<div class="control_form_account">
			<label for="login">Логин </label>
			<input class="input_control_form" type="text" name="login" required value = "<?=isset($_POST['login']) ? htmlspecialchars($_POST['login']):"";?>">
		</div>

		<div class="control_form_account">
			<label for="password"> Пароль </label>
			<input class="input_control_form" type="password"  name="password" required>
		</div>
		<div class="control_form_account">
			<input type="submit" name="send" value="Войти">
		</div>
		<div class="control_form_account checkbox_control_account_form">
			<input type="checkbox" id="remember_control_account_form" name="remember" checked="checked" />
			<label for="remember_control_account_form">Запомнить меня</label>
		</div>
		<div class="control_form_account_error_block" style="text-align:center;">
      		<small class="control_form_account_error" ><?=isset($vars['other']) ? htmlspecialchars($vars['other']):"";  ?></small>
		</div>
		<div class="other_info_form_account">
			<a href="/account/register" class="other_info_form_account_link">
				<img src="/public/images/errors/arrow-back.png" alt="Перейти">
				<span>Создать новый аккаунт</span>
			</a>
		</div>
	</form>

</div>
