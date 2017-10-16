<?php include('templates/header.php'); ?>


<div class="container">
<h3>View All Posts</h3>	
<?php echo anchor('index.php/welcome/create', 'Add Post', ['class'=>'btn btn-primary']); ?>   
<?php if($msg = $this->session->flashdata('msg')):?>
<?php echo $msg;?>
<?php endif ?>
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Creation Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php if(count($posts)):?>
  		<?php foreach($posts as $post):?>
    <tr>
      <td><?php echo $post->title;?></td>
      <td><?php echo $post->description;?></td>
      <td><?php echo $post->date_created;?></td>
      <td>
      		<?php echo anchor("index.php/welcome/view/{$post->id}", 'View', ['class'=>'label label-success'])?>
      		<?php echo anchor("index.php/welcome/update/{$post->id}", 'Update', ['class'=>'label label-warning'])?>
      		<?php echo anchor("index.php/welcome/delete/{$post->id}", 'Delete', ['class'=>'label label-danger'])?>
      </td>
    </tr>
     <?php endforeach; ?>
        <?php else: ?>
			<tr>No Records Found!</tr>
    <?php endif; ?>
  </tbody>
</table> 
</div>
<?php include('templates/footer.php'); ?>