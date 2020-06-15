<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<form method="post" action="<?php echo base_url().'courses/update_course/'.$course->id;  ?>

"  >

	<fieldset>

		<legend><?php echo $page_title; ?></legend>

		<table>

			<tr>

				<td width="16%"><label>Course Name</label></td>

				<td width="25%"><input type="text" name="course_name" value="<?= set_value('course_name',$course->course_name) ?>" ></td>
				<td width="59%"><?= form_error('course_name'); ?></td>
			</tr>

			<tr>

				<td><label>Course Code</label></td>

				<td><input type="text" name="course_code"  value="<?= set_value('course_code',$course->course_code) ?>" ></td>
				<td><?= form_error('course_code'); ?></td>
			</tr>

			<tr>

				<td><label>Course Hour</label></td>

				<td><input type="text" name="course_hour" value="<?= set_value('course_hour',$course->course_hour) ?>" ></td>
				<td><?= form_error('course_hour'); ?></td>
			</tr>
			
			<tr>

				<td><label>Template</label></td>

				<td>
					<?php if (set_value('template',$course->template)==''): ?>
						<input type="radio" name="template" value="1" checked>Sky
						<input type="radio" name="template" value="2">Orange
					<?php endif; ?>

					<?php if (set_value('template',$course->template)==1): ?>
						<input type="radio" name="template" value="1" checked>Sky
						<input type="radio" name="template" value="2">Orange
					<?php endif; ?>

					<?php if (set_value('template',$course->template)==2): ?>
						<input type="radio" name="template" value="1" >Sky
						<input type="radio" name="template" value="2" checked>Orange
					<?php endif; ?>
					
				</td>
				<td><?= form_error('template'); ?></td>
			</tr>	

			<tr>

				<td></td>
				<td colspan="2"><input type="submit" name="submit" value="Update"></td>
			</tr>

		</table>

	</fieldset>

</form>
<p><?= anchor('courses','Back',['class'=>'btn']) ?></p>

