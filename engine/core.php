<?php

function template($type, $static, $description){
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/head.php");
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/monitoring.php");
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/auth.php");
 include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/main.php");

 $search = array("{auth}", "{monitoring}", "{content}", "{mauth}");
 $replace = array($authorization, $monitoring, $static, $mauthorization);

 $static = str_replace($search, $replace, $main);

 $static = "
 <!DOCTYPE html>
<html>
<head>
	<title>".$config['title']." - ".$description."</title>
	".$head."
</head>
<body>
 ".$static."
</body>
</html>
 ";
 switch ($type) {
 	case 'public':
 	 echo $static;
 	break;
 	
 	case 'private':
     if(isset($_COOKIE['rc_user'])){
      echo $static;
     }else{
      echo error("page-403");
     }
 	break;
 }
}

//CHECK DB
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");
$mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));
 $core_users = mysqli_fetch_assoc(mysqli_query($mysqli, "CHECK TABLE `core_users`")) or exit(error("mysql-query"));
 $core_news = mysqli_fetch_assoc(mysqli_query($mysqli, "CHECK TABLE `core_news`")) or exit(error("mysql-query"));
 $core_stats = mysqli_fetch_assoc(mysqli_query($mysqli, "CHECK TABLE `core_statistic`")) or exit(error("mysql-query"));
 $core_payments = mysqli_fetch_assoc(mysqli_query($mysqli, "CHECK TABLE `core_payments`")) or exit(error("mysql-query"));
 if($core_users['Msg_type'] == "Error"){
  mysqli_query($mysqli, "CREATE TABLE core_users(name TEXT, cash FLOAT, password TEXT, permission TEXT)") or exit(error("create-table"));
}
if($core_news['Msg_type'] == "Error"){
  mysqli_query($mysqli, "CREATE TABLE core_news(id FLOAT, new TEXT)") or exit(error("create-table"));
}
if($core_stats['Msg_type'] == "Error"){
  mysqli_query($mysqli, "CREATE TABLE core_statistic(users FLOAT, balance FLOAT)") or exit(error("create-table"));
}
if($core_payments['Msg_type'] == "Error"){
  mysqli_query($mysqli, "CREATE TABLE core_payments(name TEXT, cash FLOAT, date TEXT, id TEXT)") or exit(error("create-table"));
}

mysqli_close($mysqli);


?>