<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>

  <main>
    <div class="container">
    <br>
      <div class="card-panel">
      <br>
        <div class="row">
          <div class="col s12 l4 offset-l1 center">
            <img class="materialboxed" height="200" width="200" src="
            <?php
            if ($aboutinfo['profilepic'] != '')
              echo $aboutinfo['profilepic']; 
            else
              echo 'photo/human1.png';
            ?>">
            <br>
            <!-- Change Profile Picture -->
            <?php
              if(User::loginId() == $tid){
            ?>
           <form method="post" enctype="multipart/form-data"> 
            <a onclick='uploadfile(this,"profilepic");' style="cursor:pointer;" >Change Profile Picture</a>
           </form>
           <?php
            }
           ?>


            <div id="pic_upload" class="modal">
              <div class="modal-content">
                <h6 class="teal-text">Change Profile Picture</h6>
              </div>
              <div class="row">
                <form action="#" class="col s12 l6 offset-l3">
                  <div class="row">
                    <div class="file-field input-field col s12">
                      <input class="file-path validate" type="text">
                      <div class="btn waves-effect waves-light blue">
                        <span>Upload</span>
                        <input type="file">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12">
                      <button type="submit" class="btn waves-effect waves-light white grey-text">Change</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- End -->
          </div>
          <div class="col s12 l7" >
            <div class="row">
              <div class="col s12">
                <h5 class="green-text left"><?php echo $aboutinfo["name"]; ?></h5>
              </div>
            </div>
            <div class="row" style="display:none;" >
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12 l7">
                    <textarea id="biography" class="materialize-textarea" placeholder="Write a small description about yourself."></textarea>
                    <label for="biography">Bio</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light blue" type="submit"><i class="material-icons left">save</i>Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card-panel">
        <div class="row">
          <div class="col s12">
            <ul class="tabs"  >
              <li class="tab col s3"><a id="profiletabs1" <?php pit('class="active"', $tabid==1); ?> href="#tab_profile">Profile</a></li>
              <li class="tab col s3"><a id="profiletabs5" <?php pit('class="active"', $tabid==5); ?>  href="#tab_topics">Topics</a></li>
              <li class="tab col s3"><a id="profiletabs2" <?php pit('class="active"', $tabid==2); ?> href="#tab_calendar">Calendar</a></li>
              <li class="tab col s3"><a id="profiletabs4" <?php pit('class="active"', $tabid==4); ?> href="#tab_reviews">Reviews</a></li>
              <li class="tab col s3" style="<?php pit("visibility:hidden", $tid != User::loginId()); ?>" ><a id="profiletabs3" <?php pit('class="active"', $tabid==3); ?> href="#tab_classes">Classes</a></li>
            </ul>
          </div>
          <div id="tab_profile" class="col s12 offset-l1">
          <?php
            load_view("Template/profile_about.php",array('aboutinfo'=>$aboutinfo,'firstName'=>$firstName,'lastName'=>$lastName,'jsonArray'=>$jsonArray,'subArray'=>$subArray,'gradeArray'=>$gradeArray,'langArray'=>$langArray));
          ?>
          </div>
          <div id="tab_calendar" class="col s12">
          <?php
            load_view("Template/profile_calendar.php",Fun::mergeifunset($calinfo,array("tid"=>$tid)) );
          ?>
          </div>
          <div id="tab_classes" class="col s12">
          <?php
            load_view("Template/profile_classes.php", $myclasses);
          ?>
          </div>
          <div id="tab_reviews" class="col s12">
          <?php
//            load_view("Template/profile_reviews.php");
          ?>
          </div>
          <div id="tab_topics" class="col s12">
          <?php
            load_view("Template/profile_topics.php",Fun::mergeifunset($topicinfo,array("tid"=>$tid,'minfees'=>$jsonArray['minfees'])));
          ?>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
load_view("Template/footernew.php");
load_view("popup.php",array("name"=>"timeslot"));
load_view("Template/bottom.php",array("needbody"=>false));
?>
  <script>
  var selectedtopic = "";

  function displaytext() {
    document.getElementById("displayte").style.visibility = "hidden";
  }
  function displaytext_t2() {
    document.getElementById("getText").style.visibility = "visible";
    document.getElementById("getText1").style.visibility = "visible";
  }
  </script>
  <script src="js/profile.js"></script>
</body>
</html>
