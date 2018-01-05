<?php if($this->session->userdata('location_area')=='')  {?>
	
	<script>
$('#removepopuplocation').show();
$("#fademaskpurpose").removeClass("mask_hide");
</script>

<?php 	} ?>
<script>
$("#selectedlocation").empty();
$("#selectedlocation").append('<?php echo $locationnames; ?>');
</script>
	
<?php if($this->session->flashdata('success')): ?>
			<div class="alt_cus"><div class="alert_msg1  btn_suc animated slideInUp"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg1  btn_war animated slideInUp"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>

	<body class="bac_img">
<div class="banner_home con_st_bo" >
     
      <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->

      <div class="carousel-inner">

        
        <?php //echo '<pre>';print_r($homepage_banner);exit; ?>
        <?php $c=0;foreach($homepage_banner as $images){  ?>
        
        <?php if($c==0){  ?>
          <div class="item active"> <img src="<?php echo base_url('uploads/banners/'.$images['file_name']);?>" class="img-responsive">
          <div class="container">
            <div class="carousel-caption"> </div>
          </div>
        </div>
        <?php }else{ ?>
        <div class="item"> <img src="<?php echo base_url('uploads/banners/'.$images['file_name']);?>" class="img-responsive">
        <div class="container">
          <div class="carousel-caption"> </div>
        </div>
        </div>
        <?php } $c++;} ?>

        
    </div>
  
      
    
        
        <!-- Controls --> 
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="glyphicon glyphicon-chevron-left"></i> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="glyphicon glyphicon-chevron-right"></i> </a> </div>
      <!-- /.carousel --> 
      
    </div>

  <!--header part end here --> 
  <!--body part start here -->
  	<div class="clearfix"></div>
	
	
	
	
	<div id="sucessmsg" style="display:none;"></div>

	
  <?php $customerdetails=$this->session->userdata('userdetails'); ?>
  <div class="_bdy" style="" id="location_seacrh_result"></div>
  <div class="" id="location_seacrhs">
	
	
	<section class="">
      <div class=" slider-items-products container_main">
       
		   <div id="best-seller" class="product-flexslider hidden-buttons cat_sl_s" >
				  <!--<div class="slider-items slider-width-col4 products-grid help_cls text-center" >-->
				  <div class="slider-items slider-width-col4 products-grid  text-center" >
				  <?php foreach ($sidecaregory_list as $categories){
					  ?>
				<a href="<?php echo base_url('category/subcategorys/'.base64_encode($categories['category_id'])); ?>">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/categoryimages/'.$categories['category_image']); ?>"> 
					<h5 class="text-center"><?php echo $categories['category_name'] ; ?></h5>
					</div>
					
				  </div>
				</div>
				
				</a>
				<?php } ?>
				
			
				  </div>
		   </div>
	
      
      </div>
    </section>
	
	
  
    <!--Top Category slider Start-->
	<?php if(isset($topoffers) && count($topoffers)>0){ ?>
    <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Top Offers</h2>
        </div>
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		  <?php foreach($topoffers as $list){ ?>
		  <a href="<?php echo base_url('customer/seemore/'.base64_encode($list['category_id']).'/'.base64_encode('top')); ?>">
			<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
									</div>
									
								</div>
								<h6><a><?php echo $list['category_name']; ?></a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">Up to
										<span class="label-tags"><p class=" text-success"><?php echo number_format($list['offer_percentage'], 2, '.', ''); ?>% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				</div>
			</div>
			</a>
		  <?php } ?>
          </div>
        </div>
		<div class="clearfix"></div>
      </div>
    </section>
	
	<?php } ?>
    <!--Top Category silder End--> 
    <!-- best Pro Slider -->
   <?php if(isset($position_two) && count($position_two)>0){ ?>
   <?php //echo '<pre>';print_r($position_two);exit; ?>
    <section>
	<div class="best-pro slider-items-products container_main">
		<div class="row mar_t15" >
		<?php foreach($position_two as $list){ ?>
		<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
					</div>
					</a>
				
			<?php } ?>
			<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
						<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
				</div>
				</a>
			<?php } ?>
			<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
					<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
				</div>
				</a>
			<?php } ?>
			
		<?php } ?>
		</div>
	</div>
		
    </section>
	
   <?php } ?>
    <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Trending products</h2>
        </div>
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
        <?php foreach($trending_products as $list){ ?>
		  <a href="<?php echo base_url('customer/seemore/'.base64_encode($list['category_id']).'/'.base64_encode('tren')); ?>">
			<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
									</div>
									
								</div>
								<h6><a><?php echo $list['category_name']; ?></a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">Up to
										<span class="label-tags"><p class=" text-success">
										<?php $currentdate=date('Y-m-d h:i:s A');
										if(	$list['offer_expairdate']>=$currentdate){ ?>
										<?php echo number_format($list['offer_percentage'], 2, '.', ''); ?>% off
										<?php }else{ ?>
										<?php echo number_format($list['offers'], 2, '.', ''); ?>% off
										<?php } ?>
										</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				</div>
			</div>
			</a>
		  <?php } ?>
          </div>
        </div>
		<div class="clearfix"></div>
      </div>
    </section>
	
	
    <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Offers for You</h2>
        </div>
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
           <?php foreach($offer_for_you as $list){ ?>
		  <a href="<?php echo base_url('customer/seemore/'.base64_encode($list['category_id']).'/'.base64_encode('offer')); ?>">
			<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
									</div>
									
								</div>
								<h6><a><?php echo $list['category_name']; ?></a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">Up to
										<span class="label-tags"><p class=" text-success">
										<?php $currentdate=date('Y-m-d h:i:s A');
										if(	$list['offer_expairdate']>=$currentdate){ ?>
										<?php echo number_format($list['offer_percentage'], 2, '.', ''); ?>% off
										<?php }else{ ?>
										<?php echo number_format($list['offers'], 2, '.', ''); ?>% off
										<?php } ?>
										
										</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				</div>
			</div>
			</a>
		  <?php } ?>
          </div>
        </div>
		<div class="clearfix"></div>
      </div>
    </section>
	
	<?php if(isset($position_three) && count($position_three)>0){ ?>
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="row mar_t15" >
			<?php foreach($position_three as $list){ ?>
				<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
						<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
							<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
							</div>
							</a>
					<?php } ?>
				<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-3">
						<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
					</div>
					</a>
				<?php } ?>
				<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
					<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-3">
						<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
					</div>
					</a>
				<?php } ?>
				<?php if(isset($list[3]['name']) && $list[3]['name']!=''){ ?>
					<?php if($list[3]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[3]['selected_id'])); ?>">
						<?php }else if($list[3]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[3]['category_id']).'/'.base64_encode($list[3]['subcategory_id'])); ?>">
						<?php }else if($list[3]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[3]['subitem_id']).'/'.base64_encode($list[3]['subcategory_id']).'/'.base64_encode($list[3]['category_id'])); ?>">
						<?php }else if($list[3]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[3]['item_id'])); ?>">
						<?php }else if($list[3]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[3]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-3">
						<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[3]['name']); ?>" alt="<?php echo $list[3]['name']; ?>">
					</div>
					</a>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
		
    </section>
	<?php } ?>
