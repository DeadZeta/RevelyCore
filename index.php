<?php

include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");

if(!file_exists("$_SERVER[DOCUMENT_ROOT]/install.php")){
if($config['home'] == $_SERVER['SERVER_NAME']){
if($config['dev_mode'] == 'true'){
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
echo "Dev Mode Activated!";
}

include("$_SERVER[DOCUMENT_ROOT]/engine/core.php");
include("$_SERVER[DOCUMENT_ROOT]/engine/module/error.php");

if(isset($_GET['do'])){
 $_GET['do'] = strtolower($_GET['do']);
 switch ($_GET['do']) {
 	case 'donate':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/donate.php");
 	 template('public', $donate, "Донат Услуги");
 	break;

 	case 'play':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/play.php");
 	 template('public', $play, "Как Начать Играть?");
 	break;

 	case 'rules':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/rules.php");
 	 template('public', $rules, "Правила");
 	break;

 	case 'new':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/new.php");
 	 template('public', $f_news, "Новость");
 	break;

 	case 'cabinet':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/cabinet.php");
 	 template('private', $cabinet, "Личный Кабинет");
 	break;
 	
 	default:
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/home.php");
 	 template('public', $index, "Главная");
    break;
 }
}else{
 if(isset($_POST['auth'])){
  include("$_SERVER[DOCUMENT_ROOT]/engine/module/ajax/login.php");
 }
 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/home.php");
 template('public', $index, "Главная");
}
}else{
 header("Location: http://".$config['home']."/");
}
}else{
 echo "<script> location.href='/install.php'; </script>";
}
?>