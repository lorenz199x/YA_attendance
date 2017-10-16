
<div class="container">
	<div class="row">
		<div class="col-lg-12">
				<center><h2>Youth Service Attendance</h2></center><br/>
		</div>
	  	
	  	<?php
		echo form_open('main_attendance/present_youth', ['class'=>'form-horizontal']);
		?>

		<div class="col-lg-6">
			<div class="panel panel-warning">
			  <div class="panel-heading">
			    <h3 class="panel-title">Select Present</h3>
			  </div>
			  <div class="panel-body">
			  		<?php if($msg1 = $this->session->flashdata('msg1')):?>
					<span style="color: red;" ><?php echo $msg1;?></span>
					<?php endif ?>	
			  	
			    <select class="form-control" id="name" name="name">
			    	<option></option>
			    	<?php if(count($members)):?>
  					<?php foreach($members as $member):?>
			    	<option><?php echo $member->name;?></option>
			    	<?php endforeach; ?>
			        <?php else: ?>
						<option>No Records Found!</option>
			    	<?php endif; ?>
			    </select>	
				
			    
				<br/>
			      
			        <?php echo form_submit(['name'=>'present','value'=>'Present','id'=>'btn-full','class'=>'btn btn-warning']); ?>	
			      
			     <?php	
				 echo form_close();
				 ?>
			     	
			  </div>
			</div>
		</div>


			<div class="col-lg-6">
			<div class="panel panel-danger">
			  <div class="panel-heading">
			    <h3 class="panel-title">Date</h1>
			  </div>
			  <div class="panel-body">
			    <h1><?php   echo date("F d, Y - l "); ?></h1>
			  </div>
			</div>
		</div>






	</div>

	<div class="row">
		
				<div class="col-lg-6">
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Add New</h3>
			  </div>
			  <div class="panel-body">
			    
	<?php
	echo form_open('main_attendance/weekly_attendance_validation', ['class'=>'form-horizontal newattendance']);
	?>
	<?php if($msg = $this->session->flashdata('msg')):?>
<span style="color: red;" ><?php echo $msg;?></span>
<?php endif ?>	
	<div class="form-group" style="margin-top: 13px;">
      <label for="input" class="col-lg-2 control-label">Name:</label>
      <div class="col-lg-10">
        <?php echo form_input('name',$this->input->post('name'),['class'=>'form-control']); ?>
        <span style="color: red;"><?php echo form_error('name'); ?></span>
      </div>
    </div>

	<div class="form-group">
      <label for="input" class="col-lg-2 control-label">Contact:</label>
      <div class="col-lg-10">
        <?php echo form_input('contact',$this->input->post('contact'),['class'=>'form-control']); ?>
        <span style="color: red;"><?php echo form_error('contact'); ?></span>
      </div>
    </div>

	<div class="form-group">
      <label for="input" class="col-lg-2 control-label">Birthdate:<h6>2017-12-25</h6></label>
      <div class="col-lg-10">
        <?php echo form_input('birthdate',$this->input->post('birthdate'),['class'=>'form-control']); ?>
        <span style="color: red;"><?php echo form_error('birthdate'); ?></span>
      </div>
    </div>

	<div class="form-group">
      <label for="input" class="col-lg-2 control-label">New or Regular:</label>
      <div class="col-lg-10">
         <select class="form-control" id="type" name="type">
          <option value="Regular">Regular Attendee</option>
          <option value="New">New Attendee</option>
        </select>
        <span style="color: red;"><?php echo form_error('type'); ?></span>
      </div>
    </div>			    

	<div class="form-group">
      <div class="col-lg-6">
        <?php echo form_submit(['name'=>'yaattendance_submit','value'=>'Add New','id'=>'btn-full','class'=>'btn btn-success']); ?>	
      </div>
       <div class="col-lg-6">
        <?php echo form_submit(['name'=>'yamembers_submit','value'=>'View all members','id'=>'btn-full','class'=>'btn btn-success']); ?>	
      </div>
    </div>
	  	

	 <?php	
	 echo form_close();
	 ?>


			  </div>
			</div>
		</div>


		<div class="col-lg-6">
			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title">View Reports</h3>
			  </div>
			  <div class="panel-body">
			  	<div class="row">
				<div class="col-lg-4">
				 <a href="<?php echo base_url(); ?>main_attendance/presentToday" class="btn btn-info">Present Today</a>

				</div> 
				<div class="col-lg-4">
				<?php echo form_submit(['name'=>'present','value'=>'Present by Month','id'=>'btn-full','class'=>'btn btn-info']); ?>	
				</div>
				<div class="col-lg-4">
				<?php echo form_submit(['name'=>'present','value'=>'Present by Week','id'=>'btn-full','class'=>'btn btn-info']); ?>	
				</div> 		
			  	</div>
			  <br/>
			  	<div class="row">
				<div class="col-lg-4">
				<?php echo form_submit(['name'=>'present','value'=>'Birthday this month','id'=>'btn-full','class'=>'btn btn-info']); ?>	
				</div> 
				<div class="col-lg-4">
				<?php echo form_submit(['name'=>'present','value'=>'List of Absent','id'=>'btn-full','class'=>'btn btn-info']); ?>	
				</div>
				<div class="col-lg-4">
				<?php echo form_submit(['name'=>'present','value'=>'List of New Attendees','id'=>'btn-full','class'=>'btn btn-info']); ?>	
				</div> 		
			  	</div>
			      	
			  </div>
			</div>
		</div>
	</div>		
</div>	