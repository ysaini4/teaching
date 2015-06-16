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
	),
	"Template/cutecheckbox.php"=>array(
		"onchange"=>"",
		"id"=>"",
		"label"=>"Check",
		"class"=>"",
		"inpattr"=>array("value"=>""),
//		"divattr"=>array("style"=>"margin-top:-28px;padding:0px;margin-bottom:-28px;"),
		"divattr"=>array("style"=>"")
	)
);



$_ginfo=array();
$_ginfo["attributes"]=array("name","value","style","class","id","type","ph","onclick","dc",'rows',"disabled","align","valign","action","autofocus","style","rel","type","href","value","src","selected","target","for","checked");
$_ginfo["attrs_shortcut"]=array("ph"=>"placeholder","dc"=>"data-condition");



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
	"teacherModifySlots"=>array("need"=>array("datets","slots")),
	"addrembulkts"=>array("need"=>array("time","days","startdate","enddate")),
	"addtopics"=>array("need"=>array("class","subject","topic","timer","price")),
	"deltopics"=>array("need"=>array("deleteid"))
);

$_ginfo["error"]=array(
	"-1"=>"Session expired",
	"-2"=>"You are not right person to perform this action.",
	"-3"=>"Incorrect formate of input",
	"-4"=>"Password incorrect",
	"-5"=>"Username doesn't exist",
	"-6"=>"Email id not registered",
	"-7"=>"Action handler not defined",
	"-8"=>"Session expired or You are not right person to perform this action.",
	"-9"=>"Not sufficient arguments.",
	"-16"=>"This email id used Already",
	"-17"=>"OTP is incorrect",
	"-19"=>"You cannot choose slot of past.",
	"-20"=>"You Cannot generate link",
	"-21"=>"Your account deactivated",
	"-22"=>"Nobody is login",
	"-23"=>"File not uploaded",
	"-24"=>"You cannot do so much repeatition.",
	"-25"=>"Error",
	"-25"=>"Subject Already Added",
	"1"=>"Positive"
);

$_ginfo["calrepeatlimit"]=365;
$_ginfo["wiziqlimit"]=3;

$_ginfo["needotp"]=(server=="server");

?>