<?php

$_ginfo["page"]=curfilename();
$view_default["template/header.php"]["islogin"]=User::loginType();

$_ginfo["joinus_need_to_confirm"]=true;

$_ginfo["query"]=array();


$_ginfo["query"]["bookedslots"]="select starttime, sum(sid is not null) as numbooked from timeslot group by starttime ";
$_ginfo["query"]["alltimeslots"]="select timeslot.*, numbookedtable.numbooked from timeslot left join (".gtable("bookedslots").")numbookedtable on numbookedtable.starttime=timeslot.starttime where true";
$_ginfo["query"]["meteacherallts"]=gtable("alltimeslots")." and tid={tid} and timeslot.starttime>={starttime} AND timeslot.starttime<{endtime} ";
$_ginfo["query"]["studentteacherallts"]=gtable("meteacherallts")." AND (sid={sid} OR (sid is null AND numbooked<".$_ginfo["wiziqlimit"].") ) ";



?>