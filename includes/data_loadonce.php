<?php

$_ginfo["page"]=curfilename();
$view_default["template/header.php"]["islogin"]=User::loginType();

$_ginfo["joinus_need_to_confirm"]=true;

?>