<?php

$admin_settings = "
<center>
<form method='post' class='block'>
 <h2>Системные настройки</h2>
 <input type='text' class='form-input' name='config-title' placeholder='Название Сайта'>
 <input type='text' class='form-input' name='config-url-home' placeholder='URL Домена'>
 <input type='text' class='form-input' name='config-template' placeholder='Шаблон по умолчанию'>
 <input type='text' class='form-input' name='config-ip' placeholder='IP Адрес сервера'>
 <input type='text' class='form-input' name='config-permission' placeholder='Приоритетная Группа'>
 <input type='text' class='form-input' name='config-hash' placeholder='Метод Хеширования Пароля'>
 <input type='text' class='form-input' name='config-salt' placeholder='Секретное Слово'>
 <input type='text' class='form-input' name='config-shop-id' placeholder='ID Магазина (InterKassa)'>
 <input type='text' class='form-input' name='config-shop-key' placeholder='Ключ Магазина (InterKassa)'>
 <input type='text' class='form-input' name='config-plugin-auth' placeholder='Режим: Плагин Авторизации (true/false)'>
 <input type='text' class='form-input' name='config-plugin-auth-table' placeholder='Таблица Авторизации'>
 <input type='text' class='form-input' name='config-plugin-auth-name' placeholder='Колонка: Ник'>
 <input type='text' class='form-input' name='config-plugin-auth-password' placeholder='Колонка: Пароль'>
 <input type='text' class='form-input' name='config-plugin-auth-strtolower' placeholder='Использовать нижний регистр (true/false)'>
 <input type='text' class='form-input' name='config-dev' placeholder='Режим Разработчика (true/false)'>
 <button class='form-btn' name='config-go'>Сохранить</button>
</form>
</center>
";

?>