<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<form method="post" action="<?php echo base_url().'trainers/update_trainer/'.$trainer->id;  ?>

"  >

	<fieldset>

		<legend><?php echo $page_title; ?></legend>

		<table>

			<tr>

				<td width="16%"><label>Trainer Name</label></td>

				<td width="25%"><input type="text" name="trainers_name" value="<?= set_value('trainers_name',$trainer->trainers_name) ?>" ></td>
				<td width="59%"><?= form_error('trainers_name'); ?></td>
			</tr>

			<tr>

				<td><label>Mobile</label></td>

				<td><input type="text" name="trainers_mobile"  value="<?= set_value('trainers_mobile',$trainer->trainers_mobile) ?>" ></td>
				<td><?= form_error('trainers_mobile'); ?></td>
			</tr>

			<tr>

				<td><label>Email</label></td>

				<td><input type="text" name="trainers_email" value="<?= set_value('trainers_email',$trainer->trainers_email) ?>" ></td>
				<td><?= form_error('trainers_email'); ?></td>
			</tr>
			<tr>

				<td></td>
				<td colspan="2"><input type="submit" name="submit" value="Update"></td>
			</tr>

		</table>

	</fieldset>

</form>
<p><?= anchor('trainers','Back',['class'=>'btn']) ?></p>

