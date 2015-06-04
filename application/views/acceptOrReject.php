<?php
echo '<table border="5">';
echo '<thead><td>Teacher Id</td><td>Name</td><td>Subjects</td><td>Classes</td><td>Minimum Fees</td><td>Teaching Experience</td></thead>';

$subN=array("Mathematics","Physics","Chemistry","Biology","Science(6-10)","Others");
$gradeN=array("6th to 8th","9th to 10th","11th to 12th","IIT JEE");

foreach ($result as $value) {

	echo '<tr>';
	echo '<td>'.$value['tid'].'</td>';
	echo '<td>'.$value['name'];
	$jsonArray=str2json($value['jsoninfo']);	

	//Subjects display
	$subject=Funs::extractFields($value['jsoninfo'],$subN,"sub");
	echo '<td>'.$subject.'</td>';
	//subject display ends here
	
	//classes display
	$grades=$jsonArray["grade"];
	$gradeArray=explode("-", $grades);
	$str="";
	foreach($gradeArray as $key){ 
		$str=$str.$gradeN[$key-1].' , ';
	}
	echo '<td>'.substr_replace($str, "", -2).'</td>';
	//classes display ends

	echo '<td>'.$jsonArray['minfees'].'</td>';
	echo '<td>'.$value['teachingexp'].'</td>';
	$id=$value['tid'];
	?>
		<td><a href="<?php echo BASE."view/$id" ;?>">View</a></td>
	<?php


	if($value['isselected']=='f'){
	?>
		<td><a href="<?php echo BASE."accept/$id" ;?>">Accept</a></td>	
		<td><a href="<?php echo BASE."reject/$id" ;?>">Reject</a></td>
	<?php
	}
	else if($value['isselected']=='a'){
		echo '<td>Accepted</td>';
	?>
		<td><a href="<?php echo BASE."reject/$id" ;?>">Reject</a></td>
	<?php
	}
	else if($value['isselected']=='r'){
	?>
		<td><a href="<?php echo BASE."accept/$id" ;?>">Accept</a></td>	
	<?php
				echo '<td>Rejected</td>';
	}	
	echo '</tr>';
}
echo '</table>';
?>
