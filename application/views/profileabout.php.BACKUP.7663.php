<?php
?>
   <main>
    <div class="container">
    <div class="section">
        <br>
    <div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel" style=" margin-bottom: 0px;">
             <h4><i class="small mdi-action-account-circle"></i>ABOUT</h4>
        <div class="row">
          <div class="col s10 l5 offset-l1 offset-s1">
            <div class="row">
<<<<<<< HEAD
              <label class="label1">Name:</label>
              <?php echo fun::smilymsg($firstName)." ".fun::smilymsg($lastName); ?>
            </div>
=======
              <label class="label1">First Name:</label>
              <?php echo Fun::smilymsg($firstName); ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1">Last Name:</label>
              <?php echo Fun::smilymsg($lastName);?>
            </div>
          </div>
          <div class="col s5">
>>>>>>> 1e6e4d2e5f76e5c7e61121fdcdcc7c3a18ce5827
            <div class="row ">
              <label class="label1" >User Name:</label>
                <?php echo $aboutinfo['username']; ?>
            </div>
<<<<<<< HEAD
=======
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Email:</label>
               <?php echo $aboutinfo['email']; ?>
            </div>
          </div>
          <div class="col s5">
>>>>>>> 1e6e4d2e5f76e5c7e61121fdcdcc7c3a18ce5827
            <div class="row ">
              <label class="label1" >City:</label>
              <?php echo Fun::smilymsg($jsonArray['city']); ?>
            </div>
<<<<<<< HEAD
=======
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Country:</label>
               <?php echo Fun::smilymsg($jsonArray['country']); ?>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Birthday:</label>
                <?php echo date('d-m-Y',$aboutinfo['dob']); ?>
            </div>
          </div>
          <div class="col s5">
>>>>>>> 1e6e4d2e5f76e5c7e61121fdcdcc7c3a18ce5827
            <div class="row ">
              <label class="label1" >Gender</label>
              <?php if(Fun::smilymsg($aboutinfo['gender'])=='m')
                      echo 'Male';
                    else if(Fun::smilymsg($aboutinfo['gender'])=='f')
                      echo 'Female'; 
                    else
                      echo 'Other';
                    ?>
            </div>
            <div class="row ">
              <label class="label1" >Resume: </label>
<<<<<<< HEAD
              <a href="<?php echo fun::smilymsg($jsonArray['resume']); ?>"><u>Click To See</u></a>                 
=======
              <a href="<?php echo $jsonArray['resume']; ?>"><u>Click To See</u></a>
                 
>>>>>>> 1e6e4d2e5f76e5c7e61121fdcdcc7c3a18ce5827
            </div>
          </div>

          <div class="col s10 l5 offset-s1">
            <div class="row ">
              <label class="label1" >Email:</label>
               <?php echo fun::smilymsg($aboutinfo['email']); ?>
            </div>
            <div class="row ">
              <label class="label1" >Country:</label>
               <?php echo fun::smilymsg($jsonArray['country']); ?>
              <!-- col-sm-10 --> 
            </div>
            <div class="row ">
              <label class="label1" >Birthday:</label>
                <?php echo fun::smilymsg(date('d-m-Y',$aboutinfo['dob'])); ?>
            </div>
            <div class="row">
              <label class="label1" >Phone:</label>
              <?php echo Fun::smilymsg($aboutinfo['phone']); ?>
            </div>
          </div>          
        </div>
        </div>

        <div class="card-panel" style=" margin-bottom: 0px;">
            <h4 ><i class="small mdi-social-group"></i>Teaching Details</h4>
        <div class="row">
            <div class="col s10 l3 offset-l1 offset-s1">
                 <div class="row">
                     <label class="label1" >Subjects</label>
                     <ul class="scroll_list">
                     <?php
                      foreach ($subArray as $value) {
                        echo '<li>'.$value.'</li>';
                      }
                     ?>
                     </ul>

                 </div>
            </div>
        
            <div class="col s10 l3 offset-l1 offset-s1">
            <div class="row ">
             <label class="label1" >Grade</label>
                     <ul class="scroll_list">
                     <?php
                      foreach ($gradeArray as $value) {
                        echo '<li>'.$value.'</li>';
                      }
                     ?>
                     </ul>
            </div>
            </div>
                
            <div class="col s10 l3 offset-l1 offset-s1">
            <div class="row ">
             <label class="label1" >Languages</label>
                     <ul class="scroll_list">
                     <?php
                      foreach ($langArray as $value) {
                        echo '<li>'.$value.'</li>';
                      }
                     ?>
                     </ul>
            </div>
            </div>
<<<<<<< HEAD
            </div>
            <div class="row">
              <div class="col s10 l3 offset-l1 offset-s1">
              <div class="row ">
                <label class="label1" >Fees</label>
                <?php echo 'Rs. '.fun::smilymsg($jsonArray['minfees']); ?>
              </div>
              </div>
              <div class="col s10 l7 offset-l1 offset-s1">
                <div class="row ">
                  <label class="label1" >Experience</label>
                  <?php echo fun::smilymsg($aboutinfo['teachingexp']); ?>
                </div>
              </div>
=======
            <div class="row">
            <div class="col s5">
            <div class="row ">
              <label class="label1" >Fees</label>
              <?php echo 'Rs. '.$jsonArray['minfees']; ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Experience</label>
              <?php echo $aboutinfo['teachingexp']; ?>
>>>>>>> 1e6e4d2e5f76e5c7e61121fdcdcc7c3a18ce5827
            </div>
            
        </div>
        <div class="card-panel" style=" margin-bottom: 6px; padding-bottom: 8px;">
             <h4><i class="small mdi-social-school"></i>Educational Details</h4>
        <div class="row">
          <div class="col s10 l5 offset-l1 offset-s1">
            <div class="row">
              <label class="label1" >College</label>
              <?php echo 'IIT '.$jsonArray['college']; ?>
            </div>
            <div class="row ">
              <label class="label1" >Degree</label>
                <?php echo Fun::smilymsg($jsonArray['degree']);
                      if($jsonArray['degreeother']!='')
                        echo ' , '.Fun::smilymsg($jsonArray['degreeother']);
                ?>
            </div>
          </div>
          <div class="col s10 l5 offset-l1 offset-s1">
            <div class="row ">
              <label class="label1" >Branch</label>
              <?php
                echo Fun::smilymsg($jsonArray['branch']);
              ?>
              </div>
          </div>
        </div>
        </div>
        <br>
        </div> 
       </div>
       </div>
       </div>
</main>
