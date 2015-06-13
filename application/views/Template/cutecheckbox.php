<?php
mergeifunset($inpattr,array("class"=>$class,"id"=>"check_".$id,"onchange"=>$onchange,"type"=>"checkbox" ));
?>
<div <?php echo param2str($divattr); ?> >
	<?php
	opent("input",$inpattr);
	?>
	<label for="<?php echo $inpattr["id"]; ?>" ><?php echo $label; ?></label>
</div>
