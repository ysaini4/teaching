<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>
<main>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3 class="teal-text center">Calender</h3>
      </div>
    </div>
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
              <input id="<?php echo $m; ?>" class="myCheckbox" value="<?php echo $m; ?>" type="checkbox" name="time[]" class="timeclass">
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

<!--                 <input id="clickit1" type="checkbox" onclick="f22(this);">
          <label for="clickit1" >Check All Days</label>
 -->        <?php
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
        <input type="submit" value="Add" onclick="himanshu.f1();">
        <input type="submit" value="Delete" onclick="himanshu.f2();">
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
        <div class="card-panel">
          <table class="hoverable responsive-table" border='1' >
            <thead>
              <tr>
                <th >Mohit.</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo "h"; ?></td>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
?>
<script>
var himanshu={
  f1:function(){
    var mystart = document.getElementById('startdate').value;
    var myend = document.getElementById('enddate').value;

    if($("[name='time[]']:checked").length==0 || $("[name='days[]']:checked").length==0){
      window.alert("Please select some slot or days to add");
      $("input[name=addHidden]").val('');
    }
    else if(mystart=='' || myend==''){
      window.alert("Please add a start and end date");
    }
    else
      $("input[name=addHidden]").val('addSet');
  },
  f2:function(){
    if($("[name='time[]']:checked").length==0){
      window.alert("Please select some slot to delete");
      $("input[name=deleteHidden]").val('');
    }
    else
      $("input[name=deleteHidden]").val('deleteSet');
  },
  f12:function(obj){

      if(obj.checked==true){
        $("input[type=checkbox][class=myCheckbox]").each(function () {
                $(this).prop("checked", true);        });
      }
      else{
        $("input[type=checkbox][class=myCheckbox]").each(function () {
                $(this).prop("checked", false);        });        
      }
  }, 
  f22:function(obj){
      if(obj.checked==true){
        $("input[type=checkbox][class=myCheckbox1]").each(function () {
                $(this).prop("checked", true);        });
      }
      else{
        $("input[type=checkbox][class=myCheckbox1]").each(function () {
                $(this).prop("checked", false);        });        
      }
  }
}
</script>
<?php
load_view("Template/footernew.php");
load_view("Template/bottom.php");
?>
