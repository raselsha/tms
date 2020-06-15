<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<form method="post" action="<?php echo base_url();  ?>

enrolled/save_enroll"  >

	<fieldset>

		<legend><?php echo $page_title; ?></legend>

		<table>

			<tr>
				<td><label>Student Id</label></td>
        <?php if(isset($student->student_id)): ?>
				<td><input type="text" name="student_id"  value="<?php echo set_value('student_id',$student->student_id); ?>" maxlength="12"></td>
				<td width="59%"><?= form_error('student_id') ?></td>
        <?php else: ?>
          <td><input type="text" name="student_id"  value="<?php echo set_value('student_id'); ?>" maxlength="12"></td>
        <td width="59%"><?= form_error('student_id') ?></td>
        <?php endif; ?>
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
					<input type="text" name="batch_id" id="batch_str" value="<?= set_value('batch_id'); ?>" readonly>
					<select name="batch_id" id="batch" disabled="disabled">
					</select>
				</td>
				<td width="59%"><?= form_error('batch_id') ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td colspan="3"><input type="submit" name="submit" value="Save"></td>

			</tr>

		</table>

	</fieldset>

</form>
<p><?= anchor('enrolled','Back',['class'=>'btn']) ?></p>

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


