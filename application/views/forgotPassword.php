<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>



  <main>
    <div class="container">
    <br>
      <div class="row">
        <div class="col s12 l10 offset-l1">
          <div class="card-panel">
            <div class="row">
              <div class="col s12 l3 offset-l1">
                <h4 class="teal-text text-darken-1 center">Choose new password</h4>
              </div>
              <div class="col s12 l8">
                <div class="row grey-text">
                  <div class="col s12">
                    <ul>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row center">
              <form class="col s12 l10 offset-l1" method="post" onsubmit='return ms.signupform(this,<?php echo tf($_ginfo["needsignupotp"]); ?>);' <?php if($_ginfo["needsignupotp"]) { ?>  data-action='signupotp' data-params='{"phone":$("#signupwindow").find("input[name=phone]").val()}' data-res='hideshowdown("signupwindow","otpwindow");'  <?php }else{ ?>  <?php } ?>  autocomplete="off" >
                <div id="signupwindow" style='<?php dit($defopen=="signupwindow"); ?>' >
                  <div class="row">
                    <div class="input-field col s12 l6">
                      <input id="password" name="password" type="password"  data-condition="simple"  >
                      <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12 l6">
                      <input id="confirm_password" name="cpassword" type="password" data-condition="password"  >
                      <label for="confirm_password">Confirm Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button class="btn waves-effect waves-light" name="signup" type="submit" id="submit_button">
                        Submit<i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <br><br>
    </div>
  </main>


<?php

load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",Fun::mergeifunset($inp,array("needbody"=>false)));

?>
