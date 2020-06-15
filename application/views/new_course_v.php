<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<form method="post" action="<?php echo base_url();  ?>

courses/save_course"  >

	<fieldset>

		<legend><?php echo $page_title; ?></legend>

		<table>

			<tr>

				<td width="16%"><label>Course Name</label></td>

				<td width="35%"><input type="text" name="course_name"  value="<?= set_value('course_name') ?>"></td>
				<td width="59%"><?= form_error('course_name'); ?></td>
			</tr>

			<tr>

				<td><label>Course Code</label></td>

				<td><input type="text" name="course_code" value="<?= set_value('course_code') ?>" ></td>
				<td><?= form_error('course_code'); ?></td>
			</tr>

			<tr>

				<td><label>Course Hour</label></td>

				<td><input type="text" name="course_hour" value="<?= set_value('course_hour') ?>" ></td>
				<td><?= form_error('course_hour'); ?></td>
			</tr>

			<tr>

				<td><label>Template</label></td>

				<td>
					<?php if (set_value('template')==''): ?>
						<input type="radio" name="template" value="1" checked>Sky
						<input type="radio" name="template" value="2">Orange
					<?php endif; ?>

					<?php if (set_value('template')==1): ?>
						<input type="radio" name="template" value="1" checked>Sky
						<input type="radio" name="template" value="2">Orange
					<?php endif; ?>

					<?php if (set_value('template')==2): ?>
						<input type="radio" name="template" value="1" >Sky
						<input type="radio" name="template" value="2" checked>Orange
					<?php endif; ?>
					
				</td>
				<td><?= form_error('template'); ?></td>
			</tr>	

			<tr>

				<td></td>
				<td colspan="3"><input type="submit" name="submit" value="Save"></td>

			</tr>

		</table>

	</fieldset>

</form>
<p><?= anchor('courses','Back',['class'=>'btn']) ?></p>


