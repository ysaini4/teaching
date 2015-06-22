<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>

  <main>
    <div class="container">
    <br>
      <div class="row">
        <div class="col s12 l6 offset-l3">
          <div class="card-panel">
            <?php
              load_view('Template/form_errors.php',array("msg"=>$loginmsg));
            ?>
            <div class="row">
              <div class="col s12">
                <h3 class="teal-text center">Login</h3>
              </div>
            </div>
            <div class="row">
              <form class="col s12" method="post">
                <div class="row">
                  <div class="input-field col s12 l10 offset-l1">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 l10 offset-l1">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="row center">
                  <div class="input-field col s12 l10 offset-l1">
                    <button class="btn waves-effect waves-light" type="submit">Login
                      <i class="mdi-content-send right"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="container" style='display:none;' >
              <div class="row">
                <a href="<?php echo BASE."signup" ; ?>" >New User? Create Account</a><br><br>
                <a href="<?php echo BASE."forgotpassword"; ?>" >Forgot Password</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <br><br><br>
    </div>
  </main>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>