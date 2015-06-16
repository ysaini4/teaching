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
	
	public static function calenderInfo($tid,$month,$year){
		global $_ginfo;
		$timestamp = strtotime($year.'-'.$month.'-1');//starting time of month
		$numberOfDays = date("t",$timestamp);//no. of days in that month
		$monthslots=Sqle::getA(gtable(User::loginId()==$tid?"meteacherallts":"studentteacherallts"),array("starttime"=>$timestamp,"endtime"=>$timestamp+24*3600*$numberOfDays,"tid"=>$tid,"sid"=>User::loginId()));
		$dailymap=array();
		foreach($monthslots as $i=>$val){
			$date=div($val["starttime"]-$timestamp,24*3600)+1;
			$dailymap=Fun::setifunset($dailymap,$date,array());
			$dailymap[$date][]=$val["starttime"];
		}

		$try=0;
		$count=1;
		for($row=0;$row<7 && $count<=$numberOfDays;$row++){
			for($col=0;$col<7;$col++){
				$cellinfo=array("date"=>-1,"tdparams"=>array(),"text"=>"","dispslots"=>"","istoday"=>false);
				if($row==0){
					$cellinfo["text"]=$_ginfo["weekdays_long"][$col];
				}
				else{
					if( ($col==0+date("N",$timestamp)-1 && $try==0 ) || ($try==1 && $count<=$numberOfDays) ){
						$datets=$timestamp+($count-1)*3600*24;
						$cellinfo["date"]=$count;
						$cellinfo["text"]=$count;
						if($datets>time()-3600*24)
							$cellinfo["tdparams"]=array("data-datets"=>$datets,"data-tid"=>$tid,"data-action"=>"daytspopup","onclick"=>"opencalpopup(this);");
						if(isset($dailymap[$count])){
							$cellinfo["dispslots"]=Funs::slottext($dailymap[$count]);
						}
						$cellinfo["istoday"]=($datets==daystarttime());

						$try=1;
						$count++;
					}
				}
				$twoDArr[$row][$col]=$cellinfo;
			}
		}
		return $twoDArr;
	}
	function bulktsquery($slotList,$dayList,$startdate,$enddate){//Return list of ( to be inserted/ deleted ) starttime in a array
		$outp=array();
		for($i=$startdate;$i<=$enddate;$i+=3600*24){
			if(in_array(0+date("N",$i),$dayList)){
				for($j=0;$j<count($slotList);$j++){
					$class_starttime=$i+1800*($slotList[$j]-1);
					$outp[]=$class_starttime;
				}
			}
		}
		return $outp;
	}



	public static function extractLang($langArray,$encodedUserLangString){
		//Function Added By Tej Pal Sharma
	//Extracts the language from array of languages based on indexes stored in database as 1-4-5 to Himdi, Mathematics, English etc.
		$userLangArray = explode("-", $encodedUserLangString);
		$string = "";
		foreach ($userLangArray as $userLang) {
			if($userLang!="")
				$string .= $langArray[$userLang-1].", ";
		}
		$string = substr_replace($string, "", -2);
		return $string;
	}

	public static function get_teacher_cal_info($tid,$month=null,$year=null){
		global $_ginfo;
		setifnn($month,0+date("n"));
		setifnn($year,0+date("Y"));

		$pageinfo=array();
		$pageinfo['timeslots']=Funs::timeslotlist(true);
		$pageinfo['weekdays']=$_ginfo["weekdays_long"];
		$pageinfo['twoDArr']=Funs::calenderInfo($tid,$month,$year);

		$pageinfo['currentDate']=date('j');
		$pageinfo['showVar']=true;
		$pageinfo['tid']=$tid;
		$pageinfo["month"]=$month;
		$pageinfo["year"]=$year;
		$pageinfo["buttons"]=array(0=>array( ((($month+12-1-1)%12)+1), $year-($month==1) ) , 4=>array( ($month+1-1)%12+1 , $year+($month==12) ) ,1=>array(0+date("n"),0+date("Y")) );
		$pageinfo["button_icons"]=array(0=>"photo/icons/left_arrow.png",4=>"photo/icons/right_arrow.png",1=>"photo/icons/home.png");
		$pageinfo["monthlist"]=arr2option($_ginfo["month"]);
		$pageinfo["yearlist"]=arr2option(Fun::oneToN( $_ginfo["end_year"],2015),'own');
		$pageinfo["monthstartts"]=$timestamp = strtotime($year.'-'.$month.'-1');

		return $pageinfo;
	}
	public static function gettid($tid=0){
		$tid=0+$tid;
		setift($tid,0+User::loginId(),$tid==0);
		return $tid;
	}
	public static function slottext($slotlist){
		$grouped=grouplist($slotlist,1800);
		$displine=4;
		if(count($grouped)>$displine){
			$ngrouped=array_slice($grouped,0,$displine-1);
			$removed_list=array_slice($grouped,$displine-1);
			$numslot=0;
			foreach($removed_list as $i=>$val){
				list($val1,$val2)=$val;
				$numslot+=$val2;
			}
		}
		else{
			$ngrouped=$grouped;
		}
		foreach($ngrouped as $i=>$val){
			list($val1,$val2)=$val;
			$ngrouped[$i]=Fun::timetotime_t3($val1)." - ".Fun::timetotime_t3($val1+$val2*1800);
		}
		if(count($grouped)>$displine){
			$ngrouped[]="and ".$numslot." more slots";
		}
		return implode("<br>",$ngrouped);
	}
	public static function addremlist($inp=array(),$isinsert=true){
		if(count($inp)>0){
			$topusharr=array();
			foreach($inp as $i=>$val){
				$topusharr[]=array(User::loginId(),$val);
			}
			$query=Fun::makeDummyTableColumns($topusharr,array("tid","starttime"));
			$timenow=0+time();
			if($isinsert){
				$query="insert into timeslot (tid,starttime) select * from (".$query.") dummyquery where (tid,starttime) not in (select tid,starttime from timeslot) AND starttime > ".$timenow." ";
				return Sql::query($query);
			}
			else{
				$query="delete from timeslot where (tid,starttime) in (select * from (".$query.") dummyquery ) AND sid is null AND starttime >  ".$timenow ;
				return Sql::query($query);
			}
		}
		else
			return 0;
	}
	public static function teacherinfo($tid){
		$tinfo=Sqle::getRow("select * from teachers left join users on users.id=teachers.tid where tid=? limit 1",'i',array(&$tid));
		if($tinfo!=null){
//			str2json($tinfo[''])
		}
	}
}
?>