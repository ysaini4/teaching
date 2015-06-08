<?php
load_view("Template/top.php",$inp);
load_view("Template/navbar.php",$inp);
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
      foreach($timeslots as $group){
          ?>
          <div class="col s12 l3" style='padding:0px;margin:0px;' >
          <?php
          foreach($group as $val){
            ?>
            <div style='margin-top:-28px;padding:0px;margin-bottom:-28px;' >
              <input id="<?php echo $m; ?>" value="<?php echo $m; ?>" type="checkbox" name="time[]" class="timeclass">
              <label for="<?php echo $m; ?>" ><?php echo $val; ?></label>
            </div>
            <?php
            $m++;
          }
          ?>
          </div>
          <?php
      }
      ?>
      <div class="col s12 l3" style='margin-top:-28px;padding:0px;margin-bottom:-28px;' >
        <?php
          $i=0;
          foreach($weekdays as $days){
            ?>
            <div style="margin-top:0px;padding:0px;margin-bottom:0px;" >
              <input id="<?php echo $i; ?>" value="<?php echo $i; ?>" type="checkbox" name="days[]">
              <label for="<?php echo $i; ?>"><?php echo $days; ?></label><br>
            </div>
            <?php
            $i++;
          }
        ?>
        <input placeholder="Repeat Time" name="repeat"/><br>
        <input type="submit" value="Add" onclick="f1();">
        <input type="submit" value="Delete" onclick="f2();">
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
function f1(){
  //check if empty field
  var box = document.getElementsByClassName('timeclass');
  var i;
  err=1;
  for (i = 0; i < box.length; i++) {
       if(box[i].checked== true)
        err=0;
  }
  if(err==1){
    window.alert("Please select some slot to add");
    $("input[name=addHidden]").val('');
  }
  else
    $("input[name=addHidden]").val('addSet');
}
function f2(){
  var box = document.getElementsByClassName('timeclass');
  var i;
  err=1;
  for (i = 0; i < box.length; i++) {
       if(box[i].checked== true)
        err=0;
  }
  if(err==1){
    window.alert("Please select some slot to delete");
    $("input[name=deleteHidden]").val('');
  }
  else
    $("input[name=deleteHidden]").val('deleteSet');
}
</script>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>
