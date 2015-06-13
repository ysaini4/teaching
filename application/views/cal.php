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
            load_view("Template/uploadslotform.php",$inp);
            ?>
              </div>
            </ul>
            <nav class="teal" role="navigation" style='width"100%;margin:0px;padding:0px;' >
              <div class="nav-wrapper container" style='width:100%;margin:0px;padding:0px;' >
                <ul id="nav-mobile" style='width:100%;margin:0px;padding:0px;'>
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
      <div class="col s12 l12"  id="divforcalender"  >
        <?php
          load_view("dispcal.php",array("month"=>date('m'),'year'=>date('Y'),'twoDArr'=>$twoDArr,'currentDate'=>date("j"),'showVar'=>$showVar,'timeSlotsArray'=>$timeSlotsArray,'tid'=>$tid));
        ?>
      </div>
    </div>
  </div>
</main>


