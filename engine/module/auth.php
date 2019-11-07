<?php

if(!isset($_COOKIE['rc_user'])){
$authorization = "
<h1>Авторизация</h1>
 <form method='post'>
 <input name='name' type='text' class='form-input' placeholder='Введите Логин'>
 <input name='password' type='password' class='form-input' placeholder='Введите Пароль'>
 <button class='form-btn' name='auth'>Войти</button>
 </form>
";
$mauthorization = "
<h1>Авторизация</h1>
<form method='post'>
 <input name='name' type='text' class='form-input' placeholder='Введите Логин'>
 <input name='password' type='password' class='form-input' placeholder='Введите Пароль'>
 <button class='form-btn' name='auth'>Войти</button>
 </form>
 ";
}else{
 $authorization = "
<h1>Мини-Профиль</h1>
";
$mauthorization = "
<h1>Мини-Профиль</h1>

";
}
?>