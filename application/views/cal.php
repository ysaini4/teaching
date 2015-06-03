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

  <ul id="dropdowntimeslot" class="dropdown-content" style='color:black;padding:20px;max-height:300px;' >
    <div class='row' style='padding:0px;margin:0px;' >
      <?php
      foreach($timeslots as $i=>$group){
      ?>
      <div class="col s12 l3" style='padding:0px;margin:0px;' >
        <?php
        foreach($group as $j=>$val){
        ?>
        <div style='margin-top:-28px;padding:0px;margin-bottom:-28px;' >
          <input id="<?php echo $i."_".$j; ?>" type="checkbox" name="sub1" >
          <label for="<?php echo $i."_".$j; ?>" ><?php echo $val; ?></label>
        </div>
        <?php
        }
        ?>
      </div>
      <?php
      }
      ?>
      <div class="col s12 l3" style='padding:0px;margin:0px;' >
        Mohit
      </div>
    </div>
   </ul>
  <nav class="teal" role="navigation" style='width"100%;margin:0px;padding:0px;' >
    <div class="nav-wrapper container" style='width:100%;margin:0px;padding:0px;' >
      <ul id="nav-mobile" style='width:100%;margin:0px;padding:0px;'  >
        <li style='width:100%;' ><div align=center class="dropdown-button"  data-beloworigin="true" data-activates="dropdowntimeslot" style='cursor:pointer;' >Your free time Slot</div></li>
      </ul>
    </div>
  </nav>


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

load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>
