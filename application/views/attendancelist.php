<?php include('templates/header.php'); ?>


<div class="container">
<h3>Octoberpraise 2017 Registration</h3>	
<a href='<?php echo base_url()."main/attendance" ?>' class="btn btn-primary">Go Back</a>
<?php if($msg = $this->session->flashdata('msg')):?>
<?php echo $msg;?>
<?php endif ?>
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Contact</th>
      <th>School</th>
      <th>Other School</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php if(count($posts)):?>
  		<?php foreach($posts as $post):?>
    <tr>
      <td><?php echo $post->name;?></td>
      <td><?php echo $post->contact;?></td>
      <td><?php echo $post->school;?></td>
      <td><?php echo $post->otherschool;?></td>
      <td><?php echo anchor("/main/delete_attendee/{$post->id}", 'Delete', ['class'=>'label label-danger'])?></td> 
    </tr>
     <?php endforeach; ?>
        <?php else: ?>
			<tr>No Records Found!</tr>
    <?php endif; ?>
  </tbody>
</table> 
</div>
<?php include('templates/footer.php'); ?>