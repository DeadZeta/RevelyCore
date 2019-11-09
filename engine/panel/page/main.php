<?php

$main = "
<div class='head-panel'>
<center>
 <a href='/admin.php?do=settings'><i class='btn-ico fas fa-cogs'></i></a>
 <a href='/admin.php?do=statistic'><i class='btn-ico fas fa-desktop'></i></a>
</center>
</div>
<div class='body-panel'>
 {content}
</div>
";

$admin_auth = "
<center>
 <h1>Авторизация</h1>
 <form method='post' class='block'>
 <input name='name' type='text' class='form-input' placeholder='Введите Логин'>
 <input name='password' type='password' class='form-input' placeholder='Введите Пароль'>
 <button class='form-btn' name='auth'>Войти</button>
 </form>
</center>
";

?>