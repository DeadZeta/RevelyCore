<?php

function template($type, $static, $description){
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/head.php");
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/monitoring.php");
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/auth.php");
 include("$_SERVER[DOCUMENT_ROOT]/engine/module/error.php");
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
      echo $error['403'];
     }
 	break;
 }
}

//CHECK DB
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
$mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
mysqli_select_db($mysqli, $dbconfig['base']);
 $core_users = mysqli_fetch_assoc(mysqli_query($mysqli, "CHECK TABLE `core_users`"));
 $core_news = mysqli_fetch_assoc(mysqli_query($mysqli, "CHECK TABLE `core_news`"));
 if($core_users['Msg_type'] == "Error"){
  mysqli_query($mysqli, "CREATE TABLE core_users(name TEXT, cash FLOAT, password TEXT, permission TEXT)") or die(mysqli_error($mysqli));
}
if($core_news['Msg_type'] == "Error"){
  mysqli_query($mysqli, "CREATE TABLE core_news(id FLOAT, new TEXT)") or die(mysqli_error($mysqli));
}
mysqli_close($mysqli);


?>