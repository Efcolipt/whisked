<?php
  if(isset($_POST))
  {
    echo $vars['username'];
  }
 ?>

<form class="login_form" action="login" method="post">

  <div class="wrapper">
    <label for="username"> Имя пользователя : </label>
    <input type="text" name="username" value="">
  </div>

  <div class="wrapper">
    <label for="password"> Пароль : </label>
    <input type="password" name="password" value="">
  </div>

  <div class="wrapper">
    <input type="submit" name="submit" value="Войти">
  </div>

</form>
