    <form method="post">
    <?php
    $m=8;
    $slotid=1;
    foreach($timeslots as $gid=>$group){
        ?>
        <div class="col s12 l3" style='padding:0px;margin:0px;'>
            <?php
            if($gid==0){
              load_view("Template/cutecheckbox.php",array("id"=>"allts_repeat_upload","label"=>"Select All Slots","divattr"=>array("class"=>"reduseheight"),"onchange"=>'selectallmatched(this,$("#"));'));
            }
            else{
              ocloset("div","",array("style"=>"height:40px;"));
            }
            foreach($group as $i=>$val){
              load_view("Template/cutecheckbox.php",array("id"=>$gid."_".$i,"label"=>$val,"inpattr"=>array("name"=>"time[]","value"=>$slotid ),"divattr"=>array("class"=>"reduseheight")));
          ?>
          <?php
          $m++;
          $slotid++;
        }
        ?>
        </div>
        <?php
    }
    ?><div>

    </div>
    <div class="col s12 l3" style='margin-top:-28px;padding:0px;margin-bottom:-28px;' >
      <div style='padding:0px;margin-bottom:-28px;'>
        <input id="clickit1" class="myCheckbox1" type="checkbox" onchange="himanshu.f22(this);">
        <label for="clickit1" >Select All Days</label>
      </div>
       <?php
        $i=0;
        foreach($weekdays as $days){
          ?>
          <div style="margin-top:-5px;padding:11px;margin-bottom:-28px;" >
            <input id="<?php echo $i; ?>" class="myCheckbox1" value="<?php echo $i; ?>" type="checkbox" name="days[]">
            <label for="<?php echo $i; ?>"><?php echo $days; ?></label><br>
          </div>
          <?php
          $i++;
        }
      ?>
      
      <input type="date" id="startdate" class="datepicker" name="startdate" data-condition="simple" placeholder="Choose Start Date" required><br>
      <input type="date" id="enddate" class="datepicker" name="enddate" data-condition="simple" placeholder="Choose End Date" required><br>

      <button class="btn waves-effect waves-light" type="submit" onclick="himanshu.f1();" >Add
        <i class="mdi-content-send right"></i> 
      </button>
      <br>
      <button class="btn waves-effect waves-light" type="submit" onclick="himanshu.f2();" >Delete
        <i class="mdi-content-send right"></i> 
      </button>
      <input type="hidden" name="addHidden" value=""/>
      <input type="hidden" name="deleteHidden" value=""/>
    </div>
    </form>
