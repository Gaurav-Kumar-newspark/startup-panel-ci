<!-- main-content -->
<div class="main-content app-content">

	<!-- container -->
	<div class="main-container container-fluid">

		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between">
			<div class="justify-content-center mt-2">
				<ol class="breadcrumb">
					<li class="breadcrumb-item tx-15">Dashboard</li>
					
				</ol>
			</div>

		</div>
		<!-- /breadcrumb -->

		<!-- row -->
		<div class="row">
			
			<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
				<a href="<?php echo base_url('generateapi'); ?>">
					<div class="card sales-card circle-image4">
						<div class="row">
							<div class="col-8">
								<div class="ps-4 pt-4 pe-3 pb-4 pt-0">
									<div class="">
										<h6 class="mb-2 tx-12">API's</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<h4 class="tx-26 font-weight-semibold mb-2 counter-count"><?php echo (isset($getallmultipaldata["totalapis"]) && !empty($getallmultipaldata["totalapis"]))?$getallmultipaldata["totalapis"]:"0"; ?></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="circle-icon widget bg-success-gradient text-center align-self-center success-success overflow-hidden box-shadow-success">
									<i class='fa fa-key tx-20 lh-lg text-white'></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<!-- row closed -->	
			
	</div>
	<!-- /Container -->
</div>
<!-- /main-content -->
<style type="text/css">
	a .card {
	border : 1px solid #efefef !important;
	transition: 0.3s;
	transform: translateY(-0px);
}
a .card:hover {
	box-shadow: 0px 5px 10px -6px #000;
	transition: 0.3s;
	transform: translateY(-8px);
} 
</style>