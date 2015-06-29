<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>
<script>
  var topics=<?php echo json_encode($cst_tree); ?>;
</script>

<main>
  <div class="container">0
  <br>
  	<div class="row">
  		<div class="col s12 l4">
  			<div class="card-panel">
  				<div class="row">
						<form method="post" id="searchform" class="col s12">
							<?php
							hidinp("search",htmlspecialchars($search));
							?>
							<div class="row">
								<div class="col s12">
								  <h5 class="teal-text text-darken-1"><i class="mdi-content-filter-list left"></i>Filter</h5>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<select name="class" class="browser-default" onchange='topicssubtopic_t2(this);' id="selectclass" data-condition="simple">
										<?php
											disp_olist($class_olist,array('selectalltext'=>"Select Class"));
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<select name='subject'  class="browser-default" id='selectsubject' onchange='topicssubtopic_t2(this);' data-condition='simple' >
										<option value="" disabled selected>Select Subject</option>
									</select>
								</div>
							</div>
							<div class="row">
							  <div class="col s12">
							    <ul class="collapsible" data-collapsible="expandable">
										<li>
										  <div class="collapsible-header">Topics</div>
											<div class="collapsible-body" id="selecttopic">
												Select The class
												<input type='checkbox' style='display:none' name='topic' value='' />
											 <?php
												for($i=0;$i<0;$i++){
											 ?>
											 <div class="row">
												<div class="col l12">
												 <input id="math" type="checkbox" name="sub[]" data-condition="checkbox" data-group="sub" />
												 <label style="padding-left:1.4em" for="math">
													Maths
												 </label>
												</div>
											 </div>
											 <?php
												}
											 ?>
											</div>
										</li>
										<li>
											<div class="collapsible-header">Time</div>
<!--
										<div class="collapsible-body">
										 <?php
										 foreach($allts as $i=>$val) {
										 ?>
										 <div class="row">
											<?php
												foreach($val as $j=>$val1){
											?>
											<div class="col l6">
											 <input id="timesearch<?php echo $i."-".$j; ?>" type="checkbox" name="timeslot" checked value="<?php echo $val1[1]; ?>" />
											 <label style="padding-left:1.4em" for="timesearch<?php echo $i."-".$j; ?>" >
												<?php echo $val1[0]; ?>
											 </label>
											</div>
											<?php
												}
											?>
										 </div>
										 <?php
										 }
										 ?>
										</div>
-->
										</li>
										<li>
											<div class="collapsible-header">Language</div>
<!--
										<div class="collapsible-body">
										 <?php
											$count=1;
											foreach($lang as $i=>$val1){
										 ?>
										 <div class="row">
											<?php
												foreach($val1 as $j=>$val2){
											?>
											<div class="col l6">
											 <input id="lang<?php echo $count; ?>" type="checkbox" name="lang" value='<?php echo $count; ?>' checked />
											 <label style="padding-left:1.4em" for="lang<?php echo $count; ?>" >
												<?php echo $val2; ?>
											 </label>
											</div>
											<?php
													$count++;
												}
											?>
										 </div>
										 <?php
											}
										 ?>
										</div>
										</li>
-->
										<li>
											<div class="collapsible-header">Fees per hour</div>
<!--
										<div class="collapsible-body">
										 <?php
											$count=1;
											foreach($price as $val){
												opent("div",array("class"=>"row"));
												foreach($val as $val1){
													load_view("Template/check1.php",array('label'=>htmlspecialchars($val1[0]), 'value'=>$count,"id"=>"price".$count, "name"=>"price"));
													$count++;
												}
												closet("div");
											}
										 ?>
										</div>
-->
										</li>
										<li>
											<div class="collapsible-header">Duration</div>
<!--
										<div class="collapsible-body">
										 <?php
											$count=1;
											foreach($timer as $val){
												opent("div",array("class"=>"row"));
												foreach($val as $val1){
													load_view("Template/check1.php",array('label'=>htmlspecialchars($val1[0]), 'value'=>$count,"id"=>"timer".$count, "name"=>"timer"));
													$count++;
												}
												closet("div");
											}
										 ?>
										</div>
-->
										</li>
								  </ul>
							  </div>
						  </div>
						</form>
					</div>
  			</div>
  		</div>
  		<div class="col s12 l8">
  			<div class="card-panel">
  			  <div class="row">
						<div class="col s12">
						  <h5 class="teal-text text-darken-1"><i class="mdi-action-search left"></i>Search</h5>
						</div>
					</div>
  				<div class="row">
  					<div class="col s12 l7">
  					  <br>
  						<span class="grey-text">Displaying 1-10 of 1000 results (402 online)</span>
  					</div>
  					<form method="post" class="col s12 l5">
						  <div class="row">
						  	<div class="col s12">
						  		<select name="orderby" class="browser-default">
						  		  <option value="" selected disabled>Sort By</option>
										<option value="1">Experience</option>
										<option value="2">Fees/hr (High to Low)</option>
										<option value="3">Fees/hr (Low to High)</option>
										<option value="4">Rating</option>
									</select>
						  	</div>
						  </div>
						</form>
  				</div>
  				<div class="divider"></div>
  				<div class="row">
  					<div class="col s12">
  						<div id="searchresultdiv" data-action='search' data-max='<?php echo $_ginfo["numsearchr"]["loadonce"]; ?>' data-maxl='<?php echo $_ginfo["numsearchr"]["loadadd"]; ?>' data-eparams='searchform()' data-ignoreloadonce='<?php echo $_ginfo["numsearchr"]["loadonce"]; ?>'>
							<?php
							 	handle_disp(array('class'=>'', 'subject'=>'', 'topic'=>'', 'price'=>'', 'timer'=>'', 'lang'=>'', 'timeslot'=>'', 'orderby'=>'', 'search'=>$search, 'max'=>0, 'maxl'=>$_ginfo["numsearchr"]["loadonce"]), "search");
							?>
							</div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col s12">
  						<a onclick='div.load($("#searchresultdiv")[0],0);' style="cursor:pointer;">Load More</a>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</main>

<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>
