<?php
foreach($qresult as $row){
?>
     <div class="row card blue-grey lighten-5" style='' >
      <div class="col l3">
       <a href="">
        <img src="<?php echo $row["profilepic"]; ?>" height="120px" width="120px" style="border:1px solid #021a40; margin-top:1em;" />
       </a>
      </div>
      <div class="col l9 ">
       <div class="col l6 ">
        <h6>
         <b>
          <?php echo $row["name"]; ?>
         </b>
        </h6>
        <p class="black-text" style="margin-top:0.5em;">
         IIT Delhi
        </p>
        <br />
        <h6>
         <b>
          Physics,Chemistry
         </b>
        </h6>
        <h6>
         Fees   :
         <span>
          <b>
           1000/hr
          </b>
         </span>
        </h6>
       </div>
       <div class="col offset-l3 l3">
        <h6>
         <i class="mdi-action-star-rate">
         </i>
         <i class="mdi-action-star-rate">
         </i>
         <i class="mdi-action-star-rate">
         </i>
         <i class="mdi-action-star-rate">
         </i>
        </h6>
        <h6>
         3 Reviews
        </h6>
        <br />
        <br />
        <a class="waves-effect waves-light btn" style="font-size:1em; padding:1px;display:none;">
         Book slot
        </a>
       </div>
      </div>
     </div>
<?php
}
?>