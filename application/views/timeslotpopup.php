<?php
	$count = 0;
	$index = 0;
?>
<?php
	foreach ($timeslotsListArray as $timeslotListCol) {
		foreach ($timeslotListCol as $timeslotListVal) {
		?>
		<div >
		<?php
			if($loginType=='t'){
				//If LOGGED IN AS TEACHER WE CAN MAKE THE CHECKBOXES EDITABLE EXEPT ONES WHICH ARE BOOKED 
				//ALSO PROVIDE A BUTTON SAYING SAVE CHANGES.
				if($index = array_search($timeslotListVal, $timeslotsOfDayStringArray)){
					if($timeslotsArray[$index]['sid']!=0){
						echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\" checked=checked disabled=\"disabled\" name=\"time[]\" class=\"timeclass\"/>";
						echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					}
					else{
						echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\" checked=checked name=\"time[]\" class=\"timeclass\"/>";
						echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					}
				}
				else{
					echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\" name=\"time[]\" class=\"timeclass\"/>";
					echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
				}
			}
			else if($loginType=='s'){
				//CAN NOT EDIT THE BOOKED OR UNAVAILABLE SLOTS BUT CAN ASK TO BOOK A FREE SLOT, CAN SEE WHICH SLOT HE HAS BOOKED IF ANY
				//SO WE WILL PROVIDE A BOOK BUTTON
				//STUDENT CAN EDIT SLOT BOOKED BY HIM I.E. HE CAN CANCEL IT
				//I Don't Know Why, but the array_search here is not working here.===> So I used an $index variable to keep track of timeslotsOfDayStringArray
				if($index<count($timeslotsOfDayStringArray) && $timeslotListVal==$timeslotsOfDayStringArray[$index]){
					if($timeslotsArray[$index]['sid']!=0){
						echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\" checked=checked disabled=\"disabled\" name=\"time[]\" class=\"timeclass\"/>";
						echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					}
					else{
						echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\"  name=\"time[]\" class=\"timeclass\"/>";
						echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					}
					$index+=1;
				}
			}
			else if($loginType == null){
				//Contents to display to guest user
				//ONLY AVAILABLE SLOTS
				//And a Buttong to redirect to signUp page for students
				if($index<count($timeslotsOfDayStringArray) && $timeslotListVal==$timeslotsOfDayStringArray[$index]){
					echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\"  name=\"time[]\" class=\"timeclass\"/>";
					echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					$index+=1;
				}
			}
			else if($loginType=='a'){
				//If LOGGED IN AS ADMIN WE CAN Watch all booked,Available.

				if($index = array_search($timeslotListVal, $timeslotsOfDayStringArray)){
					if($timeslotsArray[$index]['sid']!=0){
						echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\" checked=checked disabled=\"disabled\" name=\"time[]\" class=\"timeclass\"/>";
						echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					}
					else{
						echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\" disabled=\"disabled\"  name=\"time[]\" class=\"timeclass\"/>";
						echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					}
				}
			}
		?>
		</div>
		<?php
		$count++;
		}
	}
?>
<?php
	if($loginType == 's'){
		echo "<button data-action=\"studentBooksSlot\" data-day=".$day." data-month=".$month." data-year=".$year." data-tid".$tid."  onclick=\"button.sendreq(this);\" data-res=\"alert(data);\"  data-waittext=\"Loading....\" data-restext=\"Success ! \" >Book Selected Slots</button>";
	}
	else if($loginType == 't'){
		echo "<button data-action=\"teacherModifySlots\" data-day=".$day." data-month=".$month." data-year=".$year." data-tid".$tid."  onclick=\"button.sendreq(this);\" data-res=\"alert(data);\"  data-waittext=\"Loading....\" data-restext=\"Changes saved successfully ! \" >Save Changes</button>";
	}
	else if($loginType == null){
		echo "<button >Sign Up to Book</button>";
	}
?>