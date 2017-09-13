<style>
.stepwizard-step p {
    margin-top: 10px;    
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;     
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
    
}

.stepwizard-step {    
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.font_span{
	font-size:17px;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	border:none;
}
tr th:first-child,
tr th:last-child {
    width:40%;
	font-weight:400;
	color:#aaa;
}

</style>

<body >
<div class="container">
		<div class="row">
		<?php //echo base64_decode($this->uri->segment('3'));
		//echo '<pre>';print_r($item_details);exit; ?>
		
	 <!-- track start-->
<div class="row">
  <?php if($this->session->flashdata('success')): ?>
		<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>


			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
		<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
	
			<div class="panel panel-primary">
			<div class="panel-body">
			<div class="col-md-4" style="border-right:1px solid #45b1b5">
				<table class="table " >
						<div><h5>Return Options</h5></div>
						<div class="radio"><label><input type="radio" name="returnoptions" onclick="returnoption(this.value);" value="1" ><span>Refund</span></label></div>
						<?php if($product_details['category_id']!=18){ ?>
						<div class="radio"><label><input type="radio" name="returnoptions" onclick="returnoption(this.value);" value="2"><span>Exchange</span></label></div>
						<?php }?>
						<div class="radio"><label><input type="radio" name="returnoptions" onclick="returnoption(this.value);" value="3" ><span>Replacement</span></label></div>
				  </table>
			</div>
			
</div>
</div>
</div>

			<div class="row rev_form" id="refundrefundfields" style="display:none">
				<div class="panel panel-primary">
			<div class="panel-body">
				<form id="addrefund" name="addrefund" action="<?php echo base_url('customer/refundpost'); ?>" method="POST">
					<input type="hidden" name="status_id" id="status_id" value="<?php echo $order_status_details['status_id']; ?>">
					<input type="hidden" name="order_item_id" id="order_item_id" value="<?php echo $order_status_details['order_item_id']; ?>">
					<input type="hidden" name="order_id" id="order_id" value="<?php echo $order_status_details['order_id']; ?>">
					<input type="hidden" name="refund_type" id="refund_type" value="">
					<div class="row">
							<div class=" col-md-6 col-md-offset-3">		
							
								
								<div class="form-group">
									<label for="pwd">Region:</label>
									<input type="text" id="region" name="region" value="" class="form-control" placeholder="Region">
								</div>
							  
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
					</div>
					</form>
				 </div>
				</div>
		</div>
		<div class="row rev_form" id="refundexchangefields" style="display:none">
				<div class="panel panel-primary">
			<div class="panel-body">
				<form id="addexchange" name="addexchange" action="<?php echo base_url('customer/refundpost'); ?>" method="POST">
					<input type="hidden" name="status_id" id="status_id" value="<?php echo $order_status_details['status_id']; ?>">
					<input type="hidden" name="order_item_id" id="order_item_id" value="<?php echo $order_status_details['order_item_id']; ?>">
					<input type="hidden" name="order_id" id="order_id" value="<?php echo $order_status_details['order_id']; ?>">
					<input type="hidden" name="refund_type1" id="refund_type1" value="">

					<div class="row">
							<div class=" col-md-6 col-md-offset-3">		
							
								
								<?php   
								
								if($product_details['category_id']==19){
								
								if($product_details['subcategory_id']==7 || $product_details['subcategory_id']==9 || $product_details['subcategory_id']==21 ||  $product_details['subcategory_id']==24){ ?>
								
								<div class="form-group">
									<label for="pwd">Region:</label>
									<input type="text" id="region" name="region" value="" class="form-control" placeholder="Region">
								</div>
								
								<?php }else{ ?>
								<div class="form-group">
									<label for="exampleInputEmail1">Color</label>
									<select class="form-control " id="color" name="color" >
									<option value="">Select </option>
									<?php foreach($color_list as $list){ ?>
									<option value="<?php echo $list['color_name']; ?>"><?php echo $list['color_name']; ?></option>
									<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Size</label>
									<select class="form-control " id="size" name="size" >
									<option value="">Select </option>
									<?php foreach($size_list as $list){ ?>
									<option value="<?php echo $list['p_size_name']; ?>"><?php echo $list['p_size_name']; ?></option>
									<?php } ?>
									</select>
								</div>



								<?php }	}else{ ?>
								<div class="form-group">
									<label for="pwd">Region:</label>
									<input type="text" id="region" name="region" value="" class="form-control" placeholder="Region">
								</div>
								
								<?php } ?>
							

							  
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
					</div>
					</form>
				 </div>
				</div>
		</div>

</div>
</div>


<script>
function returnoption(id){
	
	document.getElementById("refund_type").value=id;
	document.getElementById("refund_type1").value=id;

	if(id==1){
		$('#refundrefundfields').show();
		$('#refundexchangefields').hide();
	}else if(id==2){
		$('#refundrefundfields').hide();
		$('#refundexchangefields').show();
	}else if(id==3){
			$('#refundrefundfields').show();
			$('#refundexchangefields').hide();

	}
	
}
$(document).ready(function() {
    $('#addexchange').bootstrapValidator({
       
        fields: {
            
			
            color: {
              validators: {
					notEmpty: {
						message: 'Please select a color'
					}
                }
            },
			size: {
              validators: {
					notEmpty: {
						message: 'Please select a size'
					}
                }
            },
			region: {
             validators: {
					notEmpty: {
						message: 'region is required'
					}
				}
            }
        }
    });
});
$(document).ready(function() {
    $('#addrefund').bootstrapValidator({
       
        fields: {
            
			
            
			region: {
             validators: {
					notEmpty: {
						message: 'region is required'
					}
				}
            }
        }
    });
});
</script>

 