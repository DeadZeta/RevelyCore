<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");

if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['auth'])){
 $name = htmlspecialchars_decode($_POST['name']);
 $password = hash($config['hash'], $_POST['password'].$config['salt']);
 $mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
  mysqli_select_db($mysqli, $dbconfig['base']);
  $query = mysqli_query($mysqli, "SELECT * FROM `core_users` WHERE `name`='".$name."'") or die(mysqli_error($mysqli));
  if($query->num_rows > 0){
  $result = mysqli_fetch_assoc($query);
  if($result['password'] == $password){
  setcookie("rc_user",$_POST['name'],time()+'604800');
  header("Location: http://".$config['home']."/");
  }
  }else{
  if($config['plugin_auth'] == 'true'){
    $other_table = $config['plugin_auth_table'];
    $other_name = $config['plugin_auth_name'];
    $other_pass = $config['plugin_auth_password'];
    $plugin_hash_password = hash($config['hash'], $_POST['password']);
    if($config['plugin_auth_strtolower'] == 'true'){
      $name = strtolower($name);
    }
   $check_user = mysqli_query($mysqli, "SELECT * FROM `$other_table` WHERE `$other_name`='".$name."'");
 if($check_user->num_rows > 0){
  $auth = mysqli_fetch_assoc($check_user);
  if($auth[$other_name] == $name){
   if($auth[$other_pass] == $plugin_hash_password){
     mysqli_query($mysqli, "INSERT INTO `core_users`(`name`, `cash`, `password`, `permission`) VALUES ('".$_POST['name']."','0','".$password."','Игрок')");
    setcookie("rc_user",$_POST['name'],time()+'604800');
    header("Location: http://".$config['home']."/");
   }
  }
 }
 }
 }
}

?>