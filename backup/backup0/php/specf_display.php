<?php
	function disp_sprofilename($inp){
		return "<a href='".HOST."sprofile.php?sid=".$inp["uid"]."' >".$inp["name"]."</a>";
	}
	function dropdown($data){
?>
	<ul class="nav nav-tabs" style='border:solid gray 0px;' >
		<li role="presentation" style='padding:0px;border:solid gray 0px;' class='pull-left' >
			<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style='padding:3px 6px;border:solid gray 0px;' ><span class='caret' ></span></a>
			<ul class="dropdown-menu pull-right" role="menu" role="menu">
				<?php
					for($i=0;$i<count($data);$i++){
				?>
				<li><a><?php echo $data[$i]; ?></a></li>
				<?php
					}
				?>
			</ul>
		</li>
	</ul>
<?php
	}
	function disp_link($inp=array()){
		$inp=Fun::mergeifunset($inp,array("href"=>"","disptext"=>"Link"));
?>
	<li><a href="<?php echo BASE.$inp["href"]; ?>"><?php echo $inp["disptext"]; ?></a></li>
<?php		
	}
	function disp_link_v1($inp=array()){
		$inp=Fun::mergeifunset($inp,array("href"=>"","disptext"=>"Link"));
?>
	<a href="<?php echo BASE.$inp["href"]; ?>" ><li><?php echo $inp["disptext"]; ?></li></a>
<?php		
	}
	function disp_tab_list($arr=array()){
		foreach($arr as $link=>$disptext){
			disp_link(array("href"=>$link,"disptext"=>$disptext ));
		}
	}


?>