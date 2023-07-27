<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title>SBP Panel</title>

		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url('public/assets/img/brand/favicon.png'); ?>" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="<?php echo base_url('public/assets/css/icons.css'); ?>" rel="stylesheet">

		<!--  bootstrap css-->
		<link id="style" href="<?php echo base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />

		<!--- Style css --->
		<link href="<?php echo base_url('public/assets/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('public/assets/css/style-dark.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('public/assets/css/style-transparent.css'); ?>" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="<?php echo base_url('public/assets/css/skin-modes.css'); ?>" rel="stylesheet" />

		<!--- Animations css-->
		<link href="<?php echo base_url('public/assets/css/animate.css'); ?>" rel="stylesheet">

	</head>
	<body class="ltr error-page1 bg-primary" style="background-color: var(--primary-bg-color) !important">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo base_url('public/assets/img/loader.svg'); ?>" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<div class="square-box">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div class="page" >
			<div class="page-single">
				<div class="container">
					<!-- <div class="row">
						<div class="wrap" style="border: 2px solid;">
							<p style="margin-top:0px!important;">For admin allow</p>
							<p>To create admin you need to give permission&nbsp;(<b>0777 & True</b>)&nbsp;to this file path.</p>
							<b><?php echo getcwd().'/writable/adminaccess.php';?></b> 
							
						</div>
					</div> -->
				<!-- Main-error-wrapper -->
				<div class="main-error-wrapper page page-h">
					<!-- <h1 class="text-white">404<span class="tx-20">error</span></h1> -->
					<h4 class="tx-white-8">
						<p>To create admin you need to give <b>(0777 read and writable)</b> permission <b>adminaccess.php</b> file and open file to change adminconfiguration from false to true.</p>
				
						File Path: <b><?php echo WRITEPATH . 'adminaccess.php'; ?></b> 


					</h4>					
				</div>
				<!-- /Main-error-wrapper -->
				</div>
			</div>
		</div>

		<!-- JQuery min js -->
		<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>

		<!-- Bootstrap js -->
		<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

		<!-- Moment js -->
		<script src="<?php echo base_url('public/assets/plugins/moment/moment.js'); ?>"></script>

		<!-- eva-icons js -->
		<script src="<?php echo base_url('public/assets/js/eva-icons.min.js'); ?>"></script>

		<!-- generate-otp js -->
		<script src="<?php echo base_url('public/assets/js/generate-otp.js'); ?>"></script>

		<!--Internal  Perfect-scrollbar js -->
		<script src="<?php echo base_url('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>

		<!-- Theme Color js -->
		<script src="<?php echo base_url('public/assets/js/themecolor.js'); ?>"></script>

		<!-- custom js -->
		<script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

	</body>
</html>