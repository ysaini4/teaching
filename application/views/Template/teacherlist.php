<?php
foreach($qresult as $row) {
?>
<div class="card" style="padding:15px;">
  <div class="row">
    <div class="col s12 l3">
      <a href="#">
      <img src="<?php echo $row["profilepic"]; ?>" height="120px" width="120px" style="border:1px solid #9e9e9e;"/>
      </a>
    </div>
    <div class="col s12 l9">
      <div class="row">
        <div class="col s12 l6">
          <h6><strong><?php echo $row["name"].$row["tid"]; ?></strong></h6>
          <h6>IIT Delhi</h6>
          <br>
          <h6>Physics, Chemistry</h6>
          <h6>
            Fees :
            <span>
              1000/hr
            </span>
          </h6>
        </div>
        <div class="col s12 l6">
          <h6>
            <i class="material-icons tiny" style="width:1rem;">star_rate</i>
            <i class="material-icons tiny" style="width:1rem;">star_rate</i>
            <i class="material-icons tiny" style="width:1rem;">star_rate</i>
            <i class="material-icons tiny" style="width:1rem;">star_rate</i>
            <i class="material-icons tiny" style="width:1rem;">star_rate</i>
          </h6>
          <h6>
            3 Reviews
          </h6>
          <br><br>
          <a class="waves-effect waves-light btn" style="display:none;">
            Book slot
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>