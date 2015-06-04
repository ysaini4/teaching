<?php
$subN=array("Mathematics","Physics","Chemistry","Biology","Science(6-10)","Others");
$gradeN=array("6th to 8th","9th to 10th","11th to 12th","IIT JEE");
$langN=array("English","Hindi","Assamese","Sanskrit","Bengali","Mayalayam","Tamil","Gujarati","Marathi","Telugu","Oriya","Urdu","Kannada","Punjabi");
$knowN=array("Facebook","Email","Friends","Others");
$homeN=array("Yes","No");

foreach ($result as $value){
	echo "<b>Name: </b>".$value['name'].'<br><br>';
	$subject=Funs::extractFields($value['jsoninfo'],$subN,"sub");
	echo '<b>Subjects: </b>'.$subject.'<br><br>';

	//classes display
	$jsonArray=str2json($value['jsoninfo']);	
	$grades=$jsonArray["grade"];
	$gradeArray=explode("-", $grades);
	$str="";
	foreach($gradeArray as $key){ 
		$str=$str.$gradeN[$key-1].' , ';
	}
	echo '<b>Classes: </b>'.substr_replace($str, "", -2).'<br><br>';
	//classes display ends

	echo '<b>Minimum Fees: </b>Rs. '.$jsonArray["minfees"].'<br><br>';
	echo '<b>Teaching Experience(in years): </b>'.$value['teachingexp'].'<br><br>';
	
	//languages
	$langArray=explode("-", $value['lang']);
	$str="";
	foreach ($langArray as $key) {
		$str=$str.$langN[$key-1].' , ';
	}
	echo '<b>Languages: </b>'.substr_replace($str, "", -2).'<br><br>';
	//end languages

	echo '<b>College: </b>IIT '.$jsonArray["college"].'<br><br>';

	//Degree Display
	$comma="";
	$degreeOther="";
	if(trim($jsonArray["degreeother"])!="")
	{
		$comma=" , ";
		$degreeOther=$jsonArray["degreeother"];
	}
	echo '<b>Degree: </b>'.$jsonArray["degree"].$comma.$degreeOther.'<br><br>';
	//Degree Display
	echo '<b>Branch: </b>'.$jsonArray["branch"].'<br><br>';
	echo '<b>Email: </b>'.$value['email'].'<br><br>';
	echo '<b>Phone Number: </b>'.$value['phone'].'<br><br>';
	echo '<b>Gender: </b>'.$value['gender'].'<br><br>';
	echo '<b>Date Of Birth: </b>'.fun::timetodate($value['dob']).'<br><br>';
	echo '<b>OK with home tuition: </b>'.$homeN[$jsonArray['home']-1].'<br><br>';
	echo '<b>Address</b><br>';
		echo '<div style="margin-left:30px;"><b>City: </b>'.$jsonArray['city'].'</div>';
		echo '<div style="margin-left:30px;"><b>Zipcode: </b>'.$jsonArray['zipcode'].'</div>';
		echo '<div style="margin-left:30px;"><b>State: </b>'.$jsonArray['state'].'</div>';
		echo '<div style="margin-left:30px;"><b>Country: </b>'.$jsonArray['country'].'</div><br><br>';

	$knowabout=Funs::extractFields($value['jsoninfo'],$knowN,"knowaboutus");
	echo '<b>Know About Us: </b>'.$knowabout.'<br><br>';

	echo '<b>Linkedin Profile: </b>'.$jsonArray['linkprofile'].'<br><br>';
	echo '<b>Feedback: </b>'.$jsonArray['feedback'].'<br><br>';
	$calV= $jsonArray['calvarification'];
	$resume=$jsonArray['resume'];
?>
	<b>College Verification: </b><a href="<?php echo "../../../$calV" ?>">Click here to see the pdf</a><br><br>
	<b>Resume: </b><a href="<?php echo "../../../$resume" ?>">Click here to see the pdf</a><br><br>
<?php

	$id=$value['tid'];
	if($value['isselected']=='f'){
	?>
		<b style="margin-left:500px;"><a href="<?php echo BASE."accept/$id" ;?>">Accept</a></b>
		<b style="margin-left:10px;"><a href="<?php echo BASE."reject/$id" ;?>">Reject</a></b>
	<?php
	}
	else if($value['isselected']=='a'){
		echo '<b style="margin-left:500px;">Accepted</b>';
	?>
		<b style="margin-left:10px;"><a href="<?php echo BASE."reject/$id" ;?>">Reject</a></b>
	<?php
	}
	else if($value['isselected']=='r'){
	?>
		<b style="margin-left:500px;"><a href="<?php echo BASE."accept/$id" ;?>">Accept</a></b>
	<?php
				echo '<b style="margin-left:10px;">Rejected</b>';
	}	

}
?>
