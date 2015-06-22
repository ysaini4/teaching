<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>
  <main>
    <div class="container">
    <br>
      <div class="card-panel">
      <br>
        <div class="row">
          <div class="col s12 l4 offset-l1 center">
            <i class="mdi-action-account-circle large"></i>
          </div>
          <div class="col s12 l7">
            <div class="row">
              <div class="col s12">
                <h5 class="green-text left">Shivam Mamgain</h5>
              </div>
              <div class="col s12">
                <h6 class="grey-text left">shivammamgain47@gmail.com</h6>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-panel">
        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s4"><a class="active" href="#tab_profile">Profile</a></li>
              <li class="tab col s4"><a href="#tab_classes">Classes</a></li>
              <li class="tab col s4"><a href="#tab_reviews">Reviews</a></li>
            </ul>
          </div>
          <div id="tab_profile" class="col s12 offset-l2">
          <br><br>
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
            </div>  
            
            <div class="row">
              <div class="col s12">
                <a class="btn waves-effect waves-light blue" id="edit_profile_button"><i class="mdi-editor-mode-edit left"></i>Edit Profile</a>
              </div>
            </div>

            <div id="edit_profile_info">
              <form onsubmit='form.sendreq1(this,$(this).find("button")[0]);return false;' data-action="saveuserdetails">
                <div class="row">
                  <div class="col s12 l4">
                    Name
                  </div>
                  <div class="col s12 l4">
                    <input id="edit_full_name" placeholder="Enter your full name" type="text" value="Shivam Mamgain" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 l4">
                    Email
                  </div>
                  <div class="col s12 l4">
                    <input id="edit_email" placeholder="Enter your email address" type="email" value="shivammamgain47@gmail.com" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 l4">
                    Mobile Number
                  </div>
                  <div class="col s12 l4">
                    <input id="edit_mobile_no" placeholder="Enter your mobile number" type="text" value="9876543210" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 l4">
                    Date Of Birth
                  </div>
                  <div class="col s12 l4">
                    <input id="edit_dob" placeholder="Add date of birth" type="date" value="" class="datepicker">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 l4">
                    Gender
                  </div>
                  <div class="col s12 l4">
                    <input id="edit_gender_male" type="radio" class="validate" value="male" name="gender">
                    <label for="edit_gender_male">Male</label>
                    <input id="edit_gender_female" type="radio" class="validate" value="female" name="gender">
                    <label for="edit_gender_female">Female</label>
                    <input id="edit_gender_others" type="radio" class="validate" value="female" name="gender">
                    <label for="edit_gender_others">Others</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <button type="submit" class="btn blue waves-effect waves-light" id="save_profile_button"><i class="mdi-content-save left"></i>Save Edit</button>
                    <a class="btn white grey-text waves-effect waves-grey" id="cancel_profile_button">Cancel Edit</a>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div id="tab_classes" class="col s12">
          <br><br>
            <div class="row">
              <div class="col s12">
                <table class="hoverable">
                  <thead>
                    <tr>
                      <th>Teacher</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Topic</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Duration</th>
                      <th>Feedback</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Dr. Shivam Mamgain</td>
                      <td>XII</td>
                      <td>Computers</td>
                      <td>Algorithms</td>
                      <td>29/06/2015</td>
                      <td>09:00 AM</td>
                      <td>2 hrs</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Babloo</td>
                      <td>VII</td>
                      <td>English</td>
                      <td>Adverbs</td>
                      <td>30/06/2015</td>
                      <td>09:00 AM</td>
                      <td>1 hrs</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Prof. Snape</td>
                      <td>Hogwarts</td>
                      <td>Witchcraft</td>
                      <td>Spells</td>
                      <td>21/07/2015</td>
                      <td>10:00 AM</td>
                      <td>3 hrs</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>  
          </div>
          <div id="tab_reviews" class="col s12">
            
          </div>
        </div>
      </div>
    </div>
  </main>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",Fun::mergeifunset($inp,array("needbody"=>false)));
?>
  <script src="js/studentprofile.js"></script>
</body>
</html>