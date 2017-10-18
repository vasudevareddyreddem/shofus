<body >
<style>
.carousel .item{
	height:450px;
	
}</style>
<div class="container">
<?php if($this->session->flashdata('adderror')): ?>
		<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('adderror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('productsuccess');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>


			<?php endif; ?>
			<div class="row" style="min-height:500px;">
				<div class="col-md-8">
					 <?php 
			  //echo '<pre>';print_r($whistlist_items);exit;
			  $w=0;foreach($whistlist_items as $items){ ?>
			  
			   <input type="hidden" name="orginalqty" id="orginalqty<?php echo $w; ?>" value="<?php echo $items['item_quantity']; ?>" >
			  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
				<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $items['item_id']; ?>" >
				<input type="hidden" name="wishlist" id="wishlist" value="1" >
				<input type="hidden" name="qty" id="qty" readonly class="form-control text-center" value="1">

         
	
            <div class="well well-sm" style="background:#fff;">
                <div class="row" style="position:relative">
				
				<div style="position:absolute;top:20px;right:50px">
					<?php if($items['item_status']==1 && $items['item_quantity']!=0 ){ ?>
                   <button style="background:none;position:relative;z-index:1024;border:none;" type="submit" ><span class="glyphicon glyphicon-shopping-cart tras_col" aria-hidden="true"></span></button>&nbsp;
                    <?php } ?> &nbsp;&nbsp;
					<a href="<?php echo base_url('customer/deletewishlist/'.base64_encode($items['id'])); ?>"><span class="glyphicon glyphicon-trash tras_col" ></span></a>
				</div>
                    <div class="col-xs-2 col-md-2 text-center">
                        <img style="height:100px;width:auto; margin:0 auto;" class="thumbnail" src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>" alt="<?php echo $items['item_name']; ?>"
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
      
	  </form>
			  
			  
			  
			  <?php $w++;} ?>
			  </div>
		<div class="col-md-4 sm_hide" style=" position:fixed;top:20;right:5% ;background-color:#fff;padding:5px;width:30%" id="social-float">
			<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
			<div class='carousel-outer'>
				<!-- me art lab slider -->
				<div class='carousel-inner '>
					<div class='item active'>
						<img class="img-responsive" src='http://images.asos-media.com/inv/media/8/2/3/3/5313328/print/image1xxl.jpg' alt=''id="zoom_05"  data-zoom-image="http://images.asos-media.com/inv/media/8/2/3/3/5313328/print/image1xxl.jpg"/>
					</div>
					<div class='item'  id="zoom_05">
						<img class="img-responsive" src='http://images.asos-media.com/inv/media/8/2/3/3/5313328/image2xxl.jpg' alt='' data-zoom-image="http://images.asos-media.com/inv/media/8/2/3/3/5313328/image2xxl.jpg" />
					</div>
					<div class='item'>
						<img class="img-responsive" src='http://images.asos-media.com/inv/media/8/2/3/3/5313328/image3xxl.jpg' alt='' data-zoom-image="http://images.asos-media.com/inv/media/8/2/3/3/5313328/image3xxl.jpg" />
					</div>
						
					<div class='item'>
						<img class="img-responsive" src='http://images.asos-media.com/inv/media/3/6/7/0/4850763/multi/image1xxl.jpg' alt='' data-zoom-image="http://images.asos-media.com/inv/media/3/6/7/0/4850763/multi/image1xxl.jpg" id="zoom_05"/>
					</div>
					<div class='item'>
						<img class="img-responsive" src='http://images.asos-media.com/inv/media/5/2/1/3/4603125/gold/image1xxl.jpg' alt='' data-zoom-image="http://images.asos-media.com/inv/media/5/2/1/3/4603125/gold/image1xxl.jpg" id="zoom_05"/>
					</div>
					<div class='item'>
						<img class="img-responsive" src='http://images.asos-media.com/inv/media/5/3/6/8/4948635/mink/image1xxl.jpg' alt='' data-zoom-image="http://images.asos-media.com/inv/media/5/3/6/8/4948635/mink/image1xxl.jpg" id="zoom_05"/>
					</div>
					<div class="img-responsive" class='item'>
						<img src='http://images.asos-media.com/inv/media/1/3/0/8/5268031/image2xxl.jpgg' alt='' data-zoom-image="http://images.asos-media.com/inv/media/1/3/0/8/5268031/image2xxl.jpg" id="zoom_05"/>
					</div>
					 <?php $c=0;foreach($whistlist_banners as $images){  ?>
				  
				  <?php if($c==0){  ?>
					<div class='item active'>
						<img class="img-responsive" src='<?php echo base_url('assets/wishlistpagebanners/'.$images['image']);?>' alt=''id="zoom_05"  data-zoom-image="<?php echo base_url('assets/wishlistpagebanners/'.$images['image']);?>"/>
					</div>
					  <?php }else{ ?>
						<div class='item'  id="zoom_05">
							<img class="img-responsive" src='<?php echo base_url('assets/wishlistpagebanners/'.$images['image']);?>' alt='' data-zoom-image="<?php echo base_url('assets/wishlistpagebanners/'.$images['image']);?>" />
						</div>
					  <?php  }$c++;} ?>
					
				</div>
					
				<!-- sag sol -->
				<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
					<span class='glyphicon glyphicon-chevron-left'></span>
				</a>
				<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
					<span class='glyphicon glyphicon-chevron-right'></span>
				</a>
			</div>
			
			
			</div>
		</div>
			</div>
		
		
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
<script>
function checkOffset() {
  var a=$(document).scrollTop()+window.innerHeight;
  var b=$('#footer-start').offset().top;
  if (a<b) {
    $('#social-float').css('bottom', '10px');
  } else {
    $('#social-float').css('bottom', (10+(a-b))+'px');
  }
}
$(document).ready(checkOffset);
$(document).scroll(checkOffset);

</script>
	