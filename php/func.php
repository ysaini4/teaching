<?php
	function div($a,$b){
		return ($a-($a%$b))/$b;
	}
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
		$outp=array("ec"=>-7);
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
			if(isset($data[$key])){
				$str=str_replace($matches[$i],$data[$key],$str);
			}
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
	function myexplode($n,$st){
		$temp=explode($n,$st);
		return (count($temp)==1 && $temp[0]=="") ? array() : $temp;
	}
	function intexplode($ex,$inp){
		$temp=myexplode($ex,$inp);
		foreach($temp as $i=>$val){
			$temp[$i]=0+$val;
		}
		return $temp;
	}
	function daystarttime($ts=null){
		setifnn($ts,time());
		return strtotime(Fun::timetodate($ts));
	}
	function resizeimg($filename,$tosave, $max_width, $max_height){
		$imginfo=getimagesize($filename);
		list($orig_width, $orig_height) = $imginfo;
		$type=$imginfo[2];


		$crop_width=$orig_width;
		$crop_height=$orig_height;
		if($orig_width*$max_height <= $orig_height*$max_width){
			$crop_height=$orig_width*$max_height/$max_width;
		}
		else{
			$crop_width=$orig_height*$max_width/$max_height;
		}

		$image_p = imagecreatetruecolor($max_width, $max_height);
		switch($type){
			case "1": 
				$image = imagecreatefromgif($filename); 
				$transparent = imagecolorallocatealpha($image_p, 0, 0, 0, 127);
				imagefill($image_p, 0, 0, $transparent);
				imagealphablending($image_p, true); 				
				break;
			case "2": $image = imagecreatefromjpeg($filename);break;
			case "3": 
				$image = imagecreatefrompng($filename);
				imagealphablending($image_p, false);
				imagesavealpha($image_p, true);
				break;
			default:  $image = imagecreatefromjpeg($filename);
		}
		imagecopyresampled($image_p, $image, 0, 0, ($orig_width-$crop_width)/2, ($orig_height-$crop_height)/2, $max_width, $max_height, $crop_width, $crop_height);

		$ext=pathinfo($tosave, PATHINFO_EXTENSION);

		switch($ext){
			case "gif": imagegif($image_p,$tosave); break;
			case "jpg": imagejpeg($image_p,$tosave,100); break;
			case "jpeg": imagejpeg($image_p,$tosave,100); break;
			case "png": imagepng($image_p,$tosave,0);break;
			default: imagejpeg($image_p,$tosave,100);
		}
		chmod($tosave,0777);
	}
	function getrefarr(&$inp){
		$outp=array();
		foreach($inp as $i=>$val){
			$outp[]=&$inp[$i];
		}
		return $outp;
	}
	function gtable($name){
		global $_ginfo;
		return $_ginfo["query"][$name];
	}
	function grouplist($inp,$gap=1){
		$outp=array();
		$started=0;
		$ended=0;
		for($i=0;$i<count($inp);$i++){
			if($started==null){
				$started=$inp[$i];
				$ended=$started;
			}
			else if($inp[$i]-$ended==$gap){
				$ended=$inp[$i];
			}
			else{
				$outp[]=array($started,($ended-$started)/$gap+1);
				$started=null;
				$i--;
			}
		}
		if($started!=null){
			$outp[]=array($started,($ended-$started)/$gap+1 );
		}
		return $outp;
	}
	function sql2dict($data,$key){
		$outp=array();
		foreach($data as $i=>$row){
			$outp[$row[$key]]=$row;
		}
		return $outp;
	}
	function errormsg($ec){
		global $_ginfo;
		return ($ec<0?getval($_ginfo["error"],$ec,""):"");
	}
	// Function Added By Tej Pal Sharma for filtering Search Results
	// Start::
	//if both upperlimit and lowerlimit are set -1 then returns query => " TRUE " and param=>emptyArray
	//Returns an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA()
	function filteredResultsQuery($filteringKey,$inWhichTable,$lowerLimit=-1,$upperLimit=-1,$colsToFetch=array('*'),$groupByKey = -1){
		global $_ginfo;
		$colsToFetch = implode(',', $colsToFetch);
		$parametersArr = array();

		if($lowerLimit==-1 && $upperLimit==-1){
			return array('query'=>' TRUE ','parama'=>$parametersArr);
		}

		$parametersArr['lowerlimit'] = $lowerLimit;
		$parametersArr['upperlimit'] = $upperLimit;
		
		$query  = "SELECT ".$colsToFetch." FROM ".$inWhichTable." WHERE ";
		if($lowerLimit==-1)
			$query .= " TRUE AND ";
		else
			$query .= $filteringKey." > {lowerlimit} AND ";
		if($upperLimit==-1)
			$query .= " TRUE ";
		else
			$query .= $filteringKey." < {upperlimit} ";
		if($groupByKey!=-1)
			$query .= "group by ".$groupByKey." ";

		return array('query'=>$query,'parama'=>$parametersArr);
	}
	// ::End
?>
