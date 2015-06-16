<?php
if($needpopup){
	load_view("popup.php",array("name"=>"alert"));
	load_view("popup.php",array("name"=>"confirm"));
}
?>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom-script.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
<?php
addmyjs();
?>
</body>
</html>

