<?php

$_ginfo["page"]=curfilename();
$view_default["template/header.php"]["islogin"]=User::loginType();

$_ginfo["joinus_need_to_confirm"]=true;

$_ginfo["query"]=array();


$_ginfo["query"]["bookedslots"]="select starttime, sum(sid is not null) as numbooked from timeslot group by starttime ";
$_ginfo["query"]["alltimeslots"]="select timeslot.*, numbookedtable.numbooked from timeslot left join (".gtable("bookedslots").")numbookedtable on numbookedtable.starttime=timeslot.starttime where true";

$_ginfo["query"]["meteacherallts"]=gtable("alltimeslots")." and tid={tid} and timeslot.starttime>={starttime} AND timeslot.starttime<{endtime} ";

$_ginfo["query"]["studentteacherallts"]=gtable("meteacherallts")." AND (sid={sid} OR (sid is null AND numbooked<".$_ginfo["wiziqlimit"].") ) ";

$_ginfo["query"]["teacherfreets"]="select starttime from (".gtable("meteacherallts")." AND (sid is null AND numbooked<".$_ginfo["wiziqlimit"].") ".") teacherfreets ";


$_ginfo["query"]["pricelist"] = "select tid, min(price) as minprice, max(price) as maxprice from subjects group by tid";

$_ginfo["query"]["cst_map"] = "select all_classes.classname, all_subjects.subjectname, all_topics.topicname, all_cst.* from all_cst left join all_classes on all_classes.id = all_cst.c_id left join all_subjects on all_subjects.id = all_cst.s_id left join all_topics on all_topics.id = all_cst.t_id ";

$_ginfo["query"]["bookedclasses"] = "select users.name as studentname, userst.name as teachername, cst_map.classname, cst_map.subjectname, cst_map.topicname, booked.* from booked left join ".qtable("cst_map")." on (cst_map.c_id = booked.c_id AND cst_map.s_id = booked.s_id AND cst_map.t_id = booked.t_id ) left join users on users.id = booked.sid left join users as userst on userst.id = booked.tid order by booked.starttime";


$_ginfo["query"]["stdbookedclasses"] = "select * from (".qtable("bookedclasses").") where sid={sid} ";
$_ginfo["query"]["stdbookedclasses_new"] = qtable("stdbookedclasses", false)." and starttime > ".time();
$_ginfo["query"]["stdbookedclasses_old"] = qtable("stdbookedclasses", false)." and starttime <= ".time();

$_ginfo["query"]["teacherbookedclasses"] = "select * from (".qtable("bookedclasses").") where tid={tid} ";
$_ginfo["query"]["teacherbookedclasses_new"] = qtable("teacherbookedclasses", false)." and starttime > ".time();
$_ginfo["query"]["teacherbookedclasses_old"] = qtable("teacherbookedclasses", false)." and starttime <= ".time();

?>