<?php
echo '<table>';
	for($row=0;$row<7;$row++){
		echo '<tr>';
		for($col=0;$col<7;$col++){
			$final=$twoDArr[$row][$col].'-'.$month.'-'.$year;
			if($twoDArr[$row][$col]=='&nbsp' || is_string($twoDArr[$row][$col])){
				echo '<td>'.$twoDArr[$row][$col].'</td>';
			}
			else if($currentDate==$twoDArr[$row][$col] && $showVar==true){
				echo '<td><button style="display:block;text-decoration:none;color:red;" data-action="teacherTimeSlotOfDayPopUp" data-day='.$twoDArr[$row][$col].' data-month='.$month.' data-year='.$year.' data-tid='.$tid.' onclick="opencalpopup(this);" >'.$twoDArr[$row][$col]."<br/>";
				if($timeSlotsArray[$twoDArr[$row][$col]]['countOfSlots']!=0){
					for($i=0;$i<count($timeSlotsArray[$twoDArr[$row][$col]])-1;$i++){
						echo $timeSlotsArray[$twoDArr[$row][$col]][$i]['timeslotString']."<br/>";
					}
				}
				echo '</button></td>';
			}
			else if($twoDArr[$row][$col]!='&nbsp' && !(is_string($twoDArr[$row][$col]))){
				echo '<td><button data-action="teacherTimeSlotOfDayPopUp" data-day='.$twoDArr[$row][$col].' data-month='.$month.' data-year='.$year.' data-tid='.$tid.' onclick="button.sendreq_v2_t4(this,null, function(d){$(\'#downloadeddata\').html(d);});" >'.$twoDArr[$row][$col].'<br/>';
				if($timeSlotsArray[$twoDArr[$row][$col]]['countOfSlots']!=0){
					for($i=0;$i<count($timeSlotsArray[$twoDArr[$row][$col]])-1;$i++){
						echo $timeSlotsArray[$twoDArr[$row][$col]][$i]['timeslotString']."<br/>";
					}
				}
				echo '</button></td>';
			}			
		}
		echo '</tr>';
	}
?>