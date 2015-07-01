<br><br>
<div class="row">
  <div class="col s12">
    <h5 class="teal-text text-darken-1">Calendar</h5>
  </div>
</div>

<?php
if ($tid == User::loginId()) {
?>
<div class="row">
  <div class="col s12">
    <a class="modal-trigger" href="#fillalltsform">Click to Add/Remove your free time Slot</a>
    <! fillalltsform -->
    <div id="fillalltsform" class="modal" class="width:1000px;">
      <div class="modal-content">
        <p>
          <?php
            load_view("Template/uploadslotform.php",$inp);
          ?>
        </p>
      </div>
      <div class="modal-footer" style="display:none;">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"></a>
      </div>
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
