<main>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3 class="teal-text center">Calender</h3>
      </div>
    </div>

<!--     <div id="test1" >
      This div ( ROOT/app*/views/cal.php) need to be removed
    </div>
 -->
    <div class="row">
      <div class="col s12 l12">
        <div class="card-panel">
          <div class="row">
  <form method="post">
  <ul id="dropdowntimeslot" class="dropdown-content" style='color:black;padding:20px;max-height:300px;' >



    <div class='row' style='padding:0px;margin:0px;' >
      <?php
      $m=8;

      foreach($timeslots as $gid=>$group){
          ?>
          <div class="col s12 l3" style='padding:0px;margin:0px;'>
              <?php
              if($gid==0){
              ?>
              <div style='margin-top:-28px;padding:0px;margin-bottom:-28px;'>
                <input id="clickit" class="myCheckbox" type="checkbox" onchange="himanshu.f12(this);">
                <label for="clickit" >Select All Slots</label>
              </div>
          <?php
              }
              else{
              ?>
              <div style="height:40px;"></div>
              <?php
              }
              foreach($group as $val){
            ?>
            <div style='margin-top:-28px;padding:0px;margin-bottom:-28px;'>
              <input id="<?php echo $m; ?>" class="myCheckbox timeclass" value="<?php echo $m; ?>" type="checkbox" name="time[]" >
              <label for="<?php echo $m; ?>" ><?php echo $val; ?></label>
            </div>
            <?php
            $m++;
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
    </div>
   </ul>
  <nav class="teal" role="navigation" style='width"100%;margin:0px;padding:0px;' >
    <div class="nav-wrapper container" style='width:100%;margin:0px;padding:0px;' >
      <ul id="nav-mobile" style='width:100%;margin:0px;padding:0px;'>
        <li style='width:100%;' ><div align=center class="dropdown-button"  data-beloworigin="true" data-activates="dropdowntimeslot" style='cursor:pointer;' >Your free time Slot</div></li>
      </ul>
    </div>
  </nav>
  </form>

    <!-- Below Button -->
          </div>
        </div>
      </div>
    </div>
    <div class='row' >
      <div class="col s12 l12">
      <div class="col s12 l12"  id="divforcalender"  >
        <?php
          load_view("dispcal.php",array("month"=>date('m'),'year'=>date('Y'),'twoDArr'=>$twoDArr,'currentDate'=>date("j"),'showVar'=>$showVar,'timeSlotsArray'=>$timeSlotsArray,'tid'=>$tid));
        ?>
      </div>
    </div>
  </div>
</main>


