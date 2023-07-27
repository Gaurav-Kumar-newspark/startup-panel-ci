<?php 
    echo link_tag('public/assets/css/profilestyle.css');
    $session = session();
    $currentadminid = $session->get("adminid");
    if(isset($currentadminid) && !empty($currentadminid)){

        if(isset($admindetails) && !empty($admindetails))
        {
            $adminID = (isset($admindetails->id) && !empty($admindetails->id))?$admindetails->id:"";
            $firstname = (isset($admindetails->firstname) && !empty($admindetails->firstname))?$admindetails->firstname:"";
            $lastname = (isset($admindetails->lastname) && !empty($admindetails->lastname))?$admindetails->lastname:"";
            $email = (isset($admindetails->email) && !empty($admindetails->email))?$admindetails->email:"";
            $phonenumber = (isset($admindetails->phonenumber) && !empty($admindetails->phonenumber))?$admindetails->phonenumber:"";
        }

        ?>
            <!-- main-content -->
            <div class="main-content app-content">

                <!-- container -->
                <div class="main-container container-fluid">

                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="left-content" style="padding-left: 10px!important;">
                
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            
                            </ol>
                
                        </div>
                    </div>
                    <!-- /breadcrumb -->
                    
                    <!-- row -->
                    <div class="col-xl-8 col-lg-8 col-md-12 col-xs-12">
                        <?php 
                            if(isset($_SESSION["profilemsg"]) && !empty($_SESSION["profilemsg"])){

                                echo customlalertmsg($_SESSION['profilemsg'],$_SESSION['profilemsg']['result'],$_SESSION['profilemsg']['message']);
                            }
                            if (isset($errors) && !empty($errors)) {
                                ?>
                                                            
                                    <div class="alert alert-danger alert-dismissible">
                                                                        
                                        <?php
                                            foreach ($errors as $erroris) {
                                                echo $erroris . "<br>";
                                            }
                                        ?>
                                    </div>
                                <?php
                            }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            echo form_open('profile', 'autocomplete="off"');
                                        ?>
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">Email</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <input type="text" style="border: none;" class="form-control" value="<?php echo $email; ?>" readonly>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">First Name</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <?php
                                                    $errorboderclass = (isset($errors["firstname"]) && !empty($errors["firstname"])) ? "addredborder" : "";
                                                    $data = [
                                                        'type' => 'text',
                                                        'name' => 'firstname',
                                                        'id' => 'firstname',
                                                        'value' => (!empty(set_value('firstname'))) ? set_value('firstname') : $firstname,
                                                        'class' => 'form-control ' . $errorboderclass,
                                                        'placeholder' => 'First Name',
                                                        'style' => 'border:1px solid #b5a6a6',


                                                    ];

                                                    echo form_input($data);
                                                ?>
                                            </div>
                                        </div>

                                                                
                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">Last Name</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <?php
                                                    $errorboderclass = (isset($errors["lastname"]) && !empty($errors["lastname"])) ? "addredborder" : "";
                                                    $data = [
                                                        'type' => 'text',
                                                        'name' => 'lastname',
                                                        'id' => 'lastname',
                                                        'value' => (!empty(set_value('lastname'))) ? set_value('lastname') : $lastname,
                                                        'class' => 'form-control ' . $errorboderclass,
                                                        'placeholder' => 'Last Name',
                                                        'style' => 'border:1px solid #b5a6a6',


                                                    ];

                                                    echo form_input($data);
                                                ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">Phone Number</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <?php
                                                    $errorboderclass = (isset($errors["phonenumber"]) && !empty($errors["phonenumber"])) ? "addredborder" : "";
                                                    $data = [
                                                        'type' => 'text',
                                                        'name' => 'phonenumber',
                                                        'id' => 'phonenumber',
                                                        'value' => (!empty(set_value('phonenumber'))) ? set_value('phonenumber') : $phonenumber,
                                                        'class' => 'form-control ' . $errorboderclass,
                                                        'placeholder' => 'Phone Number',
                                                        'style' => 'border:1px solid #b5a6a6',


                                                    ];

                                                    echo form_input($data);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <span class="text-small">If you wish to change password; enter the new password in the below fields and click on Update</span>
                                            </div>
                                        </div>
                                                                

                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">New Password</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <?php
                                                    $errorboderclass = (isset($errors["password"]) && !empty($errors["password"])) ? "addredborder" : "";
                                                ?>
                                                <input type="password" name="password" placeholder="Password" style="border:1px solid #b5a6a6"  id="password" class="form-control <?php echo $errorboderclass; ?>"  value="<?php echo (!empty(set_value('password'))) ? set_value('password') : ""; ?>"><i class="far fa-eye" id="togglePassword3" style="margin-left: -30px; cursor: pointer;"></i>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">Confirm Password</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <?php
                                                    $errorboderclass = (isset($errors["confirmpassword"]) && !empty($errors["confirmpassword"])) ? "addredborder" : "";
                                                ?>
                                                <input type="password" name="confirmpassword" placeholder="Confirm Password" style="border:1px solid #b5a6a6"  id="confirmpassword" class="form-control <?php echo $errorboderclass; ?>"  value="<?php echo (!empty(set_value('confirmpassword'))) ? set_value('confirmpassword') : ""; ?>"><i class="far fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
                                            </div>
                                        </div>


                                                                
                                        <div class="form-group">
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                <span class="text-small">Please confirm your admin password to add or make changes to administrator account details</span>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="inputSMTPPort" class="col-xxl-12 col-sm-12 col-md-8 col-lg-12 col-xl-12 form-label">Current Password</label>
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                            <?php
                                                $errorboderclass = (isset($errors["currentpassword"]) && !empty($errors["currentpassword"])) ? "addredborder" : "";
                                            ?>
                                            <input type="password" name="currentpassword" placeholder="Current Password" style="border:1px solid #b5a6a6"  id="currentpasssec" class="form-control <?php echo $errorboderclass; ?>"  value="<?php echo (!empty(set_value('currentpassword'))) ? set_value('currentpassword') : ""; ?>"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                            </div>
                                        </div>

                                                            
                                        <div class="form-group">
                                            <div class="col-xxl-12 col-sm-10 col-md-12">
                                                    <button name="updatedetails" value="update" type="submit" class="btn btn-primary btn-md">Update</button>
                                            </div>
                                        </div>

                                        <?php echo form_close(); ?>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        <?php

    }else{

        ?>
            <!-- main-content -->
            <div class="main-content app-content">

                <!-- container -->
                <div class="main-container container-fluid">

                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="left-content" style="padding-left: 10px!important;">
                    
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                
                            </ol>
                    
                        </div>
                    </div>
                    <!-- /breadcrumb -->
            
                    <!-- row -->
                    <div class="col-xl-8 col-lg-8 col-md-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="alert alert-danger"><span>Error&nbsp;&nbsp;</span>Authorization failed...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
?>
<script type="text/javascript">
    $(document).ready(function(){

        $("#togglePassword").click(function () {
            var input = $("#currentpasssec");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });

        $("#togglePassword2").click(function(){
            var input = $("#confirmpassword");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $("#togglePassword3").click(function(){
            var input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>