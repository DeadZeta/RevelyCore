<?php

 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
 mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));

 $query = mysqli_query($mysqli, "SELECT * FROM `core_users` WHERE `name`='".$_COOKIE['rc_user']."'");

if($query->num_rows > 0){
 $info = mysqli_fetch_assoc($query);
 $icabinet = "
 <div class='block donate'>
  <p>Ваш Ник: ".$info['name']."</p>
  <p>Ваш Баланс: ".$info['cash']." руб</p>
  <p>Ваша Привилегия: ".$info['permission']."</p>
 </div>
 ";
}else{
 $icabinet = error("page-403");
}

?>