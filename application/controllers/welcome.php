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
			$_POST=Fun::mergeifunset($_POST,array("degree"=>"","college"=>"","resume"=>"","calvarification"=>"","minfees"=>""));
			$_POST['name']=$_POST["fname"]." ".$_POST["lname"];
			$temp=User::signUp(array("name"=>$_POST["name"],"email"=>$_POST["email"],"password"=>$_POST["password"],"type"=>'t',"phone"=>$_POST["phone"],"dob"=>Fun::strtotime_t3($_POST["dob"])));
			if($temp>0){
				$datatoinsert=array("lang"=>Fun::getmulchecked($_POST,"lang",14),"teachingexp"=>$_POST["teachingexp"]);
				$datatoinsert["tid"]=$temp['id'];
				$datatoinsert["isselected"]=$_ginfo["joinus_need_to_confirm"]?'f':'t';
				$adddata=Fun::getflds(array("college","subother","minfees","resume", "calvarification", "degree","degreeother","branch","city","zipcode","state","linkprofile","feedback"),$_POST);
				$adddata["sub"]=Fun::getmulchecked($_POST,"sub",6);
				$adddata["grade"]=Fun::getmulchecked($_POST,"grade",4);
				$datatoinsert["jsoninfo"]=json_encode($adddata);
				$odata=Sqle::insertVal("teachers",$datatoinsert);
//				Fun::redirect(BASE."account");
				$msg="Dear ".$_POST["name"].", thanks for contacting us. We will soon get back to you.";
			}

			$data=json_encode($_POST);
			$fn=time()."_".$_SERVER['REMOTE_ADDR']."_".strlen($data)."";
			$uf="joinusdata/".$fn;
//			file_put_contents($uf, $data);
//			chmod($uf,0777);
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
		$aboutVar=array();
		load_view("aboutus.php",$aboutVar);
	}

	public function contactus(){
		$msg="";
		if(Fun::isSetP("name","phone","email","msg")){
		  $contactus_data=Fun::getflds(array("name","phone","email","msg"),$_POST);
		  $temp = User::loginId();
		  if($temp)
		  {
		    $contactus_data["user_id"] = $temp;
		  }
		  else
		  {
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
		    Fun::redirect(BASE."account");
		  }
		  else
		    $pageinfo["loginmsg"]="Error in login";
		}
		load_view("login.php",$pageinfo);
	}
	public function signup(){
		$pageinfo=array("signupmsg"=>"");
		if(Fun::isSetP("name","email","password")){
			$signup_data=Fun::getflds(array("name","email","password"),$_POST);
			$signup_data["type"]="s";
			$temp=User::signUp($signup_data);
			if($temp>0){
				Fun::redirect(BASE."account");
			}
			else
				$pageinfo["signupmsg"]="Error in signup";
		}
		load_view('signup.php',$pageinfo);
	}
	public function cal($tid=0){
		$tid=0+$tid;
		if($tid==0)
			$tid=User::loginId();
		$pageinfo=array();
		$pageinfo['timeslots']=Funs::timeslotlist(true);

		load_view("cal.php",$pageinfo);
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
		load_view('topics.php',$pageinfo);
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
		if(Fun::isSetP("fname","lname","gender","email","dob","phone")){
		  $update_data=Fun::getflds(array("gender","email","dob","phone"),$_POST);
		  $update_data["name"]=$_POST["fname"]." ".$_POST["lname"];
//		  echo $update_data["dob"];
		  $update_data["dob"]=Fun::strtotime_t3($update_data["dob"]);
		  Sqle::updateVal("users", $update_data, array("id"=>User::loginId() ));
		  $msg="Saved";
		}

		if(isset($_FILES["profilepic"])){
		  $fd=Fun::uploadfile_post($_FILES["profilepic"],array());
		  if($fd["ec"]>0){
		  	$smallpic="data/files/".Fun::getuploadfilename(pathinfo($fd['fn'],PATHINFO_EXTENSION),'small');
		  	Fun::resizeimage($fd["fn"],$smallpic,100,100);
		    Sqle::updateVal("users",array("profilepic"=>$smallpic,"profilepicbig"=>$fd["fn"]), array("id"=>User::loginId()) );
		  }
		}
		$sinfo=User::myprofile();
		$flname=explode(" ",$sinfo["name"]." ");
		$dob=$sinfo["dob"]>0 ? Fun::timetostr_t3($sinfo["dob"]):"";
    	$pageinfo=array("fname"=>$flname[0],"lname"=>$flname[1],"msg"=>$msg,"sinfo"=>$sinfo,"dob"=>$dob);

    	load_view("account.php",$pageinfo);
	}   

	public function mohit($tid=122,$saini="Mohit"){
///		show_404();
//		echo $this->input->get("timepass");
		echo session_id();
		echo BASEPATH;
		$this->load->view('mohit',array("tid"=>$tid,'saini'=>$saini));
	}

public function set_news()
{
	$this->load->helper('url');

	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text')
	);

	return $this->db->insert('news', $data);
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */