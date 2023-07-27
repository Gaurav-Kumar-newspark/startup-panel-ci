<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>For Admin Allow</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="<?php echo base_url('/assets/img/favicon.ico'); ?>">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="">
    <!-- Styles -->
    <link href="<?php echo base_url('public/assets/css/lib/calendar2/pignose.calendar.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/lib/chartist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/lib/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/lib/themify-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/lib/owl.carousel.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/css/lib/owl.theme.default.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/css/lib/weather-icons.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/css/lib/menubar/sidebar.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/lib/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/lib/helper.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/style.css'); ?>" rel="stylesheet">
	<style>
		div.logo {
			height: 200px;
			width: 155px;
			display: inline-block;
			opacity: 0.08;
			position: absolute;
			top: 2rem;
			left: 50%;
			margin-left: -73px;
		}
		body {
			height: 100%;
			background: #fafafa;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #777;
			font-weight: 300;
		}
		h1 {
			font-weight: lighter;
			letter-spacing: 0.8;
			font-size: 3rem;
			margin-top: 0;
			margin-bottom: 0;
			color: #222;
		}
		.wrap {
			max-width: 1024px;
			margin: 5rem auto;
			padding: 2rem;
			background: #fff;
			text-align: center;
			border: 1px solid #efefef;
			border-radius: 0.5rem;
			position: relative;
		}
		pre {
			white-space: normal;
			margin-top: 1.5rem;
		}
		code {
			background: #fafafa;
			border: 1px solid #efefef;
			padding: 0.5rem 1rem;
			border-radius: 5px;
			display: block;
		}
		p {
			margin-top: 1.5rem;
		}
		.footer {
			margin-top: 2rem;
			border-top: 1px solid #efefef;
			padding: 1em 2em 0 2em;
			font-size: 85%;
			color: #999;
		}
		a:active,
		a:link,
		a:visited {
			color: #dd4814;
		}
	</style>
</head>
<body>
	<div class="wrap" style="border: 2px solid;">
		<p style="margin-top:0px!important;">For admin allow</p>
		<p>To create admin you need to give permission&nbsp;(<b>0777 & True</b>)&nbsp;to this file path.</p>
		<b><?php echo getcwd().'/writable/adminaccess.php';?></b> 
		
	</div>
</body>
</html>
