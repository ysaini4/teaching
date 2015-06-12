<?php

$view_default=array(
	"Template/top.php"=>array(
		"css"=>array("css/materialize.min.css","css/custom-stylesheet.css","css/jquery.bxslider.css"),
		"title"=>"Get IITians"
		),
	'Template/bottom.php'=>array(
		"needpopup"=>true,
		"needbody"=>true
		),
	"popup.php"=>array(
		"title"=>"This popup is made in India",
		"body"=>"",
		"bodyinfo"=>array(),
		"footer"=>"",
		"footerinfo"=>array(),
		"name"=>"",
		'stylebody'=>'',
		'stylemain'=>'min-width:200px;'
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
$_ginfo['encodeddataofteacherstable'] = array('sub'=>array("Mathematics","Physics","Chemistry","Biology","Science(6-10)","Others"),'grade'=>array("6th to 8th","9th to 10th","11th to 12th","IIT JEE"),'lang'=>array("English","Hindi","Assamese","Sanskrit","Bengali","Mayalayam","Tamil","Gujarati","Marathi","Telugu","Oriya","Urdu","Kannada","Punjabi"),'known'=>array("Facebook","Email","Friends","Others"),'home'=>array("Yes","No"));
//changes by himanshu
$_ginfo["weekdays_long"]=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
$_ginfo["month"]=array("January","February","March","April","May","June","July","August","September","October","November","December");
$_ginfo['end_year']=2025;
//changed ends



$_ginfo["action_constrain"]=array(
	"cofirmotp"=>array("need"=>array("otp")),
	"mohit"=>array("need"=>array("month","year")),
	"teacherModifySlots"=>array("need"=>array("month","day","year"))
);




?>
