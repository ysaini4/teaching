<?php
include "includes/app.php";

load_view("Template/top.php");

load_view("Template/navbarnew.php");

load_view("joinustmp3.php");



if(false){

	$a=Funs::getTeacherTimeSlotsForDay(22,6,2015,3);

	print_r($a);

	$a=Sql::getArray("select * from timeslot where tid=3");

	foreach($a as $i=>$row){
		$a[$i]["starttime"]=Fun::timetostr($row["starttime"]);
	}

	Disp::disp_table($a);
}





load_view("Template/footernew.php");
load_view("Template/bottom.php");

closedb();
?>