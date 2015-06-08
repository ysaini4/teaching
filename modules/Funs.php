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
			$times[]=Fun::timetotime_t2($datetoday+$i*1800 )." - ".Fun::timetotime_t2($datetoday+($i+1)*1800,true )." ".Fun::timetotime_t2($datetoday+($i+1)*1800,false);
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
		if(trim($jsonArray[$type.'other'])!="")
		{	
			$comma=" , ";
			$subOther=trim($jsonArray[$type.'other']);
		}
		$finalString=$str.$subOther.$comma;
		$outSubject=substr_replace($finalString, "", -2);
		return $outSubject;
	}
	public static function sendmsg($phone,$msg){
		$phone=urlencode($phone);
		$msg=urlencode($msg);
		$url="http://216.245.209.132/rest/services/sendSMS/sendGroupSms?AUTH_KEY=14e4de84f23c84d81f24b8fb69d1e0&message=".$msg."&senderId=GETIIT&routeId=1&mobileNos=".$phone."&smsContentType=english";
		return shell_exec("curl '".$url."'");
	}
	//Made by ::Himanshu Rohilla::
	//Displays the calender of $month and $year
	public function calenderPrint($month,$year){
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
		$showVar=false;
		if(date("n")==$month && date("Y")==$year)
			$showVar=true;
		//load_view('Template/calenderPrint.php',array('twoDArr'=>$twoDArr,'currentDate'=>date("j"),'showVar'=>$showVar));
		return $twoDArr;
	}
	//makes array for the timeslot table	
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
		//Array containing all timestamp
		return $secondsArray;
	}
	function makeArray_t2($slotList,$dayList,$startdate,$enddate){
		$sList=explode("_",$slotList);
		$dList=explode("_",$dayList);
		$currentDay = jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 0 );	//returns day number Monday as 1 tuesday as 2 .....
		$currentDay--;
		$c=0;
		$break=0;

		$startdate = date('d-m-Y', strtotime($startdate));
		$startdate = $startdate.' 00:00:00';
		$enddate = date('d-m-Y', strtotime($enddate));
		$enddate = $enddate.' 00:00:00';

		echo $startdate.'<br>';
		echo $enddate.'<br>';
		echo $startstamp=strtotime($startdate);
		echo $endstamp=strtotime($enddate) + 3600*24;
		echo fun::timetostr($endstamp);
		$nextWeekCounter=0;
		while(1) {
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
					echo $addintoslot=$nextDayMidnight + $toAddTime;
					if($startstamp<=$addintoslot && $addintoslot<$endstamp)
						$secondsArray[$c++] = $addintoslot;
					if($addintoslot>=$endstamp){
						$break=1;
					}
				}
			}
			$nextWeekCounter+=7;
			if($break==1)
				break;
		}
		//Array containing all timestamp
		return $secondsArray;

	}
}
?>
