<?php

include("$_SERVER[DOCUMENT_ROOT]/engine/settings/dbconfig.php");
$mysqli = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password']);
mysqli_select_db($mysqli, $dbconfig['base']) or exit(error("select-base"));
 if(isset($_POST['delete-go'])){
 mysqli_query($mysqli, "DELETE FROM `core_news` WHERE `id`='".$_POST['delete-id']."'") or die(mysqli_error($mysqli));
}
if(isset($_POST['create-go'])){
   $result = mysqli_fetch_row(mysqli_query($mysqli, "SELECT MAX(id) FROM `core_news`"));
   $createid = $result[0]+'1';
   mysqli_query($mysqli, "INSERT INTO `core_news`(`id`, `new`) VALUES ('".$createid."','".$_POST['create-text']."')") or die(mysqli_error($mysqli));
	if(isset($_FILES) && $_FILES['img']['error'] == 'UPLOAD_ERR_OK'){ // Проверяем, загрузил ли пользователь файл
$destiation_dir = "$_SERVER[DOCUMENT_ROOT]/upload/news/".$createid.".png"; // Директория для размещения файла
move_uploaded_file($_FILES['img']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
}else{
echo 'No File Uploaded'; // Оповещаем позователя о том, что файл не был загружен
}
}
mysqli_close($mysqli);
?>