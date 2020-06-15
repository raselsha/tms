<!DOCTYPE html>

<html>

<head>

	<title><?= $title; ?></title>

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/print.css" media="print">
	<script>
		function printarea() {
		    window.print();
		}
	</script>

</head>

<body>

	<div class="container">
		<div id="id_card">
			<div class="id_card" >
				<div class="id_card_bg">
					<?php if ($student->template==2) : ?>
						<img src="<?php echo base_url(); ?>images/front_side_orange.jpg">
					<?php else: ?>
							<img src="<?php echo base_url(); ?>images/front_side_sky.jpg">
					<?php endif; ?>
					
				</div>
				<div class="id_header">
					<h4>
						Runner Cyberlink Limited
					</h4>
					<div class="id_logo">
						<img src="<?php echo base_url(); ?>images/logo.png" >
					</div>
					<p class="slogan">grow with time...</p>
					<div class="id_photo">
						<?php 
							$image =$student->id.'_'.$student->image;
							if (file_exists('images/students/'.$image)) {
								$image = base_url().'images/students/'.$student->id.'_'.$student->image;
								echo '<img src="'.$image.'">';
							}
							else{
								$image = base_url().'images/profile.png';
								echo '<img src="'.$image.'">';
							}
						 ?>
					</div>
				</div>
				<div class="id_content">
					<div class="id_text">
						<table>
							<tr>
								<td>Name</td>

								<td>:</td>

								<td><?php echo $student->name; ?></td>

							</tr>

							<tr>

								<td>Id No</td>

								<td>:</td>

								<td><?php echo $student->student_id; ?></td>

							</tr>

							<tr>

								<td>Course</td>

								<td>:</td>
								
								<td><?php echo $student->course_name."-".$student->batch_no; ?></td>

							</tr>

							<tr>

								<td>Batch</td>

								<td>:</td>

								<td>#<?php echo $student->batches_id; ?></td>

							</tr>

							<tr>

								<td>Validity</td>

								<td>:</td>

								<td><?= date('M',strtotime($student->start_date)); ?>
									-
									<?= date('M',strtotime($student->end_date)); ?>,
									<?= date('Y',strtotime($student->end_date)); ?>
								</td>

							</tr>

						</table>

					</div>
					<div class="singnature">
						<img src="<?php echo base_url(); ?>images/signature.png">
					</div>
				</div>

				<div class="id_signature">
					<span>Authorized Signature</span>
				</div>
				<div class="id_footer">
					<p>STUDENT</p>
				</div>
			</div><!-- front id card  -->



			<div class="id_card_bk" >
				<div class="id_card_bk_bg">
					<img src="<?php echo base_url(); ?>images/bg_bk.jpg">
				</div>
				<div class="id_card_content">
					<div class="id_card_bk_left">
						<div class="address">
							<h2>Present Address</h2>
							<p>
								<?php echo $student->present_address; ?>
							</p>

						</div>

						<div class="address">

							<h2>Permanent Address</h2>

							<p><?php echo $student->permanent_address; ?>

							</p>

						</div>

						<div class="address">

							<p><strong>Emergency</strong> :  <?php echo $student->emergency; ?></p>

							<?php if($student->bid): ?>
								<p><strong>Birth ID</strong> : <?php echo $student->bid; ?></p>
							<?php endif; ?>
							
							<?php if($student->nid): ?>
								<p><strong>National ID</strong> : <?php echo $student->nid; ?></p>
							<?php endif ?>

							<p><strong>Blood</strong> : <span style="color:red;text-transform: uppercase;"><?php echo $student->blood; ?></span></p>

						</div>



					</div>

					<div class="id_card_bk_right">

						<div class="address">

							<h2>Corporate Office</h2>

							<p>13/5 Aurungzeb Road,</p>
							<p>Nagar Nirupoma (2nd floor)</p> <p>Mohammadpur, Dhaka 1207</p>

						</div>

						<div class="address">

							<h2>Branch Office</h2>

							<p>48/10,South Bishil</p>
							<p>Level 4-8, Mirpur-1</p>
							<p>Dhaka</p>

						</div>

						<div class="address">

							<h2>Contact</h2>
							<p>Tel : 02-58152764</p>
							<p>Tel : 02-9007619</p>
							<p>Cell: 01724790402</p>
						</div>

					</div>

				</div>

				<div class="id_footer">
					<p>www.runnercyberlink.com</p>
				</div>

			</div><!-- backside id card  -->

		</div><!-- main id card section -->

		<center><button onclick="printarea()">Print</button></center>

	</div>

	<script language="Javascript">

	</script>

</body>

</html>