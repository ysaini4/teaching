<?php
//var_dump($rating);
foreach($qresult as $row) {
//fb($row,'row',FirePHP::LOG);
?>

<div class="col-md-3">
  <div class="card teacherlistelm">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php echo $row["profilepic"]; ?>">
    </div>
    <div class="card-content">
      <span class="card-title activator teal-text text-darken-4"><?php echo convchars($row["name"]); ?><i class="material-icons right">toc</i></span>
      <p>
        <?php if(!$row["isdonedemo"]) { //fb($row,'$qresult as $row',FirePHP::LOG); ?>
          <a href="<?php pit(BASE."profile/".$row["tid"]."/"."5", User::islogin(), BASE."login"); ?>" >
            <button type="button" class="btn waves-effect waves-light btn-small" >Free Demo</button>
          </a>
        <?php } ?>
      </p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <a href="<?php echo BASE."profile/".$row["tid"]; ?>">
          <?php echo convchars($row["name"]); ?>
        </a>
        <i class="material-icons right">close</i>
      </span>
      <div class="grey-text text-darken-3">
        <?php echo implode(", ",myexplode(",", $row["subjectname"])); ?>
      </div>
      <div class="grey-text text-darken-1">
        Fees :
        <span>

          <?php if(($row["minprice"].rit(" - ".$row["maxprice"], $row["maxprice"]!=$row["minprice"] ))!=null)  echo $row["minprice"].rit(" - ".$row["maxprice"], $row["maxprice"]!=$row["minprice"] ); else echo convchars(json_decode($row['jsoninfo'])->{'minfees'}); ?>/hr
        </span>
      </div>
      <div class="grey-text text-darken-1">College : IIT <?php echo json_decode($row['jsoninfo'])->{'college'}; ?></div>
      <div class="grey-text text-darken-1">Experience : <?php echo (($row['teachingexp']==0)||($row['teachingexp']==1)?(($row['teachingexp']==0)?"None":$row['teachingexp'].' Year'):$row['teachingexp'].' Years'); ?> </div>
      
      <div class="divider"></div>
      <div class="rating" data-tid="<?php echo convchars($row['tid']); ?>">
          Rating
      <?php if($user = User::loginId()) : ?>
      <?php
          $prev_rating = 0;
          $rating_id = NULL;
          foreach ($rating as $value)
          {
            if (intval($row['tid']) == $value['teacher_id']){
              $prev_rating = $value['rating'];
              $rating_id = $value['id'];
            }
          }
      ?>
        <div class="rating-system" data-uid="<?php echo convchars($user); ?>" previousRating="<?php echo $prev_rating; ?>" ratingId="<?php echo $rating_id; ?>">
        <?php
          for ($i=1; $i < 6; $i++)
          {
            if ($i<=$prev_rating)
              echo "<span class='glyphicon glyphicon-star rated-star' aria-hidden='true' data-number='".$i."'></span>";
            else
              echo "<span class='glyphicon glyphicon-star-empty rating-star' aria-hidden='true' data-number='".$i."'></span>";
          }
        ?>
        </div>
      <?php endif; ?>
        <div class="rating-value" count="<?php echo $row['rating_total']; ?>" value="<?php echo round($row['rating'],2); ?>">
        <?php if($row['rating_total']>0) : ?>
          <p><?php echo round($row['rating'],2); ?> <span>(<?php echo round($row['rating_total'],2); ?> ratings)</span></p>
        <?php else: ?>
          Not rated yet.
        <?php endif; ?>
      </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>