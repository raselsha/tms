<h2><i class="fa fa-tachometer" aria-hidden="true"></i>
<?php echo $page_title; ?></h2>

<div class="box">
	<div class="divider">
		<a href="<?php echo base_url('users') ?>"><h1><i class="fa fa-user fa-lg"></i></h1></a>
	</div>
	<a href="<?php echo base_url('users/new_user') ?>" class="btn">New user</a>
</div>

<div class="box">
	<div class="divider">
		<a href="<?php echo base_url('trainers') ?>"><h1><i class="fa fa-graduation-cap fa-lg" ></i></h1></a>
	</div>
	<a href="<?php echo base_url('trainers/new_trainer') ?>" class="btn">New trainer</a>
</div>

<div class="box">
	<div class="divider">
		<a href="<?php echo base_url('courses') ?>"><h1><i class="fa fa-book fa-lg"></i></h1></a>
	</div>
	<a href="<?php echo base_url('courses/new_course') ?>" class="btn">New course</a>
</div>

<div class="box">
	<a href="<?php echo base_url('batches') ?>" class="divider"><h1><i class="fa fa-users fa-lg"></i></h1></a>
	<a href="<?php echo base_url('batches/new_batch'); ?>" class="btn">New Batches</a>

</div>

<div class="box">
	<a href="<?php echo base_url('students') ?>" class="divider"><h1><i class="fa fa-male fa-lg"></i></h1></a>
	<a href="<?php echo base_url('students/new_student'); ?>" class="btn">New student</a>

</div>

<div class="box">
	<a style="text-decoration:none" href="<?php echo base_url('enrolled') ?>" class="divider"><h1><i class="fa fa-male fa-lg"></i><span >+</span></h1></a>
	<a href="<?php echo base_url('enrolled/new_enroll'); ?>" class="btn">New enroll</a>

</div>

<div class="box">
	<a href="#" class="divider"><h1><i class="fa fa-money fa-lg"></i></h1></a>
	<a href="#" class="btn">New payment</a>
	<!-- <?php echo base_url('payments') ?> -->
	<!-- <?php echo base_url('payments/new_payment'); ?> -->
</div>