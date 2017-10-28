<?php //echo '<pre>';print_r($orders_lists);exit; ?>
<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
			
		<body >
		<div class="container">
		<?php if($this->session->flashdata('successmsg')): ?>
						<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('successmsg');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			<?php if($this->session->flashdata('permissionerror')): ?>
							<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('permissionerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			<?php foreach ($orders_lists as $orders){ 
			
			
			//echo '<pre>';print_r($orders);?>
			<div class="row">
			<div class="col-md-12 ">
            <div class="well well-sm ord_del" style="background:#fff;">
                <div style="padding:20px;">
					<div class="pull-left">
						<span style="background-color:#009688;color:#fff;padding:10px;border-radius:5px;"><b>ORDER ID:&nbsp; </b><?php echo $orders['order_item_id']; ?></span>
					</div>
					<div class="pull-right"> 
					<span style="font-size:17px;">Status :</span>
					<span class="site_col">
					
					<?php if($orders['status_confirmation']==5){ 
					
					echo "cancelled"; 
					}else{
					
							if($orders['status_confirmation']==1 && $orders['status_packing']==''){
								echo "Order Confirmed ";  
							  }else if($orders['status_confirmation']==1 && $orders['status_packing']==2 && $orders['status_road']==''){
								  echo "Packing Order";
							  }else if($orders['status_confirmation']==1 && $orders['status_packing']==2 && $orders['status_road']==3 && $orders['status_deliverd']=='' || $orders['status_deliverd']==0){
								  echo "Order on Road";
							  }else if($orders['status_confirmation']==1 && $orders['status_packing']==2 && $orders['status_road']==3 && $orders['status_deliverd']==4 && $orders['status_refund']==''){
								  echo "Delivered";
							  }else if($orders['status_refund']!=''){
								 echo $orders['status_refund']; 
							  }
					  
					}
					  ?>
					  </span>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo base_url('customer/orederdetails/'.base64_encode($orders['order_item_id'])); ?>"> <span style="background-color:#009688;color:#fff;padding:4px 8px;border-radius:5px;">View</span></a>
				
					</div>
					<div class="clearfix"></div>
				</div>
				<hr style="margin:0px 10px 10px 0px;border-top:1px solid #ddd;">
			
                    <div class="col-xs-2 col-md-2 text-center" style="width:80px;height:auto;padding-bottom:10px;">
                       <a href="<?php echo base_url('category/productview/'.base64_encode($orders['item_id'])); ?>"> <img  src="<?php echo base_url('uploads/products/'.$orders['item_image']); ?>" alt="<?php echo $orders['item_image']; ?>"
                            class="img-rounded img-responsive thumbnail" /></a>
                    </div>
                    <div class="col-xs-5 col-md-5 section-box">
                        <div  style="text-transform: uppercase;" class=" whish_head">
                            <?php echo $orders['item_name']; ?>
							</div>
							
							<?php if($orders['color']!=''){  ?>
							<div>
							<span class="tras_col">
								color : <?php echo $orders['color']; ?>
							</span>
							</div>
							<?php } ?>
							<div>
							<span class="tras_col">
								Seller : <?php echo $orders['store_name']; ?>
							</span>
							</div>
						
                        
                    </div>  
					<div class="col-xs-2 col-md-2 section-box">
                     
							
							<div>
								<span style="font-size:18px;">₹<?php echo number_format($orders['total_price'], 2 ); ?></span> &nbsp;&nbsp;
								
							</div>
                        
                    </div>
					<div class="col-xs-3 col-md-3 section-box">
                     
							
							<div>
								<span style="font-size:14px;">
					
								<?php  $timestamp = strtotime($orders['create_at']) + 2*60*60;
									$time = date('g:i A', $timestamp);?>
								Delivered on <?php echo isset($orders['create_at'])?Date('M-d-Y',strtotime(htmlentities($orders['create_at']))):'';  ?> <?php echo $time; ?>
								
								
								</span> 
								
							</div>
							<?php if($orders['status_deliverd']==4){ ?>
							<div>
								<span class="tras_col">Your item has been delivered</span> 
							</div>
							
							<?php } ?>
                        
                    </div>
					
				<div class="clearfix"> &nbsp;</div>
				<hr style="margin:0px 10px 10px 0px;border-top:1px solid #ddd;">
				<div class="pull-left tras_col">Ordered On <?php echo isset($orders['create_at'])?Date('d-M-Y h:i:s A',strtotime(htmlentities($orders['create_at']))):'';  ?>
				</div>
				<div class="pull-right"><span style="font-size:17px;font-weight:500;color:#bbb">Order Total :  </span> &nbsp;<span style="font-size:16px;font-weight:400" class="site_col">₹<?php echo number_format($orders['total_price'], 2); ?></span>
				</div>
				<div class="clearfix"></div>
            </div>
        </div>
			</div>
			<?php } ?>
			
			
			<div class="clearfix">&nbsp;</div>
			
		</div>
	</div>
	</div>
	<div class="clearfix"></div>

	

 