<?php if(isset($deals_of_the_day) && count($deals_of_the_day)>0){ ?>
     <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2> Deals of the Day </h2>
        </div>
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		<?php foreach($deals_of_the_day as $list){ ?>
		  <a href="<?php echo base_url('customer/seemore/'.base64_encode($list['category_id']).'/'.base64_encode('deal')); ?>">
			<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
									</div>
									
								</div>
								<h6><?php echo $list['category_name']; ?></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">Up to
										<span class="label-tags"><p class=" text-success"><?php echo number_format($list['offer_percentage'], 2, '.', ''); ?>% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				</div>
			</div>
			</a>
		  <?php } ?>
          </div>
        </div>
		<div class="clearfix"></div>
      </div>
    </section>
	
<?php } ?>
<?php if(isset($season_sales) && count($season_sales)>0){ ?>
   <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Season Sales</h2>
        </div>
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		  	<?php foreach($season_sales as $list){ ?>
		  <a href="<?php echo base_url('customer/seemore/'.base64_encode($list['category_id']).'/'.base64_encode('season')); ?>">
			<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
									</div>
									
								</div>
								<h6><?php echo $list['category_name']; ?></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">Up to
										<span class="label-tags"><p class=" text-success"><?php echo number_format($list['offer_percentage'], 2, '.', ''); ?>% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				</div>
			</div>
			</a>
		  <?php } ?>
          </div>
        </div>
		<div class="clearfix"></div>
      </div>
    </section>
<?php } ?>
<?php if(isset($recentlyviewd) && count($recentlyviewd)>0){ ?>
<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Recently viewed</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid">
				<a href="#">
					<?php //echo '<pre>';print_r($trending_products);exit; 
				$t=5;foreach ($recentlyviewd as $productslist){
				$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']=!'' && $productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
				
				?>
             <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $productslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $productslist['category_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
			<a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
		<div class="item">
		       
          <div class=" box-product-outer" >
            <div class="box-product">
              <div class="img-wrapper  img_hover item" style="position:relative">
			  <div class="img_size">
         
               <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>"> 
				 
           
               
				</div>
              
				<?php if($productslist['item_quantity']<=0 || $productslist['item_status']==0){ ?>
				
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $t; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $t; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>	
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);"  onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $t; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $t; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
				<div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
            
            </div>
          </div>
		  
            </div>
			 </a>
			
			
			</form>
      
       <?php $t++;} ?>
				</a>
			
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
<section>
	<div class="">
	<div class="clearfix">&nbsp;</div>
				<div class="text-center"><span id="loadmor" class="lod_st">Load more &nbsp; . &nbsp; .</span></div>
				<div class="clearfix">&nbsp;</div>
	</div>
		
    </section>



<?php } ?>

<?php if(isset($position_four) && count($position_four)>0){ ?>
<?php //echo '<pre>';print_r($position_four);exit; ?>
<section>
	<div class="best-pro slider-items-products container_main">
		<div class="row mar_t15" >
			
			<?php foreach($position_four as $list){ ?>
				<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
							<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
						</div>
						</a>
				<?php } ?>
			<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
						<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
							<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
						</div>
						</a>
			<?php } ?>
			<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
					<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/homebanners/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
				</div>
				</a>
			<?php } ?>
			
			<?php } ?>
				
		
	</div>
		
    </section>
	
	<?php } ?>
	
	<div id="loadcon" style="display:none;">
	<?php foreach ($category_wise_products   as $list){ ?>
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2><?php echo $list['category_name']; ?></h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid">
				<a href="#">
					<?php //echo '<pre>';print_r($trending_products);exit; 
				$t=5;foreach ($list['plist'] as $productslist){
				$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']=!'' && $productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
				
				?>
             <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $productslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $productslist['category_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
			<a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
		<div class="item">
		       
          <div class=" box-product-outer" >
            <div class="box-product">
              <div class="img-wrapper  img_hover item" style="position:relative">
			  <div class="img_size">
         
               <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>"> 
				 
           
               
				</div>
              
				<?php if($productslist['item_quantity']<=0 || $productslist['item_status']==0){ ?>
				
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $t; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $t; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>	
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);"  onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $t; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $t; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $t; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
				<div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
            
            </div>
          </div>
		  
            </div>
			 </a>
			
			
			</form>
      
       <?php $t++;} ?>
				</a>
			
			</div>
		</div>
		<div class="clearfix"></div>
		<a href="<?php echo base_url('customer/seemore/'.base64_encode($list['category_id']).'/'.base64_encode('no')); ?>">
			<button class="btn btn-primary see_more " style="">See More</button>
		</a>
	</div>
</section>
	<?php } ?>



	</div>
	
  </div>
</body>

<script type="text/javascript">

$('.slideInUp').fadeout(5000);
 function itemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/onclickaddcart');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          producr_id: itemid,
		  category_id: catid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
           if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#sucessmsg').show();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						if(data.msg==2){
						$("#addticartitem"+itemid+val).removeClass("text-primary");
						$('#cartitemtitle'+itemid+val).prop('title', 'Add to cart');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully Removed to Cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addticartitem"+itemid+val).addClass("text-primary");
						$('#cartitemtitle'+itemid+val).prop('title', 'Added to cart');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully added to Cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }


  
  
