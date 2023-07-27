<?php
$router = service('router');
$method = $router->methodName();
$sitetitle = "Panel Name";
if (isset($thiscontrol)) {
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
	<meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4">


	<!-- Title -->
	<title><?php echo $sitetitle; ?><?php echo (isset($method) && !empty($method)) ? " | " . ucfirst($method) : ""; ?></title>

	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url('public/assets/img/brand/favicon.png'); ?>" type="image/x-icon" />

	<!-- Icons css -->
	<link href="<?php echo base_url('public/assets/css/icons.css'); ?>" rel="stylesheet">

	<!--  bootstrap css-->
	<link id="style" href="<?php echo base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />

	<!-- style css -->
	<link href="<?php echo base_url('public/assets/css/style.css?v=hshshshs'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/css/style-dark.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/css/style-transparent.css'); ?>" rel="stylesheet">

	<!---Skinmodes css-->
	<link href="<?php echo base_url('public/assets/css/skin-modes.css'); ?>" rel="stylesheet" />

	<link href="<?php echo base_url("public/assets/css/animate.css"); ?>" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
</head>

<body class="ltr main-body app sidebar-mini">

	<!-- Loader -->
	<div id="global-loader">
		<img src="<?php echo base_url('public/assets/img/loader.svg'); ?>" class="loader-img" alt="Loader">
	</div>
	<!-- /Loader -->
	<!-- main-header -->
	<div class="main-header side-header sticky nav nav-item">
		<div class=" main-container container-fluid">
			<div class="main-header-left ">
				<div class="responsive-logo">
				</div>
				<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
					<a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
					<a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
				</div>
				<div class="logo-horizontal">
					<a href="index.html" class="header-logo">
					</a>
				</div>
			</div>
			<div class="main-header-right">
				<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon fe fe-more-vertical "></span>
				</button>
				<div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<ul class="nav nav-item header-icons navbar-nav-right ms-auto">

							<li class="dropdown nav-item">
								<a class="new nav-link theme-layout nav-link-bg layout-setting">
									<span class="dark-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
											<path d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z"></path>
										</svg></span>
									<span class="light-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
											<path d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z"></path>
										</svg></span>
								</a>
							</li>
							<li class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
										<path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
									</svg></a>
							</li>

							<li class="nav-link search-icon d-lg-none d-block">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" height="24px" class="header-icon-svgs" viewBox="0 0 24 24" width="24px" fill="#000000">
													<path d="M0 0h24v24H0V0z" fill="none"></path>
													<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
												</svg>
											</button>
										</span>
									</div>
								</form>
							</li>
							<li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
								<a class="new nav-link profile-user d-flex" href="" data-bs-toggle="dropdown"><img alt="" src="<?php echo base_url('public/assets/img/avtar (1).png'); ?>" class=""></a>
								<div class="dropdown-menu">
									<div class="menu-header-content p-3 border-bottom">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="<?php echo base_url('public/assets/img/avtar (1).png'); ?>" class=""></div>
											<div class="ms-3 my-auto">
												<h6 class="tx-15 font-weight-semibold mb-0">Welcome Admin</h6><span class="dropdown-title-text subtext op-6  tx-12"><?php if (isset($_SESSION["firstname"]) && !empty($_SESSION["firstname"])) {
																																										echo $_SESSION["firstname"];
																																									} ?></span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href="<?php echo base_url('profile'); ?>" style="cursor:pointer"><i class="far fa-user-circle"></i>Profile</a>
									<a class="dropdown-item logout" href="<?php echo base_url('logout'); ?>" style="cursor:pointer"><i class="far fa-arrow-alt-circle-left"></i>Logout</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /main-header -->

	<!-- Admin Password Cofirmation model  -->
	<div class="modal fade" id="userconfirmation" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="userconfirmationTitle">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="userconfirmationTitle">Confirm password to continue</h5>
					<button type="button" class="close modelclose" data-dismiss="modal" aria-label="Close" style="font-size: 25px; margin-top: -12px;">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label>You are entering an administrative area must confirm your password to continue</label>
					<input type="password" name="adminpassword" id="adminpassword" value="" class="form-control" style="border: 2px solid #e5e5e5;" />

					<span id="adminpass-error" style="color: red; font-size: 15px !important;"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light modelclose" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="securityconfbtn">Confirm</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End here -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		/********************** Check Local Storage Time **************************************/
		function checklocalstoragetime() {
			var d = new Date();
			var curentdatetime = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes();

			if (localStorage.getItem('onetimepasswordconfirm') !== null) {
				var diff = Math.abs(new Date(curentdatetime) - new Date(localStorage.getItem('onetimepasswordconfirmtime')));
				var minutes = Math.floor((diff / 1000) / 60);

				if (minutes >= 25) {
					localStorage.removeItem('onetimepasswordconfirm');
					localStorage.removeItem('onetimepasswordconfirmtime');
				}
			}
		}
		checklocalstoragetime();
		/********************** Check Local Storage Time End Here *****************************/



		$(document).ready(function() {
			$('.counter-count').each(function() {
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					//chnage count up speed here
					duration: 2000,
					easing: 'swing',
					step: function(now) {
						$(this).text(Math.ceil(now));
					}
				});
			});

			$(".layout-setting").click(function() {

				if ($(".sidebar-mini").hasClass("light-theme")) {

					$("td").css("color", "black !important");
				} else if ($(".sidebar-mini").hasClass("dark-theme")) {
					$("td").css("color", "white !important");
				}
			});


			$(".logout").click(function(event) {
				event.preventDefault();
				swal({
						title: "Are you sure want to logout ?",
						icon: "warning",
						dangerMode: true,
						buttons: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							localStorage.removeItem("onetimepasswordconfirm");
							localStorage.removeItem("onetimepasswordconfirmtime");
							location.href = "<?php echo base_url('/logout'); ?>";
						}
					});
			});

			$(".modelclose").click(function() {
				$("#userconfirmation").modal('hide');
			});


			$("#markallreadfeedbacks").click(function(e) {
				e.preventDefault();

				swal({
						title: "Are you sure want to read all feedbacks ?",
						text: "",
						icon: "warning",
						dangerMode: true,
						buttons: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$("#feedbackform").submit();
						}
					});
			});


			$("#markallreadreports").click(function(e) {
				e.preventDefault();

				swal({
						title: "Are you sure want to read all reports ?",
						text: "",
						icon: "warning",
						dangerMode: true,
						buttons: true,
					})
					.then((willDelete) => {
						if (willDelete) {

							$("#reportform").submit();
						}
					});
			});
		});
	</script>