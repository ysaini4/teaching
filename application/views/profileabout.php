<?php
?>
   <main>
    <div class="container_profile">
    <div class="section">
        <br>
    <div class="row">
    <div class="col s12  l12">
        <div class="card-panel_profile" style=" margin-bottom: 0px;">
             <h4 ><i class="small mdi-action-account-circle"></i>ABOUT</h4>
        <div class="row">
          <div class="col s5">
            <div class="row">
              <label class="label1">First Name:</label>
              <?php echo $firstName; ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1">Last Name:</label>
              <?php echo $lastName;?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >User Name:</label>
                <?php echo $aboutinfo['username'] ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Email:</label>
               <?php echo $aboutinfo['email'] ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >City:</label>
              <?php echo $jsonArray['city']; ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Country:</label>
               <?php echo $jsonArray['country']; ?>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Birthday:</label>
                <?php echo date('d-m-Y',$aboutinfo['dob']) ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Gender</label>
              <?php if($aboutinfo['gender']=='m')
                      echo 'Male';
                    else if($aboutinfo['gender']=='f')
                      echo 'Female'; 
                    else
                      echo 'Other';
                    ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Resume: </label>
              <a href="<?php echo $jsonArray['resume'] ?>"><u>Click To See</u></a>
                 
            </div>
          </div>
          <div class="col s5">
            <div class="row">
              <label class="label1" >Phone:</label>
              <?php echo $aboutinfo['phone']; ?>
            </div>
          </div>
        </div>
        </div>
        <div class="card-panel_profile" style=" margin-bottom: 0px;">
            <h4 ><i class="small mdi-social-group"></i>Teaching Details</h4>
        <div class="row">
            <div class="col s5">
                 <div class="row">
            <div class="col s6">
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
        
            <div class="col s4">
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
                </div>
            </div>
            <div class="col s5">
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
            </div>
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
              <?php echo $aboutinfo['teachingexp'] ?>
            </div>
          </div>
        </div>
            
        </div>
         <div class="card-panel_profile" style=" margin-bottom: 6px; padding-bottom: 8px;">
             <h4><i class="small mdi-social-school"></i>Educational Details</h4>
        <div class="row">
          <div class="col s5">
            <div class="row">
              <label class="label1" >College</label>
              <?php echo 'IIT '.$jsonArray['college'] ?>
            </div>
          </div>
          <div class="col s5">
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Degree</label>
                <?php echo $jsonArray['degree'];
                      if($jsonArray['degreeother']!='')
                        echo ' , '.$jsonArray['degreeother'];
                ?>
            </div>
          </div>
          <div class="col s5">
            <div class="row ">
              <label class="label1" >Branch</label>
              <?php
                echo $jsonArray['branch'];
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
