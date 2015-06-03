<?php
echo '<table border="5">';
echo '<thead><td>Name</td><td>Email</td><td>Teaching Experience</td></thead>';
foreach ($result as $value) {
	echo '<tr>';
	echo '<td>'.$value['name']."</td>   <td>".$value['email']."</td>   <td>".$value['teachingexp'];
	echo '<td><button>View</button></td>';
	if($value['isselected']=='f'){
		echo '<td><button onclick="accept($tid)">Accept</button></td>';
		echo '<td><button>Reject</button></td>';
	}
	else if($value['isselected']=='a'){
		echo '<td>Accepted</td>';
	}
	else if($value['isselected']=='r'){
		echo '<td>Rejected</td>';
	}	
	echo '</tr>';
}
echo '</table>';
echo '<p id="demo"></p>';
?>