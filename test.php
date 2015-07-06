<?php
include "includes/app.php";


echo gget("fbkeys", "appid");


if(false) {
	echo Funs::sendmail("mohitsaini1196@gmail.com", "Subject", "This is real content.");

	$query = "select users.name as studentname, userst.name as teachername, cst_map.classname, cst_map.subjectname, cst_map.topicname, (subjects.price*booked.duration/3600) as classcharge, booked.* from booked left join ".qtable("cst_map")." on (cst_map.c_id = booked.c_id AND cst_map.s_id = booked.s_id AND cst_map.t_id = booked.t_id ) left join users on users.id = booked.sid left join subjects on (subjects.c_id = booked.c_id AND subjects.s_id = booked.s_id AND subjects.t_id = booked.t_id AND subjects.tid=booked.tid) left join users as userst on userst.id = booked.tid order by booked.starttime";

	$query = "select   userst.name as teachername, cst_map.classname, cst_map.subjectname, cst_map.topicname,  booked.* from booked left join ".qtable("cst_map")." on (cst_map.c_id = booked.c_id AND cst_map.s_id = booked.s_id AND cst_map.t_id = booked.t_id ) left join users as userst on userst.id = booked.tid order by booked.starttime";

	Disp::disp_table( Sqle::getA( $query ) );

	Disp::disp_table( Sqle::getA("select * from ".qtable("bookedclasses").""  ) );
}

closedb();
?>