<?php
include("$_SERVER[DOCUMENT_ROOT]/engine/settings/config.php");
$head = "
<meta charset='utf-8'>
<link rel='stylesheet' href='/templates/".$config['template']."/css/bootstrap.min.css'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.js'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.js'></script>
<script type='text/javascript' src='/templates/".$config['template']."/js/libs.js'></script>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700' rel='stylesheet'>
<link rel='stylesheet' href='/templates/".$config['template']."/css/style.css'>
<link rel='shortcut icon' href='/templates/".$config['template']."/images/favicon.png' type='image/png'>
";
?>