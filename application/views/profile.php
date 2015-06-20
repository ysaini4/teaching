<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>

  <main>
    <div class="container">
    <div class="section">
    <div class="row">
    <div class="col s12  l12">
        <div class="card-panel  grey lighten-2 " style='<?php  ?>' >
            <div class="row">
                <div class="col l3">
        <img class="materialboxed" width="200" src="<?php 
        if($aboutinfo['profilepic']!='')
          echo $aboutinfo['profilepic']; 
        else
          echo 'photo/human1.png';
        ?>">
                </div>
                <div class="col l1">    

    <?php
    if($tid==User::loginId()){
    ?>
    <form id="myForm" method="post" enctype="multipart/form-data">    
            <div class="fixed-action-btn">
    <a class="btn-floating btn-small red">
      <i class="large mdi-navigation-apps"></i>
    </a>

    <ul>
        <li><a data-position="right" onclick="chooseFile();" data-delay="50" data-tooltip="Add Image" class="btn-floating red darken-1 tooltipped"><i class="large mdi-social-group-add"></i></a></li>
        <li><a  data-position="right" data-delay="50" onclick="displaytext();displaytext_t2();" data-tooltip="Edit Text" class="btn-floating blue darken-1 tooltipped"><i class="large mdi-editor-border-color"></i></a></li>      
        <li><a data-position="right" data-delay="50" data-tooltip="Edit Profile" class="btn-floating  tooltipped green" href="<?php echo BASE.'edit/'.$tid; ?>"><i class="large mdi-image-edit"></i></a></li>
    </ul>
  </div>
   <div style="height:0px;overflow:hidden">
      <input type="file" id="profile_upload" name="profile_upload" onchange="this.form.submit();" />
   </div>
    
    <?php
    }
    ?>

        </div>
                <div class="col l5 offset-l2">
                  <div class="card-panel_sub grey lighten-3">
                    <span id="displayte" name="displayte"><?php 
                    if($aboutinfo['teachermoto']!='')
                      echo $aboutinfo['teachermoto'];
                    else
                      echo 'Hi,i am '.$firstName; ?></span>
                    
                    <input id="getText" name="getText" type="text" style="visibility:hidden;" placeholder="Enter Text" value="<?php 
                    if($aboutinfo['teachermoto']!='')
                      echo $aboutinfo['teachermoto'];?>"/>
                    <input type="submit" value="Change" id="getText1" style="visibility:hidden;"/>
                  </div>
                </div>
            </div>
        </div>
        </div>
</form>
    <div class="col s12 l12">
      <ul class="tabs teal-text text-lighten-1 ">
        <li class="tab col s3"><a id="profiletab1" href="#test1">Profile</a></li>
        <li class="tab col s3 "><a  id="profiletab2" href="#test2">Calender</a></li>
        <li class="tab col s3"><a  id="profiletab3" href="#test3">Topic</a></li>
      <?php
        if($tid==User::loginId()){
      ?>
        <li class="tab col s3"><a  id="profiletab4" href="#test4">My Classes</a></li>     
      <?php
        }
      ?>
      </ul>
    </div>
       </div>
       </div>
</main>
        <div id="test1" class="col s12">
          <?php
            load_view("profileabout.php",array('aboutinfo'=>$aboutinfo,'firstName'=>$firstName,'lastName'=>$lastName,'jsonArray'=>$jsonArray,'subArray'=>$subArray,'gradeArray'=>$gradeArray,'langArray'=>$langArray));

          ?>
        </div>
        <div id="test2" class="col s12 ">
          <?php
            load_view("cal.php",Fun::mergeifunset($calinfo,array("tid"=>$tid)) );
          ?>
        </div>
        <div id="test3" class="col s12">
          <?php
            load_view("topics.php",Fun::mergeifunset($topicinfo,array("tid"=>$tid,'minfees'=>$jsonArray['minfees'])));
          ?>
        </div>
        <div id="test4" class="col s12"></div>
        </div>

<?php
load_view("Template/footernew.php");
load_view("popup.php",array("name"=>"timeslot"));
load_view("Template/bottom.php",array("needbody"=>false));
?>
<script type="text/javascript">
var focustabid=<?php echo $tabid; ?>;
$(document).ready(function(){
  $("#profiletab"+focustabid).click();
});
    function chooseFile() {
      document.getElementById("profile_upload").click();
   }
   function displaytext() {
    document.getElementById("displayte").style.visibility = "hidden";
   }
   function displaytext_t2() {
    document.getElementById("getText").style.visibility = "visible";
    document.getElementById("getText1").style.visibility = "visible";
   }
</script>
</body>
</html>
