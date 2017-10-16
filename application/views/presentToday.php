<?php include('templates/header.php'); ?>


<div class="container">
<h3>Attendance Today</h3>	
<a href='<?php echo base_url()."/main_attendance" ?>' class="btn btn-primary">Go Back</a>
<?php if($msg = $this->session->flashdata('msg')):?>
<?php echo $msg;?>
<?php endif ?>
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
  	<?php if(count($posts)):?>
  		<?php foreach($posts as $post):?>
    <tr>
      <td><?php echo $post->name;?></td>
    </tr>
     <?php endforeach; ?>
        <?php else: ?>
			<tr>No Records Found!</tr>
    <?php endif; ?>
  </tbody>
</table> 
</div>
<?php include('templates/footer.php'); ?>