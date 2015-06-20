<?php
load_view("Template/top.php",$inp);
load_view("Template/navbar.php",$inp);
?>
<main>
    <div class="container">
      <div class="card-panel">
        <div class="row">
          <div align='center' style='color:red;' ><p><?php echo $msg; ?></p></div>
          <div class="col s12">
            <h3 class="teal-text text-darken-1 center">IITians Join Us</h3>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m8 offset-m2" method="post">
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="fullname" type="text" name="name" class="validate">
                <label for="fullname">Full Name</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="email" type="email" name="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <select name="iit">
                <option value="" disabled selected>Choose your IIT</option>
                <?php
                  for($i=0;$i<count($alliit);$i++){
                ?>
              <option value="<?php echo $i+1; ?>" ><?php echo $alliit[$i]; ?></option>
             <?php
             }
             ?>
      			</select>
              </div>
              <div class="input-field col s12 m6">
               <select name="iitentryyear">
                <option value="" disabled selected>Year Of Joining IIT</option>
                 <?php
                    for($i=0;$i<count($yearjoiniit);$i++){
                    ?>
                      <option><?php echo $yearjoiniit[$i]; ?></option>
                    <?php
                    }
                  ?>
               </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                 <select name="degree">
                     <option value="" disabled selected>Degree</option>  
                    <?php
                    for($i=0;$i<count($alldeg);$i++){
                    ?>
                      <option value="<?php echo $i+1; ?>" ><?php echo $alldeg[$i]; ?></option>
                    <?php
                    }
                    ?>
                 </select>   
              </div>
              <div class="input-field col s12 m6">
                <input id="phone" type="number" name="phone" class="validate">
                <label for="phone">Phone No.</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Choose Password</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate">
                <label for="password">Re-Password</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 m12">
                <button class="btn waves-effect waves-light" type="submit">JOIN
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</main>
<style>
.select-wrapper input.select-dropdown {
  color:#9e9e9e;
}

.dropdown-content {
  z-index:2;
}
</style>

<script>
$(document).ready(function() {
    $('select').material_select();
  });
</script>

<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>
