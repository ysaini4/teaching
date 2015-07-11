<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>
<style>
  @media only screen and (max-width: 1000px) {
    div#wrapper {
      width: 100%;
    }
    div#mainContent {
      width: 100%;
      padding: 0px;
    }
    div#sideBar {
      width: 100%;
      padding: 0px;
    }
    div#sticker_panel {
      width: 100%;
      height: 500px;
      padding: 10px;
      background-color: #ffffff;
      overflow-y: auto;
      box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.16), 0px 2px 10px 0px rgba(0, 0, 0, 0.12);
    }
  }
  @media only screen and (min-width: 1000px) {
    div#wrapper {
      width:1030px;
    }
    div#mainContent {
      width:655px;
      min-height: 700px;
      padding:10px;
      float:left;
    }
    div#sideBar {
      width:290px;
      padding:10px;
      float:left;
      margin-top: 8px;
    }
    div#sticker_panel {
      width: 270px;
      height: 550px;
      padding:15px;
      background:#ffffff;
      overflow-y: auto;
      box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.16), 0px 2px 10px 0px rgba(0, 0, 0, 0.12);
    }
  }
  .clear {
    clear:both; 
  }
  .stick {
    position:fixed;
    top:70px;
  }
  ul.collapsible {
    box-shadow: none;
  }
</style>
<script>
  var topics=<?php echo json_encode($cst_tree); ?>;
</script>

