<?php
include "includes/app.php";
load_view("Template/top.php");

?>

<div style='margin:30px;' >
	<button data-action="dispcal" data-month="2" data-year="2015" onclick="button.sendreq_v2_t4(this,null, function(d){$('#downloadeddata').html(d);}  );" >Demo of WWM library's Ajax</button>

	<div id="downloadeddata" >
		Ajax se Aya hua Data yah dikhega ! 
	</div>
</div>


<?php


//echo Funs::sendmsg("7503759053","Hey, This is msg to mohit #$%^&* :p ");
load_view("Template/bottom.php");

closedb();
?>