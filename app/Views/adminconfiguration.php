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
		<title>SBP Panel | Admin Configuration</title>

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
	<body class="ltr error-page1 bg-primary" style="background-color: var(--primary-bg-color) !important;">

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
					<div class="row">
            <div class="">

            </div>
						<div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main py-4 justify-content-center mx-auto">
							<div class="card-sigin ">
								 <!-- Demo content-->
								 <div class="main-card-signin d-md-flex">
									 <div class="wd-100p"><div class="d-flex mb-4"></div>
									 <div class="">
										  <div class="main-signup-header">
											 <h2 class="text-dark">Get Started</h2>
											<!--  <h6 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h6> -->
                          <?php
                            if (isset($Error)) {
                            ?>   

                            <div class="alert alert-danger alert-dismissible"  id="success-Success" style="">
                            <strong></strong><?php echo $Error; ?> 
                            </div>
                            <?php

                            }
                          ?>
                          <?= form_open("/adminconfiguration"); ?>
                          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
												  <div class="form-group">
													 <label>Firstname</label> 
                            <?php $data = [
                            "name" => "Firstname",
                            "placeholder" => "Enter your firstname",
                            "class" => "form-control",
                            "value" => set_value("Firstname")
                            ];
                            echo form_input($data);
                            ?>                         
                            <div class="text-danger">
                            <?php if (isset($error["Firstname"])) {
                            echo $error["Firstname"];
                            }?>
                            </div>
												 </div>
                          <div class="form-group">
                            <label>Lastname</label> 

                              <?php $data = [
                              "name" => "Lastname",
                              "placeholder" => "Enter your lastname",
                              "class" => "form-control",
                              "value" => set_value("Lastname")
                              ];
                              echo form_input($data); ?>

                              <div class="text-danger">
                              <?php if (isset($error["Lastname"])) {
                              echo $error["Lastname"];
                              }?>
                              </div>
                          </div>
												 <div class="form-group">
													 <label>Email</label> 
                              <?php $data = [
                              "name" => "Email",
                              "placeholder" => "Enter your email",
                              "class" => "form-control",
                              "value" => set_value("Email")
                              ];
                              echo form_input($data); ?>

                              <div class="text-danger">
                              <?php if (isset($error["Email"])) {
                              echo $error["Email"];
                              }?>
                              </div>
												 </div>
                          <div class="form-group">
                            <label>Phonenumber</label> 

                              <?php $data = [
                              "name" => "Phonenumber",
                              "placeholder" => "Enter your phonenumber",
                              "class" => "form-control",
                              "value" => set_value("Phonenumber")
                              ];
                              echo form_input($data); ?>

                              <div class="text-danger">
                              <?php if (isset($error["Phonenumber"])) {
                              echo $error["Phonenumber"];
                              }?>
                              </div>
                          </div>
												 <div class="form-group">
													 <label>Password</label> 
                              <span id="copypasstext"></span>
                              <?php 
                                $data = [
                                "type" => "password",
                                "name" => "Password",
                                "placeholder" => "Enter your password",
                                "class" => "form-control",
                                "id" => "Password",
                                "value" => set_value("Password")
                                ];
                                echo form_input($data); 
                              ?>
                              <div class="text-danger">
                              <?php if (isset($error["Password"])) {
                              echo $error["Password"];
                              }?>
                              </div>
												 </div>
                         	<div class="form-group">
													 <label>Confirm Password</label> 
                            <?php $data = [
                                "type" => "password",
                                "name" => "ConfirmPassword",
                                "placeholder" => "Enter your Confirm password",
                                "class" => "form-control",
                                "id" => "ConfirmPassword",
                                "value" => set_value("ConfirmPassword")
                                ];
                                echo form_input($data); 
                            ?>
                              <div class="text-danger">
                              <?php if (isset($error["ConfirmPassword"])) {
                              echo $error["ConfirmPassword"];
                              }?>
                              </div>
												  </div>
                          <div class="form-group">
                          <?php 
                            $data = [
                            "type" => "submit",
                            "value" => "GeneratePassword",
                            "id" => "GeneratePassword",
                            "class" => "btn btn-info",
                            ];
                            echo form_input($data); 
                          ?>
                          </div>

                          <?php $data = [
                            "type" => "submit",
                            "value" => "Create Account",
                            "name" => "submitbtn",
                            "class" => "btn btn-primary btn-block",
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
<script>

    $(document).ready(function(){

        $("#GeneratePassword").click(function(e){
            e.preventDefault();
          
            genpass = genpassword();
            $("#Password").val(genpass);
            $("#Password").attr("type","text");
            $("#Password").keypress("c",function(e) {

              if(!e.ctrlKey)
              {
                    $("#Password").removeAttr("type","text");
                    $("#Password").attr("type","password");
              }
                
            });
            $('#msg').remove();
            $("#copypasstext").html("<span><b id='msg'>&nbsp;&nbsp;&nbsp;Please Keep This Password Save </b><span>");
            
            $("#ConfirmPassword").val(genpass);
            
        });
    });
    
    function genpassword(){
        returnval = "";
        const alpha = 'abcdefghijklmnopqrstuvwxyz';
        const calpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const num = '1234567890';
        const specials = ',.!@#$%^&*';
        const options = [alpha, alpha, alpha, calpha, calpha, num, num, specials, calpha, num, num, specials,alpha, alpha, alpha, calpha, calpha, num, num, specials, calpha, num, num, specials];
        let opt, choose;
        let pass = "";
        for ( let i = 0; i < 15; i++ ) {
        opt = Math.floor(Math.random() * options.length);
        choose = Math.floor(Math.random() * (options[opt].length));
        pass = pass + options[opt][choose];
        options.splice(opt, 1);
        }
        returnval =pass;
        return returnval;
    }
</script>