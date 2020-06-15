<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<form method="post" action="<?php echo base_url().'students/update_student/'.$student->id;  ?>
" enctype="multipart/form-data">
	<fieldset>
		<legend>Edit student</legend>
		<table>
			<tr>
				<td width="16%"><label>Name</label></td>
				<td width="25%"><input type="text" name="name"   value="<?php echo set_value('name',$student->name); ?>"></td>
				<td width="59%"><?= form_error('name') ?></td>
			</tr>

			<tr>

				<td><label>Student Id</label></td>
				<td><input type="text" name="student_id"  value="<?php echo set_value('student_id',$student->student_id); ?>" maxlength="12"></td>
				<td width="59%"><?= form_error('student_id') ?></td>
			</tr>

			<tr>

				<td><label>Mobile</label></td>
				<td><input type="text" name="mobile" value="<?php echo set_value('mobile',$student->mobile); ?>" maxlength="11"></td>
				<td width="59%"><?= form_error('mobile') ?></td>
			</tr>
			<tr>

				<td><label>Emergency Mobile</label></td>
				<td><input type="text" name="emergency" value="<?php echo set_value('emergency',$student->emergency); ?>" maxlength="11"></td>
				<td width="59%"><?= form_error('emergency') ?></td>
			</tr>
			
			<tr>

				<td><label>Present Address</label></td>

				<td><textarea name="present_address"><?php echo set_value('present_address',$student->present_address); ?></textarea></td>
				<td width="59%"><?= form_error('present_address') ?></td>
			

			</tr>

			<tr>

				<td><label>Permanant Address</label></td>

				<td><textarea name="permanent_address"><?php echo set_value('permanent_address',$student->permanent_address); ?></textarea></td>
				<td width="59%"><?= form_error('permanent_address') ?></td>
			</tr>

			<tr>

				<td><label>Gender</label></td>

				<td>
					<?php if (set_value('gender',$student->gender)==0): ?>
						<input type="radio" name="gender" value="1" >Male
						<input type="radio" name="gender" value="2">Female
					<?php endif; ?>

					<?php if (set_value('gender',$student->gender)==1): ?>
						<input type="radio" name="gender" value="1" checked>Male
						<input type="radio" name="gender" value="2">Female
					<?php endif; ?>

					<?php if (set_value('gender',$student->gender)==2): ?>
						<input type="radio" name="gender" value="1" >Male
						<input type="radio" name="gender" value="2" checked>Female
					<?php endif; ?>
				</td>
				<td width="59%"><?= form_error('gender') ?></td>
			</tr>

			<tr>
				<td><label>Birth ID</label></td>
				<td><input type="text" name="bid" value="<?php echo set_value('bid',$student->bid); ?>" maxlength="17"></td>
				<td width="59%"><?= form_error('bid') ?></td>
			</tr>
			
			<tr>
				<td><label>National ID</label></td>
				<td><input type="text" name="nid" value="<?php echo set_value('nid',$student->nid); ?>" maxlength="17"></td>
				<td width="59%"><?= form_error('nid') ?></td>
			</tr>

			<tr>

				<td><label>Blood</label></td>
				<td><input type="text" name="blood" value="<?= set_value('blood',$student->blood) ?>"></td>

			</tr>

			<tr>
				<td><label>Image</label></td>
				<td><input type="file" name="image" ></td>
				<input type="hidden" name="photo" value="<?php echo $student->image; ?>">
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Update"></td>	
			</tr>
		</table>
	</fieldset>
</form>
<p><?= anchor('students','Back',['class'=>'btn']) ?></p>


