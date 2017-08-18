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
		<?php //echo '<pre>';print_r($item_details);exit; ?>
		
	 <!-- track start-->
<div class="row">
	
			<div class="panel panel-primary">
			<div class="panel-body">
<div class="col-md-4" style="border-right:1px solid #45b1b5">
<table class="table " >
	<div><h5>ORDER DETAILS</h5></div>
    <tbody>
      <tr>
       <th>Order ID</th>
        <td><?php echo isset($item_details['order_item_id'])?'ORDER2017'.$item_details['order_item_id']:'';  ?></td>
        
      </tr>
	  <tr>
       <th>Item Name</th>
        <td><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?></td>
        
      </tr>
      <tr>
      <th>Order Date</th>
        <td><?php echo isset($item_details['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($item_details['create_at']))):'';  ?></td>
        
      </tr>
      <tr>
        <th>Amount Paid</th>
        <td>₹<?php echo isset($item_details['total_price'])?$item_details['total_price']:'';  ?>through <?php echo isset($item_details['payment_mode'])?$item_details['payment_mode']:'';  ?></td>
        
      </tr>
	  <tr>
        <th>Delivery Amount</th>
        <td>₹<?php echo isset($item_details['delivery_amount'])?$item_details['delivery_amount']:'';  ?></td>
        
      </tr>
    </tbody>
  </table>
</div>
<div class="col-md-4" style="border-right:1px solid #45b1b5">
	<div><h5>ORDER DETAILS</h5></div>
		<div>
			<p><strong>Name :<?php echo isset($item_details['name'])?$item_details['name']:'';  ?></strong></p>
			<p><strong>Email Address :<?php echo isset($item_details['customer_email'])?$item_details['customer_email']:'';  ?></strong></p>
			<p><strong>Address :<?php echo isset($item_details['customer_address'])?$item_details['customer_address']:'';  ?></strong></p>
			<p><strong>Phone :<?php echo isset($item_details['customer_phone'])?$item_details['customer_phone']:'';  ?></strong></p>
		</div>
    
</div>
<div class="col-md-4" >

	<div><h5>MANAGE ORDER</h5></div>
		<p ><a class="site_col">REQUEST INVOICE</a></p>
    
</div>
				
				

</div>
		</div>
		</div>
		<div class="row">
	
			<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-md-4">
					<div class="col-md-4">
						<img style="width:60px" src="<?php echo base_url(); ?>assets/home/images/user.png" />
					</div>
					<div class="col-md-8">
						<p><a href="<?php echo base_url('category/productview/'.base64_encode($item_details['item_id'])); ?>">  <td><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?></td></a></p>
						<div>Color: <?php echo isset($item_details['color'])?$item_details['color']:'';  ?></div>
						<div>7 Days Exchange</div>
					
					</div>
				</div>
				<div class="col-md-5">
					<div class="stepwizard">
						<div class="stepwizard-row">
							<div class="stepwizard-step">
							
								<?php if($item_details['status_confirmation']==1){ ?>
								<button type="button" class="btn btn-primary btn-circle">1</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">1</button>
								<?php } ?>
								<p>Order Confirmation</p>
							</div>
							<div class="stepwizard-step">
								<?php if($item_details['status_confirmation']==2){ ?>
								<button type="button" class="btn btn-primary btn-circle">2</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle"disabled="disabled">2</button>
								<?php } ?>
								<p>Packing Order</p>
							</div>
							<div class="stepwizard-step">
								<?php if($item_details['status_confirmation']==3){ ?>
								<button type="button" class="btn btn-primary btn-circle">3</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">3</button>
								<?php } ?>
								<p>Order on Road</p>
							</div> 
							<div class="stepwizard-step">
									<?php if($item_details['status_confirmation']==4){ ?>
								<button type="button" class="btn btn-primary btn-circle">4</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">4</button>
								<?php } ?>
								<p>Delivered</p>
							</div> 
							</div> 
					</div>
				

				</div>
				<div class="col-md-3">
					<div class="col-md-3">
							<span class="font_span">₹<?php echo isset($item_details['total_price'])?$item_details['total_price']:'';  ?></span>
					</div>
					<div class="col-md-9">
							<span class="site_co">2 Offers Applied</span>
					</div>
				</div>
					<div class="clearfix">&nbsp;</div>
						<br>
					<div class=""><span><img src="<?php echo base_url(); ?>assets/home/images/track.png" /></span> &nbsp; 
					<i class="font_span">
					<?php $expire = date($item_details['create_at'], strtotime('+1 hour')); ?>
					Delivery expected by <?php echo isset($expire)?Date('M-d-Y h:i:s A',strtotime(htmlentities($expire))):'';  ?>
					</i></div>
					<hr	>
				<div class="col-md-3 col-md-offset-9">
						<span class="font_span"><b>Toatal</b></span>&nbsp;&nbsp;
						<span class="font_span">₹<?php echo $item_details['total_price']+$item_details['delivery_amount']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
						<span class="font_span site_col">Savings</span>&nbsp;&nbsp;
						<span class="font_span">₹<?php echo isset($item_details['discount'])?$item_details['discount']:'';  ?></span>
				</div>

			</div>
		</div>
		</div>
	 <!-- track end-->
	   
	   </div>
	</div>
	


 