</script>
<script type="text/javascript">
function addwhishlidt(id,val){
	
jQuery.ajax({
      url: "<?php echo site_url('customer/addwhishlist');?>",
      type: 'post',
      data: {
        form_key : window.FORM_KEY,
        item_id: id,
        },
      dataType: 'JSON',
      success: function (data) {
		  if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#sucessmsg').show();
						//alert(data.msg);
						if(data.msg==2){
						$("#addwishlistids"+id+val).removeClass("text-primary");
						$('#addwhish'+id+val).prop('title', 'Add to Wishlist');
						
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully Removed to Wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addwishlistids"+id+val).addClass("text-primary");
						$('#addwhish'+id+val).prop('title', 'Added to Wishlist');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully added to Wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}
      

      }
    });
  
  
}

 function compare(id){
   //alert(id);
   //$("#compar_btn").css("display", "block");
     $.ajax({
        type: "POST",
        url: "<?php echo site_url('home/addtocompare/');?>",
        data: {id:id},
        dataType: 'html',
        success: function(data){
          //alert(data);
          $("#compar_btn").show();
          //alert( "Data Saved: " + msg );
        }
      });
     
   
 }
 $(document).ready(compare);
 
 $('.add-to-cart').on('click', function () {
        var cart = $('.shopping_cart');
        var imgtodrag = $(this).parent().parent('.item').find("img").eq(0);
        if (imgtodrag) {
			//alert();
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '1026'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
	

	
</script>
<script>
$(document).ready(function(){
	var cnt=2;
    $("#loadmor").click(function(){
        $("#loadcon").slideToggle("slow", "linear");
		if((cnt % 2) === 0){
		$(".lod_st").text("Load Less..");
		}else{
			$(".lod_st").text("Load More..");
		}
		cnt++;
    });
});
</script>


