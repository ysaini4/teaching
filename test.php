<?php
include "includes/app.php";

load_view("Template/top.php");


if(false){
	sets("login",array("id"=>2, "type"=>"s"));

	$c=array("name"=>"Saini MohitVikasj.......");

	$a=handle_request(Fun::mergeifunset($c, array("action"=>"saveuserdetails")));

	print_r($a);
}

?>

<form onsubmit='form.sendreq1(this,$(this).find("button")[0]);return false;' data-action="saveuserdetails" >
<?php
form_input(array("name"=>"email"));
form_input(array("name"=>"name"));
?>
<button>Save</button>
</form>



<?php

load_view("Template/bottom.php");


closedb();
?>