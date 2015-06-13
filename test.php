<?php
include "includes/app.php";

load_view("Template/top.php");



$tid=3;
$pageinfo=Funs::get_teacher_cal_info($tid);


?>


            <ul id="dropdowntimeslot" class="dropdown-content" style='color:black;padding:20px;max-height:300px;display:block;' >
              <div class='row' style='padding:0px;margin:0px;' >

            <?php
            load_view("Template/uploadslotform.php",$pageinfo);
            ?>
              </div>
            </ul>
            <nav class="teal" role="navigation" style='width"100%;margin:0px;padding:0px;' >
              <div class="nav-wrapper container" style='width:100%;margin:0px;padding:0px;' >
                <ul id="nav-mobile" style='width:100%;margin:0px;padding:0px;'>
                  <li style='width:100%;' ><div align=center class="dropdown-button"  data-beloworigin="true" data-activates="dropdowntimeslot" style='cursor:pointer;' id="mohits" >Your free time Slot</div></li>
                </ul>
              </div>
            </nav>




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
