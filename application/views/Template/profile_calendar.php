<br><br>

<?php 
if ($tid == User::loginId()) {
?>
<div class="row">
  <div class="col s12">

    <a onclick="$('#fillalltsform').slideToggle(500);">Click here</a> to book slots for multiple days.


<!--     <a onclick="mohit.popup('addslots');" >Click here for slots</a>
 -->
    <?php
//      load_view("popup.php", array("name"=>"addslots", "body" => "Template/uploadslotform.php", "bodyinfo" => $inp, "title" => "Add your slots"));
    ?>
    <div id="fillalltsform" style="display:none;padding:30px;">
      <?php
        load_view("Template/uploadslotform.php",$inp);
      ?>
    </div>
  </div>
</div>
<?php
}
?>

<!-- Calendar -->
<div class="row">
  <div class="col s12">
    <div id="divforcalender">
      <?php
        load_view("dispcal.php",$inp);
      ?>
    </div>
  </div>
</div>
