<?php
include "includes/app.php";

//$c = Funs::wiziq(array("action" => "getteacherinfo", "tmid" => "msvmohit1@mail.com" ));
//$a = Funs::wiziq(array("action" => "addteacher", "tmid" => "msvmohit1@mail.com" ));
//$b = Funs::wiziq(array("action" => "addclass", "tmid" => "vikash@mail.com", "s_time" =>1435655294+3600+1800+1800+1800+1800+1700+1800 , "duration" => 1800 ));

$b = Funs::wiziq(array("action" => "tryaddclass", "s_time" =>1435655294+3600+1800+1800+1800+1800+1700+1800+1800+1800+1800+1800 , "duration" => 1800 ));

//$b = Funs::wiziq(array("action" => "addstudent", "class_id" =>3708007 ));


//3708007, 
//3707988

//echo time();

print_r($b);


//echo date("Y-m-d H:i", time()+3600*24*2);
//"2015-05-19 15:30";


?>
<?php
closedb();
?>