
<?php include('templates/header.php'); ?>
<div class="container">
	<h1>Sign Up</h1>

	<?php
	 echo form_open('/main/signup_validation', ['class'=>'form-horizontal']);

	 echo validation_errors();
	?>

	 <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-5">
        <?php echo form_input('username',$this->input->post('username'),['class'=>'form-control']); ?>
      </div>
    </div>


	 <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-5">
        <?php echo form_input('password',$this->input->post('password'),['class'=>'form-control']); ?>
      </div>
    </div>


	 <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Confirm Password</label>
      <div class="col-lg-5">
        <?php echo form_password('cpassword',$this->input->post('cpassword'),['class'=>'form-control']); ?>
      </div>
    </div>


	 <div class="form-group">
      <div class="col-lg-5 col-lg-offset-2">
        <?php echo form_submit(['name'=>'signup_submit','value'=>'Sign Up','class'=>'btn btn-success']); ?>	
      </div>
    </div>
	  	

	 <?php	
	 echo form_close();
	 ?>
</div>
<?php include('templates/footer.php'); ?>
