<?php
include "includes/app.php";

function insertall_cst(){
	include "php/data_cst.php";	
	$i=1;
	$j=1;
	$k=1;
	$var_class=array();
	$var_subj=array();
	$var_topic=array();
	$var_combine=array();
	foreach ($subt as $key => $value) {
		$var_class[]= array($i,preg_replace("([\"\']+)","",$key));
		foreach($value as $key1=>$value1){
			$var_subj[]=array($j,preg_replace("([\"\']+)","",$key1));
			foreach($value1 as $key2=>$value2){
				$value2=preg_replace("([\"\']+)","",$value2);
				$var_topic[]=array($k,''.$value2);
				$var_combine[]=array($i,$j,$k);
				$k+=1;
			}
			$j+=1;
		}
		$i+=1;
	}
	$query1=Fun::makeDummyTableColumns($var_class,array("id","name"),"is");
	$query2=Fun::makeDummyTableColumns($var_subj,array("id","name"),"is");
	$query3=Fun::makeDummyTableColumns($var_topic,array("id","name"),"is");
	$query4=Fun::makeDummyTableColumns($var_combine,array("class_id","subj_id","topic_id"),"iii");



	$sql="Insert into all_classes(id,classname) $query1";
		Sql::query($sql);
	$sql="Insert into all_subjects(id,subjectname) $query2";
		Sql::query($sql);
	$sql="Insert into all_topics(id,topicname) $query3";
		Sql::query($sql);
	$sql="Insert into all_cst(c_id,s_id,t_id) $query4";
		Sql::query($sql);

}
function timepass(){
	$a=Funs::cst_tree();
	$b=array();
	foreach($a as $key1=>$val1){
		$b[$val1["name"]]=array();
		foreach($val1["children"] as $key2=>$val2){
			$b[$val1["name"]][$val2["name"]]=array();
			foreach($val2["children"] as $key3=>$val3 ){
				$b[$val1["name"]][$val2["name"]][]=$val3["name"];
			}
		}
	}
}

function makesomeaccounts(){
	print_r(User::signUp(array("email"=>"admin@admin.com","password"=>"p","type"=>"a")));
//	print_r(User::signUp(array("email"=>"mohit@t.com","password"=>"p","type"=>"t")));
	print_r(User::signUp(array("email"=>"mohit@s.com","password"=>"p","type"=>"s")));
}

if(get("key")=="mohitvm"){
	insertall_cst();
	makesomeaccounts();
}

closedb();
?>