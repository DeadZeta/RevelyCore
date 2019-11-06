<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
$main = "
    <div class='sidenav' id='sidenav_mobile'>
        <div class='container'>
            <span class='close' id='sidenav_mobile_close'><img src='/templates/".$config['template']."/images/close.svg'></span>
        </div>
        <a href='/'>Покупка доната</a>
        <a href='/description'>Описание доната</a>
        <a href='/contacts'>Контакты</a>
        <a href='https://vk.com/inmineru' target='_blank'>Мы ВКонтакте</a>
    </div>
    <header>
        <div class='navbar-light navbar-expand-lg2'>
            <div class='container'>
                <div class='menu d-block d-lg-flex align-items-center justify-content-between'>
                    <span id='sidenav_mobile_toggle' class='d-lg-none d-xl-none'><img src='/templates/".$config['template']."/images/menu.svg'></span>
                    <a href='/'><img class='logo' src='/templates/".$config['template']."/images/logo.svg'></a>
                    <span class='d-none d-lg-inline d-md-none'>
                        <a class='a' href='https://vk.com/inmineru' target='_blank'>Мы ВКонтакте</a>
                        <a class='a' href='/description'>Описание доната</a>
                        <a class='a' href='/contacts'>Контакты</a>
                    </span>
                    <a href='/play'><button class='btnPlay d-block'>
                        <div><img src='/templates/".$config['template']."/images/btn-play.svg'></div>
                        <span>Как начать играть?</span>
                    </button></a>
                </div>
            </div>
        </div>
    </header>
    <div class='container'>
        <div class='row'>
            <div class='col-12 col-lg-7'>
    
    {content}

    <div class='block monitoring d-block d-lg-none'>
     {mauth}    
    </div>
    <div class='block monitoring d-block d-lg-none'>
     {monitoring}    
    </div>
    </div>
<div class='col-12 col-lg-5'>
    <div class='block monitoring d-none d-lg-block'>
     {auth}
    </div>
    <div class='block monitoring d-none d-lg-block'>
     {monitoring}
    </div>
    </div>
    </div>
   </div>
    <footer>
        Сделано <a class='color' href='//vk.com/anideadjp' target='_blank'>DeadZeta</a>
    </footer>
</body>

</html>
";

?>