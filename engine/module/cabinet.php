<?php

 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
 mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));

 $query = mysqli_query($mysqli, "SELECT * FROM `core_users` WHERE `name`='".$_COOKIE['rc_user']."'");

if($query->num_rows > 0){
 $info = mysqli_fetch_assoc($query);
 $icabinet = "
 <center><button id='cabinet-btn' class='mini-profile-btn' style='width:160px;'>Кабинет</button><button id='pay-btn' class='mini-profile-btn' style='width:160px;'>Пополнить</button></center>
 <div class='block donate' id='cabinet'>
  <p>Ваш Ник: ".$info['name']."</p>
  <p>Ваш Баланс: ".$info['cash']." руб</p>
  <p>Ваша Привилегия: ".$info['permission']."</p>
 </div>
 <div class='block donate' id='pay'>
  <form action='/engine/module/kassa/pay.php' method='get'>
   <input type='text' name='name' hidden value='".$_COOKIE['rc_user']."'>
   <input type='number' name='amount' class='form-input' placeholder='Введите сумму'>
   <button class='form-btn'>Пополнить</button>
  </form>
 </div>
 ";
}else{
 $icabinet = error("page-403");
}

?>