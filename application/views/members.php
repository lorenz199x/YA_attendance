<?php include('templates/header.php'); ?>

<div class="container">

		<div class="row">
		<div class="col-lg-6">
				<h1>Members Page</h1>
			</div>
		<div class="col-lg-6">
			<div class="btn-group" style="float: right;">
			  <a href="<?php echo base_url(); ?>main/members/#" class="btn btn-primary">Hi <?php echo $_SESSION['username']; ?></a>
			  <a href="<?php echo base_url(); ?>/#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
			  <ul class="dropdown-menu">
			    <li><a href="<?php echo base_url(); ?>main/profile/#">Profile</a></li>
			    <li class="divider"></li>
			    <li><a href='<?php echo base_url()."main/logout" ?>'>Logout?</a></li>
			  </ul>
			</div>
		</div>

		<div class="col-lg-12" style="text-align: center;" >
			<a href='<?php echo base_url()."main_attendance/" ?>'><button class="btn btn-success" >Our Attendance</button></a>

			<a href='<?php echo base_url()."main/attendance" ?>'><button class="btn btn-success" >October Praise Attendance</button></a>
		</div>
			

		</div>	
	</div>	
</div>
<?php include('templates/footer.php'); ?> 