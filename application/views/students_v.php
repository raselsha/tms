<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<p><a href="<?php echo base_url(); ?>students/new_student" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5">

<thead>
	<th>Sl</th>

	<th>Name</th>

	<th>Student Id</th>

	<th>Mobile</th>

	<th>Image</th>

	<th>Ref</th>

	<th>Action</th>

</thead>

<?php 

	$sl=$this->uri->segment(3,0);

	foreach ($students as $student) {

		echo '<tr>';

		echo '<td>'.++$sl.'</td>';

		echo '<td><a href="'.base_url().'students/single_student/'.$student->id.'">'.$student->name.'</a></td>';

		echo '<td>'.$student->student_id.'</td>';

		echo '<td>'.$student->mobile.'</td>';

		if ($student->image) {
			echo '<td><i class="fa fa-photo success"></i></td>';
		}
		else{
			echo '<td><i class="fa fa-times error"></i></td>';
		}
		
		echo '<td>'.$student->ref.'</td>';

		echo '<td><a href="'.base_url().'students/edit_student/'.$student->id.'" class="edit">Edit</a>';

		echo '<a href="'.base_url().'students/delete_student/'.$student->id.'" class="delete">Delete</a>';
		echo '<a href="'.base_url().'enrolled/new_enroll/'.$student->id.'" class="generate">Enroll</a>';
		echo '<tr>';
	}

 ?>

 </table>

<div class="pagination">

	<?= $this->pagination->create_links(); ?>

</div>
<p>
<?= anchor('dashboard','Back',['class'=>'btn']) ?>
	
</p>