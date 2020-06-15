<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>
<p><a href="<?php echo base_url(); ?>trainers/new_trainer" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5" class="table">

<tr>

	<th>trainers Name</th>

	<th>Mobile</th>

	<th>Email</th>

	<th>Action</th>

</tr>

<?php 



	echo '<tr>';

	echo '<td>'.$trainer->trainers_name.'</td>';

	echo '<td>'.$trainer->trainers_mobile.'</td>';

	echo '<td>'.$trainer->trainers_email.'</td>';

	echo '<td><a href="'.base_url().'trainers/edit_trainer/'.$trainer->id.'" class="edit">Edit</a>';

	echo '<a href="'.base_url().'trainers/delete_trainer/'.$trainer->id.'" class="delete">Delete</a></td>';

	echo '<tr>';



 ?>

 </table>

<div class="pagination">

	<?= $this->pagination->create_links(); ?>

</div>
<p><?= anchor('trainers','Back',['class'=>'btn']) ?></p>