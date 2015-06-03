<?php
class Help  extends Sql{
	//For Teachers
	public static function listsubject($tid){//Require teacher login
		return Sql::getArray("select * from subjects where tid=? order by id desc",'i', array(&$tid) );
	}
	public static function listtiming(){
		$tid=User::loginId();
		return Sql::getArray("select * from timing where tid=? order by timeslot desc",'i',array(&$tid) ) ;
	}
	public static function getTeacherProfile($tid){
		$temp=Sql::getArray(file_get_contents("php/sql/q3.sql"),'i',array(&$tid));
		if(count($temp)>0)
			return $temp[0];
		else
			return null;
	}
	public static function getStudentProfile($sid){
		$temp=Sql::getArray("select * from users where type='s' AND id=? limit 1",'i',array(&$sid));
		if(count($temp)>0)
			return $temp[0];
		else
			return null;
	}
	public static function getTeacherCal($dateonday,$tid){//Should work only for teacher.
		$daytimel1=$dateonday-32*24*3600;
		$daytimel2=$dateonday+32*24*3600;
		$temp=Sql::getArray(file_get_contents("php/sql/q5.sql"),'iii',array(&$tid,&$daytimel1,&$daytimel2));
		$outp=array();
		for($i=0;$i<count($temp);$i++){
			$outp[ $temp[$i]["daytime"] ]=array('num_book'=>$temp[$i]["num_book"],'num_slot'=>$temp[$i]["num_slot"],"fslot"=>$temp[$i]["fslot"]);
		}
		return $outp;
	}
	public static function addnotf($data){
		return Sqle::insertVal("notf", $data );
	}
	public static function mynotf($limit=-1){
		$uid=User::loginId();
		return Sql::getArray("select * from notf where uid=? order by time desc ".($limit==-1?'':"limit ".$limit) , 'i' , array(&$uid));
	}
	public static function num_unreadmsg(){
		$uid=User::loginId();
		$temp=Sql::getArray("select count(*) as num from notf where uid=? AND isr='0' ", 'i' , array(&$uid));
		return $temp[0]['num'];
	}
	public static function readnotf($nid){
		return Sqle::updateval('notf',array('isr'=>'1'),array('id'=>$nid,'uid'=>User::loginId()));
	}




//Mixer


}
?>
