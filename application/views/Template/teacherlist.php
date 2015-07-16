<?php
foreach($qresult as $row) {
?>
<div class="card teacherlistelm" style="padding:6px;box-shadow:none;border:1px solid #b0bec5;">
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m4 l4" style="padding:2px;">
      <a href="<?php echo BASE."profile/".$row["tid"]; ?>">
        <img src="<?php echo $row["profilepic"]; ?>" class="responsive-img" style="margin-left:10px;min-width:160px;border:1px solid #b0bec5;padding:2px;"/>
      </a>
    </div>
    <div class="col s12 m8 l8">
      <h6><?php echo convchars($row["name"]); ?></h6>
      <div class="orange-text">
        <?php
        for($i=0; $i<$row["avgrating"]; $i++){
        ?>
        <i class="material-icons tiny" style="width:1rem;">star_rate</i>
        <?php
        }
        ?>
      </div>
      <div class="grey-text text-darken-2">
        <?php echo convchars($row["teachermoto"]); ?>
      </div>
      <!--
      <h6>IIT Delhi</h6>
      -->
      <div>
        <!--<a href="#">Reviews</a>-->
        <div class="grey-text text-darken-3"><?php echo implode(", ",myexplode(",", $row["subjectname"])); ?></div>
        <div class="grey-text text-darken-1">
          Min Fees :
          <span>
            <?php echo $row["minprice"].rit(" - ".$row["maxprice"], $row["maxprice"]!=$row["minprice"] ); ?>/hr
          </span>
        </div>
        <div>
        <?php
          if(!$row["isdonedemo"]) {
        ?>
        <a href="<?php pit(BASE."profile/".$row["tid"]."/"."5", User::islogin(), BASE."login"); ?>" >
          <button type="button" class="btn waves-effect waves-light" >Free Demo</button>
        </a>
        <?php
          }
        ?>
        <a style="cursor:pointer;display:none;">
          <i class="material-icons tiny">bookmark</i>Book Slots
        </a>
      </div>
    </div>
  </div>
</div>
<?php
}
?>