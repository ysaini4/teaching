<?php
	function jshref($url=""){
		return "window.location.href='$url'";
	}
	function sessm($key,$val){
		return (isset($_SESSION[$key]) && $_SESSION[$key]==$val);
	}
	function init_db(){
		global $DB,$db_data;
		if($DB==null){
			$DB = new mysqli( $db_data['host'] , $db_data['user'] , $db_data['pass'] , $db_data['db']);
			Sql::init($DB);
		}
	}
	function closedb(){
		global $DB;
		if($DB!=null)
			$DB->close();
	}
	function getval($key,$arr,$default=null){
		 return (isset($arr[$key]) ? $arr[$key] : $default );
	}
	function post($key,$default=null){
		return getval($key,$_POST,$default);
	}
	function isget($key){
		return isset($_GET[$key]);
	}
	function ispost($key){
		return isset($_POST[$key]);
	}
	function isses($key){
		return isset($_SESSION[$key]);
	}
	function get($key,$default=null){
		return getval($key,$_GET,$default);
	}
	function sets($key,$val){
		$_SESSION[$key]=$val;
	}
	function gets($key,$default=null){
		return getval($key,$_SESSION,$default);
	}
	function load_view($view,$inp=array()){
		global $view_default,$_ginfo;
		if(isset($view_default[$view]))
			$inp=Fun::mergeifunset($inp,$view_default[$view]);
		$inp=Fun::setifunset($inp,"page",$_ginfo["page"]);
		foreach($inp as $key=>$val){
			$$key=$val;
		}
		$view="application/views/".$view;
		if(file_exists($view))
			include $view;
		else
			echo "MM Error : Unable to load view ".$view." Line ".__LINE__." in file ".__FILE__ ;
	}
	function str2json($inp){
		$temp=json_decode($inp);
		if($temp)
			return (array)$temp;
		else
			return null;
	}

	function arr2option($arr,$type='intval'){
		$outp=array();
		for($i=0;$i<count($arr);$i++){
			$temp=array('disptext'=>$arr[$i],'val'=>( $type=='intval' ? $i+1 : $arr[$i] ));
			$outp[]=$temp;
		}
		return $outp;
	}
	function lastelm($arr){
		if(count($arr)==0)
			return null;
		else
			return $arr[count($arr)-1];
	}
	function firstelm($arr){
		if(count($arr)==0)
			return null;
		else
			return $arr[0];
	}
	function curfilename(){
		return firstelm(explode(".",lastelm(explode("/",$_SERVER['SCRIPT_FILENAME']))));
	}
	function isUserLoggedInAs($loginTypeArray){//Function Added By Tej Pal Sharma 	The function takes an argument array of string of login types like array('s','t','a') and returns 1 if user of any of these types is currently logged in otherwise it returns 0.CAUSTION: FUNCTION USED IN DATABASE QUERY, SO KEEP THAT IN MIND WHILE EDITING.
		$userLoginType = User::loginType();
		if(in_array($userLoginType, $loginTypeArray))
			return 1;
		else
			return 0;
	}
	function isvalid_action($post_data){
		global $_ginfo;
		if(isset($_ginfo["action_constrain"][$post_data["action"]])){
			$sarr=$_ginfo["action_constrain"][$post_data["action"]];
			$sarr=Fun::mergeifunset($sarr,array("users"=>"","need"=>array()));
			if($sarr["users"]!="" && strpos($sarr['users'], User::loginType() )===false)
				return -2;
			if(!Fun::isAllSet($sarr["need"], $post_data))
				return -9;
		}
		return true;
	}
	function islset($data,$arr){
		for($i=0;$i<count($arr);$i++){
			if(!isset($data[$arr[$i]]))
				return false;
			$data=$data[$arr[$i]];
		}
		return true;
	}
	function getmyneed($fname){
		global $_ginfo;
		return $_ginfo["action_constrain"][$fname]["need"];
	}

	function handle_request($post_data){
		global $_ginfo;
		$b=new Actions();
		if(User::isloginas('s'))
			$a=new Students();
		else if(User::isloginas('a'))
			$a=new Admin();
		else if(User::isloginas('t'))
			$a=new Teachers();
		else
			$a=$b;
		$outp=array("ec"=>-11);
		if(isset($post_data["action"])  ){
			$isvalid=isvalid_action($post_data);
			if(!($isvalid>0))
				$outp["ec"]=$isvalid;
			else{
				$func=$post_data["action"];
				if( method_exists($a,$post_data["action"]))
					$outp=$a->$func($post_data);
				else if( method_exists($b,$post_data["action"]))
					$outp=$b->$func($post_data);
				else if(islset($_ginfo,array("autoinsert",$post_data["action"]))) {
					$action_spec=$_ginfo["autoinsert"][$post_data["action"]];
					$action_spec=Fun::mergeifunset($action_spec,array("fixed"=>array(),"add"=>array()));
					$ins_data=Fun::getflds(getmyneed($post_data["action"]) , $post_data );
					$ins_data=Fun::mergeifunset($ins_data,$action_spec["add"]);
					$fixvalues=array("time"=>time(),"uid"=>User::loginId());
					foreach($action_spec["fixed"] as $i=>$val){
						$ins_data[$val]=$fixvalues[$val];
					}
					$outp["data"]=Sqle::insertVal($action_spec["table"],$ins_data);
					$outp["ec"]=1;
				}
			}
		}
		return $outp;
	}
	function rquery($str,$data){
		preg_match_all("|{[^}]+}|U",$str,$matches);
		$matches=$matches[0];
		for($i=0;$i<count($matches);$i++){
			$key=substr($matches[$i],1,strlen($matches[$i])-2);
			$str=str_replace($matches[$i],$data[$key],$str);
		}
		return $str;
	}
	function timeondate($day,$month,$year){
		return strtotime($day."-".$month."-".$year);
	}
	function setift(&$var,$val,$istrue=true){
		if($istrue){
			$var=$val;
		}
	}
	function setifnn(&$var,$val){
		setift($var,$val,$var==null);
	}
	function mergeifunset(&$a,$b){
		$keys=array_keys($b);
		for($i=0;$i<count($keys);$i++){
			if(!isset($a[$keys[$i]]))
				$a[$keys[$i]]=$b[$keys[$i]];
		}
		return $a;
	}

?>