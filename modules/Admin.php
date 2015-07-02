<?php
class Admin{
	function acceptrej($data){
		$odata = array('ec'=>1, 'data'=>0);
		$odata = Sqle::updateVal("teachers", array("isselected"=>$data["isselected"]), array("tid"=>$data["tid"]));
		return $odata;
	}

	function addmoney($data) {
		$outp = array("ec" => 1, "data" => 0);
		$uinfo = User::userProfile( $data["uid"] );
		if($uinfo!=null) {
			Funs::addremmoney(-$data["money"], -6, User::loginId(), $uinfo);
			Funs::addremmoney($data["money"], -2, $data["uid"], $uinfo);
		} else {
			$outp["ec"] = -25;
		}
		return $outp;
	}
}
?>
