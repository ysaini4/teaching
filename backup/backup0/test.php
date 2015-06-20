<?php
include "includes/app.php";

load_view("Template/top.php");




$tid=3;
$pageinfo=Funs::get_teacher_cal_info($tid);

dummyheight(100);

?>



<div class="row" style="width:800px;" >
  <?php
  load_view("Template/uploadslotform.php",$pageinfo);
  ?>
</div>


<?php


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
?>

<?php
load_view("Template/bottom.php");

closedb();
?>

<script>
$(document).ready(function(){
	$("#mohits").click();
});
</script>
