<br><br>
<div class="row">
  <div class="col s12">
    <h5 class="teal-text text-darken-1">Profile Details</h5>
  </div>
</div>
<div id="profile_info">
  <div class="row">
    <div class="col s12 l4">
      Name
    </div>
    <div class="col s12 l6">
      <span class="grey-text text-darken-1">Shivam Mamgain</span>
    </div>
  </div>
  <div class="row">
    <div class="col s12 l4">
      Email
    </div>
    <div class="col s12 l6">
      <span class="grey-text text-darken-1">shivammamgain47@gmail.com</span>
    </div>
  </div>
  <div class="row">
    <div class="col s12 l4">
      Mobile Number
    </div>
    <div class="col s12 l6">
      <span class="grey-text text-darken-1">+91 987 654 3210</span>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <a class="btn waves-effect waves-light blue" onclick='hideshowdown("profile_info", "edit_profile_info", 1000);' >
      <i class="mdi-editor-mode-edit left"></i>Edit Profile</a>
    </div>
  </div>
</div>

<div id="edit_profile_info">
<br>
  <form onsubmit='form.sendreq1(this,$(this).find("button")[0]);return false;' data-action="saveuserdetails">
    <div class="row">
      <div class="col s12 l4">
        Name
      </div>
      <div class="col s12 l4">
        <input name="name" placeholder="Enter your full name" type="text" value="Shivam Mamgain" class="validate">
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
        Email
      </div>
      <div class="col s12 l4">
        <input name="email" placeholder="Enter your email address" type="email" value="shivammamgain47@gmail.com" class="validate">
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
        Mobile Number
      </div>
      <div class="col s12 l4">
        <input name="phone" placeholder="Enter your mobile number" type="text" value="9876543210" class="validate">
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
        Gender
      </div>
      <div class="col s12 l4">
        <select name="gender" class="browser-default">
          <option value="" disabled selected>Select gender</option>
           <?php
              $olist=array("Male","Female");
              $sinfo["gender"]="M";
              foreach($olist as $i=>$disp){
            ?>
              <option value="<?php echo $disp[0]; ?>">
                <?php echo $disp; ?>
              </option>
            <?php
              }
            ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
        Date Of Birth
      </div>
      <div class="col s12 l4">
        <input name="dob" placeholder="Add date of birth" type="date" value="" class="datepicker">
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <button type="submit" class="btn blue waves-effect waves-light" ><i class="mdi-content-save left"></i>Save Edit</button>
        <a class="btn white grey-text waves-effect waves-grey" onclick='hideshowdown("edit_profile_info", "profile_info", 1000);'  >Cancel Edit</a>
      </div>
    </div>
  </form>
</div>