<?php
include "includes/app.php";
load_view("Template/top.php");

?>

<div style='margin:30px;' >
	<button data-action="mohit" data-month="2" data-year="2015" data-arg3="vikash Saini" onclick="button.sendreq_v2_t4(this,null, function(d){$('#downloadeddata').html(d);}  );" >Demo of WWM library's Ajax</button>
	<div id="downloadeddata" >
		Ajax se Aya hua Data yah dikhega ! 
	</div>
	<button data-action="mohit" data-year="2015" data-arg3="vikash Saini" onclick="button.sendreq(this);" data-res="alert(data);"  data-waittext="Loading...." data-restext="Done ! " >Demo of WWM library's Ajax1</button>
	
</div>


<?php


//echo Funs::sendmsg("7503759053","Hey, This is msg to mohit #$%^&* :p ");
load_view("Template/bottom.php");

closedb();
?>