<?php
 include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");

 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
 mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));

 $query = mysqli_query($mysqli, "SELECT * FROM `core_news` WHERE `id`='1'") or exit(error("mysql-query"));
 if($query->num_rows > 0){
  $full_new = mysqli_fetch_assoc($query);
  $news = "
   <div class='block donate' style='padding: 0;'>
    <img src='/upload/news/".$full_new['id'].".png' style='width:100%;height:auto;'>
    <div style='margin: 30px 20px;'>
  	<p style='font-size:16px;'>".$full_new['new']."</p>
    </div>
  	</div>
  ";
 }else{
 $news = "
  <div class='block donate'>
   <p>НЕТ НОВОСТЕЙ</p>
  </div>
 ";
}

 mysqli_close($mysqli);

?>