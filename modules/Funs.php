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
			$times[]=Fun::timetotime_t2($datetoday+$i*1800 )." - ".Fun::timetotime_t2($datetoday+($i+1)*1800,true ) ;
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
}
?>