<?php
include "includes/app.php";
load_view("Template/top.php");


print_r(gets("login"));



load_view("Template/bottom.php");

closedb();
?>