<?php
class AddAttendee
{
	public $addclassdata;
	function AddAttendee($secretAcessKey,$access_key,$webServiceUrl,$add_details=array())
	{
		$outp=array("ec"=>-1);
		require_once("AuthBase.php");
		$authBase = new AuthBase($secretAcessKey,$access_key);
		$XMLAttendee="<attendee_list>
			<attendee>
			  <attendee_id><![CDATA[101]]></attendee_id>
			  <screen_name><![CDATA[john]]></screen_name>
                          <language_culture_name><![CDATA[en-US]]></language_culture_name>
			</attendee>
			<attendee>
			  <attendee_id><![CDATA[102]]></attendee_id>
			  <screen_name><![CDATA[mark]]></screen_name>
                          <language_culture_name><![CDATA[en-US]]></language_culture_name>
			</attendee>
		  </attendee_list>";
		$XMLAttendee="<attendee_list>
			<attendee>
			  <attendee_id><![CDATA[".$add_details["student_id"]."]]></attendee_id>
			  <screen_name><![CDATA[".$add_details["student_name"]."]]></screen_name>
                          <language_culture_name><![CDATA[en-US]]></language_culture_name>
			</attendee>
		  </attendee_list>";
		$method = "add_attendees";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $add_details["class_id"];//required
		$requestParameters["attendee_list"]=$XMLAttendee;
		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($webServiceUrl.'?method=add_attendees',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
			$outp["ec"]=-1;
			$outp["msg"]=$e->getMessage();
//	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
			}
			catch(Exception $e)
			{
				$outp["ec"]=-1;
				$outp["msg"]=$e->getMessage();
				//echo $e->getMessage();
			}
			$status=$objDOM->getElementsByTagName("rsp")->item(0);
    		$attribNode = $status->getAttribute("status");
			if($attribNode=="ok")
			{
				$attendee_urlTag=$objDOM->getElementsByTagName("attendee_url");
				$outp["ec"]=1;
				$outp["url"]=$attendee_urlTag->item(0)->nodeValue;
				if(false){
					$methodTag=$objDOM->getElementsByTagName("method");
					echo "<br>method=".$method=$methodTag->item(0)->nodeValue;
					
					$class_idTag=$objDOM->getElementsByTagName("class_id");
					echo "<br>class_id=".$class_id=$class_idTag->item(0)->nodeValue;
					
					$add_attendeesTag=$objDOM->getElementsByTagName("add_attendees")->item(0);
					echo "<br>add_attendeesStatus=".$add_attendeesStatus = $add_attendeesTag->getAttribute("status");
					
					$attendeeTag=$objDOM->getElementsByTagName("attendee");
					$length=$attendeeTag->length;
					for($i=0;$i<$length;$i++)
					{
						$attendee_idTag=$objDOM->getElementsByTagName("attendee_id");
						echo "<br>attendee_id=".$attendee_id=$attendee_idTag->item($i)->nodeValue;
						
						$attendee_urlTag=$objDOM->getElementsByTagName("attendee_url");
						echo "<br>attendee_url=".$attendee_url=$attendee_urlTag->item($i)->nodeValue;
					}
				}
 			}
			else if($attribNode=="fail")
			{
				$error=$objDOM->getElementsByTagName("error")->item(0);
				$outp["ec"]=-1;
				$outp["msg"]=$error->getAttribute("msg");
				// echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
				// echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	
			}
	 	}//end if	
	 	$this->addclassdata=$outp;
   }//end function
	
}
?>
