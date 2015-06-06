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
	function handle_request($post_data){
		$b=new Actions();

		if(User::isloginas('s'))
			$a=new Students();
		else if(User::isloginas('t'))
			$a=new Teachers();
		else if(User::isloginas('a'))
			$a=new Admin();
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
			}
		}
		return $outp;
	}
	function getmyneed($fname){
		global $_ginfo;
		return $_ginfo["action_constrain"][$fname]["need"];
	}


?>