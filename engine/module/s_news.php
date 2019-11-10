<?php
 include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");

 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
 mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));

 $query = mysqli_query($mysqli, "SELECT * FROM `core_news` ORDER BY `id` DESC LIMIT 5") or exit(error("mysql-query"));
 $query_check = mysqli_query($mysqli, "SELECT * FROM `core_news` WHERE `id`='1'") or exit(error("mysql-query"));
 $count = 0;
 if($query_check->num_rows > 0){
 while($s_new = mysqli_fetch_assoc($query)){
 $count++;
  $wall_news.= "
   <div class='block donate' style='padding: 0;'>
    <img src='/upload/news/".$s_new['id'].".png' style='width:100%;height:auto;'>
    <div style='margin: 30px 20px;'>
    <h1>Новость #".$count."</h1>
    <p style='font-size:16px;'>".substr($s_new['new'], 0, 599)."...</p>
    <a  href='/?do=new&id=".$s_new['id']."'><button class='form-btn'>Подробнее</button></a>
    </div>
    </div>
  ";
 }
}else{
 $wall_news = "
  <div class='block donate'>
   <p>НЕТ НОВОСТЕЙ</p>
  </div>
 ";
}

 mysqli_close($mysqli);

?>