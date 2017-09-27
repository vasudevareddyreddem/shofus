<body >
<div class="container">
<?php if($this->session->flashdata('adderror')): ?>
		<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('adderror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('productsuccess');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>


			<?php endif; ?>
 <?php 
			  //echo '<pre>';print_r($whistlist_items);exit;
			  $w=0;foreach($whistlist_items as $items){ ?>
			  <input type="hidden" name="orginalqty" id="orginalqty<?php echo $w; ?>" value="<?php echo $items['item_quantity']; ?>" >
			  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
				<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $items['item_id']; ?>" >
				<input type="hidden" name="wishlist" id="wishlist" value="1" >
         
	<div class="row">
		<div class="col-md-8 col-md-offset-4">
            <div class="well well-sm" style="background:#fff;">
                <div class="row">
				<div style="position:absolute;top:20px;right:50px">
					
					<button type="submit"><i class="glyphicon glyphicon-shopping-cart tras_col" ></i></button>
					<a href="<?php echo base_url('customer/deletewishlist/'.base64_encode($items['id'])); ?>"><span class="glyphicon glyphicon-trash tras_col" ></span></a>
				</div>
                    <div class="col-xs-3 col-md-3 text-center">
                        <img src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>" alt="<?php echo $items['item_name']; ?>"
                            class="img-rounded img-responsive" />
                    </div>
                    <div class="col-xs-9 col-md-9 section-box">
                        <div  class="pull-left whish_head">
                            <?php echo $items['item_name']; ?></div>
							<div class="clearfix">&nbsp;</div><brs>
							<div>
							
						<?php 
								$currentdate=date('Y-m-d h:i:s A');
										if($items['offer_expairdate']>=$currentdate){
											$item_price= ($items['item_cost']-$items['offer_amount']);
											$percentage= $items['offer_percentage'];
											$orginal_price=$items['item_cost'];
										}else{
											$item_price= $items['special_price'];
											$prices= ($items['item_cost']-$items['special_price']);
											$percentage= (($prices) /$items['item_cost'])*100;
											$orginal_price=$items['item_cost'];
										}
									?>
								<span style="font-size:20px;font-weight:500">₹<?php echo $item_price ; ?></span> &nbsp;&nbsp;
								<span class="price-old"style="font-size:16px;color:#bbb">₹ <?php echo $orginal_price ; ?></span>&nbsp;&nbsp;
								<span class="site_col" style="font-size:18px;"><?php echo number_format($percentage, 2, '.', ''); ?>% off</span>&nbsp;&nbsp;
							</div>
                        
                    </div>
				</div>
			</div>
        </div>
	</div>
	  </form>
	<?php $w++;} ?>
		
	 <!-- track start-->
</div>
	

<script>
function qtyincrease(id){
	var qty=document.getElementById("qty"+id).value;
	var orginalqty=document.getElementById("orginalqty"+id).value;
	if(qty==orginalqty){
		$("#maxqtyerror"+id).html("available qty is "+orginalqty).fadeIn().fadeOut(5000);
	}else{
		if(qty>10){
			$("#maxqtyerror"+id).html("Maximum allowed qty is 10 ").fadeIn().fadeOut(5000);
			document.getElementById("qty"+id).value=10;
			
		}
		
	}
	
	
}
</script>
	