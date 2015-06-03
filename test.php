<?php
include "includes/app.php";


$a=Funs::timeslotlist(true);

print_r($a[2]);

closedb();
?>