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
            <nav class="teal">
              <div align=center style='cursor:pointer;' onclick='$("#fillalltsform").slideToggle();' >Add your free time Slot</div>
            </nav>
            <div class='row' style='padding:0px;margin:0px;display:none;margin-top:30px;' id="fillalltsform" >
              <?php
              load_view("Template/uploadslotform.php",$inp);
              ?>
            </div>
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


