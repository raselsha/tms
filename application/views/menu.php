<?php if ($this->session->has_userdata('id')) : ?>
	<ul>
		<li style="margin:4px 8px 0px 8px;color:#fff;"><i class="fa fa-lg">::</i></li>
		<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
		<li><a href="<?php echo base_url(); ?>users">Users</a></li>
		<li><a href="<?php echo base_url(); ?>trainers">Trainers</a></li>
		<li><a href="<?php echo base_url(); ?>courses">Courses</a></li>
		<li><a href="<?php echo base_url(); ?>batches">Batches</a></li>
		<li><a href="<?php echo base_url(); ?>students">Students</a></li>
		<li><a href="<?php echo base_url(); ?>enrolled">Enroll</a></li>
	</ul>
	<div class="search">
		<form action="<?php echo base_url(); ?>dashboard/search" method="post">
			<ul>
				<li><input type="text" name="search" placeholder="Search by student id"></li>
				<li><input type="submit" name="btn_search" value="Search"></li>
			</ul>
			
		</form>
	</div>
<?php else: ?>

	<ul>
		<li style="padding-left:20px"><a href="<?php echo base_url(); ?>login">Login</a></li>
	</ul>

<?php endif; ?>



