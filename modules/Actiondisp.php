<?php
class Actiondisp{
	function dispcal($data){
		$need=array("month","year");
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
		load_view("dispcal.php",array("arg1"=>"This is first Argument passed","month"=>$data["month"]));
	}
	function mohit($data){
		$need=array("month","year","arg3");
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
		load_view("mohit.php",array("arg1"=>"This is first Argument passed".$data["arg3"],"month"=>$data["month"]));
	}
}
?>
