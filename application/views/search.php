<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>

<main>
 <div class="container_class">
  <div class="row">
   <div class="col l3 offset-l8" style=" margin-top: 1rem; ">
    <div class="row">
     <div class="col l8">
      <form method="post">
       <span class="black-text">
        SORT BY
       </span>
       <select name="subject" class="browser-default" id="selectsubject" data-condition="simple">
        <option value="exp">
         Experience
        </option>
        <option value="fee_h2l">
         Fees/hr(High to Low)
        </option>
        <option value="fee_l2h">
         Fees/hr(Low to High)
        </option>
        <option value="rating">
         Rating
        </option>
       </select>
      </form>
     </div>
    </div>
   </div>
   <div class="col l3">
    <div class="card-panel " style="padding-left:0px">
     <span class="black-text text-darken-2" style="padding-left:1em">
      Refine
     </span>
     <div class="row">
      <form method="post">
       <div class="col l12">
        <ul class="collapsible" data-collapsible="expandable">

         <li>
          <div class="collapsible-header teal-text blue-grey lighten-5">
           By Subjects
          </div>
          <div class="collapsible-body">
           <div class="row">
            <div>
              <?php
              foreach($class_olist as $i=>$val ){
              ?>
              <div><?php echo $val['disptext']; ?></div>
              <?php
              }
              ?>
            </div>
           </div>
          </div>
         </li>

         <li>
          <div class="collapsible-header teal-text blue-grey lighten-5">
           By Subjects
          </div>
          <div class="collapsible-body">
           <div class="row">
            <div class="col l6">
             <input id="math" type="checkbox" name="sub[]" data-condition="checkbox" data-group="sub" />
             <label style="padding-left:1.4em" for="math">
              Mathematics
             </label>
            </div>
            <div class="col l6">
             <input id="physics" type="checkbox" name="sub[]" data-condition="checkbox" data-group="sub" />
             <label for="physics" style="padding-left:1.4em">
              Physics
             </label>
            </div>
           </div>
           <div class="row">
            <div class="col l6">
             <input id="chem" type="checkbox" name="sub[]" data-condition="checkbox" data-group="sub" />
             <label style="padding-left:1.4em" for="chem">
              Chemistry
             </label>
            </div>
            <div class="col l6">
             <input id="bio" type="checkbox" name="sub[]" data-condition="checkbox" data-group="sub" />
             <label for="bio" style="padding-left:1.4em">
              Biology
             </label>
            </div>
           </div>
          </div>
         </li>
         <li>
          <div class="collapsible-header teal-text blue-grey lighten-5">
           By Time
          </div>
          <div class="collapsible-body">
           <div class="row">
            <div class="col l6">
             <input id="t1" type="checkbox" name="time[]" data-condition="checkbox" data-group="time" />
             <label style="padding-left:1.4em" for="t1">
              12-1PM
             </label>
            </div>
            <div class="col l6">
             <input id="t2" type="checkbox" name="time[]" data-condition="checkbox" data-group="time" />
             <label for="t2" style="padding-left:1.4em">
              1-2PM
             </label>
            </div>
           </div>
           <div class="row">
            <div class="col l6">
             <input id="t3" type="checkbox" name="time[]" data-condition="checkbox" data-group="time" />
             <label style="padding-left:1.4em" for="t3">
              2-3PM
             </label>
            </div>
            <div class="col l6">
             <input id="t4" type="checkbox" name="time[]" data-condition="checkbox" data-group="time" />
             <label for="t4" style="padding-left:1.4em">
              3-4PM
             </label>
            </div>
           </div>
          </div>
         </li>
         <li>
          <div class="collapsible-header teal-text blue-grey lighten-5">
           By Language
          </div>
          <div class="collapsible-body">
           <div class="row">
            <div class="col l6">
             <input id="l1" type="checkbox" name="lang[]" data-condition="checkbox" data-group="lang" />
             <label style="padding-left:1.4em" for="l1">
              English
             </label>
            </div>
            <div class="col l6">
             <input id="l2" type="checkbox" name="lang[]" data-condition="checkbox" data-group="lang" />
             <label for="l2" style="padding-left:1.4em">
              Hindi
             </label>
            </div>
           </div>
           <div class="row">
            <div class="col l6">
             <input id="l3" type="checkbox" name="lang[]" data-condition="checkbox" data-group="lang" />
             <label style="padding-left:1.4em" for="l3">
              Tamil
             </label>
            </div>
            <div class="col l6">
             <input id="l4" type="checkbox" name="lang[]" data-condition="checkbox" data-group="lang" />
             <label for="l4" style="padding-left:1.4em">
              Telugu
             </label>
            </div>
           </div>
           <div class="row">
            <div class="col l6">
             <input id="l5" type="checkbox" name="lang[]" data-condition="checkbox" data-group="lang" />
             <label style="padding-left:1.4em" for="l5">
              French
             </label>
            </div>
           </div>
          </div>
         </li>
         <li>
          <div class="collapsible-header teal-text blue-grey lighten-5">
           By Fees/hr
          </div>
          <div class="collapsible-body">
           <div class="row">
            <div class="col l6">
             <input id="f1" type="checkbox" name="fees[]" data-condition="checkbox" data-group="fees" />
             <label style="padding-left:1.4em" for="f1">
              &lt;1000
             </label>
            </div>
            <div class="col l6">
             <input id="f2" type="checkbox" name="fees[]" data-condition="checkbox" data-group="fees" />
             <label for="f2" style="padding-left:1.4em">
              1000-1500
             </label>
            </div>
           </div>
           <div class="row">
            <div class="col l6">
             <input id="f3" type="checkbox" name="fees[]" data-condition="checkbox" data-group="fees" />
             <label style="padding-left:1.4em" for="f3">
              1500-2000
             </label>
            </div>
            <div class="col l6">
             <input id="f4" type="checkbox" name="fees[]" data-condition="checkbox" data-group="fees" />
             <label for="f4" style="padding-left:1.4em">
              2000-2500
             </label>
            </div>
           </div>
           <div class="row">
            <div class="col l6">
             <input id="f5" type="checkbox" name="fees[]" data-condition="checkbox" data-group="fees" />
             <label style="padding-left:1.4em" for="f5">
              &gt;2500
             </label>
            </div>
           </div>
          </div>
         </li>
        </ul>
       </div>
      </form>
     </div>
    </div>
   </div>
   <div class="col l7">
    <div class="card-panel ">
     <div class="teal-text">
      Showing 1-10 of 1000 results (402 online)
     </div>
     <div class="divider">
     </div>
     <div class="row card blue-grey lighten-5">
      <div class="col l3">
       <a href="">
        <img src="images/me.jpg" height="120px" width="120px" style="border:1px solid #021a40; margin-top:1em;" />
       </a>
      </div>
      <div class="col l9 ">
       <div class="col l6 ">
        <h6>
         <b>
          Mr.Himanshu Jain
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
        <a class="waves-effect waves-light btn" style="font-size:1em; padding:1px;">
         Book slot
        </a>
       </div>
      </div>
     </div>
     <div class="row card blue-grey lighten-5">
      <div class="col l3">
       <a href="">
        <img src="images/me.jpg" height="120px" width="120px" style="border:1px solid #021a40; margin-top:1em;" />
       </a>
      </div>
      <div class="col l9">
       <div class="col l6">
        <h6>
         <b>
          Mr.Himanshu Jain
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
        <a class="waves-effect waves-light btn" style="font-size:1em; padding:1px;">
         Book slot
        </a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</main>

<?php
load_view("Template/footernew.php",$inp);
load_view("Template/bottom.php",$inp);
?>

