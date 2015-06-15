<?php

$sargs=Funs::get_search_args();
$qargs=Funs::query_args($sargs);

$search_result=Search::result_teacher_details($qargs);

$sresults=$search_result["result"];
$num=$search_result["num"];

include "includes/data_subj.php";
?>
<script type="text/javascript" src="jquery/jRating.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select').material_select();
		$('.basic').jRating();
	});
</script>
<body>
<main>
    <div class="container">
    	<div class="row">
    		<div class="col m4 s12 card-panel">
    			<div class="row" style="margin-bottom:0;">
    				<h5 class="center teal-text">Refine Your Search</h5>
    				<div class="divider teal"></div>
  					<ul class="">
  						<li class="no-padding">
  							<ul class="collapsible collapsible-accordion">
  								<li class="bold">
          							<a class="collapsible-header">By Classes<i class="mdi-navigation-arrow-drop-down right"></i></a>
          							<div class="collapsible-body white">
           								 <ul id="options">
								             <?php
                              disp_tab_list(Funs::class_search_tab_list($subt));
                             ?>
								        </ul>
							        </div>
						        </li>
						        <li class="bold">
          							<a class="collapsible-header">By Subject<i class="mdi-navigation-arrow-drop-down right"></i></a>
          							<div class="collapsible-body white">
           								 <ul id="checks">
								            <?php
                               $sublist=Funs::subject_search_tab_list($subt,$sargs["class"]);
                               if(count($sublist)==0)
                                echo "Choose the class first";
                               else
                                disp_tab_list($sublist);
                            ?>
								        </ul>
							        </div>
						        </li>
		   			        </ul>
						</li>
  					</ul>
    			</div>
    		</div>
    		<div class="col m7 s12 offset-m1 card-panel">
    			<div class="result">Showing 1-10 of 1000 results (402 online)</div>
    		</div>
    	</div>
    </div>
</main>

<style>
.select-wrapper input.select-dropdown {
  color:#9e9e9e;
}

.dropdown-content {
  z-index:2;
}

.collapsible-accordion li a,label{
	color:#009688;
	font-weight: bold;
}

#options{
	margin-left: 26px;
}
#options li{
	padding:4px;
}
#checks li{
	height:30px;
}

</style>

