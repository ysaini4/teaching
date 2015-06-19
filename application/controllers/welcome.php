<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
  public $cururl;
  public $cleanurl;
  public function __construct(){
    parent::__construct();
    $this->cururl=Fun::getcururl();
    $this->cleanurl=Fun::getcururl(true);
  }
  public function index(){
    $pageinfo=array();
    Fun::issetlogout();
    load_view('index.php',$pageinfo);
  }
  public function joinus(){
    global $_ginfo;
    $pageinfo=array("issubmitted"=>false,"msg1"=>"");
    $msg="Dear IITian, welcome to getIITians please tell us something about yourself.";

    if(isset($_FILES["uploadfile_clgvarification"]) && $_FILES["uploadfile_clgvarification"]["size"]>0  ){
      $uf=Fun::uploadfile_post($_FILES["uploadfile_clgvarification"]);
      if($uf["ec"]>0)
        $_POST["calvarification"]=$uf["fn"];
    }

    if(isset($_FILES["resumefile"]) && $_FILES["resumefile"]["size"]>0  ){
      $uf=Fun::uploadfile_post($_FILES["resumefile"], array(), 'resume');
      if($uf["ec"]>0)
        $_POST["resume"]=$uf["fn"];
    }

    if(Fun::isSetP("fname", "lname", "email", "phone", "password", "action","subother","teachingexp","degreeother","branch","dob","city","zipcode","state","linkprofile","feedback")){
      $pageinfo["issubmitted"]=true;
      $_POST=Fun::mergeifunset($_POST,array("degree"=>"","college"=>"","resume"=>"","calvarification"=>"","minfees"=>"","country"=>""));
      $_POST['name']=$_POST["fname"]." ".$_POST["lname"];
      $temp=User::signUp(array("name"=>$_POST["name"],"email"=>$_POST["email"],"password"=>$_POST["password"],"type"=>'t',"phone"=>$_POST["phone"],"dob"=>Fun::strtotime_t3($_POST["dob"]),"gender"=>$_POST["gender"]));
      if($temp>0){
        $datatoinsert=array("lang"=>Fun::getmulchecked($_POST,"lang",14),"teachingexp"=>$_POST["teachingexp"]);
        $datatoinsert["tid"]=$temp['id'];
        $datatoinsert["isselected"]=$_ginfo["joinus_need_to_confirm"]?'f':'t';
        $adddata=Fun::getflds(array("college","subother","minfees","resume", "calvarification", "degree","degreeother","branch","city","zipcode","state","country","linkprofile","feedback","knowaboutusother"),$_POST);
        $adddata["sub"]=Fun::getmulchecked($_POST,"sub",6);
        $adddata["grade"]=Fun::getmulchecked($_POST,"grade",4);
        $adddata["knowaboutus"]=Fun::getmulchecked($_POST,"knowaboutus",4);
        $adddata["home"]=Fun::getmulchecked($_POST,"home",2);
        $datatoinsert["jsoninfo"]=json_encode($adddata);
        $odata=Sqle::insertVal("teachers",$datatoinsert);
//        Fun::redirect(BASE."account");
        $msg="Dear ".$_POST["name"].", thanks for contacting us. We will soon get back to you.";
      }

      $data=json_encode($_POST);
      $fn=time()."_".$_SERVER['REMOTE_ADDR']."_".strlen($data)."";
      $uf="joinusdata/".$fn;
//      file_put_contents($uf, $data);
//      chmod($uf,0777);
    }
    $pageinfo["msg"]=$msg;
    if($pageinfo["issubmitted"]==true){
      $pageinfo["msg"]="thanks for contacting us. We will soon get back to you."; 
      if($temp == -16)
        $pageinfo["msg"]="<b>".$_POST["email"]."</b> Id already exists";  
      else if($temp == -3)
        $pageinfo["msg"]="Invalid Data. Please fill the form again";
    } 
    load_view("joinustmp2.php",$pageinfo);
  }

  public function aboutus(){
    $aboutVar = array();
    load_view("aboutus.php", $aboutVar);
  }

  public function reset(){
    load_view("reset.php");
  }

  public function contactus(){
    $msg="";
    if(Fun::isSetP("name","phone","email","msg")){
      $contactus_data=Fun::getflds(array("name","phone","email","msg"),$_POST);
      $temp = User::loginId();
      if($temp) {
        $contactus_data["user_id"] = $temp;
      } else {
        $contactus_data["user_id"] = null;
      }
      
      $result = Help::contactUs($contactus_data);
      if($result>0){
        $msg="Thank you we will get back to you soon.";
      }
      else
        $msg="Error submitting your query. Please try again";
    }
    $contactVar=array("msg"=>$msg);
    load_view("contactus.php",$contactVar);
  }


  public function joinusreal(){
    global $_ginfo;
    $pageinfo=array("msg"=>"");
    if(Fun::isSetP("name","iit","email","iitentryyear","password","degree","phone")){
      $temp=User::signUp(array("name"=>$_POST["name"],"email"=>$_POST["email"],"password"=>$_POST["password"],"type"=>'t',"phone"=>$_POST["phone"]));
      if($temp>0){
        $datatoinsert=Fun::getflds(array('iit','iitentryyear','degree'),$_POST);
        $datatoinsert["tid"]=$temp['id'];
        $datatoinsert["isselected"]=$_ginfo["joinus_need_to_confirm"]?'f':'t';
        $odata=Sqle::insertVal("teachers",$datatoinsert);
        Fun::redirect(BASE."account");
      }
      else{
        $pageinfo["msg"]="Error occured";
      }
    }
    $pageinfo["alliit"]=$_ginfo["alliits"];
    $pageinfo["yearjoiniit"]=Fun::oneToN(date('Y'),1980,false);
    $pageinfo["alldeg"]=$_ginfo["alldegrees"];
    load_view('joinus.php',$pageinfo);
  }
  public function login(){
    $pageinfo=array("loginmsg"=>"");
    if(Fun::isSetP("email","password")){
      $temp=User::signIn($_POST["email"],$_POST["password"]);
      if($temp>0){
        Fun::redirect(BASE."profile");
      }
      else
        $pageinfo["loginmsg"]="Error in login";
    }
    load_view("login.php",$pageinfo);
  }
  public function signup(){
    $handle_signup=handle_request(Fun::mergeifunset($_POST, array("action"=>"signup")));
    if($handle_signup["ec"]>0){
      Fun::redirect(BASE."account");
    }
    $pageinfo=array();
    $pageinfo["signupmsg"]=errormsg($handle_signup["ec"],ispost("signup"));
    load_view('signup.php',$pageinfo);
  }
  public function cal($tid=0){
    global $_ginfo;
    $tid=Funs::gettid($tid);
    $bulkupload=handle_request(Fun::mergeifunset($_POST,array("action"=>"addrembulkts")));

    load_view("Template/top.php");
    load_view("Template/navbarnew.php");
    load_view("cal.php", Funs::get_teacher_cal_info($tid) );

    load_view("Template/footernew.php");
    load_view("popup.php",array("name"=>"timeslot"));
    load_view("Template/bottom.php");
  }
  public function topics($tid=0){
    $tid=0+$tid;
    if($tid==0)
      $tid=User::loginId();
    if(Fun::isSetP("class","subject","topic","timer","price") && User::isloginas('t') ){
      $insert_data=Fun::getflds(array("timer","price"),$_POST);
      $difarr=array("class"=>"c_id","subject"=>"s_id","topic"=>"t_id");
      foreach($difarr as $i=>$val){
        $insert_data[$val]=$_POST[$i];
      }
      $insert_data["tid"]=User::loginId();
      Sqle::insertVal("subjects", $insert_data );
      Fun::redirect($this->cururl);
  
    }
    if(Fun::isSetG("deleteid")){
      Sqle::deleteVal("subjects",array("id"=>$_GET["deleteid"],"tid"=>User::loginId()),1);
      Fun::redirect($this->cleanurl);
    }
    $cst_tree=Funs::cst_tree();
    $pageinfo=array('cst_tree'=>$cst_tree,"tid"=>$tid);
    $pageinfo["class_olist"]=Funs::cst_tree2classlist($cst_tree);
    $pageinfo["mysubj"]=Sql::getArray("select subjects.*,all_classes.classname, all_subjects.subjectname, all_topics.topicname from subjects left join all_classes on all_classes.id=subjects.c_id left join all_subjects on all_subjects.id=subjects.s_id left join all_topics on all_topics.id=subjects.t_id where tid=?",'i',array(&$tid));

    load_view("Template/top.php",$pageinfo);
    load_view("Template/navbar.php",$pageinfo);
    load_view('topics.php',$pageinfo);
    load_view("Template/footer.php",$pageinfo);
    load_view("Template/bottom.php",$pageinfo);

  }
  public function profile($tid=0,$tabid=1){
    // $numtabs=4;
    // global $_ginfo;
    // $tid=Funs::gettid($tid);
    // $tabid=max(min($numtabs,(0+$tabid)),1);
    // $uprofile=User::userProfile($tid);

    // if(false){
    //   $bulkupload_timeslot=handle_request(Fun::mergeifunset($_POST,array("action"=>"addrembulkts")));
    //   $addtopic=handle_request(Fun::mergeifunset($_POST,array("action"=>"addtopics")));
    //   $remtopic=handle_request(Fun::mergeifunset($_GET,array("action"=>"deltopics")));

    //   if($tid!=User::loginId() || User::isloginas('t') ){
    //     $cst_tree=Funs::cst_tree();
    //     $topicinfo=array('cst_tree'=>$cst_tree,"tid"=>$tid);
    //     $topicinfo["class_olist"]=Funs::cst_tree2classlist($cst_tree);
    //     $topicinfo["mysubj"]=Sql::getArray("select subjects.*,all_classes.classname, all_subjects.subjectname, all_topics.topicname from subjects left join all_classes on all_classes.id=subjects.c_id left join all_subjects on all_subjects.id=subjects.s_id left join all_topics on all_topics.id=subjects.t_id where tid=?",'i',array(&$tid));

    //     $pageinfo=array();
    //     $pageinfo["aboutinfo"]=Sqle::getRow("select teachers.*,users.* from teachers left join users on users.id=teachers.tid where teachers.tid=? limit 1",'i',array(&$tid));
    //     if($pageinfo["aboutinfo"]==null){
    //       Fun::redirect(HOST);
    //     }
    //     $pageinfo["calinfo"]=Funs::get_teacher_cal_info($tid);
    //     $pageinfo["topicinfo"]=$topicinfo;
    //     $pageinfo["tid"]=$tid;
    //     $pageinfo["tabid"]=$tabid;
    //     $tempArr=explode(' ',$pageinfo['aboutinfo']['name']);
    //     $pageinfo['firstName']=$tempArr[0];
    //     $pageinfo['lastName']=$tempArr[1];
    //     $jsonArray=str2json($pageinfo['aboutinfo']['jsoninfo']);
    //     $pageinfo['city']=$jsonArray['city'];
    //     $pageinfo['jsonArray']=$jsonArray;
    //       $tempSubjects=Funs::extractFields($pageinfo['aboutinfo']['jsoninfo'],$_ginfo['encodeddataofteacherstable']['sub'],'sub');
    //     $pageinfo['subArray']=explode(' , ', $tempSubjects);
    //     $tempGrades=explode('-',$jsonArray['grade']);
    //     foreach ($tempGrades as $value) {
    //       $gradeArray[]=$_ginfo['encodeddataofteacherstable']['grade'][$value-1];
    //     }
    //     $pageinfo['gradeArray']=$gradeArray;
    //     $tempLang=explode('-',$pageinfo['aboutinfo']['lang']);
    //     foreach ($tempLang as $value) {
    //       $langArray[]=$_ginfo['encodeddataofteacherstable']['lang'][$value-1];
    //     }
    //     $pageinfo['langArray']=$langArray;    
    //     load_view("profile.php",$pageinfo);
    //   }
    // }
    // else if(User::isloginas('s')){
    //   echo "Hey Student";
    // }
    // else if(User::isloginas('a')){
    //   echo "Hey Admin";
    // }
  }

  public function search(){
    load_view("newsearch1.php");
  }
    public function newsearch()
  {
    $this->load->view('Template/top',array("inp"=>array("css"=>array("jquery/jRating.jquery.css","css/materialize.min.css","css/custom-stylesheet.css","css/jquery.bxslider.css"))));
    $this->load->view('Template/navbar');
    $this->load->view('newsearch');
    $this->load->view('Template/footer');
    $this->load->view('Template/bottom');
  }


    public function account(){
      Fun::gotohome();
      $msg="";
      $update_profile=handle_request(Fun::setifunset($_POST, "action", "studenteditprofile"));
      if(isset($_FILES["profilepic"])){
        Fun::uploadpic($_FILES["profilepic"], "profilepic", "profilepicbig", 100);
      }
      $sinfo=User::myprofile();
      $flname=explode(" ",$sinfo["name"]." ");
      $dob=$sinfo["dob"]>0 ? Fun::timetostr_t3($sinfo["dob"]):"";
      $pageinfo=array("fname"=>$flname[0],"lname"=>$flname[1],"msg"=>$msg,"sinfo"=>$sinfo,"dob"=>$dob);

      load_view("account.php",$pageinfo);
  }   

  //Made by ::Himanshu Rohilla::
  public function accept($tid){
    $sql="UPDATE teachers set isselected='a' where tid=$tid";
    $result=Sql::query($sql);
    echo '<h3>You accepted this user<br><br></h3>';
    self::view($tid);
  }
  //Made by ::Himanshu Rohilla::
  public function reject($tid){
    $sql="UPDATE teachers set isselected='r' where tid=$tid";
    $result=Sql::query($sql);
    echo '<h3>You rejected this user<br><br></h3>';
    self::view($tid);
  }
  //Made by ::Himanshu Rohilla::
  public function view($tid){
    $sql="select * from teachers,users where teachers.tid=users.id AND users.id=$tid";
    $result=Sql::getArray($sql);
    load_view("viewuser.php",array('result'=>$result));
    echo '<b><a style="margin-left:10px;font-size:30px;" href="'.(BASE."acceptOrReject").'" style="font-size:30px;">Go Back</a></b>';
  }
  public function compareMany($tidString){
    $tidArray=explode("-", $tidString);
    $i=0;
    foreach($tidArray as $id){
      $sql="select * from teachers,users where teachers.tid=users.id AND users.id=$id";
      $result[$i++]=Sql::getArray($sql);
    }
    load_view("compare.php",array('result'=>$result));
  }
  public function testCSV(){
    $csvVar=array();
    load_view("testCSV.php",$csvVar);
  }
  public function confirmSlots($date){
    $date = date('d-m-Y', strtotime($date));
    $startdate = $date.' 00:00:00';
    $startstamp=strtotime($startdate);
    $enddate = $date.' 23:59:59';
    $endstamp=strtotime($enddate);
    $id=User::loginId();
    $sql="select * from timeslot where tid=$id";
    $table=sql::getArray($sql);
    $finalrows=array();
    foreach($table as $row){
      if($row['starttime']>=$startstamp && $row['starttime']<$endstamp)
        $finalrows[]=$row['starttime'];
    }

    load_view("confirmSlots.php",array('finalrows'=>$finalrows,'timeslots'=>Funs::timeslotlist(true)));
  }
  public function create()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'text', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('index');

    }
    else
    {
      $this->news_model->set_news();
      $this->load->view('mohit');
    }
  }

  //Made by ::Himanshu Rohilla::
  public function acceptOrReject($tid = 0){
    $sql="SELECT * from teachers LEFT JOIN users ON users.id=teachers.tid";
    $arrResult=array();
    if($tid != 0)
      $sql="select * from teachers,users where teachers.tid=users.id and tid=$tid";
    $result=Sql::getArray($sql);
    $arrResult=array("result"=>$result, "tid"=>$tid);
    load_view("acceptOrReject.php",$arrResult);

    if(Fun::isSetP("check")){
      $compareFields=$_POST['check'];
      $compareFields=implode("-", $compareFields);
      //self::compareMany($compareFields);
      echo '<script>window.location.href = "'.BASE.'compareMany/'.$compareFields.'"</script>';
    }
  }
  //Made by ::Himanshu Rohilla::
  public function accept($tid){
    $sql="UPDATE teachers set isselected='a' where tid=$tid";
    $result=Sql::query($sql);
    echo '<h3>You accepted this user<br><br></h3>';
    self::view($tid);
  }
  //Made by ::Himanshu Rohilla::
  public function reject($tid){
    $sql="UPDATE teachers set isselected='r' where tid=$tid";
    $result=Sql::query($sql);
    echo '<h3>You rejected this user<br><br></h3>';
    self::view($tid);
  }
  //Made by ::Himanshu Rohilla::
  public function view($tid){
    $sql="select * from teachers,users where teachers.tid=users.id AND users.id=$tid";
    $result=Sql::getArray($sql);
    load_view("viewuser.php",array('result'=>$result));
    echo '<b><a style="margin-left:10px;font-size:30px;" href="'.(BASE."acceptOrReject").'" style="font-size:30px;">Go Back</a></b>';
  }
  public function compareMany($tidString){
    $tidArray=explode("-", $tidString);
    $i=0;
    foreach($tidArray as $id){
      $sql="select * from teachers,users where teachers.tid=users.id AND users.id=$id";
      $result[$i++]=Sql::getArray($sql);
    }
    load_view("compare.php",array('result'=>$result));
  }
  public function testCSV(){
    $csvVar=array();
    load_view("testCSV.php",$csvVar);
  }
  public function confirmSlots($date){
    $date = date('d-m-Y', strtotime($date));
    $startdate = $date.' 00:00:00';
    $startstamp=strtotime($startdate);
    $enddate = $date.' 23:59:59';
    $endstamp=strtotime($enddate);
    $id=User::loginId();
    $sql="select * from timeslot where tid=$id";
    $table=sql::getArray($sql);
    $finalrows=array();
    foreach($table as $row){
      if($row['starttime']>=$startstamp && $row['starttime']<$endstamp)
        $finalrows[]=$row['starttime'];
    }

    load_view("confirmSlots.php",array('finalrows'=>$finalrows,'timeslots'=>Funs::timeslotlist(true)));
  }
  public function review($tid) {
    $sql="select * from reviews where tid=$tid";
    $allreviews=sql::getArray($sql);
    //finalArray is the array which we are passing in our view
    $m=0;
    $sid=User::loginId();
    foreach ($allreviews as $key => $value) {
      $finalArray[$m]['content']=$value['content'];
      $finalArray[$m]['time']=date("M d, Y h:i A",strtotime($value['time']));
        $id=$value['sid'];
        $sql="select * from users where id=$id";
        $temp=sql::getArray($sql);
      $finalArray[$m]['sname']=$temp[0]['name'];
      $finalArray[$m]['id']=$value['id'];
        $id=$value['id'];
        $sql="select count(sid) from likes where rid=$id and like_dislike='-1'";
        $temp=sql::getArray($sql);
      $finalArray[$m]['dislike']=$temp[0]['count(sid)'];
        $sql="select count(sid) from likes where rid=$id and like_dislike='1'";
        $temp=sql::getArray($sql);
      $finalArray[$m]['like']=$temp[0]['count(sid)'];
        $sql="select count(*) from likes where sid='$sid' and rid='$id'";
        $temp=sql::getArray($sql);
      if($temp[0]['count(*)']>0)
        $finalArray[$m]['disableTag']=true;
      else
        $finalArray[$m]['disableTag']=false;
      $id=$value['tid'];
      $m++;
    }
    $sql="select * from users where id=$id";
    $temp=sql::getArray($sql);
    load_view("review.php",array('finalArray'=>$finalArray,'tname'=>$temp[0]['name']));
  }
  public function myslots($tid) {
    if(isset($_FILES["timeslot_upload"]) && $_FILES["timeslot_upload"]["size"]>0){
      $uf=Fun::uploadfile_slotpost($_FILES["timeslot_upload"]);
      if($uf["ec"]>0)
        $_POST["timeslot_upload"]=$uf["fn"];
    }
    load_view("fileupload.php",array());
  }
  public function forgotPassword() {
    load_view("forgotPassword.php",array());
  }
      public function changeuserpassword($tid=1) {
      load_view("changepass.php",array());
      if(isset($_POST['oldpass'])) {
        $chngreq=handle_request(fun::mergeifunset($_POST,array("action"=>"changepassaction")));
        if($chngreq['ec']==1) {
          $link=BASE.'profile/'.$tid;
          echo '<script>window.location.href="'.$link.'"</script>';
        }
        else {
          echo "Password isn't changed";
        }
      }
    }
        public function review($tid) {
        $sql="select * from reviews where tid=$tid";
        $allreviews=sql::getArray($sql);
        //finalArray is the array which we are passing in our view
        $m=0;
        $sid=User::loginId();
        foreach ($allreviews as $key => $value) {
            $finalArray[$m]['content']=$value['content'];
            $finalArray[$m]['time']=date("M d, Y h:i A",strtotime($value['time']));
                $id=$value['sid'];
                $sql="select * from users where id=$id";
                $temp=sql::getArray($sql);
            $finalArray[$m]['sname']=$temp[0]['name'];
            $finalArray[$m]['id']=$value['id'];
                $id=$value['id'];
                $sql="select count(sid) from likes where rid=$id and like_dislike='-1'";
                $temp=sql::getArray($sql);
            $finalArray[$m]['dislike']=$temp[0]['count(sid)'];
                $sql="select count(sid) from likes where rid=$id and like_dislike='1'";
                $temp=sql::getArray($sql);
            $finalArray[$m]['like']=$temp[0]['count(sid)'];
                $sql="select count(*) from likes where sid='$sid' and rid='$id'";
                $temp=sql::getArray($sql);
            if($temp[0]['count(*)']>0)
                $finalArray[$m]['disableTag']=true;
            else
                $finalArray[$m]['disableTag']=false;
            $id=$value['tid'];
            $m++;
        }
        $sql="select * from users where id=$id";
        $temp=sql::getArray($sql);
        load_view("review.php",array('finalArray'=>$finalArray,'tname'=>$temp[0]['name']));
    }
  public function myslots($tid) {
    if(isset($_FILES["timeslot_upload"]) && $_FILES["timeslot_upload"]["size"]>0){
      $uf=Fun::uploadfiles_t2($_FILES["timeslot_upload"]);
      $filelink="";
      foreach($uf['fn'] as $key => $value) {
        if($key==0)
          $filelink=$value;
        else
          $filelink=$filelink.','.$value;
      }
      foreach ($uf['message'] as $key => $value) {
        echo $value[$key].'<br>';
      }
      if($uf['count']>0){
        $count=$uf["count"];
        echo '<b>'.$count.' files uploaded succesfully.<br></b>';
      }
      if(isset($_POST['slotid'])) {
        foreach ($_POST['slotid'] as $key => $value) {
          if($value!='')
            $times=$value;
        }
      }
      $sql="select testfiles from timeslot where tid='$tid' and starttime='$times'";
      $previousdatafiles=sql::getArray($sql);
      $previousdatafiles=$previousdatafiles[0]['testfiles'];
      if($previousdatafiles!='' && $filelink!='')
        $filelink=$previousdatafiles.','.$filelink;
      if($filelink!='') {
        $sql="update timeslot set testfiles='$filelink' where tid='$tid' and starttime='$times'";
        sql::query($sql);
      }
    }
    if(isset($_FILES["timeslot_uploadsoln"]) && $_FILES["timeslot_uploadsoln"]["size"]>0){
      $uf=Fun::uploadfiles_t2($_FILES["timeslot_uploadsoln"]);
      $filelink="";
      foreach($uf['fn'] as $key => $value) {
        if($key==0)
          $filelink=$value;
        else
          $filelink=$filelink.','.$value;
      }
      foreach ($uf['message'] as $key => $value) {
        echo $value[$key].'<br>';
      }
      if($uf['count']>0){
        $count=$uf["count"];
        echo '<b>'.$count.' files uploaded succesfully.<br></b>';
      }
      if(isset($_POST['slotid'])) {
        foreach ($_POST['slotid'] as $key => $value) {
          if($value!='')
            $times=$value;
        }
      }
      $sql="select solnfiles from timeslot where tid='$tid' and starttime='$times'";
      $previousdatafiles=sql::getArray($sql);
      $previousdatafiles=$previousdatafiles[0]['solnfiles'];
      if($previousdatafiles!='' && $filelink!='')
        $filelink=$previousdatafiles.','.$filelink;
      if($filelink!='') {
        $sql="update timeslot set solnfiles='$filelink' where tid='$tid' and starttime='$times'";
        sql::query($sql);
      }
    }

    $sql="select * from timeslot where tid='$tid'";
    $temp=sql::getArray($sql);
    load_view("fileupload.php",array('temp'=>$temp,'tid'=>$tid));   
  }
  public function deleteFile($firstArg,$secondArg,$thirdArg,$type) {
    $tempArray=explode(',', $thirdArg);
    $file=$firstArg.'/'.$secondArg.'/'.$tempArray[0];
    $starttime=$tempArray[1];
    $tid=$tempArray[2];
    $sql="select * from timeslot where tid='$tid' and starttime='$starttime'";
    $temp=sql::getArray($sql);
    $testfiles=$temp[0][$type];
    $tempArray=explode(',', $testfiles);
    $finalFiles="";
    foreach ($tempArray as $key => $value) {
      if($value==$file)
        $finalFiles=$finalFiles;
      else{
        if($finalFiles!='')
          $finalFiles=$finalFiles.','.$value;
        else
          $finalFiles=$value;
      }
    }
    if($type=='testfiles')
      $sql="update timeslot set testfiles='$finalFiles' where tid='$tid' and starttime='$starttime'";
    else if($type=='solnfiles')
      $sql="update timeslot set solnfiles='$finalFiles' where tid='$tid' and starttime='$starttime'";
    sql::query($sql);
    unlink($finalFiles);
    header('Location:'.BASE.'myslots/'.$tid);
    //self::myslots($tid);
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

