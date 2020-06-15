<div class="alert_message">
	<?php 
		$failed = $this->session->flashdata('failed');
		$success = $this->session->flashdata('success');
		if ($failed) {
			echo '<span class="alert">'.$failed.'</span>';
		}
		if ($success) {
			echo '<span class="message">'.$success.'</span>';
		}
	?>
</div>