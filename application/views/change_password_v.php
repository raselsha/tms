<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>

<form method="post" action="<?php echo base_url().'users/update_password';?>"  >

	<fieldset>

		<legend><?php echo $page_title; ?></legend>

		<table>

			<tr>

				<td width="16%"><label>User Name</label></td>

				<td width="35%"><input type="text" name="user_name"  value="<?= set_value('user_name',$user->user_name) ?>" maxlength="20" readonly></td>
				<td width="59%"><?= form_error('user_name'); ?></td>
			</tr>
			<tr>

				<td width="16%"><label>Change password</label></td>

				<td width="35%"><input type="password" name="user_password" ></td>
				<td width="59%"><?= form_error('user_password'); ?></td>
			</tr>
			<tr>

				<td><label>User Role</label></td>

				<td><select name="user_role" disabled>
					<option value="">Select role</option>
					<?php
						if (set_value('user_role',$user->user_role)==''):?>
							<option value="1">Admin</option>
							<option value="2">Manager</option>
					<?php endif; ?>
					<?php
						if (set_value('user_role',$user->user_role)==1):?>
							<option value="1" selected>Admin</option>
							<option value="2">Manager</option>
					<?php endif; ?>
					<?php
						if (set_value('user_role',$user->user_role)==2):?>
							<option value="1" >Admin</option>
							<option value="2" selected>Manager</option>
					<?php endif; ?>
				</select>
				</td>
				<td><?= form_error('user_role'); ?></td>
			</tr>

			<tr>

				<td></td>
				<td colspan="3"><input type="submit" name="submit" value="submit"></td>

			</tr>

		</table>

	</fieldset>

</form>
<p><?= anchor('courses','Back',['class'=>'btn']) ?></p>


