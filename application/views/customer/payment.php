<!DOCTYPE html>


<style>
.panel-title > a:before {
    float: left !important;
    font-family: FontAwesome;
    content:"\f1db";
    padding-right: 5px;
}

.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
</style>

<div class="" >
	
</div>
<body >
<div class="pad_bod">
		<div class="row">
		<div class="col-md-3" >
		<div class="panel panel-primary">
			<div class="panel-heading ">Price details</div>
			<div class="panel-body">
				<div class="pull-left">
					Price (<?php if(count($carttotal_amount['itemcount']) >0){  echo $carttotal_amount['itemcount'].'  '.'items';}else{  echo "item";  }?>)
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo isset($carttotal_amount['pricetotalvalue'])?$carttotal_amount['pricetotalvalue']:''; ?>
				</div>
				
				<div class="clearfix"></div>
				<div class="mar_t20">
				<div class="pull-left">
					Delivery Charges
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo isset($carttotal_amount['delivertamount'])?$carttotal_amount['delivertamount']:''; ?>
				</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="mar_t20">
				<div class="pull-left">
					<b>Amount Payable</b>
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><b>
				<?php 	$totalpayamount=$carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount'];
					echo $totalpayamount;
				?>
				</b>
				</div>
				</div>
				
			</div>
		</div>
		</div>
		
		<div class="col-md-9 ">
		<div class="panel panel-primary">
			<div class="panel-heading ">Payment</div>
			<div class="panel-body">
			<section>
        <div class="wizard">
           
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation">
						 <a href="#" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Check Cart</b> </p>
                    </li>  
					<li role="presentation" class="disabled" >
						   <a href="<?php echo base_url('customer/billing'); ?>" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Billing Address</b> </p>
                    </li>
					<li role="presentation" class="disabled" >
						   <a href="javascript:void(0);" data-toggle="tab" aria-controls="step3" role="tab" title="Delivery Charges">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Delivery Charges</b> </p>
                    </li>

                    <li role="presentation" class="active">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-credit-card"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Payment mode </b></p>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Thanks for Shopping </b></p>
                    </li>
                </ul>
            </div>

         
			<div class="tab-content">
					<div class="title"><span>Billing Address</span></div>
					 <?php if($this->session->flashdata('paymenterror')): ?>
					<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('paymenterror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
						<div class="">
						<div class="row">
							<form method="post" name="payuForm" action="https://test.payu.in/_payment">
							<input name="key" type="hidden" value="<?php echo $this->config->item('MERCHANTKEY'); ?>" />
							<input name="txnid" type="hidden"  value="<?php echo $txnid; ?>" />
							<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
							<input type="hidden" name="xyz" value="<?php echo $hash ?>"/>
							<input name="amount" type="hidden" value="<?php echo $carttotal_amount['pricetotalvalue']+$carttotal_amount['delivertamount']; ?>" />
							<input name="productinfo" type="hidden" value="<?php echo $productinfo; ?>">
							<input name="udf1" type="hidden" value="">
							<input name="udf2" type="hidden" value="">
							<input name="udf3" type="hidden" value="">
							<input name="udf4" type="hidden" value="">
							<input name="udf5" type="hidden" value="">
							<input name="firstname" id="firstname" type="hidden" value="<?php echo $billimgdetails['name']; ?>"/>
							<input name="email" id="email"  type="hidden"  value='<?php echo $emailid; ?>'>
							<input name="phone"   type="hidden"  value="<?php echo $billimgdetails['mobile']; ?>">
							<input name="surl" type="hidden" value="<?php echo base_url('customer/success'); ?>" size="64" />
							<input name="furl" type="hidden" value="<?php echo base_url('customer/paymentfailure'); ?>" size="64" />
							<input name="curl" type="hidden" value="<?php echo base_url('payu/cancel'); ?>" />
							<div>
							<input type="submit" name="submit_form" value="Click Here for Payment" class="btn btn-primary pull-right " style="margin-right:50%">
							</div>
							</form>
					</div>
                       
        </div>            
    </section>
	
	   
	   </div>
	   
	   </div>
	   </div>
	</div>
	</div>
	</div>

	


 