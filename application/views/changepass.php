<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>

<html>
	<head>

	</head>
	<body>
		<form method="post" onsubmit="return checkpass()">
			Old Password: <input name="oldpass" id="oldpass" type="text" required/>
			New Password: <input name="newpass" id="newpass" type="text" required/>
			Confirm Password: <input name="newcpass" id="newcpass" type="text" required/>
			<input type="submit" value="Change Password"/>
		</form>
	</body>
</html>
		<script type="text/javascript">
			function checkpass() {
			newp=document.getElementById('newpass').value;
			newcp=document.getElementById('newcpass').value;
			if(newp!=newcp){
				window.alert('Password and Confirm password doesnt match!!');
				return false;
			}
			else 
				return true;
		}
		</script>

<?php
load_view("Template/footernew.php");
load_view("Template/bottom.php",array("needbody"=>false));
?>
