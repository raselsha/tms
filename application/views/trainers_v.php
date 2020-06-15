<?php $this->load->view('alert_message'); ?>

<h2><?php echo $page_title; ?></h2>
<p><a href="<?php echo base_url(); ?>trainers/new_trainer" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5">

<thead>

	<th>Sl</th>

	<th>Trainers Name</th>

	<th>Mobile</th>

	<th>Email</th>

	<th>Action</th>

</thead>

<?php 

	$sl=$this->uri->segment(3,0);

	foreach ($trainers as $trainer) {

		echo '<tr>';

		echo '<td>'.++$sl.'</td>';

		echo '<td><a href="'.base_url().'trainers/single_trainer/'.$trainer->id.'">'.$trainer->trainers_name.'</a></td>';

		echo '<td>'.$trainer->trainers_mobile.'</td>';

		echo '<td>'.$trainer->trainers_email.'</td>';

			
		echo '<td><a href="'.base_url().'trainers/edit_trainer/'.$trainer->id.'" class="edit">Edit</a>';

		echo '<a href="'.base_url().'trainers/delete_trainer/'.$trainer->id.'" class="delete">Delete</a></td>';

		echo '<tr>';



	}

 ?>

 </table>

<div class="pagination">

	<?= $this->pagination->create_links(); ?>

</div>
<p><?= anchor('dashboard','Back',['class'=>'btn']) ?></p>