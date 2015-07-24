<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");

if(true || $aboutinfo["isselected"] == "a" || User::isloginas("a") ) { 
?>
	<main>
		<div class="container">
		<br>
			<div class="card-panel">
				<div class="row">
					<div class="col s12">
						<ul class="tabs"  >
							<li class="tab col s2"><a id="profiletabs1" <?php pit('class="active"', $tabid==1); ?> href="#tab_profile">Profile</a></li>
							<li class="tab col s2"><a id="profiletabs5" <?php pit('class="active"', $tabid==5); ?>  href="#tab_topics">Topics</a></li>
							<li class="tab col s2"><a id="profiletabs2" <?php pit('class="active"', $tabid==2); ?> href="#tab_calendar">Calendar</a></li>
							<li class="tab col s2"><a id="profiletabs4" <?php pit('class="active"', $tabid==4); ?> href="#tab_reviews">Reviews</a></li>
							<li class="tab col s2" style="<?php pit("visibility:hidden", $tid != User::loginId()); ?>" ><a id="profiletabs3" <?php pit('class="active"', $tabid==3); ?> href="#tab_classes">Classes</a></li>
							<li class="tab col s2" style="<?php pit("visibility:hidden", $tid != User::loginId()); ?>" ><a id="profiletabs5" <?php pit('class="active"', $tabid==5); ?> href="#tab_account">Account</a></li>
						</ul>
					</div>
					<div id="tab_profile" class="col s12 offset-l1">
					<?php 
						load_view("Template/profile_about.php", $inp);
					?>
					</div>
					<div id="tab_calendar" class="col s12">
					<?php
						load_view("Template/profile_calendar.php",Fun::mergeifunset($calinfo,array("tid"=>$tid)) );
					?>
					</div>
					<div id="tab_classes" class="col s12">
					<?php
						load_view("Template/profile_classes.php", $myclasses);
					?>
					</div>
					<div id="tab_reviews" class="col s12">
					<?php
						load_view("Template/profile_reviews.php", Fun::mergeifunset($inp, array("reviewname" => "studentname")));
					?>
					</div>
					<div id="tab_topics" class="col s12">
					<?php
						load_view("Template/profile_topics.php",Fun::mergeifunset($topicinfo,array("tid"=>$tid,'minfees'=>$jsonArray['minfees'])));
					?>
					</div>
					<div id="tab_account" class="col s12">
					<?php
						load_view("Template/moneyaccount.php", Fun::mergeifunset($inp, array("tid"=>$tid)));
					?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php
} else {
	if($tid == User::loginId())
		echo "You Are not selected.";
}
?>

<?php
load_view("Template/footernew.php");
load_view("popup.php",array("name"=>"timeslot", "title" => "Please select your free slots"));
load_view("Template/bottom.php",array("needbody"=>false));
?>
	<script>
	var selectedtopic = "";
	function displaytext() {
		document.getElementById("displayte").style.visibility = "hidden";
	}
	function displaytext_t2() {
		document.getElementById("getText").style.visibility = "visible";
		document.getElementById("getText1").style.visibility = "visible";
	}
	</script>
	<script src="js/profile.js"></script>
</body>
</html>