<?php
class Students{
	function bookslotfinal($data){//need to change them.
		$need=array('tid','daytime',"slot" );
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else{
			Sqle::updateVal("timeslot",array("sid"=>User::loginId(),"conf"=>"t"),array("tid"=>$data["tid"],"daytime"=>$data["daytime"],"slot"=>$data["slot"],"sid"=>0 ));
			$time=Fun::timetostr($data["daytime"]+3600*$data["slot"] );
			Fun::notf( $data["tid"],"php/notf/n1.txt" , array("Student name"=>User::name(User::loginId()),"time"=>$time ) );
			Fun::notf( User::loginId(),"php/notf/n2.txt" , array("Teacher Name"=>User::name($data["tid"]),"time"=>$time ) );
		}
		return array('ec'=>$ec,'data'=>$odata);
	}
	function feedbackform_student($data){//need to change them.
		$need=array('tid','daytime',"slot","rate","feedback" );
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else{
			$constrain= Fun::getflds(array("tid","slot","daytime"),$data);
			$constrain["sid"]=User::loginId();
			$odata=Sqle::updateVal("timeslot", Fun::getflds(array("rate","feedback"),$data)   , $constrain  );
		}
		return array('ec'=>$ec,'data'=>$odata);
	}
	function studentBookSlots($data) {
		$outp = array("ec" => 1, "data" => 0);
		$inpslots = intexplode("-", $data["slots"]);
		$bookedslots = grouplist( $inpslots );
		list($c_id, $s_id, $t_id) = intexplode("-", $data["cst"]);
		$dbpush = array();
		foreach($bookedslots as $i => $row) {
			$insrow = array($data["tid"], $data["datets"]+($row[0]-1)*1800, User::loginId(), $row[1]*1800, $c_id, $s_id, $t_id  );
			$dbpush[] = $insrow;
		}
		foreach($inpslots as $i => $val) {
			Sqle::updateVal("timeslot", array("sid" => User::loginId()), array("tid" => $data["tid"], "starttime" => $data["datets"]+($val-1)*1800 ));
		}

		$query = "insert into booked (tid, starttime, sid, duration, c_id, s_id, t_id) ".Fun::makeDummyTableColumns($dbpush)."";
		$outp["data"] = Sqle::q( $query );
		return $outp;
	}

}