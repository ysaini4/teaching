<?php

$view_default=array(
	"Template/top.php"=>array(
		"css"=>array("css/materialize.min.css","css/custom-stylesheet.css","css/jquery.bxslider.css"),
		"title"=>"Get IITians"
		)
	);
array(
	'template/top.php'=>array(
		"title"=>"Player",
		"css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css")
		),
	'template/bottom.php'=>array(
		"js"=>array("bootstrap-3.1.1-dist/js/jquery1.js","bootstrap-3.1.1-dist/js/bootstrap.js","js/lib.js","js/mohit.js","js/errorcodes.js","js/mohitlib.js","js/main.js"),
		"needpopup"=>true
		),
	"template/mselect.php"=>array(
		"name"=>"",
		"data"=>"all",
		"divstyle"=>"",
		"blocked"=>array(),
		"selectall"=>true,
		"selectallselected"=>true,
		"label"=>""
		),
	"template/select.php"=>array(
		"name"=>"",
		"label"=>"",
		"selectval"=>"",
		"dc"=>"simple",
		"onchange"=>""
		),
	"template/select_bool.php"=>array(
		"label"=>"",
		"name"=>"",
		"options"=>array("Yes","No")
		),
	"template/header.php"=>array(
		"islogin"=>null//redefined latter in includes/data_loadonce.php
		)
	);



$_ginfo=array();
$_ginfo["attributes"]=array("name","value","style","class","id","type","ph","onclick","dc",'rows',"disabled","align","valign","action","autofocus","style","rel","type","href","value","src","selected","target");
$_ginfo["attrs_shortcut"]=array("ph"=>"placeholder","dc"=>"data-condition");

$_ginfo['sql']=array(
	"cartypenamemap"=>"select car.*,cartype.* from cartype left join (select CarID,CarTypeID from cardata group by CarID,CarTypeID)cartypemap on cartypemap.CarTypeID=cartype.CarTypeID left join car on car.CarID=cartypemap.CarID"
	);


$_ginfo["alliits"]=array('Delhi', 'Kharagpur', 'Kanpur', 'Bombay', 'Madras', 'Roorkee', 'Guwhati', 'Ropar', 'Bhuvneshwar', 'Hydrabad', 'Gandhinagar', 'Patna', 'Rajsthan', 'Mandi', 'Indore', 'BHU,Varanasi', 'ISM Dhanbad');

$_ginfo["alldegrees"]=array('B.Tech', 'M. Tech', 'Phd', 'M.B.A', 'M.Sc.');


$_ginfo["languages"]=array("English","Hindi","Tamil","Chiness");


?>