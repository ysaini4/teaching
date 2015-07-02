<?php
$trows = add(array(array("Name", "Email", "Phone", "Action", "Add money")), map( $allusers["teachers"], function ($row) { 
	return Fun::get_key_values(Fun::getflds(array("name", "email", "phone"), $row)); 
}));

$srows = add(array(array("Name", "Email", "Phone", "Action", "Add money")), map( $allusers["students"], function ($row) { 
	return Fun::get_key_values(Fun::getflds(array("name", "email", "phone"), $row)); 
}));

$addmoney = function($uid) {
?>
	<form onsubmit="form.req(this);return false;" >
		<?php
			hidinp("uid", $uid);
		?>
		<div class="input-field col s12 l2">
			<input type="text" name="money" data-condition='simple' placeholder="Add money in account" >
		</div>
		<button type="submit" class="btn blue waves-effect waves-light" >Add</button>
	</form>
<?php
};

$tfunc = function($r, $c) use($addmoney, $allusers) {
	if($c == 3 && $r > 0 ) {
		?>
		<button type="button" class="btn blue waves-effect waves-light" >Accept</button>
		<button type="button" class="btn blue waves-effect waves-light" >Reject</button>
		<br>
		<?php
		return true;
	} else if ($c == 4 && $r > 0) {
		$addmoney( $allusers["teachers"][$r-1]["id"] );
	}
	return null;
};

$sfunc = function($r, $c) use ($addmoney, $allusers) {
	if($c == 4 && $r > 0 ) {
		$addmoney( $allusers["students"][$r-1]["id"] );
		return true;
	}
	return null;
};

?>

<br><br>
<div class="row">
	<div class="col s12">
		<h5 class="teal-text text-darken-1">Teachers</h5>
	</div>
</div>
<div class="row">
	<div class="col s12">
<?php
load_view("Template/table.php", array("rows" => $trows, "func" => $tfunc));
?>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<h5 class="teal-text text-darken-1">Students</h5>
	</div>
</div>
<div class="row">
	<div class="col s12">
<?php
load_view("Template/table.php", array("rows" => $srows, "func" => $sfunc));
?>
	</div>
</div>
