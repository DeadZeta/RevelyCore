<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
if(isset($_GET['name']) && isset($_GET['amount'])){
 header("Location: https://sci.interkassa.com/?ik_co_id=".$config['shop_id']."&ik_pm_no=".time().$config['salt']."&ik_am=".$_GET['amount']."&ik_x_login=".$_GET['name']."&ik_cur=RUB&ik_desc=Пополнение Счета ".$_GET['name']);
}else{
 echo "bad request";
}
?>