<main>
  <div class="container">
  <br>
    <div id="wrapper">
      <!-- Begin Filter Panel -->
      <div id="sideBar">
        <div class="" id="sticker_panel"> <!-- Don't add a class -->
          <h5 class="blue-grey-text text-darken-1">Filter<i class="material-icons right">filter_list</i></h5>
          <div class="row">
            <form method="post" id="searchform" class="col s12">
              <?php
              hidinp("search",htmlspecialchars($search));
              ?>
              <div class="row" style='margin-bottom:-20px;' >
                <div class="col s12">
                  <select name="class" class="browser-default" onchange='topicssubtopic_t2(this);' id="selectclass" data-condition="simple">
                    <?php
                      disp_olist($class_olist,array('selectalltext'=>"Select Class"));
                    ?>
                  </select>
                </div>
              </div>
              <div class="row" style='margin-bottom:-20px;' >
                <div class="col s12">
                  <select name='subject'  class="browser-default" id='selectsubject' onchange='topicssubtopic_t2(this);' data-condition='simple'>
                    <option value="" disabled selected>Subject</option>
                    <option value="">Select class first</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <ul class="collapsible" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header">Topics</div>
                      <div class="collapsible-body" id="selecttopic" style="padding:10px;">
                        <div style="padding:5px;">Select Class and Subject first.</div>
                        <input type='checkbox' style='display:none' name='topic' value=''/>
                      </div>
                    </li>
                    <?php
                      if(true) {
                    ?>
                    <li>
                      <div class="collapsible-header">Time</div>
                      <div class="collapsible-body" style="padding:6px;">
                        <div class="row">
                        <?php
                          foreach($allts as $i=>$val) {
                            foreach($val as $j=>$val1) {
                        ?>
                          <div class="col s6">
                            <input id="timesearch<?php echo $i."-".$j; ?>" type="checkbox" name="timeslot" class="filled-in" value="<?php echo $val1[1]; ?>" checked/>
                            <label style="padding-left:23px;" for="timesearch<?php echo $i."-".$j; ?>"><?php echo $val1[0]; ?></label>
                          </div>
                        <?php
                            }
                          }
                        ?>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Languages</div>
                      <div class="collapsible-body" style="padding:6px;">
                        <div class="row">
                        <?php
                          $count=1;
                          foreach($lang as $i=>$val1) {
                            foreach($val1 as $j=>$val2) {
                        ?>
                          <div class="col s6">
                            <input id="lang<?php echo $count; ?>" type="checkbox" class="filled-in" name="lang" value='<?php echo $count; ?>' checked />
                            <label style="padding-left:23px;" for="lang<?php echo $count; ?>" >
                              <?php echo $val2; ?>
                            </label>
                          </div>
                        <?php
                              $count++;
                            }
                          }
                        ?>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Fees per hour</div>
                      <div class="collapsible-body" style="padding:10px;">
                        <?php
                          $count=1;
                          foreach($price as $val) {
                            foreach($val as $val1) {
                              load_view("Template/check1.php",array('label'=>htmlspecialchars($val1[0]), 'value'=>$count,"id"=>"price".$count, "name"=>"price"));
                              $count++;
                            }
                          }
                        ?>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Duration</div>
                      <div class="collapsible-body" style="padding:10px;">
                        <?php
                          $count=1;
                          foreach($timer as $val) {
                            foreach($val as $val1) {
                              load_view("Template/check1.php",array('label'=>htmlspecialchars($val1[0]), 'value'=>$count,"id"=>"timer".$count, "name"=>"timer"));
                              $count++;
                            }
                          }
                        ?>
                      </div>
                    </li>
                    <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <button type="button" class="btn waves-effect waves-light" onclick="ms.refinesearch();">
                Refine Search
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- End Filter Panel -->
      
      <!-- Begin Search Panel -->
      <div id="mainContent">
        <div class="row"> 
      		<div class="col s12">
      			<div class="card-panel">
      			  <div class="row" style="margin-bottom:0px;">
    						<div class="col s12 m6 l6">
    						  <h5 class="blue-grey-text text-darken-1">Search Results</h5>
    						</div>
                <div class="col s4 m2 l2">
                  <img src="photo/icons/loading2.gif" id="searchloadingimg" style="visibility:hidden;" class="right"/>
                </div>
                <form method="post" class="col s8 m4 l4">
                  <div class="row">
                    <div class="col s12">
                      <select name="orderby" class="browser-default">
                        <option value="" >Sort By</option>
                        <!--
                        <option value="1">Experience</option>
                        <option value="2">Fees/hr (High to Low)</option>
                        -->
                        <option value="3">Fees/hr (Low to High)</option>
                        <!--
                        <option value="4">Rating</option>
                        -->
                      </select>
                    </div>
                  </div>
                </form>
    					</div>
      				<div class="divider"></div>
              <br>
      				<div class="row" id="dispnoresult" style='display:none;' >
                <div class="col s12 red-text text-lighten-1">
                  Sorry. No results found.
                </div>
              </div>
              <div class="row">
      					<div class="col s12">
      						<div id="searchresultdiv" data-action='search' data-max='<?php echo $_ginfo["numsearchr"]["loadonce"]; ?>' data-maxl='<?php echo $_ginfo["numsearchr"]["loadadd"]; ?>' data-eparams='searchform()' data-ignoreloadonce='<?php echo $_ginfo["numsearchr"]["loadonce"]; ?>'>
    							<?php
    							 	handle_disp(array('class'=>$class, 'subject'=>$subject, 'topic'=>$topic, 'price'=>'', 'timer'=>'', 'lang'=>'', 'timeslot'=>'', 'orderby'=>'', 'search'=>$search, 'max'=>0, 'maxl'=>$_ginfo["numsearchr"]["loadonce"]), "search");
    							?>
    							</div>
      					</div>
      				</div>
      				<div class="row">
      					<div class="col s12">
      						<img src='photo/icons/loading2.gif' id="loadmoreloadingimg" style='visibility:hidden;' /><br>
      						<a onclick='ms.searchloadmore(this);' style="cursor:pointer;" id="loadmorebutton" >View More</a>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </div>
      <!-- End Search Panel -->
    
    </div>
  </div>
</main>

<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",Fun::mergeifunset($inp,array("needbody"=>false)));
?>
  <script src="js/search.js"></script>
</body>
</html>
