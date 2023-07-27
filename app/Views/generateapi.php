<!-- main-content -->
<div class="main-content app-content">

    <!-- container -->
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            
            <div class="left-content">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">API</li>
                </ol>
            </div>
            <div class="justify-content-center">
                <form action="<?php echo base_url('generateapi'); ?>" method="POST" id="generateapi">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" name="generateapikey" value="generateapikey">
                    <button type="submit" name="generateapikey" id="genbuton" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Generate New API Key</button>                </form>  
            </div>
            
        </div>
        <!-- /breadcrumb -->
        
        
        <div class="row" style="margin-top:-10px;">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

            
                <?php
                    if(isset($_SESSION["flashmsg"]) && !empty($_SESSION["flashmsg"])){

                        echo customlalertmsg($_SESSION['flashmsg'],$_SESSION['flashmsg']['result'],$_SESSION['flashmsg']['message']);
                    }
               ?>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table class="table table-bordered text-nowrap key-buttons border-bottoms">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>Apikey</th>
                                        <th>Created on</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                        if (isset($listapi) && !empty($listapi)) {
                                            foreach ($listapi as $apidata) {
                                            ?>
                                                <tr>
                                                <td id="cpy"><?php echo $apidata["apikey"]; ?></td>
                                                <td><?php echo $apidata["created_at"]; ?></td>
                                                <td style="text-align: center;">
                                                                                        <?php
                                                $attributes = array('id' => 'deleteapiform-' . $apidata["id"]);
                                                echo form_open('generateapi', $attributes);
                                                echo form_hidden('deleteapinum', $apidata["id"]);
                                                $data = [
                                                    'class' => 'btn btn-danger btn-sm deleteapibtn',
                                                    'data-formto' => 'deleteapiform-' . $apidata["id"],
                                                    'content' => '<i class="fa fa-trash"></i>'
                                                ];
                                                echo form_button($data);
                                                echo form_close();
                                            ?>  
                                                        </td>
                                                        </tr>
                                                <?php
                                            }
                                        }
                                        else {
                                        ?>
                                            <tr><td colspan="3"><center>No Record Found!!</center></td></tr>
                                            <?php
                                        }
                                        ?>      
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>

                  

                        
<script type="text/javascript">
/************************** Delete Api Key Start Here ********************************/
$(document).ready(function()
{
    var  checkloadonce = 0;
    $(".deleteapibtn").click(function(e)
    {
        $("#adminpassword").val('');
        data = $(this).data("formto");
        e.preventDefault();
        swal({
          title: "Are you sure you want to delete?",
          text: "Note: Once it's deleted, Your App using this API Credentials will not longer working",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => 
        {
            if (willDelete) 
            {  
                onetimepasswordconfirm = localStorage.getItem('onetimepasswordconfirm');
                if(onetimepasswordconfirm == "yes"){
                    $("#"+data).submit();
                }else{
                    $('#userconfirmation').appendTo("body").modal('show'); 
                    $("#adminpassword").click(function()
                    {
                        $('#adminpass-error').empty();
                    });
                    $(".modelclose").click(function()
                    {
                        $('#adminpassword').val('');
                        $('#adminpass-error').empty(); 
                    });
                    if(checkloadonce == 0)
                    {
                        $("#securityconfbtn").click(function(e)
                        {
                            e.preventDefault(); 
                            adminpassword = $("#adminpassword").val();
                            $('#securityconfbtn').html('Processing...').prop("disabled",true);
                            jQuery.ajax({
                                type:"POST",
                                url:'<?php echo base_url("/confirmationadminpassword"); ?>',
                                data:
                                {
                                    action:"confirmationadminpassword",
                                    value:adminpassword,
                                },
                                success:function(response)
                                {
                                    var obj = $.parseJSON(response);  
                                    $('#securityconfbtn').html('Confirm').prop("disabled",false);
                                    $.each(obj, function(index,value)
                                    {
                                        if(index == "result" && value == "success")
                                        {

                                            $('#adminpass-error').empty();
                                            $("#adminpassword").trigger("reset");
                                            var d = new Date();
                                            var curentdatetime = d.getFullYear()+"/"+(d.getMonth() + 1)+"/"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
                                            localStorage.setItem('onetimepasswordconfirm', "yes");
                                            localStorage.setItem('onetimepasswordconfirmtime', curentdatetime);
                                            $("#"+data).submit();
                                            
                                        }else if(index == "result" && value == "error")
                                        {
                                            $('#adminpass-error').empty();
                                            $("#adminpass-error").append('Invalid Password!');
                                        }else if(index == "result" && value == "empty")
                                        {
                                            $('#adminpass-error').empty();
                                            $("#adminpass-error").append('Please Enter The Password First!');
                                        }   
                                    });
                                },
                            });  
                        });
                        checkloadonce = Number(checkloadonce)+Number(1);
                    }
                }
                
            }
        }); 
        
    });
    /************************** Delete Api Key End Here ********************************/

    




    /************************** Generate Api Key Start Here ********************************/
    $('#genbuton').click(function(event)
    {
        event.preventDefault();
        $("#adminpassword").val('');
       
        onetimepasswordconfirm = localStorage.getItem("onetimepasswordconfirm");
        if(onetimepasswordconfirm == "yes"){
            $("#generateapi").submit();    
        }else{
            
            $('#userconfirmation').appendTo("body").modal('show'); 
            $("#adminpassword").click(function()
            {
                $('#adminpass-error').empty();
            });
            $(".modelclose").click(function()
            {
                $('#adminpassword').val('');
                $('#adminpass-error').empty(); 
            });
            if(checkloadonce == 0)
            {
                $("#securityconfbtn").click(function(e)
                {
                    e.preventDefault(); 
                    adminpassword = $("#adminpassword").val();
                    $('#securityconfbtn').html('Processing...').prop("disabled",true);
                    jQuery.ajax({
                        type:"POST",
                        url:'<?php echo base_url("/confirmationadminpassword"); ?>',
                        data:
                        {
                            action:"confirmationadminpassword",
                            value:adminpassword,
                        },
                        success:function(response)
                        {
                            var obj = $.parseJSON(response);  
                            $('#securityconfbtn').html('Confirm').prop("disabled",false);
                            $.each(obj, function(index,value)
                            {
                                if(index == "result" && value == "success")
                                {

                                    $('#adminpass-error').empty();
                                    $("#adminpassword").trigger("reset");
                                    var d = new Date();
                                    var curentdatetime = d.getFullYear()+"/"+(d.getMonth() + 1)+"/"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
                                    localStorage.setItem('onetimepasswordconfirm', "yes");
                                    localStorage.setItem('onetimepasswordconfirmtime', curentdatetime);
                                    $("#generateapi").submit();
                                    
                                }else if(index == "result" && value == "error")
                                {
                                    $('#adminpass-error').empty();
                                    $("#adminpass-error").append('Invalid Password!');
                                }else if(index == "result" && value == "empty")
                                {
                                    $('#adminpass-error').empty();
                                    $("#adminpass-error").append('Please Enter The Password First!');
                                }   

                            });
                        },

                    });  
                });
                checkloadonce = Number(checkloadonce)+Number(1);
            }
        }
        
       
    });
    /************************** Generate Api Key End Here ********************************/

});
</script>
<?php

if (isset($modelshow) && $modelshow == "yes") 
{

?>
    <div class="modal fade show" id="secretmodal" tabindex="-1" role="dialog" aria-labelledby="secretmodal" styke="" aria-modal="true" style="padding-right: 17px; display: block;" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo(isset($modelheader) && !empty($modelheader)) ? $modelheader : "header"; ?></h3>
                    
                    <span aria-hidden="true" class="modelclose" style="font-size: 35px;">×</span>
                </div>
                <div class="modal-body">
                    <?php echo(isset($modalcontent) && !empty($modalcontent)) ? $modalcontent : "header"; ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="sendonmailtoadmin" value="sendonmail" readonly=""> 
                    <button type="button" class="btn btn-secondary  modelclose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#secretmodal').modal('show');
         

            $(".modelclose").click(function() {
                $("#secretmodal").modal("hide");
            });
        });
    </script>
    <?php
}
?>
                                              
