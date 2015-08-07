<?php
echo "code by yogy";
function getTeacherUserDetails($row) {
	/*teachers table details
	*/
	global $_ginfo;
	$details=array();
	$details['id']=$row['tid'];
	$details['iit']=$row['iit'];
	$details['iitentryyear']=$row['iitentryyear'];
	$details['degree']=$row['degree'];
	$details['experience']=$row['experience'];
	$details['addinfo']=$row['addinfo'];
	$details['isselected']=$row['isselected'];
	$details['rate']=$row['rate'];
	$details['youtubelink']=$row['youtubelink'];
	$jsoninfo=$row['jsoninfo'];//Why, this is not formatted ?
	$jsonArray=str2json($jsoninfo);
	$details['subother']=$jsonArray['subother'];
	$details['city']=$jsonArray['city'];
	$details['country']=$jsonArray['country'];
	$details['zipcode']=$jsonArray['zipcode'];
	$details['state']=$jsonArray['state'];
	$details['minfees']=$jsonArray['minfees'];
	$details['linkprofile']=$jsonArray['linkprofile'];
	$details['knowaboutusother']=$jsonArray['knowaboutusother'];
	$details['college']=$jsonArray['college'];
	$details['degree']=$jsonArray['degree'];
	$details['degreeother']=$jsonArray['degreeother'];
	if($details['degreeother']!='') 
		$details['combineddegree']=$details['degree'].','.$details['degreeother'];
	$details['calvarification']=$jsonArray['calvarification'];
	$details['branch']=$jsonArray['branch'];
	$details['resume']=$jsonArray['resume'];
	$details['feedback']=$jsonArray['feedback'];
		$subjects=intexplode_t2('-',$jsonArray['sub'],6);// Copied #issue1
		foreach ($subjects as $key => $value) {
			if($value==6) {//#issue1 : what the hell 6 means ?
				if($details['subother']!='')
					$subArray[]=$details['subother'];
			}
			else 
				$subArray[]=$_ginfo['encodeddataofteacherstable']['sub'][$value-1];
		}
	$details['sub_names']=$subArray;
	$details['sub_index']=$subjects;
		$grades=intexplode_t2('-',$jsonArray['grade'],4);//#issue2: What the hell 4 means ?
		foreach ($grades as $key => $value) {
			$gradeArray[]=$_ginfo['encodeddataofteacherstable']['grade'][$value-1];
		}
	$details['grade_names']=$gradeArray;
	$details['grade_index']=$grades;
	$details['home_name']=$_ginfo['encodeddataofteacherstable']['home'][$jsonArray['home']-1];
	$details['home_index']=$jsonArray['home'];
	$details['teachingexp']=$row['teachingexp'];
		$languages=intexplode_t2('-',$row['lang'],14);//#issue3: What the hell 14 means ??
		foreach ($languages as $key => $value) {
			$langArray[]=$_ginfo['encodeddataofteacherstable']['lang'][$value-1];
		}
	$details['lang_names']=$langArray;
	$details['lang_index']=$languages;
	$details['teachermoto']=$row['teachermoto'];

	//users table data
	$details['id']=$row['id'];
	$details['username']=$row['username'];
	$details['email']=$row['email'];
	$details['name']=$row['name'];
	$details['address']=$row['address'];
	$details['phone']=$row['phone'];
	$details['type']=$row['type'];
	$details['create_time_date']=date('Y-m-d H:i:s',$row['create_time']);// { date('Y-m-d H:i:s'} This piece of code is not atomic, still it is used in line thisfile:Line74 , thisfile:Line76 & Fun.php:Line 99 . Used 4 times to non-atomic code. what the hell ?
	$details['create_time_timestamp']=$row['create_time'];
	$details['update_time_date']=date('Y-m-d H:i:s',$row['update_time']);
	$details['update_time_timestamp']=$row['update_time'];
	$details['dob_date']=date('Y-m-d H:i:s',$row['dob']);
	$details['dob_timestamp']=$row['dob'];
	$details['profilepic']=$row['profilepic'];
	$details['profilepicbig']=$row['profilepicbig'];
	$details['gender']=$row['gender'];
	return $details;
}

// How much time will you take to modify, if i add another column in users/teachers table ???
// How much time will you take to modify, if we don't need to know all keys to save some computation time. required keys will be given as arguments.

?>


<?php

$changed = TRUE;

?>