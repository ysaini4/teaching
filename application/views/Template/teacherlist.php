<?php
foreach($qresult as $row) {
?>
<div class="card teacherlistelm" style="padding:6px;box-shadow:none;border:1px solid #eeeeee;">
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m4 l4">
      <a href="<?php echo BASE."profile/".$row["tid"]; ?>" title="<?php echo convchars($row["name"]); ?>">
        <img src="<?php echo $row["profilepic"]; ?>"  style="border:1px solid #eeeeee;padding:2px;width:100%;"/>
      </a>
    </div>
    <div class="col s12 m8 l8">
      <div style="margin-top:10px;">
        <a href="<?php echo BASE."profile/".$row["tid"]; ?>" title="<?php echo convchars($row["name"]); ?>" style="font-size:18px;">
          <?php echo convchars($row["name"]); ?>
        </a>
        <div class="orange-text">
          <?php
          for($i=0; $i<$row["avgrating"]; $i++){
          ?>
          <i class="material-icons tiny" style="width:1rem;">star_rate</i>
          <?php
          }
          ?>
        </div>
        <div>
          <?php echo convchars($row["teachermoto"]); ?>
        </div>
        <!--<h6>IIT Delhi</h6>-->
      </div>

      <div style="margin-top:10px;">
        <!--<a href="#">Reviews</a>-->
        <div class="grey-text text-darken-1" style="font-size:14px;"><?php echo implode(", ",myexplode(",", $row["subjectname"])); ?></div>
        <div class="grey-text" style="font-size:14px;">
          Min Fees :
          <span>
            <?php echo $row["minprice"].rit(" - ".$row["maxprice"], $row["maxprice"]!=$row["minprice"] ); ?>/hr
          </span>
        </div>
        <div>
        <?php
          if(!$row["isdonedemo"]) {
        ?>
        <a href="<?php pit(BASE."profile/".$row["tid"]."/"."5", User::islogin(), BASE."login"); ?>" title="Take Free Demo">
          Free Demo
        </a>
        <?php
          }
        ?>
        <a style="cursor:pointer;display:none;" title="Book Slots">
          <i class="material-icons tiny">bookmark</i>Book Slots
        </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>