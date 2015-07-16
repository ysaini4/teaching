<?php
include "includes/app.php";
load_view("Template/top.php");

if(ispost("postfeedback")) {
	Sqle::insertVal("msreview", array("feedback" => post("feedback"), "time" => time(), "ip" => $_SERVER['REMOTE_ADDR']));
}

?>


<div class='card' style='margin:10px;padding:10px;' >
	<?php
		if(!ispost("postfeedback")) {
	?>
		<form method="post" >
			<textarea placeholder='Write Your Anonymous review here.' name="feedback" class='materialize-textarea' ></textarea>
			<button name="postfeedback" type="submit" class="btn waves-effect waves-light" >Submit</button>
		</form>
	<?php
		} else {
	?>
		<div>
			<?php echo Fun::smilymsg("Thank you :)");?>
		</div>
	<?php
		}
	?>
</div>


<?php
load_view("Template/bottom.php");
closedb();
?>