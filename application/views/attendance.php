<?php include('templates/header.php'); ?>

<div class="container">

<div class="col-lg-6">
				<h2>Octoberpraise 2017 Registration</h2>
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

<div class="col-lg-9" style="margin-top: 3%;">

		<?php
	     echo form_open('/main/event_attendance_validation', ['class'=>'form-horizontal']);
	  ?>


	 <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Fullame:</label>
      <div class="col-lg-9">
        <?php echo form_input('name',$this->input->post('name',FALSE),['class'=>'form-control']); ?>
        <span style="color: red;"><?php echo form_error('name'); ?></span>
      </div>
    </div>

    <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Contact:<h6>(eg. 09123456789)</h6></label>
      <div class="col-lg-9">
    	<?php echo form_input('contact',$this->input->post('contact',FALSE),['class'=>'form-control']); ?>
    	<span style="color: red;"><?php echo form_error('contact'); ?></span>
      </div>
    </div>

    <div class="form-group">
      <label for="input" class="col-lg-2 control-label">School:<h6>(if you're student)</h6></label>
 	 <div class="col-lg-9">
       <select class="form-control" id="school" name="school">
          <option value="" class="theschool"></option>
          <option value="WCC Caloocan" class="theschool">World Citi Colleges</option>
          <option value="CHS" class="theschool">Caloocan High School</option>
          <option value="STI" class="theschool" >STI Caloocan</option>
          <option value="OLFU" class="theschool">OLFU</option>
          <option value="Others" class="theschool">Other School</option>
        </select>
        <span style="color: red;"><?php echo form_error('school'); ?></span>
     </div>   
   </div>

	<div  id="otherschool" class="form-group" style="display: none;" >
      <label for="input" class="col-lg-2 control-label">Other School:</label>
      <div class="col-lg-9">
    	<?php echo form_input('otherschool',$this->input->post('otherschool'),['class'=>'form-control']); ?>
    	<span style="color: red;"><?php echo form_error('otherschool'); ?></span>
      </div>
    </div>

<script type="text/javascript">
	
	$('#school').bind('change', function(event) {

           var i= $('#school').val();

            if(i=="Others") // equal to a selection option
             {
                 $('div#otherschool').show();
             }
           else if(i !="Others")
             {
               $('div#otherschool').hide(); // hide the first one
             

              }
});

</script>


 

	 <div class="form-group">
      <div class="col-lg-9 col-lg-offset-2">
        <?php echo form_submit(['name'=>'octoberpraise_submit','value'=>'Submit','id'=>'btn-oct','class'=>'btn btn-warning']); ?>	
      </div>
    </div>
	  	

	 <?php	
	 echo form_close();
	 ?>

</div>
<div class="col-lg-3">
	<br/>
	<br/>

	<img src="<?php echo base_url('assets/img/power.jpg'); ?>" width="100%"/img>
	<br/>
	<h4>PLEASE LIKE US ON FACEBOOK</h4>
	<span>FB.COM/YouthAliveCaloocan</span>
	<br/><a href='<?php echo base_url()."main/attendancelist" ?>'>VIew All</a>			
</div>
</div>

<style>
.form-control {
    height: 70px;
    font-size: 30px;
    }	
 .form-horizontal .control-label {
    text-align: left;
    margin-bottom: 0;
    padding-top: 11px;
    font-size: 20px;
}   

input#btn-oct {
    width: 100%;
}
</style>

<?php include('templates/footer.php'); ?>