<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>
<script>
var topics=<?php echo json_encode($cst_tree); ?>;
</script>

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
			 <select name="orderby" class="browser-default" >
				<option value="1">
				 Experience
				</option>
				<option value="2">
				 Fees/hr(High to Low)
				</option>
				<option value="3">
				 Fees/hr(Low to High)
				</option>
				<option value="4">
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
			<form method="post" id="searchform" >
				<?php
				hidinp("search",htmlspecialchars($search));
				?>
				<div>
					<div class="input-field col s12">
						<select name='class' class="browser-default" onchange='topicssubtopic_t2(this);' id="selectclass" data-condition='simple' style='' >
							<?php
								 disp_olist($class_olist,array('selectalltext'=>"Select Class"));
							?>
						</select>
					</div>
				</div>
				<div>
					<div class="input-field col s12">
						<select name='subject'  class="browser-default" id='selectsubject' onchange='topicssubtopic_t2(this);' data-condition='simple' >
							<option value="" >Select Subject</option>
						</select>
					</div>
				</div>

			 <div class="col l12">
				<ul class="collapsible" data-collapsible="expandable">


				 <li>
					<div class="collapsible-header teal-text blue-grey lighten-5">
					 By Topics
					</div>
					<div class="collapsible-body" id="selecttopic" >
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
					<div class="collapsible-header teal-text blue-grey lighten-5">
					 By Time
					</div>
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
				 </li>
				 <li>
					<div class="collapsible-header teal-text blue-grey lighten-5">
					 By Language
					</div>
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
				 <li>
					<div class="collapsible-header teal-text blue-grey lighten-5">
					 By Fees/hr
					</div>
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
				 </li>
				 <li>
					<div class="collapsible-header teal-text blue-grey lighten-5">
					 By Time required
					</div>
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
		 <div id="searchresultdiv" data-action='search' data-max='<?php echo $_ginfo["numsearchr"]["loadonce"]; ?>' >
		 <?php
		 	handle_disp(array('class'=>'', 'subject'=>'', 'topic'=>'', 'price'=>'', 'timer'=>'', 'lang'=>'', 'timeslot'=>'', 'orderby'=>'', 'search'=>'', 'max'=>0, 'maxl'=>$_ginfo["numsearchr"]["loadonce"]), "search");
		 ?>
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

