<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>
<p><a href="<?php echo base_url(); ?>batches/new_batch" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5">

<thead>

	<th>Sl</th>

	<th>Batch Id</th>

	<th>Course Name</th>

	<th>Start DAte</th>

	<th>End DAte</th>

	<th>Shift</th>

	<th>Status</th>

	<th>Action</th>

</thead>

<?php 

	$sl=$this->uri->segment(3,0);

	foreach ($batches as $batch) {

		echo '<tr>';

		echo '<td>'.++$sl.'</td>';

		echo '<td><a href="'.base_url().'batches/single_batch/'.$batch->id.'">Batch# '.$batch->id.'</a></td>';


		echo '<td>'.$batch->course_name.' - '.$batch->batch_no.'</td>';

		echo '<td>'.$batch->start_date.'</td>';

		echo '<td>'.$batch->end_date.'</td>';
		
		if ($batch->batch_shift==1) {
			echo '<td>Morning</td>';
		}
		
		if ($batch->batch_shift==2) {
			echo '<td>After noon</td>';
		}
		
		if ($batch->batch_shift==3) {
			echo '<td>Evenning</td>';
		}
		
		if ($batch->batch_status==1) {
		echo '<td class="error"> Running </td>';
		}

		if ($batch->batch_status==2) {
		echo '<td class="success"> Completed </td>';
		}

		echo '<td><a href="'.base_url().'batches/edit_batch/'.$batch->id.'" class="edit">Edit</a>';

		echo '<a href="'.base_url().'batches/delete_batch/'.$batch->id.'" class="delete">Delete</a></td>';

		echo '<tr>';

	}

 ?>

 </table>

<div class="pagination">

	<?= $this->pagination->create_links(); ?>

</div>
<p><?= anchor('dashboard','Back',['class'=>'btn']) ?></p>