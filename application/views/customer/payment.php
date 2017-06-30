<!DOCTYPE html>
<html lang="en">

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

<div class="" style="margin-top:150px;">
	
</div>
<body >
<div class="pad_bod">
		<div class="row">
		<div class="col-md-3" style="position: fixed;">
		<div class="panel panel-primary">
			<div class="panel-heading ">Price details</div>
			<div class="panel-body">
				<div class="pull-left">
					Price (8 item)
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i>4800
				</div>
				
				<div class="clearfix"></div>
				<div class="mar_t20">
				<div class="pull-left">
					Delivery Charges
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i>84
				</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="mar_t20">
				<div class="pull-left">
					<b>Amount Payable</b>
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><b>4884</b>
				</div>
				</div>
				
			</div>
		</div>
		</div>
		
		<div class="col-md-offset-3 col-md-8 col-md-offset-right-1">
		<div class="panel panel-primary">
			<div class="panel-heading ">Payment</div>
			<div class="panel-body">
			<section>
        <div class="wizard">
           
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation">
						 <a href="<?php echo base_url('customer/cart'); ?>" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Check Cart</b> </p>
                    </li>  
					<li role="presentation" class="" >
						   <a href="<?php echo base_url('customer/billing'); ?>" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Billing Address</b> </p>
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
					  <div class="table-responsive">
						<?php //echo '<pre>';print_r($billingaddress);//exit; ?>
						
						<form action="<?php echo base_url('customer/billingaddresspost'); ?>" method="post" name="billingaddress" id="billingaddress">
										<div class="form-group">
										  <label>Name:</label>
										  <input type="text" id="name" name="name" class="form-control" value="<?php echo $customerdetail['cust_firstname'].''.$customerdetail['cust_lastname']; ?>">
										</div>
										<div class="form-group">
										  <label >Mobile:</label>
										  <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $customerdetail['cust_mobile'];?>" >
										</div>
										<div class="form-group">
										 <label class="control-label">Delivery Location Area</label>
											<select class="form-control" id="area" name="area">
											<option value="">Select</option>
											<?php foreach($locationdata as $localarea){ ?>
											<?php if($customerdetail['area']==$localarea['location_id']){	?>
												<option value="<?php echo $localarea['location_id']; ?>" selected><?php echo $localarea['location_name']; ?></option>
											<?php }else{ ?>
											<option value="<?php echo $localarea['location_id']; ?>"><?php echo $localarea['location_name']; ?></option>
											<?php } ?>
											<?php } ?>
											</select> 
										</div>
										<div class="form-group">
										  <label >Address 1:</label>
										  <input type="text" id="address1" name="address1" class="form-control" value="<?php echo $customerdetail['address1']; ?>"  >
										</div>
										<div class="form-group">
										  <label >Address 2:</label>
										  <input type="text" id="address2" name="address2" class="form-control"  value="<?php echo $customerdetail['address2']; ?>" >
										</div> 
					
						<button style="float:right;" type="submit">Proceed to Checkout</span></button>
					</form>
				
					
				</div>
    </section>
	
	   </div>
	   </div>
	   
	   </div>
	   </div>
	</div>
	

<script>

	$(document).ready(function() {
    $('#billingaddress').bootstrapValidator({
       
        fields: {
            
             name: {
              validators: {
					notEmpty: {
						message: 'Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			mobile: {
              validators: {
					 notEmpty: {
						message: 'Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 to 14 digits'
					}
                }
            },
			area: {
              validators: {
					notEmpty: {
						message: 'Please select an area'
					}
                }
            },
			address1: {
				validators: {
					notEmpty: {
						message: 'Address1 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address1 wont allow <> [] = % '
					}
				
				}
			},
			address2: {
				validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address2 wont allow <> [] = % '
					}
				
				}
			}
			
			
        }
    });
});
</script>

 