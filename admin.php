<?php

include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");

if($config['home'] == $_SERVER['SERVER_NAME']){
if($config['dev_mode'] == 'true'){
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
echo "Dev Mode Activated!";
}

include("$_SERVER[DOCUMENT_ROOT]/engine/panel/core.php");
include("$_SERVER[DOCUMENT_ROOT]/engine/module/error.php");

if(isset($_GET['do'])){
 $_GET['do'] = strtolower($_GET['do']);
 switch ($_GET['do']) {
 	case 'statistic':
 	 include("$_SERVER[DOCUMENT_ROOT]/engine/panel/page/statistic.php");
 	 template('private', $admin_statistic, "Статистика");
 	break;

 	case 'settings':
 	 if(isset($_POST['config-go'])){
      include("$_SERVER[DOCUMENT_ROOT]/engine/panel/settings.php");
     }
 	 include("$_SERVER[DOCUMENT_ROOT]/engine/panel/page/settings.php");
 	 template('private', $admin_settings, "Настройки");
 	break;
 	
 	default:
 	 include("$_SERVER[DOCUMENT_ROOT]/engine/panel/page/home.php");
 	 template('private', $admin_index, "Админ-Панель");
    break;
 }
}else{
 if(isset($_POST['auth'])){
  include("$_SERVER[DOCUMENT_ROOT]/engine/module/ajax/login.php");
 }
 include("$_SERVER[DOCUMENT_ROOT]/engine/panel/page/home.php");
 template('private', $admin_index, "Админ-Панель");
}
}else{
 header("Location: http://".$config['home']."/");
}
?>