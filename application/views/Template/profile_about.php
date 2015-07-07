<br><br>
<div class="row">
	<div class="col s12 l4">
		<img class="materialboxed" height="200" width="200" src="
		<?php
		if ($aboutinfo['profilepic'] != '')
			echo $aboutinfo['profilepic']; 
		else
			echo 'photo/human1.png';
		?>">
		<br>
		<!-- Change Profile Picture -->
		<?php
			if(User::loginId() == $tid){
		?>
	 <form method="post" enctype="multipart/form-data"> 
		<a onclick='uploadfile(this,"profilepic");' style="cursor:pointer;" >Change Profile Picture</a>
	 </form>
	 <?php
		}
	 ?>

		<div id="pic_upload" class="modal">
			<div class="modal-content">
				<h6 class="teal-text">Change Profile Picture</h6>
			</div>
			<div class="row">
				<form action="#" class="col s12 l6 offset-l3">
					<div class="row">
						<div class="file-field input-field col s12">
							<input class="file-path validate" type="text">
							<div class="btn waves-effect waves-light blue">
								<span>Upload</span>
								<input type="file">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<button type="submit" class="btn waves-effect waves-light white grey-text">Change</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End -->
	</div>
	<div class="col s12 l7" >
		<div class="row">
			<div class="col s12"><br>
				<h5 class="green-text text-darken-2 left"><?php echo $aboutinfo["name"]; ?></h5>
			</div>
		</div>
		<div class="row">
			<form class="col s12" onsubmit='form.req(this);return false;' data-action='updatebio' data-res='hideshowdown("bioedit", "biodisp");$("#biodisptext").html($("#biography").val());' >
				<div id='biodisp' >
					<div class="row">
						<div class="col s12 l7" data-onhover='hovercss(this, {"display":""}));' >
							<span id='biodisptext' ><?php echo Fun::smilymsg($aboutinfo["teachermoto"]); ?></span>
							<?php
								if(User::loginId() == $tid) {
							?>
							<span onclick='hideshowdown("biodisp", "bioedit");' class='edit' >Edit</span>
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<div style='display:none;' id='bioedit' >
					<div class="row"  >
						<div class="input-field col s12 l7">
							<textarea name="teachermoto" id="biography" class="materialize-textarea" placeholder="Write a small description about yourself." ><?php echo convchars($aboutinfo["teachermoto"]); ?></textarea>
							<label for="biography">Bio</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light blue" type="submit"><i class="material-icons left" data-waittext='Saving..' ></i>Save Changes</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



<div id="profile_info">

	<!-- Basic Details -->
	<div class="row">
		<div class="col s12">
			<h6 class="teal-text text-darken-1"><i class="material-icons left">perm_identity</i>Basic</h6>
		</div>
	</div>
	<div class="row">
		<div class="col s12 l6">
			<div class="row">
				<div class="col s12">
					Name :
					<span class="grey-text text-darken-1">
						<?php echo Fun::smilymsg($firstName) ." ". Fun::smilymsg($lastName); ?>
					</span>
				</div>
			</div>
			<?php
				if($cansee) {
			?>
			<div class="row">
				<div class="col s12">
					Email :
					<span class="grey-text text-darken-1">
						<?php echo $aboutinfo['email']; ?>
					</span>
				</div>
			</div>
			<?php
				}
			?>
			<div class="row">
				<div class="col s12">
					Birthday :
					<span class="grey-text text-darken-1">
						<?php echo date('d-m-Y',$aboutinfo['dob']); ?>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					Gender :
					<span class="grey-text text-darken-1">
					<?php
					if (Fun::smilymsg($aboutinfo['gender']) == 'm')
						echo 'Male';
					else if (Fun::smilymsg($aboutinfo['gender']) == 'f')
						echo 'Female';
					else
						echo 'Other';
					?>
					</span>
				</div>
			</div>
		</div>
		<div class="col s12 l6">
			<div class="row">
				<div class="col s12">
					Address :<br>
					<span class="grey-text text-darken-1">
						<?php echo Fun::smilymsg($jsonArray['city']) ."<br>". Fun::smilymsg($jsonArray['state']) .", ". Fun::smilymsg($jsonArray['zipcode']) ."<br>". Fun::smilymsg($jsonArray['country']); ?>
					</span>
				</div>
			</div>
			<?php
				if($cansee) {
			?>
			<div class="row">
				<div class="col s12">
					Mobile Number :
					<span class="grey-text text-darken-1">
						<?php echo Fun::smilymsg($aboutinfo['phone']); ?>
					</span>
				</div>
			</div>
			<?php
				}
			?>
			<?php
				if($cansee) {
			?>
			<div class="row">
				<div class="col s12">
					Resume :
					<span class="grey-text text-darken-1">
						<a href="<?php echo $ejsoninfo["resume"] ; ?>">Click to see</a>
					</span>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>

	<!-- Teaching Details -->
	<?php
	if(false) {
	?>
	<div class="row">
		<div class="col s12">
			<h6 class="teal-text text-darken-1"><i class="material-icons left">subject</i>Teaching Details</h6>
		</div>
	</div>
	<div class="row">
		<div class="col s12 l3">
			Subjects :
			<span class="grey-text text-darken-1">
				<ul>
					<?php
						foreach ($subArray as $value) {
							echo '<li>'.$value.'</li>';
						}
					?>
				</ul>
			</span>
		</div>
		<div class="col s12 l2">
			Grades :
			<span class="grey-text text-darken-1">
				<ul>
					<?php
						foreach ($gradeArray as $value) {
							echo '<li>'.$value.'</li>';
						}
				 ?>
				</ul>
			</span>
		</div>
		<div class="col s12 l4">
			Languages :
			<span class="grey-text text-darken-1">
				<ul>
					<?php
						foreach ($langArray as $value) {
							echo '<li>'.$value.'</li>';
						}
				 ?>
				</ul>
			</span>
		</div>
	</div>
	<?php
		}
	?>

	<!-- Education and Qualification Details -->
	<div class="row">
		<div class="col s12">
			<h6 class="teal-text text-darken-1"><i class="material-icons left">school</i>Education and Qualifications</h6>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="col s12">
					College :
					<span class="grey-text text-darken-1">
						<?php echo 'IIT '. $jsonArray['college']; ?>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					Degree :
					<span class="grey-text text-darken-1">
						<?php
						echo Fun::smilymsg($jsonArray['degree']);
						if ($jsonArray['degreeother'] != '')
							echo ' , '.Fun::smilymsg($jsonArray['degreeother']);
						?>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					Branch :
					<span class="grey-text text-darken-1">
						<?php echo Fun::smilymsg($jsonArray['branch']); ?>
					</span>
				</div>
			</div>
		</div>
	</div>

</div>
