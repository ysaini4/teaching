<?php
abstract class Funs{
	public static function headerinfo(){
		return array("title"=>"wwm","css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css"));
	}
	public static function cst_tree(){
		$query="select all_classes.classname, all_subjects.subjectname, all_topics.topicname, all_cst.* from all_cst left join all_classes on all_cst.c_id=all_classes.id left join all_subjects on all_cst.s_id=all_subjects.id left join all_topics on all_cst.t_id=all_topics.id ";
		$cstdata=Sql::getArray($query);
		$data=array();
		foreach($cstdata as $i=>$row){
			$cur=&$data;
			$ids=array("c_id","s_id","t_id");
			$names=array("classname","subjectname","topicname");
			for($j=0;$j<3;$j++){
				$cur=Fun::setifunset($cur,$row[$ids[$j]],array("name"=>$row[$names[$j]],"children"=>array()));
				$cur=&$cur[$row[$ids[$j]]]["children"];
			}
		}
		return $data;
	}
	public static function cst_tree2classlist($inp){
		$outp=array();
		foreach($inp as $key=>$val){
			$outp[]=array("val"=>$key,"disptext"=>$val["name"]);
		}
		return $outp;
	}
	public static function timeslotlist($sliced=false){
		$datetoday=Fun::datetoday();
		$times=array();
		for($i=0;$i<48;$i++){
			$times[]=Fun::timetotime($datetoday+$i*1800 )." - ".Fun::timetotime($datetoday+($i+1)*1800,true ) ;
		}
		if(!$sliced)
			return $times;
		else{
			$outp=array();
			for($i=0;$i<3;$i++)
				$outp[]=array_slice($times,16*$i,16);
			return $outp;
		}
	}
	//Made by ::Himanshu Rohilla::	
	//This function extracts the field from jsoninfo of teachers table from the database
	//$jsonArray is that jsoninfo field value in techers table
	//$subN is the array of field
	//$type is the name in jsoninfo field
	public static function extractFields($jsonArray,$subN,$type){
		$jsonArray=str2json($jsonArray);
		$subjects=$jsonArray[$type];
		$subArray=explode("-", $subjects);
		$check=0;
		$str="";

		foreach ($subArray as $key) {
			if($key!='other' && $check==0) {
				if($subN[$key-1]!="Others")	//for Other in 6 subjects
					$str=$str.$subN[$key-1]." , ";
			}
			else
				$check=1;
		}
		$comma="";
		$subOther="";
		if(trim($jsonArray[$type.'other'])!="")
		{	
			$comma=" , ";
			$subOther=trim($jsonArray[$type.'other']);
		}
		$finalString=$str.$subOther.$comma;
		$outSubject=substr_replace($finalString, "", -2);
		return $outSubject;
	}
	
}
?>
