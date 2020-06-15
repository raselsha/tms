<?php $this->load->view('alert_message'); ?>
<h2><?php echo $page_title; ?></h2>
	<form method="post" action="<?php echo base_url(); ?>login/check_login">

		<fieldset>

			<legend>Login</legend>

			<table cellspacing="2">
				<tr>
					<td width="10%"><label>User name</label></td>
					<td width="25%"><input type="text" name="user_name" maxlength="20">
					</td>
					<td width="60%"><?= form_error('user_name'); ?></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="user_password"></td>
					<td><?= form_error('user_password'); ?></td>
				</tr>
				<tr>

					<td></td>

					<td colspan="2"><input type="submit" name="submit" value="Login"></td>

				</tr>

			</table>

		</fieldset>

	</form>



