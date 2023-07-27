<?php
$db = db_connect();
$router = service('router');
$method = $router->methodName();
$encrypter = \Config\Services::encrypter();
$sitetitle = "SBP Panel";
$mainlogo = "";
$cookieemail = "";
$cookiepass = "";
if (isset($thiscontrol)) {
}


if (isset($_COOKIE["email"]) && !empty($_COOKIE["email"])) {
	$storedemail = base64_decode($_COOKIE["email"]);
	$cookieemail = $encrypter->decrypt($storedemail);
}
if (isset($_COOKIE["password"]) && !empty($_COOKIE["password"])) {
	$storedPassword = base64_decode($_COOKIE["password"]);
	$cookiepass = $encrypter->decrypt($storedPassword);
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title><?php echo $sitetitle; ?> | Login</title>

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
	<body class="ltr error-page1 bg-primary">
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
				
					<div class="row">
						<div class="col-xl-6 col-md-6  col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-4 justify-content-center">
						
							<a href="<?php echo base_url('login');?>">
								<?php 
								if($mainlogo == "")
								{
									if($sitetitle == "")
									{
										?>
										<div data-v-c7378482="" class="display-2  primary--text" >SBP Panel</div>
										<?php
									}
									else
									{
										?>
										<div data-v-c7378482="" class="display-2  primary--text" ><?php echo $sitetitle; ?></div>
										<?php
									}
								}
								else
								{
									?>
										<img src="<?php echo $mainlogo; ?>" style="width: 75%;margin-left: 60px;margin-bottom: 15px;margin-top: -20px;" id="logo-img">
									<?php
								}
								?>								
							</a>
							<div class="card-sigin" style="box-shadow: 1px -1px 21px -9px black;">
								 <!-- Demo content-->
								 	<div class="main-card-signin d-md-flex">
									 	<div class="wd-100p">
										 	<div class="">
												<div class="main-signup-header">
													<div class="panel panel-primary">
												   		<div class="panel-body tabs-menu-body border-0 p-3">
													   		<div class="tab-content">
														   		<div class="tab-pane active" id="tab5">
																	<?php
																		if (isset($Error)) {
																			?>   
																				<div class="alert alert-danger alert-dismissible">
																					<strong></strong><?php echo $Error; ?> 
																				</div>
																			<?php
																		}
																		if(isset($error["csrf"]) && !empty($error["csrf"])){
																			?>
																			<div class="alert alert-danger alert-dismissible">
																				<strong></strong><?php echo $error["csrf"]; ?> 
																			</div>
																			<?php 
																		}
																		if (isset($_SESSION['forgetpasserr']) && !empty($_SESSION['forgetpasserr'])) 
																		{
																			if ($_SESSION['forgetpasserr']['result'] == 'error') {
																				?>
																					<div class="alert alert-danger alert-dismissible">
																						
																						<strong>Error&nbsp;</strong> <?php echo $_SESSION['forgetpasserr']['message']; ?>
																					</div>
																				<?php
							
																			}elseif($_SESSION['forgetpasserr']['result'] == 'success'){
																				?>
																					<div class="alert alert-success alert-dismissible" id="forgetpass-alert">
																					
																						<strong>Success&nbsp;</strong> <?php echo $_SESSION['forgetpasserr']['message']; ?>
																					</div>
																					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
																					<script>
																						 $(function(){
																							setTimeout(function(){
																								$("#forgetpass-alert").fadeOut();
																							}, 3000);
																						});
																					</script>
																				<?php
																			}
																		}

																		if (isset($_SESSION['logoutmsg']) && !empty($_SESSION['logoutmsg'])) 
																		{
																			if ($_SESSION['logoutmsg']['result'] == 'success') {
																				?>
																					<div class="alert alert-success alert-dismissible" id="logout-alert">
																						
																						<strong>Success&nbsp;</strong> <?php echo $_SESSION['logoutmsg']['message']; ?>
																					</div>
																					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
																					<script>
																						 $(function(){
																							setTimeout(function(){
																								$("#logout-alert").fadeOut();
																							}, 3000);
																						});
																					</script>
																				<?php
							
																			}
																		}
																	?>
                                                                	<?php $loginarrtibute = array('class' => 'loginformclass'); ?>
                                                                	<?= form_open("login", $loginarrtibute); ?>
																		<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
																		<div class="form-group">
																			<label>Email</label> 
																			<?php $data =
																			[
																			"type" => "text",
																			"name" => "email",
																			"placeholder" => "Email",
																			"class" => "form-control",
																			"value" => isset($cookieemail) && !empty($cookieemail) ? $cookieemail : set_value("email")
																			];

																			echo form_input($data); ?>                    
																			<div class="text-danger"><?php if (isset($error["email"])) {
																			echo $error["email"];
																			}?></div>  
																		</div>
																    <div class="form-group">
																	   <label>Password</label> 
																		<input type="password" name="password" id="password_sec" placeholder="Password" class="form-control" value="<?php echo isset($cookiepass) && !empty($cookiepass) ? $cookiepass : set_value("password");?>"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>                                
                                                                        <div class="text-danger"><?php if (isset($error["password"])) {
                                                                        echo $error["password"];
                                                                        }?></div>
																    </div>
																	
																		
																	<div class="form-group">
																		<?php
																			$data = ['type' => 'checkbox', 'name' => 'Remember', 'id' => 'customCheck','style'=>'margin-left: 0px', 'class' => 'form-check-input', 'value' => 'on','checked='=>'checked'];
																			echo form_input($data);
																			$attributes = ['class' => 'form-check-label mb-0','style'=>'margin-left: 20px'];
																			echo form_label('Remember Me', 'customCheck', $attributes);

																		?>												
																		<a href="<?php echo base_url('/forgetpass');?>" style="float: right;">Forget Password</a>
                                                                    </div>
                                                                    <?php
                                                                        $data = [
                                                                            "type" => "submit",
                                                                            "value" => "Sign In",
                                                                            "name" => "loginbtn",
                                                                            "class" => "btn btn-primary btn-block"
                                                                        ];
                                                                        echo form_input($data);
                                                                    ?>
																<?= form_close(); ?>
														   </div>
													   </div>
												   </div>
											   </div>
											</div>
										 </div>
									 </div>
								 </div>
							 </div>
						 </div>
					</div>
				</div>
				<span style="color: #fff;font-size: 15px;font-weight: 500;position: absolute;right: 20px;bottom: 10px;">V 2.0</span>
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
<script type="text/javascript">

$(document).ready(function(){
	$("#togglePassword").click(function () {
		var input = $("#password_sec");
		if (input.attr("type") === "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}

	});
});
</script>