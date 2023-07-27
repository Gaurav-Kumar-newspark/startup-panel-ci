<style type="text/css">
.display-6.display-custom-6.primary--text {
	font-size: 1.5rem;
	font-weight: 500;
	color: black;
	text-align: center;
}
.display-6.display-custom-6.white--text {
	font-size: 1.5rem;
	font-weight: 500;
	color: white;
	text-align: center;
}
</style>
<?php

$router = service('router');
$method = $router->methodName();
$sitetitle = "Backend Panel";
$mainlogo = "";
if (isset($thiscontrol)) 
{
	
}
?>

	<!-- main-sidebar -->
	<div class="">
		<aside class="app-sidebar">
			<div class="main-sidebar-header active">
				<a class="header-logo active" href="<?php echo base_url('dashboard');?>">
					<?php 
					if($mainlogo == "")
					{
						if($sitetitle != "")
						{
							$smalltxt = strtoupper(substr($sitetitle, 0, 1));
							?>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo desktop-logo primary--text" ><?php echo $sitetitle; ?></div>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo mobile-logo primary--text" ><?php echo $smalltxt; ?></div>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo desktop-dark white--text" ><?php echo $sitetitle; ?></div>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo mobile-dark white--text" ><?php echo $smalltxt; ?></div>
							<?php
						}
						else
						{
							?>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo desktop-logo primary--text" >SBP Panel</div>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo mobile-logo primary--text" >S</div>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo desktop-dark white--text" >SBP Panel</div>
								<div data-v-c7378482="" class="display-6 display-custom-6 main-logo mobile-dark white--text" >S</div>
							<?php
						}
					}
					else
					{
						?>
						
							<img src="<?php echo $mainlogo;?>" class="main-logo  desktop-logo" style="width: 85%;">
						<?php
					}
					?>
					
					
				</a>
			</div>
			<div class="main-sidemenu">
				<div class="slide-left disabled" id="slide-left">

				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
					<path fill="currentColor" d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z" />
				</svg>
					<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
				<?php 
					$checklicense = $thiscontrol->sca_dochecklicense();
					$licensestatus = (isset($checklicense["status"]) && $checklicense["status"] == "Active")?"Active":"Invalid";
				?>
				<ul class="side-menu">
					<?php 
						if($licensestatus == "Active")
						{
							
							?>
								<li class="slide">
									<a class="side-menu__item <?php echo (isset($menuactive) && $menuactive == "dashboard")?"active":""; ?>" data-bs-toggle="slide" href="<?php echo base_url('dashboard'); ?>"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
									<path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12C20,14.4 19,16.5 17.3,18C15.9,16.7 14,16 12,16C10,16 8.2,16.7 6.7,18C5,16.5 4,14.4 4,12A8,8 0 0,1 12,4M14,5.89C13.62,5.9 13.26,6.15 13.1,6.54L11.81,9.77L11.71,10C11,10.13 10.41,10.6 10.14,11.26C9.73,12.29 10.23,13.45 11.26,13.86C12.29,14.27 13.45,13.77 13.86,12.74C14.12,12.08 14,11.32 13.57,10.76L13.67,10.5L14.96,7.29L14.97,7.26C15.17,6.75 14.92,6.17 14.41,5.96C14.28,5.91 14.15,5.89 14,5.89M10,6A1,1 0 0,0 9,7A1,1 0 0,0 10,8A1,1 0 0,0 11,7A1,1 0 0,0 10,6M7,9A1,1 0 0,0 6,10A1,1 0 0,0 7,11A1,1 0 0,0 8,10A1,1 0 0,0 7,9M17,9A1,1 0 0,0 16,10A1,1 0 0,0 17,11A1,1 0 0,0 18,10A1,1 0 0,0 17,9Z" /></svg><span class="side-menu__label">Dashboard</span></a>
								</li>


								<li class="slide">
									<a class="side-menu__item <?php echo (isset($menuactive) && $menuactive == "generateapi")?"active":""; ?>" data-bs-toggle="slide" href="<?php echo base_url('generateapi'); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
									<path fill="currentColor" d="M7 7H5A2 2 0 0 0 3 9V17H5V13H7V17H9V9A2 2 0 0 0 7 7M7 11H5V9H7M14 7H10V17H12V13H14A2 2 0 0 0 16 11V9A2 2 0 0 0 14 7M14 11H12V9H14M20 9V15H21V17H17V15H18V9H17V7H21V9Z"></path>
									</svg>
									<span class="side-menu__label">API</span>
									</a>	
								</li>							

								<li class="slide">
										<a class="side-menu__item" data-bs-toggle="slide" href="#">
										<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
										</svg>
										<span class="side-menu__label logout">Logout</span>
										</a>
									
									</li>
								</li>	
							<?php										
						}
					?>
				</ul>
				<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
			</div>
		</aside>
	</div>
	<!-- main-sidebar -->
</div>
<script>
	$(document).ready(function()
	{
		$(".logout").click(function(event)
		{
			event.preventDefault();
			swal({
				title: "Are you sure want to logout ?",
				text: "",
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

		$(".modelclose").click(function(){
			$("#userconfirmation").modal('hide');
		});
	});
</script>