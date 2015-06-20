<?php
class Students{
  function bookslotfinal($data){//need to change them.
    $need=array('tid','daytime',"slot" );
    $ec=1;
    $odata=0;
    if(!Fun::isAllSet($need,$data))
      $ec=-9;
    else{
      Sqle::updateVal("timeslot",array("sid"=>User::loginId(),"conf"=>"t"),array("tid"=>$data["tid"],"daytime"=>$data["daytime"],"slot"=>$data["slot"],"sid"=>0 ));
      $time=Fun::timetostr($data["daytime"]+3600*$data["slot"] );
      Fun::notf( $data["tid"],"php/notf/n1.txt" , array("Student name"=>User::name(User::loginId()),"time"=>$time ) );
      Fun::notf( User::loginId(),"php/notf/n2.txt" , array("Teacher Name"=>User::name($data["tid"]),"time"=>$time ) );
    }
    return array('ec'=>$ec,'data'=>$odata);
  }
  function feedbackform_student($data){//need to change them.
    $need=array('tid','daytime',"slot","rate","feedback" );
    $ec=1;
    $odata=0;
    if(!Fun::isAllSet($need,$data))
      $ec=-9;
    else{
      $constrain= Fun::getflds(array("tid","slot","daytime"),$data);
      $constrain["sid"]=User::loginId();
      $odata=Sqle::updateVal("timeslot", Fun::getflds(array("rate","feedback"),$data)   , $constrain  );
    }
    return array('ec'=>$ec,'data'=>$odata);
  }
  function studenteditprofile($data){
    $outp=array("ec"=>-1, "data"=>0);
    $update_data=Fun::getflds(array("gender", "email", "dob", "phone"), $data);
    $update_data["name"]=$data["fname"]." ".$data["lname"];
    $update_data["dob"]=Fun::strtotime_t3($update_data["dob"]);
    $outp["data"]=Sqle::updateVal("users", $update_data, array("id"=>User::loginId() ));
    return $outp;
  }

}