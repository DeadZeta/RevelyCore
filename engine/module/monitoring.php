<?php

include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");

$get = file_get_contents("https://api.mcsrvstat.us/1/".$config['server']);

$info = json_decode($get);

if(isset($info->offline)){
$monitoring = "
        <h1>Мониторинг</h1>
        <div class='srv'>
            <div class='img'>
                <img src='/templates/".$config['template']."/images/mon-srv.png'>
            </div>
            <div>
                <div class='ip'>".$config['server']."</div>
                <div class='online'>
                   <p>Сервер Выключен</p>
                </div>
            </div>
        </div>
";
}else{
 $monitoring = "
        <h1>Мониторинг</h1>
        <div class='srv'>
            <div class='img'>
                <img src='/templates/".$config['template']."/images/mon-srv.png'>
            </div>
            <div>
                <div class='ip'>".$config['server']."</div>
                <div class='online'>
                   <p><span class='color'>".$info->players->online."</span> из <span class='color'>".$info->players->max."</span> игроков онлайн</p>
                </div>
            </div>
        </div>
";
}

?>