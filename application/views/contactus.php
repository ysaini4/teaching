<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>

<!doctype html>
<html>
<head>
  <title>Get IITians</title>
  <link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/jquery.bxslider.css" media="screen,projection"/>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<body>

<br>
<h5 class="bold teal-text center" style="font-variant:small-caps">Contact Us</h5>

<div class="container">
	<div class="row">
		<div class="col s12 l8 offset-l2">
			<div class="card">
				<h6 class="teal-text bold" style="padding-left:15px;">Address</h6>
				<div class="divider"></div>
				<div class="row">
					<div class="col s5" style="padding-left:15px;">
						<p>B-Block<br>Shivalik<br>Malviya Nagar<br>New Delhi, 000000</p>
					</div>
					<div class="col s5">
						<ul>
							<li><p class="" href="#"><i class="mdi-maps-local-phone"></i> +919876543210</p></li>
							<li>
				              <a class="grey-text text-lighten-3" href="#!"><img src="images/facebook.png" alt="Facebook" width="30" height="30"/></a>&nbsp;
				              <a class="grey-text text-lighten-3" href="#!"><img src="images/twitter.png" alt="Twitter" width="30" height="30"/></a>&nbsp;
				              <a class="grey-text text-lighten-3" href="#!"><img src="images/google-plus.png" alt="Google+" width="30" height="30"/></a>&nbsp;
				            </li>
					</div>
					<div class="col s2">
						<i class="large mdi-communication-location-on teal-text"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col s6">
			<div class="card">
			  <?php
			    if($msg!="")
			    {
			      echo "Message : ".$msg;
			    }
			    else
			    {
			  ?>
			      <form id="contact-form" method="post">
				      <div class="input-field col s10 offset-s1" id="input-field">
					      <input id="name" name="name" type="text" class="validate" required="required">
					      <label for="name">Name</label>
				      </div>
				      <div class="input-field col s10 offset-s1" id="input-field">
					      <input id="phone" name="phone" type="tel" class="validate" maxlength="10" required="required">
					      <label for="phone">Phone No.</label>
				      </div>
				      <div class="input-field col s10 offset-s1" id="input-field">
					      <input id="email" name="email" type="email" class="validate" required="required">
					      <label for="email">Email</label>
				      </div>
				      <div class="input-field col s10 offset-s1">
					      <textarea id="icon_prefix2" name="msg" class="materialize-textarea"></textarea>
					      <label for="icon_prefix2">Your Message</label>
				      </div>
				      <div class="input-field col s5 right">
					      <button class="btn waves-effect waves-light" type="submit" style="margin-bottom:5px;">submit
					      <i class="mdi-content-send right"></i>
					      </button>
				      </div>
			      </form>
			  <?php
			    }
		          ?>
		  	</div>
		</div>
		<div class="col s6">
			<div class="card">
				<div id="map-canvas"></div>
			</div>
		</div>
	</div>
</div>

<style>
#map-canvas {
    height: 400px;
}
#input-field{
	height: 42px;
}
.input-field label{
	font-size: .8rem;
}
</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        var myCenter=new google.maps.LatLng(28.535545, 77.207110);
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center:myCenter,
          zoom: 19,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<?php
load_view("Template/footernew.php");
load_view("Template/bottom.php");
?>