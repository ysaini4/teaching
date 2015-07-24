<?php
class Help  extends Sql{

	//For Store...
	public static function getStoreProducts($sid){
		return Sql::getArray("select products.*,users.name from products left join users on users.id=sid where sid=? order by utime desc ",'i',array(&$sid));
	}
	public static function get_this_product($pid){
		$temp=Sql::getArray("select products.*,users.name from products left join users on users.id=sid where products.id=? limit 1",'i',array(&$pid));
		return (count($temp)==1?$temp[0]:null);

	}
	public static function storeData($sid){
		$temp=Sql::getArray("select * from users where id=? limit 1",'i',array(&$sid));
		return ((count($temp)==1)?$temp[0]:null);
	}



	//For Commenting.
	//Comments are ordered wrt user id but must be ordered wrt time at which the comment was made.
	public static function getallcomment($pid){
		return Sql::getArray("select comments.*,users.profilepic,users.name from comments left join users on users.id=uid where pid=? order by id ",'i',array(&$pid));
	}
	public static function getnumlikes($pid,$type){
		$temp=Sql::getArray("select count(pid) as num from likes where pid=? and type=? ",'is',array(&$pid,&$type));
		return $temp[0]["num"];
	}




// For Notification
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
	//aid is admin_id here too or not?
	public static function assignuploadaction($data){
		$data["url"]=HOST."assignment.php?aid=".$data["aid"];
		Fun::prvnotf(1,User::loginId(),"php/notf/n1.txt",$data,$data["url"]);
		Fun::mailfromfile("admin@admin.com","php/mails/m1.txt",$data );
	}

	//For Admin.

	public static function postsoln($qid,$fdata){
		$fn=Fun::uploadfile($fdata,array());
		if($fn["ec"]>0 && $fn["ec"]!=2 ){
			$solnid=Sqle::insertVal("soln",array("qid"=>$qid,"adminid"=>User::loginId(),"time"=>time(),"filename"=>$fn["fn"]));
			$qinfo=Sqle::selectVal("questions","uid,adminid",array("id"=>$qid),1);
			if($qinfo!=null){
				Fun::prvnotf( $qinfo["uid"],User::loginId() , "php/notf/solnposted.txt", array() , "assignment.php?aid=".(0+$qid) );
			}
		}
	}
	
	public static function profiletab($tab){
		$uid=User::loginId();
		$utype=User::loginType();
		$timenow=time();
		$tab_arr=array();
		if($tab=="curassign"){
			$myassign=Sql::getArray("select questions.*,users.name,users.profilepic from questions left join users on users.id=uid where (uid=? or ".($utype=='a'?"1":"0")." ) AND (deadline>?) AND (uid is not null) order by deadline asc","ii",array(&$uid,&$timenow));
			if($utype=='a')
				$tab_arr=array("","Order Id","Title","Status","Time left","Due Date");
			else
				$tab_arr=array("Order Id","Title","Status","Time left","Due Date");

		}
		else if($tab=="arcassign"){
			$myassign=Sql::getArray("select * from questions where (uid=? or ".($utype=='a'?"1":"0").") AND (deadline<=?) order by deadline asc","ii",array(&$uid,&$timenow));
				$tab_arr=array("Order Id","Title","Status","Time left","Due Date");
		}
		else if($tab=="urassign"){
			$myassign=Sql::getArray("select * from questions where (adminid=? AND ".($utype=='a'?"1":"0").") AND (deadline<=?) order by deadline asc","ii",array(&$uid,&$timenow));
				$tab_arr=array("Order Id","Title","Status","Time left","Due Date");
		}
		else
			$myassign=array();
	}
	public static function assignconv($aid){
		$utype=User::loginType();
		$sid=User::loginId();
		return Sql::getArray("select users.name,users.profilepic,users.type,conv.* from conv left join users on users.id=conv.sid  where aid=? AND (sid=? OR rtype=? ) order by time desc",'iis',array(&$aid,&$sid,&$utype));
	}
	public static function assignbidding($aid){
		return Sql::getArray("select users.name,users.profilepic,users.type,bidding.* from bidding left join users on users.id=bidding.uid  where aid=? order by time desc",'i',array(&$aid));
	}
	public static function sendchatmsg($msg,$thid){
		return Sqle::insertVal("chatting",array("msg"=>$msg,"time"=>time(),"thid"=>$thid,"stype"=>User::loginType(),"sid"=>User::loginId(),"ip"=>$_SERVER['REMOTE_ADDR']));
	}
	public static function mymsglist($msgid=0){
		if($_SESSION["chatthid"]>0){
			$query="select * from chatting where thid=? AND (id>? or ".($msgid==0?'1':'0')." ) order by time asc";
			return Sql::getArray($query,'ii',array(&$_SESSION["chatthid"],&$msgid));
		}
		else
			return array();
	}
	//EDIT made by Tej Pal Sharma
	//Start:
	public static function isValidContactUsData($data){
		//Validate Phone Number first
		//eliminate every char except 0-9
		$justNums = preg_replace("/[^0-9]/", '', $data['phone']);
		

		//if we have 10 digits left, it's probably valid.
		if (!((strlen($justNums) == 10)&&(strlen($data['msg'])<=100))) return false;

		return (preg_match("/\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}\b/",$data['email']) && $data['name']!="" &&	$data['msg']!="" );
	}
	
	public static function contactUs($data){
		if(!self::isValidContactUsData($data))
			return 0;//not valid input
		else{
			
			$returned_q_id = Sqle::insertVal('user_query',$data);
			return $returned_q_id;
		}
	}
	//:END
	
}
?>