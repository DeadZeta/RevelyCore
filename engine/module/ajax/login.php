<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");

if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['go'])){
 $name = htmlspecialchars_decode($_POST['name']);
 $password = hash($config['hash'], $_POST['password'].$config['salt']);
 if($config['dev_mode'] == 'true'){
  setcookie("rc_user",$_POST['name'],time()+'604800');
  header("Location: http://".$_SERVER['SERVER_NAME']."/");
 }else{
 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
  mysqli_select_db($mysqli, $dbconfig['base']);
  $query = mysqli_query($mysqli, "SELECT * FROM `core_users` WHERE `name`='".$name."'") or die(mysqli_error($mysqli));
  if($query->num_rows > 0){
  $result = mysqli_fetch_assoc($query);
  if($result['password'] == $password){
  setcookie("rc_user",$_POST['name'],time()+'604800');
  header("Location: http://".$_SERVER['SERVER_NAME']."/");
  }else{
   header("Location: http://".$_SERVER['SERVER_NAME']."/");
  }
  }else{
  /* if($config['plugin_auth'] == 'true'){
   $query = mysqli_query($mysqli, "SELECT * FROM `".$config['plugin_auth_table']."` WHERE `".$config['plugin_auth_user']."`='".$name."'");
   if($query->num_rows > 0){
   //Coming soon...
   }else{
    header("Location: http://".$_SERVER['SERVER_NAME']."/");
   }
  }else{
  	header("Location: http://".$_SERVER['SERVER_NAME']."/");
  */
  header("Location: http://".$_SERVER['SERVER_NAME']."/");
  }
 }
 }else{
  echo "BETA: PARAMETER NO PASSED";
 }

?>