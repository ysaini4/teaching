<?php
load_view("Template/top.php",$inp);
load_view("Template/navbar.php",$inp);
?>
  <main>
    <div class="container">
      <div class="container">
      <div class="card-panel">
        <div class="row">
          <div align='center' style='color:red;' ><p><?php echo $signupmsg; ?></p></div>
          <div class="col s12">
            <h4 class="teal-text text-darken-1 center" style="font-weight:bold; font-variant: small-caps;">Sign Up</h4>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m10 offset-m1" method="post">
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="fullname" name="name" type="text" class="validate">
                <label for="fullname">Full Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="confirm_password" name="cpassword" type="password" class="validate">
                <label for="confirm_password">Confirm Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <button class="btn waves-effect waves-light" name="signup" type="submit">Submit
                  <i class="mdi-content-send right"></i>
                </button>
                <button class="btn waves-effect waves-light" type="reset">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </main>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>