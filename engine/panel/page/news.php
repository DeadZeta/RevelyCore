<?php

 include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");

 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
 mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));

 $query = mysqli_query($mysqli, "SELECT * FROM `core_news` ORDER BY `id` DESC") or exit(error("mysql-query"));
 $query_check = mysqli_query($mysqli, "SELECT * FROM `core_news` WHERE `id`='1'") or exit(error("mysql-query"));
 if($query_check->num_rows > 0){
 while($g_new = mysqli_fetch_assoc($query)){
  $get_news.= "
   ID: ".$g_new['id']." | ".$g_new['title']."<br>
  ";
 }
}else{
 $get_news = "
   <p>НЕТ НОВОСТЕЙ</p>
 ";
}

 mysqli_close($mysqli);

$admin_news = "
<center>
<button class='form-btn' id='news-delete-btn' style='width:200px;'>Удалить</button><button class='form-btn' id='news-index-btn' style='width:200px;'>Новости</button><button class='form-btn' id='news-create-btn' style='width:200px;'>Создать</button>
<div class='block' id='news-delete'>
 <form method='post'>
  <input type='number' class='form-input' name='delete-id' placeholder='Введите ID Новости'>
  <button class='form-btn' name='delete-go'>Удалить</button>
 </form>
</div>
<div class='block' id='news-index'>
 $get_news
</div>
<div class='block' id='news-create' style='height: 1000px;'>
 <form method='post' enctype='multipart/form-data'> 
  <textarea style='width: 100%;height:700px' name='create-text'></textarea>
  <input type='file' name='img'>
  <button class='form-btn' name='create-go'>Создать</button>
 </form>
</div>
</center>
";

?>