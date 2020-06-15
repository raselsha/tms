<!DOCTYPE html>
<html>
<head>

	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
		  $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy"});

		} );
		$( function() {
		  $( "#datepicker1" ).datepicker({dateFormat: "dd-mm-yy"});
		} );
		
	</script>
</head>

<body>

	<div class="page">

		<header>
			<div class="logo">
				<a href="<?= base_url(); ?>dashboard"><img src="<?= base_url(); ?>images/logo.png" >
				<h2>Training management system</h2></a>
			</div>
			<div class="user_info">
				<p><?php 
				if ($this->session->userdata('user_role')==1) :?>
					<small>Logied in as <b>Admin</b></small>
				<?php elseif ($this->session->userdata('user_role')==2): ?>
					<small>Logied in as <b>Manager</b></small>
				<?php endif; ?>
				<?php 
					if ($this->session->userdata('id')) :?>
					<small>| User name : <b><?= $this->session->userdata('user_name') ?></b> | <a href="<?= base_url(); ?>users/change_password">Change password</a> | <a href="<?php echo base_url(); ?>dashboard/logout">Logout</a> </small>
				<?php endif; ?>
				</p>
			</div>
		</header>

		<div class="menu">

		<?php $this->load->view('menu'); ?>

		</div>

		<div class="container">
		
			<?php print $content; ?>

		</div>
		<div class="footer">
			<small style="float:left">Copyright &copy; <?= date('Y') ?> Allrights reserved.</small>
			<small style="float:right">v 1.0</small>
		</div>

	</div>
	<script type="text/javascript">
		$(document).ready(function() { 
		    $(".menu ul li a").click(function ( e ) {
		       
		    });
		});
	</script>
</body>

</html>