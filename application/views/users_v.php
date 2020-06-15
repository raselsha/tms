<?php $this->load->view('alert_message'); ?>

<h2><?php echo $page_title; ?></h2>
<p><a href="<?php echo base_url(); ?>users/new_user" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5">

<thead>

	<th>Sl</th>

	<th>User Name</th>

	<th>User role</th>

	<th>Action</th>

</thead>

<?php 

	$sl=$this->uri->segment(3,0);

	foreach ($users as $user) {

		echo '<tr>';

		echo '<td>'.++$sl.'</td>';

		echo '<td><a href="'.base_url().'users/single_user/'.$user->id.'">'.$user->user_name.'</a></td>';
		
		if ($user->user_role==1) {
			echo '<td>Admin</td>';
		}
		if ($user->user_role==2) {
			echo '<td>Manager</td>';
		}

		echo '<td><a href="'.base_url().'users/edit_user/'.$user->id.'" class="edit">Edit</a>';

		echo '<a href="'.base_url().'users/delete_user/'.$user->id.'" class="delete">Delete</a></td>';

		echo '<tr>';



	}

 ?>

 </table>

<div class="pagination">

	<?= $this->pagination->create_links(); ?>

</div>
<p><?= anchor('dashboard','Back',['class'=>'btn']) ?></p>