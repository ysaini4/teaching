<?php
include "includes/app.php";

if(get("key")="vm341sm"){
	$cmd="git pull -u origin master";
	shell_exec($cmd);
	shell_exec("chmod 777 * -R");
}

closedb();
?>