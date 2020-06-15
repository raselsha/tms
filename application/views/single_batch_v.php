<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<p><a href="<?php echo base_url(); ?>batches/new_batch" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5" class="table">

	<tr>
		<th>Batch Id</th>

		<th>Course Name</th>

		<th>Trainer</th>

		<th>Start DAte</th>

		<th>End DAte</th>

		<th>Shift</th>

		<th>Status</th>

		<th>Action</th>
	</tr>

<?php 

	echo '<tr>';

	echo '<td><a href="'.base_url().'batches/single_batch/'.$batch->id.'" >Batch# '.$batch->id.'</a></td>';

	echo '<td>'.$batch->course_name.' - '.$batch->batch_no.'</td>';

	echo '<td>'.$batch->trainers_name.'</td>';

	echo '<td>'.$batch->start_date.'</td>';

	echo '<td>'.$batch->end_date.'</td>';

	if ($batch->batch_shift==1) {
		echo '<td>Morning</td>';
	}
	
	elseif ($batch->batch_shift==2) {
		echo '<td>After noon</td>';
	}

	elseif($batch->batch_shift==3) {
		echo '<td>Evenning</td>';
	}

	if ($batch->batch_status==1) {
		echo '<td class="error">Running</td>';
	}

	elseif($batch->batch_status==2) {
		echo '<td class="success">Completed</td>';
	}

	echo '<td><a href="'.base_url().'batches/edit_batch/'.$batch->id.'" class="edit">Edit</a>';

	echo '<a href="'.base_url().'batches/delete_batch/'.$batch->id.'" class="delete">Delete</a></td>';

	echo '<tr>';


 ?>

 </table>

<?php if ($students) : ?>

<h2>Student list of this Batch</h2>
 <table cellspacing="0" cellpadding="5">

 <thead>
 	<th>Sl</th>

 	<th>Name</th>

 	<th>Student Id</th>

 	<th>Mobile</th>

 	<th>Gender</th>

 	<th>Ref</th>

 	<th>Action</th>

 </thead>

 <?php 

 	$sl=0;

 	foreach ($students as $student) :?>
 		<tr>
			<td><?= ++$sl; ?></td>
 			<td><a href="<?= base_url().'students/single_student/'.$student->id;?>" target="_blank"><?= $student->name ?></a></td>
 			<td><?=$student->student_id; ?></td>
 			<td><?=$student->mobile; ?></td>
 			<?php if($student->gender==1) : ?>
 				<td>Male</td>
 			<?php else: ?>
 				<td>Female</td>
 			<?php endif; ?>
 			<td><?=$student->ref; ?></td>
	 		<td width="17%">
	 			<a href="<?= base_url().'students/print_id_card/'.$student->id.'/'.$batch->id ?>" class="generate" target="_blank">Get Idcard</a>
	 			<?php if ($batch->batch_status==2) :?>
				<a href="<?= base_url().'students/print_certificate/'.$student->id.'/'.$batch->id ?>" class="generate" target="_blank">Get Certificate</a>
				<?php else: ?>
					<a href="<?= base_url().'enrolled/delete_enroll/'.$student->id.'/'.$batch->id ?>" class="delete">Discard</a>
				<?php endif; ?>
	 		</td>
 		</tr>
	<?php endforeach; ?>
  </table>
<?php endif; ?>
 <div class="pagination">

 	<?= $this->pagination->create_links(); ?>

 </div>
<p><?= anchor('batches','Back',['class'=>'btn']) ?></p>