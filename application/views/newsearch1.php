<!DOCTYPE html>
<head>
<?php
  opent("base",array("href"=>HOST));

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />
<title>Get IITians</title>

<link rel="stylesheet" href="jquery/jRating.jquery.css" type="text/css" />
<link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
//		$('select').material_select();
//		$('.basic').jRating();

	});
</script>

</head>

<?php
load_view("Template/navbarnew.php");
?>

<main>
    <div class="container">
    	<div class="row">
    		<div class="col m4 s12 card-panel">
    			<div class="row" style="margin-bottom:0;">
    				<h5 class="center teal-text">Refine Your Search</h5>
    				<div class="divider teal"></div>
  					<ul class="">
  						<li class="no-padding">
  							<ul class="collapsible collapsible-accordion">
  								<li class="bold">
          							<a class="collapsible-header">By Classes<i class="mdi-navigation-arrow-drop-down right"></i></a>
          							<div class="collapsible-body white">
           								 <ul id="options">
								            <li><a href="#!">Class VI</a></li>
								            <li><a href="#!">Class VII</a></li>
								            <li><a href="#!">Class VIII</a></li>
								            <li><a href="#!">Class IX</a></li>
								            <li><a href="#!">Class X</a></li>
								            <li><a href="#!">Class XI</a></li>
								            <li><a href="#!">Class XII</a></li>
								            <li><a href="#!">IIT Mains</a></li>
								            <li><a href="#!">IIT Mains</a></li>
								        </ul>
							        </div>
						        </li>
						        <li class="bold">
          							<a class="collapsible-header">By Subject<i class="mdi-navigation-arrow-drop-down right"></i></a>
          							<div class="collapsible-body white">
           								 <ul id="checks">
								            <li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box"/>
      											<label for="filled-in-box">Maths</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box1"/>
      											<label for="filled-in-box1">Physics</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box2"/>
      											<label for="filled-in-box2">Chemistry</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box3"/>
      											<label for="filled-in-box3">Biology</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box4"/>
      											<label for="filled-in-box4">Science</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box5"/>
      											<label for="filled-in-box5">History</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box6"/>
      											<label for="filled-in-box6">Geography</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box7"/>
      											<label for="filled-in-box7">Civics</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box8"/>
      											<label for="filled-in-box8">Psychology</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box9"/>
      											<label for="filled-in-box9">Economics</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box11"/>
      											<label for="filled-in-box11">Sociology</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box12"/>
      											<label for="filled-in-box12">Political Science</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box13"/>
      											<label for="filled-in-box13">Accountancy</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box14"/>
      											<label for="filled-in-box14">Business Studies</label>
    											</p>
    										</li>
    										<li><p>
      											
    											</p>
    										</li>
								        </ul>
							        </div>
						        </li>
		   			        </ul>
						</li>
  					</ul>
    			</div>
    		</div>
    		<div class="col m7 s12 offset-m1  card-panel">
    			<div class="result card">Showing 1-10 of 1000 results (402 online)</div>
          <div class="divider"></div>
          <div class="row card">
            <div class="col s3"><img src="images/searchpropic.png"></div>
            <div class="col s9">
              <h5>Himanshu Jain</h5>
              <blockquote>State University : of New York at Brockport</blockquote>
              <p>"I have a Bachelor's degree in Chemistry from New Jersey and am currently pursuing my PhD. in Chemistry.</p>
              <div class="divider"></div>
            </div>
            <div class="">
              Fee(hourly):000
            </div>
          </div>
          <div class="row card">
            <div class="col s3"><img src="images/searchpropic.png"></div>
            <div class="col s9">
              <h5>Himanshu Jain</h5>
              <blockquote>State University : of New York at Brockport</blockquote>
              <p>"I have a Bachelor's degree in Chemistry from New Jersey and am currently pursuing my PhD. in Chemistry.</p>
              <div class="divider"></div>
            </div>            
            <div class="">
              Fee(hourly):000
            </div>
          </div>
    		</div>
    	</div>
    </div>
</main>

<style>
.select-wrapper input.select-dropdown {
  color:#9e9e9e;
}

.dropdown-content {
  z-index:2;
}

.collapsible-accordion li a,label{
	color:#009688;
	font-weight: bold;
}

#options{
	margin-left: 26px;
}
#options li{
	padding:4px;
}
#checks li{
	height:30px;
}

</style>

<?php

load_view("Template/footernew.php");
load_view("Template/bottom.php");

?>