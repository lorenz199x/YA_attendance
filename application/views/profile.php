<?php include('templates/header.php'); ?>

<div class="container">

		<div class="row">
			<div class="col-lg-6">
				<h1>Profile Page</h1>
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
	</div>	

		<?php
	 echo form_open('/main/user_profile', ['class'=>'form-horizontal']);

	 echo validation_errors();
	?>

	 <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-5">
        <?php echo form_input('username',$this->input->post('username'),['class'=>'form-control']); ?>
      </div>
    </div>

    <div class="form-group">
      <label for="input" class="col-lg-2 control-label">User Role</label>
      <div class="col-lg-5">
    	<?php echo form_input('user-role','Admin',['class'=>'form-control']); ?>
      </div>
    </div>

     <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-5">
    	<?php echo form_input('user-role',$this->input->post('name'),['class'=>'form-control']); ?>
      </div>
    </div>

    <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-5">
    	<?php echo form_input('user-role',$this->input->post('address'),['class'=>'form-control']); ?>
      </div>
    </div>

    <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Contact</label>
      <div class="col-lg-5">
    	<?php echo form_input('user-role',$this->input->post('contact'),['class'=>'form-control']); ?>
      </div>
    </div>


	 <div class="form-group">
      <div class="col-lg-5 col-lg-offset-2">
        <?php echo form_submit(['name'=>'update_submit','value'=>'Update','class'=>'btn btn-success']); ?>	
      </div>
    </div>
	  	

	 <?php	
	 echo form_close();
	 ?>



</div>

<?php include('templates/footer.php'); ?>