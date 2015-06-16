<?php
include "includes/app.php";


echo "mohit";



if(get("key")=="vm341sm"){
	$cmd="git pull -u origin master";
	echo shell_exec($cmd);
	echo shell_exec("chmod 777 * -R");
}
else{
	echo "Key not matched";
}
 


closedb();
?>