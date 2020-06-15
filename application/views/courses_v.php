<?php $this->load->view('alert_message'); ?>

<h2><?php echo $page_title; ?></h2>
<p><a href="<?php echo base_url(); ?>courses/new_course" class="btn">Add new</a></p>

<table cellspacing="0" cellpadding="5">

<thead>

	<th>Sl</th>

	<th>Course Name</th>

	<th>Course Code</th>

	<th>Course hour</th>

	<th>Template</th>

	<th>Action</th>

</thead>

<?php 

	$sl=$this->uri->segment(3,0);

	foreach ($courses as $course) {

		echo '<tr>';

		echo '<td>'.++$sl.'</td>';

		echo '<td><a href="'.base_url().'courses/single_course/'.$course->id.'">'.$course->course_name.'</a></td>';

		echo '<td>'.$course->course_code.'</td>';

		echo '<td>'.$course->course_hour.'hr</td>';

		if ($course->template==1) {
			echo '<td>Sky</td>';
		}

		if ($course->template==2) {
			echo '<td>Orange</td>';
		}
		
		echo '<td><a href="'.base_url().'courses/edit_course/'.$course->id.'" class="edit">Edit</a>';

		echo '<a href="'.base_url().'courses/delete_course/'.$course->id.'" class="delete">Delete</a></td>';

		echo '<tr>';



	}

 ?>

 </table>

<div class="pagination">

	<?= $this->pagination->create_links(); ?>

</div>
<p><?= anchor('dashboard','Back',['class'=>'btn']) ?></p>