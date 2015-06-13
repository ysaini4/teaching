<?php
	$count = 100;//What The HEll is THIS ??? Id you choose may match with someone else's id. You shoud use id ="SomeText<Number>" , SomeText should be decide uniquely.
	$index = 0;

	$disptype=1;//Guest user view or teacher seeing calender of someone else.
	if($loginType=='t' && User::loginId()==$tid)
		$disptype=2;//Teacher's own calender
	else if($loginType=='s')
		$disptype=3;
	else if($loginType=='a')
		$disptype=4;//
?>
<div>
	<input id="selectallts"  type="checkbox"  class="timeclass" onchange="selectallmatched(this,$('#disppopupslots').find('input[type=checkbox]'));" />
	<label for="selectallts" ><?php echo "Select All" ; ?></label>
</div>
<div id="disppopupslots" >
<?php
	$ms_count=0;
	foreach ($timeslotsListArray as $timeslotListCol) {
		foreach ($timeslotListCol as $timeslotListVal) {
		?>
		<div >
		<?php
			if($disptype==2){
				//If LOGGED IN AS TEACHER WE CAN MAKE THE CHECKBOXES EDITABLE EXEPT ONES WHICH ARE BOOKED 
				//ALSO PROVIDE A BUTTON SAYING SAVE CHANGES.
				if( isset($indexedts[$ms_count] )  ){
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
			else if($disptype==3){
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
			else if($disptype==1){
				//Contents to display to guest user
				//ONLY AVAILABLE SLOTS
				//And a Buttong to redirect to signUp page for students
				if($index<count($timeslotsOfDayStringArray) && $timeslotListVal==$timeslotsOfDayStringArray[$index]){
					echo "<input id=\"".$count."\" value=\"".$count."\" type=\"checkbox\"  name=\"time[]\" class=\"timeclass\"/>";
					echo "<label for=\"".$count."\" >".$timeslotListVal."</label>";
					$index+=1;
				}
			}
			else if($disptype==4){
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
		$ms_count++;
		$count++;
		}
	}
?>
</div>
<?php
	if($disptype==2){
		echo "<button data-action=\"teacherModifySlots\" data-day=".$day." data-month=".$month." data-year=".$year." data-tid=\"".$tid."\"  onclick=\"button.sendreq_v2(this);\"  data-waittext=\"Loading....\" data-restext=\"Changes saved successfully ! \" ";
		?> data-eparams="{'slots':ms.getselected()}" data-res="hitu.f1($('#calhomebutton')[0]);"

		<?php
		echo "  >Save Changes</button>";
	}
	else if($disptype==3){
		echo "<button data-action=\"studentBooksSlot\" data-day=".$day." data-month=".$month." data-year=".$year." data-tid=\"".$tid."\"  onclick=\"button.sendreq(this);\" data-res=\"alert(data);\"  data-waittext=\"Loading....\" data-restext=\"Success ! \" >Book Selected Slots</button>";
	}
	else if($disptype==1){
		echo "<button >Sign Up to Book</button>";
	}
?>