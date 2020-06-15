<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>


<form method="post" action="<?php echo base_url();  ?>

students/save_student"  enctype="multipart/form-data">

	<fieldset>

		<legend>New student</legend>

		<table>

			<tr>

				<td width="16%"><label>Name</label></td>
				<td width="25%"><input type="text" name="name"   value="<?php echo set_value('name'); ?>"></td>
				<td width="59%"><?= form_error('name') ?></td>
			</tr>

			<tr>

				<td><label>Student Id</label></td>
				<td><input type="text" name="student_id"  value="<?php echo set_value('student_id'); ?>" maxlength="12"></td>
				<td width="59%"><?= form_error('student_id') ?></td>
			</tr>

			<tr>

				<td><label>Mobile</label></td>
				<td><input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" maxlength="11"></td>
				<td width="59%"><?= form_error('mobile') ?></td>
			</tr>
			<tr>

				<td><label>Emergency Mobile</label></td>
				<td><input type="text" name="emergency" value="<?php echo set_value('emergency'); ?>" maxlength="11"></td>
				<td width="59%"><?= form_error('emergency') ?></td>
			</tr>
			<tr>

				<td><label>Course</label></td>
				<td>
					<select name="course_id" id="course_id">
						<option value="">Select course</option>

						<?php foreach ($courses as $course):?>
							<?php if ($course->id ==set_value('course_id')): ?>
								<option value="<?= $course->id ?>" selected="selected"><?= $course->course_name ?></option>
								
							<?php else: ?>
								<option value="<?= $course->id ?>"><?= $course->course_name ?> </option>
								
							<?php endif; ?>
							
						<?php endforeach; ?>
					</select>

				</td>
				<td width="59%"><?= form_error('course_id') ?></td>
			</tr>

			<tr>

				<td><label>Batch</label></td>

				<td>
					<input type="text" name="batch" id="batch_str" value="<?= set_value('batch'); ?>" readonly>
					<select name="batch" id="batch" disabled="disabled">
					</select>
				</td>
				<td width="59%"><?= form_error('batch') ?></td>
			</tr>

			<tr>

				<td><label>Present Address</label></td>

				<td><textarea name="present_address"><?php echo set_value('present_address'); ?></textarea></td>
				<td width="59%"><?= form_error('present_address') ?></td>

			</tr>

			<tr>

				<td><label>Permanant Address</label></td>

				<td><textarea name="permanent_address"><?php echo set_value('permanent_address'); ?></textarea></td>
				<td width="59%"><?= form_error('permanent_address') ?></td>
			</tr>

			<tr>

				<td><label>Gender</label></td>

				<td>
					<?php if (set_value('gender')==''): ?>
						<input type="radio" name="gender" value="1" >Male
						<input type="radio" name="gender" value="2">Female
					<?php endif; ?>

					<?php if (set_value('gender')==1): ?>
						<input type="radio" name="gender" value="1" checked>Male
						<input type="radio" name="gender" value="2">Female
					<?php endif; ?>

					<?php if (set_value('gender')==2): ?>
						<input type="radio" name="gender" value="1" >Male
						<input type="radio" name="gender" value="2" checked>Female
					<?php endif; ?>
				</td>
				<td width="59%"><?= form_error('gender') ?></td>
			</tr>

			<tr>
				<td><label>Birth ID</label></td>
				<td><input type="text" name="bid" value="<?php echo set_value('bid'); ?>" maxlength="17"></td>
				<td width="59%"><?= form_error('bid') ?></td>
			</tr>

			<tr>
				<td><label>National ID</label></td>
				<td><input type="text" name="nid" value="<?php echo set_value('nid'); ?>" maxlength="17"></td>
				<td width="59%"><?= form_error('nid') ?></td>
			</tr>

			<tr>

				<td><label>Blood</label></td>

				<td><input type="text" name="blood" value="<?= set_value('blood'); ?>" maxlength="3"></td>
				<td width="59%"><?= form_error('blood') ?></td>
			</tr>

			<tr>

				<td><label>Image</label></td>

				<td><input type="file" name="image" ></td>

			</tr>

			<tr>
				<td></td>				
				<td><input type="submit" name="submit" value="Save"></td>	

			</tr>

		</table>

	</fieldset>

</form>

<p><?= anchor('students','Back',['class'=>'btn']) ?></p>

  <script type="text/javascript">
  	$(document).ready(function () {
  		var batch_course_id = $('#course_id').val();
  		var batch_str = $('#batch_str').val();

  		if (batch_course_id =='') {
  			$('#batch').prop('disabled',true);
  			$('#batch_str').hide();
  		}
  		else{
  			if (batch_str == '') {
  				$('#batch').prop('disabled',false);
  				$('#batch_str').hide();
  				$.ajax({
  					url: "<?= base_url(); ?>batches/ajax_batch",
  					type:"POST",
  					data:{'batch_course_id':batch_course_id},
  					dataType:'json',
  					success:function(data) {
  						$('#batch').html(data);
  					},
  					error:function(argument) {
  						$('#batch').html('');
  					}
  				});
  			}
  			else{
  				$('#batch').hide();
  				$('#batch_str').show();
  			}
  			
  		}

  		$('#course_id').change(function () {
  			var batch_course_id = $(this).val();
  			$('#batch_str').hide();
  			if (batch_course_id =='') {
  				$('#batch').show();
  				$('#batch_str').hide();
  				$('#batch').prop('disabled',true);
  			}
  			else{
  				$('#batch').show();
  				$('#batch').prop('disabled',false);
  				if (batch_str=='') {
					$('#batch_str').hide();
  				}
  				$.ajax({
  					url: "<?= base_url(); ?>batches/ajax_batch",
  					type:"POST",
  					data:{'batch_course_id':batch_course_id},
  					dataType:'json',
  					success:function(data) {
  						$('#batch').html(data);
  					},
  					error:function(argument) {
  						$('#batch').html('');
  					}
  				});
  			}
  		});
  	});
  </script>