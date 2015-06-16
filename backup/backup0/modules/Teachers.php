<?php
class Teachers{
	function addrembulkts($data){
		global $_ginfo;
		$outp=array("ec"=>1,"data"=>0);
		$slotList=intexplode("-",$data["time"]);
		$dayList=intexplode("-",$data["days"]);
		$startdate = strtotime($data["startdate"]);
		$enddate = strtotime($data["enddate"]);
		if($enddate-$startdate>$_ginfo["calrepeatlimit"]*3600*24)
			$outp["ec"]=-24;
		else{
			$outp["data"]=bulktsquery($slotList,$dayList,$startdate,$enddate);
		}
		return $outp;
	}
}