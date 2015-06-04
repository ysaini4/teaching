<?php
include "includes/app.php";

if($_GET["key"]=="mohit112"){
	echo shell_exec("git pull");
}

closedb();
?>