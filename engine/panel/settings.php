<?php

if(isset($_POST['config-go'])){
 
 $config='$config';

 $saveconfig = "<?php
 $config = array(
 'home' => '".$_POST['config-url-home']."',
  'template' => '".$_POST['config-template']."',
  'title' => '".$_POST['config-title']."',
  'server' => '".$_POST['config-ip']."',
  'admin_mail' => '',
  'permission' => '".$_POST['config-permission']."',
  'hash' => '".$_POST['config-hash']."',
  'salt' => '".$_POST['config-salt']."',
  'dev_mode' => '".$_POST['config-dev']."',
  'version' => '2.0',//DONT TOUCH
 );
 ?>";

 var_dump(file_put_contents("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php", $saveconfig));
}

?>