<?php
include "includes/app.php";


echo "mohit1";



if(get("key")=="vm341sm"){
	$cmd="git fetch --all;git reset --hard origin/master";
	echo shell_exec($cmd);
	echo shell_exec("chmod 777 * -R");
}
else{
	echo "Key not matched";
}
 


closedb();
?>