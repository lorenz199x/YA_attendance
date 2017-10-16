
<?php include('templates/header.php'); ?>

<div class="container">
	<h1>Login</h1>

	<?php
	 echo form_open('/main/login_validation', ['class'=>'form-horizontal']);

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
      <div class="col-lg-5 col-lg-offset-2">
        <?php echo form_submit(['name'=>'login_submit','value'=>'Login','class'=>'btn btn-primary']); ?>	
 		<a href="<?php echo base_url().'main/signup' ?>" class="btn btn-primary">Sign Up!</a>
      </div>
    </div>
	<?php
	 echo form_close();
	 ?>
</div> 
<?php include('templates/footer.php'); ?>
