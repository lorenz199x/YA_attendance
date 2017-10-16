<?php include('templates/header.php'); ?>
<div class="container">

	<div class="row">
		<div class="col-lg-12">
				<center><h1>Youth Service Attendance</h1></center><br/>
		</div>
	  	
			<div class="col-lg-6">
			<div class="panel panel-danger">
			  <div class="panel-heading">
			    <h3 class="panel-title">Date</h1>
			  </div>
			  <div class="panel-body">
			    <h1><?php echo date("F d, Y - l "); ?></h1>
			  </div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Add New</h3>
			  </div>
			  <div class="panel-body">
			    
	
<?php
	 echo form_open('main/weekly_attendance_validation', ['class'=>'form-horizontal']);

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
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-warning">
			  <div class="panel-heading">
			    <h3 class="panel-title">Panel primary</h3>
			  </div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title">Panel primary</h3>
			  </div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
		</div>
	</div>		
</div>	
<?php include('templates/footer.php'); ?>