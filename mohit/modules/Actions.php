<?php
class Actions{

//For Not login people

	function fillotp($data){
		$need=array('otp');
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else{
			if(isset($_SESSION["signupdata"]) && $_SESSION["signupdata"]["otp"]==$data["otp"]){
				$info=$_SESSION["signupdata"];
				$temp=User::signUp(array('type'=>'t','email'=>$info['email'],'password'=>$info['password'],'name'=>$info["name"],"phone"=>$info["phone"] ));
				if($temp>0){
					$datatoinsert=Fun::getflds(array('experience','addinfo','iit','iitentryyear','degree'),$info);
					$datatoinsert["tid"]=$temp['id'];
					$datatoinsert["isselected"]=($info["sec"]=="1"?'t':'f');
					$odata=Sqle::insertVal("teachers",$datatoinsert);
					$_SESSION['login']=$temp;
				}
				else
					$ec=-18;
			}
			else
				$ec=-17;
		}
		return array('ec'=>$ec,'data'=>$odata);
	}

	function teacherreg($data){
		$need=array('name','email','phone','password','experience','addinfo','iit','iitentryyear','degree',"sec");
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else{
			$data['type']='t';
			if(!User::isValidSignUp($data))
				$ec=-3;
			else if(User::isUserExist($data['email']))
				$ec=-16;
			else{
				$data['otp']=rand(1000000,9999999);
				$_SESSION["signupdata"]=$data;
				Fun::mailfromfile($data["email"],"php/mail/m1.txt",array("name"=>$data["name"],"otp"=>$data["otp"]));
				$ec=1;
			}
		}
		return array('ec'=>$ec,'data'=>$odata);
	}
	function teacherregcreatea($data){
		$need=array('name','email','phone','password','experience','addinfo','iit','iitentryyear','degree');
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else{
			$temp=User::signUp(array('type'=>'t','email'=>$data['email'],'password'=>$data['password'],"phone"=>$data["phone"],"address"=>$data["address"]));
			if($temp>0){
				$datatoinsert=Fun::getflds(array('experience','addinfo','iit','iitentryyear','degree'),$data);
				$datatoinsert["tid"]=$temp['id'];
				$odata=Sqle::insertVal("teachers",$datatoinsert);
			}
			else
				$ec=$temp;
		}
		return array('ec'=>$ec,'data'=>$odata);
	}
	function sendotp($data){
		$need=array("phone");
		$ec=1;
		$odata=0;
		if(!Fun::isAllSet($need,$data))
			$ec=-9;
		else{
			$otp=rand(100000,999999);
			sets("phone",$otp);
			Fun::mailfromfile($data["phone"],"php/mail/otp.txt",array("otp"=>$otp));
			Fun::msgfromfile($data["phone"],"php/mail/otp.txt",array("otp"=>$otp));
		}
		return array('ec'=>$ec,'data'=>$odata);
	}
	function confirmotp($data){
		$outp=array("ec"=>1,"data"=>0);
		if(gets("phone")!=$data["otp"])
			$outp["ec"]=-17;
		return $outp;
	}
	function mohit($data){
		$outp=array("ec"=>1,"data"=>0);
		$outp["data"]=array(11,33,$data["month"]);
		return $outp;
	}

}
?>
