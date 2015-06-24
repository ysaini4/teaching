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
                <h3 class="teal-text text-darken-1 center">Login</h3>
              </div>
            </div>
            <div id="login_section">
              <div class="row">
                <form class="col s12 offset-l1" method="post">
                  <div class="row">
                    <div class="input-field col s12 l10">
                      <input id="email" name="email" type="email" class="validate">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 l10">
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 l10">
                      <button class="btn waves-effect waves-light" type="submit">Login
                        <i class="mdi-content-send right"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="row">
                <div class="col s12 l10 offset-l1">
                  <h6 class="grey-text">Don't have an account? Sign up <a href="<?php echo BASE."signup"; ?>">here</a>.</h6>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col s12 l10 offset-l1">
                <h6>
                  <a onclick="forgotPass();" style="cursor:pointer;">
                    <i id="forgot_prefix_arrow" class="mdi-hardware-keyboard-arrow-up"></i>&nbsp;Forgot Password
                  </a>
                </h6>
              </div>
              <form class="col s12 l10 offset-l1" id="forgot_pass_section">
                <div class="row">
                  <div class="col s12">
                    <p class="grey-text">Enter your email to send verification link.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email_forgot_pass" name="email" type="email" class="validate" required>
                    <label for="email_forgot_pass">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" type="submit">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 l6 offset-l3">
          <div class="card-panel">
            <div class="row">
              <div class="col s12">
                <h5 class="grey-text center">OR</h5>
              </div>
            </div>
            <div class="row">
              <div class="col s12 l10 offset-l1">
                <a class="btn-large waves-effect waves-light blue darken-3" style="width:100%;">Login with facebook</a>
              </div>
            </div>
            <div class="row">
              <div class="col s12 l10 offset-l1">
                <a class="btn-large waves-effect waves-light red darken-1" style="width:100%;">Login with google+</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",Fun::mergeifunset($inp,array("needbody"=>false)));
?>
  <script src="js/login.js"></script>
</body>
</html>
