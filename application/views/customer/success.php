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
					Price (<?php if($carttotal_amount >0){  echo count($carttotal_amount).'  '.'items';}else{  echo "item";  }?>)
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
		
		<div class="col-md-offset-3 col-md-8 col-md-offset-right-1">
		<div class="panel panel-primary">
			<div class="panel-heading ">Success</div>
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
						   <a href="javascript:void(0);" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Billing Address</b> </p>
                    </li>

                    <li role="presentation" class="">
                        <a href="javascript:void(0);" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-credit-card"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Payment mode </b></p>
                    </li>
                    <li role="presentation" class="active">
                        <a href="javascript:void(0);" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Thanks for Shopping </b></p>
                    </li>
                </ul>
            </div>

         
       <div class="tab-content">
					<div class="title"><span>Thanks for Shoping</span></div>
					 <?php if($this->session->flashdata('paymentsucess')): ?>
						<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('paymentsucess');?></div>
			<?php endif; ?>
						<div class="row">
							<div class="col-md-6">
								<h3 class="site_co"> </h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
							</div>
							<div class="col-md-6">
								<div class="table-responsive">
								<table class="table table-bordered table-cart">
								  <thead>
									<tr>
									  <th>Product</th>
									  <th>Description</th>
									  <th>Status</th>
									  <th>Price</th>
									</tr>
								  </thead>
								  <tbody>
								  
								  <?php 
								  //echo '<pre>';print_r($order_items);exit;
								  $total='';
								  foreach ($order_items as $items_list){ ?>
									<tr>
									
									
									  <td class="img-cart">
										<a href="<?php echo base_url('category/productview/'.base64_encode($items_list['item_id'])); ?>">
										  <img src="<?php echo base_url('uploads/products/'.$items_list['item_image']); ?>" class="img-thumbnail">
										</a>
									  </td>
									  <td>
										<p><?php echo $items_list['item_description']; ?></p>
									  </td>
									  <td class="input-qty">Confirmed</td>
									 
									  <td class="sub"><?php echo $items_list['total_price']; ?></td>
									 
									</tr>
									
									<?php $total +=$items_list['total_price']; ?>
									<?php } ?>
									
									<tr>
									  <td colspan="3" class="text-right">Total</td>
									  <td colspan="1"><b><?php echo $total; ?></b></td>
									</tr>
									<tr>
									<td colspan="3" class="text-right">Grand Total</td>
									<td colspan="1"><b><?php echo $totalpayamount=$carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount']; ?></b></td>
									</tr>
								  </tbody>
								</table>
							  </div>
							</div>
							<div class="clearfix"></div>
							
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

 