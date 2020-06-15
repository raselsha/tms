<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<p><a href="<?php echo base_url(); ?>students/new_student" class="btn">Add new</a></p>


<table class="table" cellspacing="0" cellpadding="5">
	<tr>
		<td width="25%" valign="top"> 
			<?php 
				$image =$student->id.'_'.$student->image;
				if (file_exists('images/students/'.$image)) {
					$image = base_url().'images/students/'.$student->id.'_'.$student->image;
					echo '<img src="'.$image.'" width="230">';
				}
				else{
					$image = base_url().'images/profile.png';
					echo '<img src="'.$image.'" width="230">';
				}
			 ?>
		</td>
		<td width="35%" valign="top">
			<table cellpadding="5" cellspacing="0">
				<tr >
					<td width="45%"><b>Name</b></td>
					<td width="55%"><?= $student->name ?> </td>
				</tr>
				<tr>
					<td><b>Student Id</b></td>
					<td><?= $student->student_id ?></td>
				</tr>
				<tr>
					<td><b>Mobile</b></td>
					<td><?= $student->mobile ?></td>
					
				</tr>
				<tr>
					<td><b>Emergency</b></td>
					<td><?= $student->emergency ?></td>
				</tr>
				<tr>
					<td><b>Birth Certificate</b></td>
					<td><?= $student->bid ?></td>
				</tr>
				<tr>
					<td><b>National ID</b></td>
					<td><?= $student->nid ?></td>
				</tr>
				<tr>
					<td><b>Gender</b></td>
					<td>
						<?php 
						if ($student->gender==1) {
							echo 'Male';
						}
						elseif($student->gender==2){
							echo 'Female';
						}?>
					</td>
				</tr>
				<tr>	
					<td><b>Blood Group</b></td>
					<td style="text-transform: uppercase;"><?= $student->blood ?></td>
				</tr>
			</table>
		</td>
		<td width="40%" valign="top">
			<table cellpadding="5" cellspacing="0">
				<tr>
					<td ><b>Present Address</b></td>
				</tr>
				<tr>
					<td height="82" valign="top"><small><?= $student->present_address ?></small></td>
				</tr>

				<tr>
					<td ><b>Permanent Address</b></td>
				</tr>
				<tr>
					<td height="82" valign="top"><small><?= $student->permanent_address ?></small></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="right">
			<?php echo  
				'<a href="'.base_url().'students/edit_student/'.$student->id.'" class="edit">Edit</a>',
				 '<a href="'.base_url().'students/delete_student/'.$student->id.'" class="delete">Delete</a>',
				'<a href="'.base_url().'enrolled/new_enroll/'.$student->id.'" class="generate">Enroll</a>';
			 ?>
			
		</td>
	</tr>
</table>
<br>
<h2>You joined in this batch</h2>
<table cellspacing="0" cellpadding="5">

<thead>

	<th>Batch Id</th>

	<th>Course Name</th>

	<th>Start Date</th>

	<th>End Date</th>

	<th>Shift</th>

	<th>Status</th>

	<th>Action</th>

</thead>

	<?php foreach ($enrolled as $enroll): ?>
		<tr>
			<td><a href="<?= base_url() ?>batches/single_batch/<?= $enroll->batch_id ?>">Batch# <?=$enroll->batch_id ?></a></td>
			
		<td><a href="<?= base_url() ?>courses/single_course/<?= $enroll->course_id ?>"><?= $enroll->course_name.'-'.$enroll->batch_no ?></a></td>

		<td><?= $enroll->start_date; ?></td>
		
		<td><?= $enroll->end_date;  ?></td>

		<td>
		<?php 
			if ($enroll->batch_shift==1) {
				echo 'Morning';
			}
			elseif($enroll->batch_shift==2){
				echo 'After Noon';
			}
			elseif($enroll->batch_shift==3){
				echo 'Evening';
			}
		?>
		</td>
		<td>
			<?php 
				if ($enroll->batch_status==1) {
					echo '<span class="error">Running</span>';
				}
				elseif($enroll->batch_status==2){
					echo '<span class="success">Completed</span>';
			}?>
		</td>
		<td>
			<a href="<?= base_url().'students/print_id_card/'.$student->id.'/'.$enroll->batch_id ?>" class="generate" target="_blank">Get Idcard</a>
			<?php if ($enroll->batch_status==2) :?>
				<a href="<?= base_url().'students/print_certificate/'.$student->id.'/'.$enroll->batch_id ?>" class="generate" target="_blank">Get Certificate</a>
			<?php else: ?>
				<a href="<?= base_url().'enrolled/delete_enroll/'.$student->id.'/'.$enroll->batch_id ?>" class="delete">Discard</a>
			<?php endif; ?>
		</td>
	<?php endforeach; ?>


 </table>
<p>
<?= anchor('students','Back',['class'=>'btn']) ?>
	
</p>

