<?php

class search{
	//function returns an SQL query for one keyword only
	public static function searchQuery($param,$fromPrice,$toPrice,$fromTime,$toTime){
	
		$str='ssss';
		$appendPrice="";
		$arr=array();
		$c=0;//parameter counter

		$arr[$c++]=&$param;
		$arr[$c++]=&$param;
		$price=0;
		if($fromPrice!=-1)
		{
			$appendPrice=" and (mysubjects.price between ? and ?)";
			$price=1;
		}
		
		$appendTime="";
		$time=0;
		if($fromTime!=-1)
		{
			$appendTime=" and (mysubjects.time between ? and ?)";
			$time=1;
		}
		
		if($price==1 && $time==1)
		{
			$arr[$c++]=&$fromPrice;
			$arr[$c++]=&$toPrice;
			$arr[$c++]=&$fromTime;
			$arr[$c++]=&$toTime;			

			$arr[$c++]=&$param;
			$arr[$c++]=&$fromPrice;
			$arr[$c++]=&$toPrice;
			$arr[$c++]=&$fromTime;
			$arr[$c++]=&$toTime;			

			$arr[$c++]=&$param;
			$arr[$c++]=&$fromPrice;
			$arr[$c++]=&$toPrice;
			$arr[$c++]=&$fromTime;
			$arr[$c++]=&$toTime;						
			$str='ssiiiisiiiisiiii';
		}
		else if($price==1 && $time!=1)
		{
			$arr[$c++]=&$fromPrice;
			$arr[$c++]=&$toPrice;

			$arr[$c++]=&$param;
			$arr[$c++]=&$fromPrice;
			$arr[$c++]=&$toPrice;

			$arr[$c++]=&$param;
			$arr[$c++]=&$fromPrice;
			$arr[$c++]=&$toPrice;			
			$str='ssiisiisii';
		}
		elseif($price!=1 && $time!=1)
		{
			$arr[$c++]=&$param;
			$arr[$c++]=&$param;
			$arr[$c++]=&$param;
			$arr[$c++]=&$param;			
			$str='ssss';
		}
		
		$sql="select tid from teachers where LCASE(teacher) like concat('%',?,'%')
		UNION
		select mysubjects.tid from mysubjects,classes where LCASE(class) like concat('%',?,'%') and mysubjects.cid=classes.cid ".$appendPrice.$appendTime."
		UNION 
		select mysubjects.tid from mysubjects,topics where LCASE(topic) like concat('%',?,'%') and mysubjects.topid=topics.topid ".$appendPrice.$appendTime."
		UNION 
		select mysubjects.tid from mysubjects,subjects where LCASE(subject) like concat('%',?,'%') and mysubjects.sid=subjects.sid ".$appendPrice.$appendTime;

		return array($sql,$str,$arr);
	}
	//returns the final SQL query for a particular search
	public static function splitString($string,$fromPrice,$toPrice,$fromTime,$toTime){
	
		$string=preg_replace("/[^a-zA-Z 0-9]+/"," ",$string);
		$string=trim($string);
		$temp=explode(" ",$string);

		for($i=0;$i<count($temp);$i++)
			$temp[$i]=strtolower($temp[$i]);

		print_r($temp);

		$str="";
		$arr=array();
		$k=0;
		$m=0;
		
		for($i=0;$i<count($temp);$i++){
			$result=self::searchQuery($temp[$i],$fromPrice,$toPrice,$fromTime,$toTime);
			
			if($k==0){
				$sql=$result[0];
				$arr=$result[2];
			}
			else if($k==1)
			{
				$sql=$sql.')'.$temp[$i].'alias where tid in ('.$result[0];
				$m=1;
				$arr=array_merge($arr,$result[2]);
			}
			else
			{
				$sql=$sql.') AND tid in ('.$result[0];
				$m=1;
				$arr=array_merge($arr,$result[2]);
			}
			$str=$str.$result[1];
			$k++;
		}
		if($m==1)
		{
			$sql="select * from (".$sql;
			$sql=$sql.')';
		}
		return array($sql,$str,$arr);
	}

	//EDITIONS MADE BY: Tej Pal Sharma

	public static function searchTeachersByTimeslots($timeslotsString){
		//Function to search teachers Based on timeslots availability (also takes care of wiziqLimit)
		//ACCEPTS input as a string like "1-11-23-33" where numbers 1-48 represents all 48 timeslots (these are 1 indexed)
		//Returns an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA()
		global $_ginfo;
		if($timeslotsString<0){
			return " TRUE ";
		}
		else{
			$timeslotsArr = intexplode('-',$timeslotsString);
			$query = "Select searchbytimeslots_table.tid from (".gtable("alltimeslotsfromcurrenttime").")searchbytimeslots_table where (";
			$queryArr = array();
			$parametersArr = array();
			$parametersArr['currenttimestamp'] = time();
			foreach ($timeslotsArr as $key=>$value) {
				$queryArr[] = " ( searchbytimeslots_table.starttime%(24*3600) = {timeslotsDisplacement".$key."} AND searchbytimeslots_table.numbooked < {wiziqlimit} )";
				$parametersArr['timeslotsDisplacement'.$key] = 1800*($value-1);
			}
			$parametersArr['wiziqlimit'] = $_ginfo["wiziqlimit"];
			$query .= implode(" OR ", $queryArr).") ";
			$query .= " group by searchbytimeslots_table.tid ";
			return array("query"=>$query, "parama"=>$parametersArr);
		}
	}
		
	public static function filterTeachersByPrice($lowerLimit=-1,$upperLimit=-1){
		//Function to search for teachers using price per hour filter.
		//Returns an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA()
		return filteredResultsQuery('price','subjects',$lowerLimit,$upperLimit,'tid');
	}

	public static function filterTeachersByDurationOfCourse($lowerLimit,$upperLimit){
		//Function to search for teachers using duration of Course filter.
		//Returns an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA()
		return filteredResultsQuery('timer','subjects',$lowerLimit,$upperLimit,'tid');
	}
}
?>
