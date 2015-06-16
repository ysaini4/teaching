<?php
abstract class Funs{
	public static function headerinfo(){
		return array("title"=>"wwm","css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css"));
	}
	public static function cst_tree(){
		$query="select all_classes.classname, all_subjects.subjectname, all_topics.topicname, all_cst.* from all_cst left join all_classes on all_cst.c_id=all_classes.id left join all_subjects on all_cst.s_id=all_subjects.id left join all_topics on all_cst.t_id=all_topics.id ";
		$cstdata=Sql::getArray($query);
		$data=array();
		foreach($cstdata as $i=>$row){
			$cur=&$data;
			$ids=array("c_id","s_id","t_id");
			$names=array("classname","subjectname","topicname");
			for($j=0;$j<3;$j++){
				$cur=Fun::setifunset($cur,$row[$ids[$j]],array("name"=>$row[$names[$j]],"children"=>array()));
				$cur=&$cur[$row[$ids[$j]]]["children"];
			}
		}
		return $data;
	}
	public static function cst_tree2classlist($inp){
		$outp=array();
		foreach($inp as $key=>$val){
			$outp[]=array("val"=>$key,"disptext"=>$val["name"]);
		}
		return $outp;
	}
	public static function timeslotlist($sliced=false){
		$datetoday=Fun::datetoday();
		$times=array();
		for($i=0;$i<48;$i++){
			$times[]=Fun::timetotime_t3($datetoday+$i*1800,false)." - ".Fun::timetotime_t3($datetoday+($i+1)*1800,true );
		}
		if(!$sliced)
			return $times;
		else{
			$outp=array();
			for($i=0;$i<3;$i++)
				$outp[]=array_slice($times,16*$i,16);
			return $outp;
		}
	}

	//Made by ::Himanshu Rohilla::	
	//This function extracts the field from jsoninfo of teachers table from the database
	//$jsonArray is that jsoninfo field value in techers table
	//$subN is the array of field
	//$type is the name in jsoninfo field
	public static function extractFields($jsonArray,$subN,$type){
		$jsonArray=str2json($jsonArray);
		$subjects=$jsonArray[$type];
		$subArray=explode("-", $subjects);
		$check=0;
		$str="";

		foreach ($subArray as $key) {
			if($key!='other' && $check==0) {
				if($subN[$key-1]!="Others")	//for Other in 6 subjects
					$str=$str.$subN[$key-1]." , ";
			}
			else
				$check=1;
		}
		$comma="";
		$subOther="";
		if(trim($jsonArray[$type.'other'])!=""){	
			$comma=" , ";
			$subOther=trim($jsonArray[$type.'other']);
		}
		$finalString=$str.$subOther.$comma;
		$outSubject=substr_replace($finalString, "", -2);
		return $outSubject;
	}
	
	//Made by ::Himanshu Rohilla::
	//Displays the calender of $month and $year
	public static function calenderPrint($month,$year){
		global $_ginfo;
		$timestamp = strtotime($year.'-'.$month.'-1');
		$dayName = date('l', $timestamp);
		$days=$_ginfo["weekdays_long"];
		$numberOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$try=0;
		$count=1;
		for($row=0;$row<7;$row++){
			for($col=0;$col<7;$col++){
				if($row==0)
					$twoDArr[$row][$col]=$days[$col];
				else{
					if($days[$col]==$dayName && $try==0){
						$twoDArr[$row][$col]=$count++;
						$try=1;
					}
					else if($try==1 && $count<=$numberOfDays){
						$twoDArr[$row][$col]=$count++;
					}
					else{
						$twoDArr[$row][$col]="&nbsp";
					}
				}
			}
		}
		return $twoDArr;
	}
	function makeArray($slotList,$dayList,$repeatNumber){
		$sList=explode("_",$slotList);
		$dList=explode("_",$dayList);
		$currentDay = jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 0 );	//returns day number Monday as 1 tuesday as 2 .....
		$currentDay--;
		$c=0;
		$nextWeekCounter=0;
		for ($i=0; $i <=$repeatNumber; $i++) { 
			foreach ($dList as $day) {
				if ($day == $currentDay) {
					$day=7;
				}
				else{
					$day=$day-$currentDay;
					if($day<0)
						$day+=7;
				}
				foreach ($sList as $slot) {
					$todayMidnight = strtotime('today midnight');
					$nextDayMidnight = $todayMidnight + ($day+$nextWeekCounter)*3600*24;
					$toAddTime = ($slot-1)*1800;	
					$secondsArray[$c++] = $nextDayMidnight + $toAddTime;
				}
			}
			$nextWeekCounter+=7;
		}
		return $secondsArray;//Array containing all timestamp
	}
	function bulktsquery($slotList,$dayList,$startdate,$enddate){
		$outp=array();
		for($i=$startdate;$i<=$enddate;$i+=3600*24){
			if(in_array(0+date("N",$i),$dayList)){
				for($j=0;$j<count($slotList);$j++){
					$class_starttime=$i+1800*($slotList[$j]-1);
					$outp[]=array($class_starttime,User::loginId());
				}
			}
		}
		return Fun::makeDummyTableColumns($outp);
	}


	//Function Added By Tej Pal Sharma
	//Fetches timeslots of a teacher identified by tid from the database, based on the person (admin,teacher,student or guest) viewing the result.
	public static function getTeacherTimeSlotsForDay($day,$month,$year,$tid=0,$timeslotsTable = 'timeslot')
	{
		$timestamp = strtotime($day.'-'.$month.'-'.$year.' 00:00:00');
		$timestampMidNightStartOfDay = $timestamp;
		$timestampMidNightEndOfDay  = $timestamp+3600*24;
		$userLoginId = 0+User::loginId();
	
		//Fetch Time Slots of Teacher, ORDER HERE IS A MUST AND MUST NOT BE ALTERED.
		$query = "SELECT tid, starttime, sid  FROM ".$timeslotsTable." WHERE tid = ".(0+$tid)." AND (".isUserLoggedInAs(array('a','t'))." OR "."( sid=0 OR sid=? )".") ORDER BY starttime ASC ";
		$timeslotsForTeacher = Sqle::getArray($query,'i',array(&$userLoginId));

		$timeslotForDay = array();
		//THE FOLLOWING LOOP WILL INCREASE OVERHEAD WHEN NUMBER OF TIMESLOTS ARE LARGE
		//CAN BE OPTIMIZED BY ADDING A COLUMN IN THE DATABASE TABLE timeslot WHICH DEFINES THE DATE SO WE WON'T NEED THIS LOOP.
		foreach ($timeslotsForTeacher as $timeslot) {
			if($timestampMidNightStartOfDay <= $timeslot['starttime'] && $timestampMidNightEndOfDay > $timeslot['starttime'] && $timeslot['tid'] == $tid){
				$timeslotForDay[] = $timeslot;
			}
		}
		return $timeslotForDay;
	}
		//Function Added By Tej Pal Sharma
	//Extracts the language from array of languages based on indexes stored in database as 1-4-5 to Himdi, Mathematics, English etc.
	public static function extractLang($langArray,$encodedUserLangString){
		$userLangArray = explode("-", $encodedUserLangString);
		$string = "";
		foreach ($userLangArray as $userLang) {
			if($userLang!="")
				$string .= $langArray[$userLang-1].", ";
		}
		$string = substr_replace($string, "", -2);
		return $string;
	}
	//Function added by Tej Pal Sharma 
	//Function combines the continuous timeslots together as one e.g. 12:30-1 and 1-1:30 are combined to 12:30-1:30
	//The timeslots provided as an argument to this function must be ordered by 'starttime' in ascending order for the function to work propery.
	public static function combineContinuousTimeslots($timeslots){

		//ERROR : WHILE COMBINING THE TIMESLOTS WHAT TO DO WITH OCCUPIED A PART OF IT MAY BE OCCUPIED AND ANOTHER MAY NOT BE.
		//SOLUTION HANDLE OCCUPIED INDEX HERE ONLY 
		//TWO OPTIONS:
		//1: DON'T COMBINE TWO SLOTS IF ONE IS OCCUPIED AND ANOTHER IS NOT
		//COMBINE BUT SET OCCUPIED INDEX VALUE TO SOME OTHER VALUE THAN -1,1, OR ZERO

		//Add one more index to input array and set it's value to 1
		//This index value can be used to compute duration as $timeslot['period']*1800 seconds.
		
		//FOR NOW I AM ASKED JUST TO IGNORE SID.

		//FOLLOWING PART NOT WORKING
		//foreach ($timeslots as $timeslot) {
		//	$timeslot['period'] = 1;
		//	//$timeslot['occupied'] = $timeslot['sid']==0?0:1;
		//}

		for($i=0;$i<count($timeslots);$i++){
			$timeslots[$i]['period'] = 1;
		}
		$i = 0;
		while($i<count($timeslots)-1){
			if($timeslots[$i+1]['starttime'] == $timeslots[$i]['starttime']+$timeslots[$i]['period']*1800){
				//Remove The next continuous timeslot from array.
				unset($timeslots[$i+1]);
				$timeslots = array_values($timeslots);
				//Increase the period of current timeslot.
				$timeslots[$i]['period'] += 1;
			}
			else{
				$i+=1;
			}
		}
		return $timeslots;
	}

	//Function Added by Tej Pal Sharma
	//Function returns an array each element of which is another associative array as 'timeslotString'=>'12:30-1 pm' and 'countOfSlots'=>$noOfSlotsOnThatDay, More info can be added to this associative array.
	//If the number of slots is less than ot equal to 3 the array consists of all 3 slots.
	//Otherwise the array consists of first two slots and last element is 'timeslotString'=>'{$noOfSlots-2} more slots..'
	public static function getTeacherTimeSlotsForDayCalDisplay($day,$month,$year,$tid='0'){
		$timeslots = self::getTeacherTimeSlotsForDay($day,$month,$year,$tid);
		//MODIFY ARRAY TO COMBINE CONTINUOUS VALUES.
		$modifiedTimeslots = self::combineContinuousTimeslots($timeslots);
		
		$suitableForDisplayTimeslots = array();
		if(count($modifiedTimeslots)<=3){
			foreach ($modifiedTimeslots as $modifiedTimeslot) {
				$timeslotString = Fun::timetotime_t3($modifiedTimeslot['starttime'],true).'-'.Fun::timetotime_t3($modifiedTimeslot['starttime']+$modifiedTimeslot['period']*1800,true).' '.Fun::timetotime_t3($modifiedTimeslot['starttime']+$modifiedTimeslot['period']*1800,false);
				$suitableForDisplayTimeslot = array('timeslotString'=>$timeslotString);	
				$suitableForDisplayTimeslots[] = $suitableForDisplayTimeslot;
			}
		}
		else{
			for($i=0;$i<2;$i++){
				$timeslotString = Fun::timetotime_t3($modifiedTimeslots[$i]['starttime']).'-'.Fun::timetotime_t3($modifiedTimeslots[$i]['starttime']+$modifiedTimeslots[$i]['period']*1800,true);
				$suitableForDisplayTimeslot = array('timeslotString'=>$timeslotString/*, 'occupied'=>$occupied*/);
				$suitableForDisplayTimeslots[] = $suitableForDisplayTimeslot;
			}
			$countOfSlots = count($modifiedTimeslots);
			$countOfRemainingSlots = $countOfSlots - 2;
			$suitableForDisplayTimeslots[] = array('timeslotString'=>$countOfRemainingSlots.' more slots..');
		}
		$suitableForDisplayTimeslots['countOfSlots'] = count($modifiedTimeslots);
		return $suitableForDisplayTimeslots;
	}
	

	public static function getTeacherTimeSlotsForMonthCalDisplay($month=0,$year,$tid){
		if($month!=0 /*AND OTHER VALIDATIONS OF MONTH AND YEAR*/){
			$teacherTimeSlotsForMonth = array();
			$numberOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
			for($countDays=1;$countDays<=$numberOfDays;$countDays++){
				$teacherTimeSlotsForMonth[$countDays] = self::getTeacherTimeSlotsForDayCalDisplay($countDays,$month,$year,$tid);
			}
		}
		return $teacherTimeSlotsForMonth;
	}
	public static function get_teacher_cal_info($tid,$month=null,$year=null){
		global $_ginfo;
		setifnn($month,date("n"));
		setifnn($year,date("Y"));
		setift($tid,User::loginId(),$tid==0);
		$tid=0+$tid;
		$pageinfo=array();
		$pageinfo['timeslots']=Funs::timeslotlist(true);
		$pageinfo['weekdays']=$_ginfo["weekdays_long"];
		$twoDArr=Funs::calenderPrint(date('n'),date('Y'));
		$timeSlotsArray=Funs::getTeacherTimeSlotsForMonthCalDisplay($month,$year,$tid);

		$pageinfo['timeSlotsArray'] = $timeSlotsArray;
		$pageinfo['twoDArr']=$twoDArr;
		$pageinfo['currentDate']=date('j');
		$pageinfo['showVar']=true;
		$pageinfo['tid']=$tid;
		return $pageinfo;
	}
	public static function gettid($tid=0){
		$tid=0+$tid;
		setift($tid,0+User::loginId(),$tid==0);
		return $tid;
	}
}
?>