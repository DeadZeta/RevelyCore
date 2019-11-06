<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
include("$_SERVER[DOCUMENT_ROOT]/engine/core.php");

if($config['home'] == $_SERVER['SERVER_NAME']){
if($config['dev_mode'] == 'true'){
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
}
if(isset($_GET['do'])){
 $_GET['do'] = strtolower($_GET['do']);
 switch ($_GET['do']) {
 	case 'donate':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/donate.php");
 	 template('public', $donate, "Донат Услуги");
 	break;

 	case 'rules':
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/rules.php");
 	 template('public', $rules, "Правила");
 	break;
 	
 	default:
 	 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/home.php");
 	 template('public', $index, "Главная");
    break;
 }
}else{
 include("$_SERVER[DOCUMENT_ROOT]/templates/".$config['template']."/home.php");
 template('public', $index, "Главная");
}
}else{
 header("Location: http://".$config['home']."/");
}
?>