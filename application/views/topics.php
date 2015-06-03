<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>
<script>
var topics=<?php echo json_encode($cst_tree); ?>;
</script>
<main>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3 class="teal-text center">Topics</h3>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
        <div class="card-panel">
          <span class="grey-text text-darken-2">Add your subject</span>
          <br>
          <div class="row">
            <form method="post" class="col s12" onsubmit='return submitForm(this);'  >
              <div class="row">
                <div class="input-field col s12">
                  <select name='class' onchange='topicssubtopic(this);' id="selectclass" data-condition='simple' style='' >
                    <?php
                       disp_olist($class_olist,array('selectalltext'=>"Select Class"));
                    ?>
                  </select>
                </div>
                <div class="input-field col s12">
                  <select name='subject' id='selectsubject' onchange='topicssubtopic(this);' data-condition='simple' >
                    <option value="" >Select Subject</option>
                  </select>
                </div>
                <div class="input-field col s12">
                  <select name='topic' id='selecttopic' data-condition='simple' >
                    <option value="" >Select Topic</option>
                  </select>
                </div>
                <div class="input-field col s12">
                  <input id="duration" type="text" class="validate" name="timer" data-condition='simple' >
                  <label for="duration">Class duration (in hrs)</label>
                </div>
                <div class="input-field col s12">
                  <input id="fees" type="text" class="validate" name="price" data-condition='simple' >
                  <label for="fees">Fees per hour ( Rs.)</label>
                </div>
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light red darken-1">Submit</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col s12 l8">
        <div class="card-panel">
          <table class="hoverable responsive-table">
            <thead>
              <tr>
                <th data-field="class">Class</th>
                <th data-field="subject">Subject</th>
                <th data-field="topic">Topic</th>
                <th data-field="duration">Duration (hrs)</th>
                <th data-field="fees">Fees</th>
                <th data-field=""></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($mysubj as $i=>$row){
              ?>
              <tr>
                <td><?php echo $row["classname"]; ?></td>
                <td><?php echo $row["subjectname"]; ?></td>
                <td><?php echo $row["topicname"]; ?></td>
                <td><?php echo $row["timer"]."h"; ?></td>
                <td>&#8377;<?php echo $row["price"]; ?></td>
                <td><a href='<?php echo BASE."topics/".$tid."?deleteid=".$row["id"]; ?>' class="btn waves-effect waves-light red darken-1">Delete</a></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
popupalert(null);
popupconfirm(null);

load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>
