<!DOCTYPE html>

<html>

<head>

	<title><?= $title; ?></title>

	<meta charset="utf-8">
	<style type="text/css">
		
		* {
		    box-sizing: border-box;
		}
		.col-1 {width: 8.33%;}
		.col-2 {width: 16.66%;}
		.col-3 {width: 25%;}
		.col-4 {width: 33.33%;}
		.col-5 {width: 41.66%;}
		.col-6 {width: 50%;}
		.col-7 {width: 58.33%;}
		.col-8 {width: 66.66%;}
		.col-9 {width: 75%;}
		.col-10 {width: 83.33%;}
		.col-11 {width: 91.66%;}
		.col-12 {width: 100%;}

		.col-offset-1 {width: 8.33%;display: block;}
		.col-offset-2 {width: 16.66%;display: block;}
		.col-offset-3 {width: 25%;display: block;}
		.col-offset-4 {width: 33.33%;display: block;}
		.col-offset-5 {width: 41.66%;display: block;}
		.col-offset-6 {width: 50%;display: block;}
		.col-offset-7 {width: 58.33%;display: block;}
		.col-offset-8 {width: 66.66%;display: block;}
		.col-offset-9 {width: 75%;display: block;}
		.col-offset-10 {width: 83.33%;display: block;}
		.col-offset-11 {width: 91.66%;display: block;}
		.col-offset-12 {width: 100%;display: block;}

		[class*="col-"] {
		    float: left;
		    padding: 15px;
		}
		.row::after {
		    content: "";
		    clear: both;
		    display: table;
		}
		.text-left{
			text-align: left;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		body{
			font-size:12px;
		}
		p{
			font-family:'Times-Roman';
			font-size:26px;
			line-height:40px;
			margin:0;
			padding:0;
		}
		
		h1{
			font-size: 32px;
			line-height: 44px;
			margin:6px;
			padding:0;
		}
		h3{
			font-family:'Times-Roman';
			line-height:28px;
			font-size: 22px;
		}
		#header{
			height: 100px;
		}
		
		#title{
			height: 100px;
		}
		#content{
			height:410px;
		}
		#footer{
			height:80px;
		}
		#footer_link{
			height:20px;
		}
		@page { margin:0.3cm 0.1cm 0.0cm 0.3cm; }
	</style>
</head>

<body>
	<div class="container" >
		<div style="position:relative;width:100%;height:762px;border:1px solid #ddd;page-break-inside: avoid;">
			<img src="images/certificate/certificate_background.svg" width="100%" >
		</div>

		<div style="position:absolute;top:0px;left:0px;">
			<div class="row" id="header">
				<div class="col-2">
					<img src="images/certificate/logo.png" style="margin:-15px 0px 0px -15px;" width="215">
				</div>
				<div class="col-8">
					<img style="margin-top:15px" src="images/certificate/company_name.svg" width="100%">
				</div>
				<div class="col-2">

					<img src="images/qr_code/<?= $student->student_id; ?>.png" width="75" style="border:4px solid #eee;margin:-5px 0px 0px 15px">
				</div>
			</div>
			<div class="row" id="title">
				<div class="col-12 text-center">
					<img src="images/certificate/certificate_title.svg" width="70%" style="margin-top:-10px;">
				</div>
			</div>
			<div class="row" id="content">
				<div class="col-12 text-center">
					<p>This is to certify that</p>
					<h1 style="font-family: 'Helvetica';"><?php echo $student->name; ?></h1>
					<p>has successfully completed the training titled</p>
					<h1 style="font-family: 'Helvetica';color:#942923;"><?php echo $student->course_name; ?></h1>

					<p>held from <?= date('d F, Y',strtotime($student->start_date)); ?> to <?= date('d F, Y',strtotime($student->end_date)); ?><br>
					and covered <?= $student->course_hour; ?> hours course.<br>
					Course Facilitator: <b><?php echo $student->trainers_name; ?></b></p>
					<p>Reg. No.: <?php echo $student->student_id; ?></p>
					
				</div>
			</div>
			<div class="row" id="footer">
				<div class="col-offset-4">
					
				</div>
				<div class="col-4 text-left">
					<h3 style="margin-left:105px">Facilator</h3>
				</div>
				<div class="col-4 text-center" >
					<img src="images/signature.png" style="margin-bottom:-40px">
					<h3>Head of concern</h3>
				</div>
			</div>
			<div class="row" id="footer_link">
				<div class="col-12 text-center">
					<p style="color:#106DA2;font-family:'Helvetica';font-size:18px;">www.runnercyberlink.com</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
