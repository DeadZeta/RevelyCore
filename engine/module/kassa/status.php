<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");
$dataSet = $_POST;
if(!$dataSet){
	exit('Ошибка платежа');
}

unset($dataSet['ik_sign']); // удаляем из данных строку подписи
ksort($dataSet, SORT_STRING); // сортируем по ключам в алфавитном порядке элементы массива
array_push($dataSet, $config['shop_key']); // добавляем в конец массива "секретный ключ"
$signString = implode(':', $dataSet); // конкатенируем значения через символ ":"
$sign = base64_encode(md5($signString, true)); // берем MD5 хэш в бинарном виде по сформированной строке и кодируем в BASE64

if ($sign != $_POST['ik_sign']){
	exit('Ошибка обработки платежа');
}

$mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['base']);
 $query = mysqli_query($mysqli, "SELECT * FROM `core_users` WHERE `name`='".$_POST['ik_x_login']."'");
 if($query->num_rows > 0){
  mysqli_query($mysqli, "UPDATE `core_users` SET `cash`=`cash`+".$_POST['ik_am']." WHERE `name`='".$_POST['ik_x_login']."'");
  mysqli_query($mysqli, "INSERT INTO `core_payments`(`name`, `cash`, `date`, `id`) VALUES ('".$_POST['ik_x_login']."', '".$_POST['ik_am']."', '".time()."', '".$_POST['ik_pm_no']."')");
  unset($query);
  unset($_POST);
  unset($sign);
  unset($dataset);
  unset($signString);
 }else{
  die('error');
 }
 mysql_close($mysqli);

?>