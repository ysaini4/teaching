<?php
class Actiondisp{
	function dispcal($data){
		$need=array("month","year","tid");
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		echo json_encode(array('ec'=>$ec,'data'=>$odata))."\n";
		if($ec<0){
			return;
		}

		$twoDArr=Funs::calenderPrint($data["month"],$data["year"]);
		$showVar=false;
		if(date("n")==$data["month"] && date("Y")==$data["year"])
			$showVar=true;	
		$timeSlotsArray = Funs::getTeacherTimeSlotsForMonthCalDisplay($data['month'],$data['year'],$data["tid"]);
		print_r(array($data['month'],$data['year'],$data["tid"]));

		load_view("dispcal.php",array("year"=>$data["year"],"month"=>$data["month"],'twoDArr'=>$twoDArr,'currentDate'=>date("j"),'showVar'=>$showVar,'timeSlotsArray'=>$timeSlotsArray,'tid'=>$data['tid']));
	}
	function reviewload($data){
		$need=array("id","like","dislike","type");
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else if(!User::islogin())
			$ec=-8;
		echo json_encode(array('ec'=>$ec,'data'=>$odata))."\n";
		if($ec<0){
			return;
		}

		$like=$data['like'];
		$dislike=$data['dislike'];
		$id=$data['id'];
		$sid=User::loginId();
		$date=date("Y-m-d h:i:s");

		if($data["type"]=="like") {
			$sql="insert into likes values('$id','$sid','1','$date')";
			sql::query($sql);
		}
		else {
			$sql="insert into likes values('$id','$sid','-1','$date')";
			sql::query($sql);
		}
		
		//load_view("reviewload.php",array("id"=>$data["id"],"like"=>$data["like"],"dislike"=>$data["dislike"],"disableTag"=>true));
	}
	function uploadfileslot($data) {
		$need=array("name");
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else if(!User::islogin())
			$ec=-8;
		echo json_encode(array('ec'=>$ec,'data'=>$odata))."\n";
		if($ec<0){
			return;
		}
		echo 'dadasdasdasd';
		//load_view("")
		//load that view that shows the uploaded files
	}
	function teacherTimeSlotOfDayPopUp($data){
		$need=array('day','month','year','tid');
		$ec=1;
		$odata = 0;
		if(!Fun::isAllSet($need,$data)){
			$ec = -9;
		}
		echo json_encode(array('ec'=>$ec,'data'=>$odata))."\n";
		if($ec<0)
			return;
		
		$pageinfo = array();
		$timeslotsArray = Funs::getTeacherTimeSlotsForDay($data['day'],$data['month'],$data['year'],$data['tid']);
		$timeslotsOfDayStringArray = array();
		foreach ($timeslotsArray as $timeslot) {
			$timeslotsOfDayStringArray[] = Fun::timetotime_t2($timeslot['starttime'],true).' - '.Fun::timetotime_t2($timeslot['starttime']+1800,true).' '.Fun::timetotime_t2($timeslot['starttime']+1800,false);
		}
		$loginId = User::loginId();
		$loginType = User::loginType();
		$pageinfo['timeslotsArray'] = $timeslotsArray;
		$pageinfo['timeslotsOfDayStringArray'] = $timeslotsOfDayStringArray;
		$pageinfo['timeslotsListArray']=Funs::timeslotlist(true);
		$pageinfo['loginType'] = $loginType;
		$pageinfo['loginId'] = $loginId?$loginId:0;
		$pageinfo['tid'] = $data['tid'];
		$pageinfo['day'] = $data['day'];
		$pageinfo['month'] = $data['month'];
		$pageinfo['year'] = $data['year'];
		load_view('timeslotpopup.php',$pageinfo);
	}
}
?>
