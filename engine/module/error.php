<?php

include("$_SERVER[DOCUMENT_ROOT]/engine/settings/c.php");

function error($type){
 include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
 $error_main = "
 <meta charset='utf-8'>
 <center>
 <div style='background-color: red;margin:0;width:400px;color:white;padding-top: 6px;padding-bottom: 6px;'>{error_title}</div>
 <div style='margin:0;width:398px;border: 1px solid #000;background-color: #f7f7f7;'>
 <p>{error_msg}</p></div>
 </center>
 ";
 $esearch = array("{error_title}", "{error_msg}");
 switch ($type) {
 	case 'create-table':
 	 $ereplace = array("Ошибка Создания Таблицы", "Внимание! Система зафиксировала ошибку создания Таблицы.<br>Пожалуйста Включите DEV Режим для полного Анализа!");
 	break;
 	case 'mysql-query':
 	 $ereplace = array("Ошибка Отправки Mysql", "Внимание! Система зафиксировала ошибку Отправки mysqli_query.<br>Пожалуйста Включите DEV Режим для полного Анализа!");
 	break;
 	case 'select-base':
 	 $ereplace = array("Ошибка Выбора Базы Данных", "Внимание! Система зафиксировала ошибку Выбора базы Данных.<br>Пожалуйста Включите DEV Режим для полного Анализа!");
 	break;
 	
 	default:
 	 $ereplace = array("Неизвестная Ошибка", "Внимание! Система зафиксировала не распознаную ошибку.<br>Пожалуйста Включите DEV Режим для полного Анализа!");
 	break;
 }
 return str_replace($esearch, $ereplace, $error_main);
}

?>