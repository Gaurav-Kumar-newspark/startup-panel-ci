<?php 
if (!function_exists('customlalertmsg')) {
    function customlalertmsg($sessionexisting,$type,$message)
    {  
        if(isset($sessionexisting) && !empty($sessionexisting)){
            
            if(isset($type) && $type == "success"){
                ?>
                    <div class="alert alert-success alert-dismissible" style="width:100%;">
                        <strong>Success &nbsp;</strong> <?php echo $message; ?>
                    </div>
                <?php 
            }elseif(isset($type) && $type == "error"){
                ?>
                    <div class="alert alert-danger alert-dismissible" style="width: 100%;">
                        <strong>Error &nbsp;</strong> <?php echo $message; ?>
                    </div>
    
                <?php 
            }
        }
    }
}
?>