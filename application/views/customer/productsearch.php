<script>
$("#selectedlocation").empty();
$("#selectedlocation").append('<?php echo $locationnames; ?>');
$("#fademaskpurpose").addClass("mask_hide");

</script>
<?php //echo '<pre>';print_r($locationnames);exit; ?>
<body class="bac_img">
<div class="banner_home con_start" style="margin-top:-20px;">
     
      <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
		<?php $c=0;foreach($homepage_banner as $images){  ?>
        
        <?php if($c==0){  ?>
		<li data-target="#myCarousel" data-slide-to="<?php $c; ?>" class="active"></li>
		  <?php }else{ ?>
		    <li data-target="#myCarousel" data-slide-to="<?php $c; ?>"></li>
		  <?php } $c++;} ?>
          
        
        </ol>
        
      <div class="carousel-inner">

        
        <?php //echo '<pre>';print_r($seemore);exit; ?>
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
    <?php $customerdetails=$this->session->userdata('userdetails'); ?>
  <div class="cart_bdy" style="" id="location_seacrh_result"></div>
  <div class="cart_bdy" id="location_seacrhs">
   <div id="sucessmsg" style="display:none;"></div>
    <div class="top-cate">
      <div class="featured-pro container_main">
        <div class="row">
          <div class="slider-items-products">
            <div class="new_title">
              <h2>Top Offers </h2>
            </div>
        <?php if(count($top_offers)>0){ ?>
            <div id="top-categories" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4 products-grid">
		
        <?php foreach ($top_offers as $tops){ 
					$currentdate=date('Y-m-d h:i:s A');
					if($tops['offer_expairdate']>=$currentdate){
					$item_price= ($tops['item_cost']-$tops['offer_amount']);
					$percentage= $tops['offer_percentage'];
					$orginal_price=$tops['item_cost'];
					}else{
					//echo "expired";
					$item_price= $tops['special_price'];
					$prices= ($tops['item_cost']-$tops['special_price']);
					$percentage= (($prices) /$tops['item_cost'])*100;
					$orginal_price=$tops['item_cost'];
					}



		?>
        <a href="<?php echo base_url('category/productview/'.base64_encode($tops['item_id'])); ?>">
					<div class="item" >
						<div style="position:absolute;top:0;left:15px;z-index: 1024;">
							<div style="background:#ddd;border-radius:50%;height:20px;height:20px;color:#fff;"> <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-primary arrowed-right"><?php echo number_format($percentage, 2, '.', ''); ?>%</span></span>
                </div></div>
						</div>
					<div class="pro-img img-wrapper  img_hover">
					
					<img class="img-responsive" src="<?php echo base_url('uploads/products/'.$tops['item_image']); ?>" alt="<?php echo $tops['item_name']; ?>">
					
					</div>
					<div class="pro-info" style="padding:2px;"><?php echo $tops['item_name']; ?>&nbsp;<?php echo isset($tops['colour'])?$tops['colour']:''; ?>&nbsp; <?php echo isset($tops['internal_memeory'])?$tops['internal_memeory']:''; ?>&nbsp; <?php echo isset($tops['ram'])?'('.$tops['ram'].'Ram'.')':''; ?></div>
					</div>
					</a>
					
              <?php } ?>
			 
         </div>
		 
      </div>
      <div class="clearfix"></div>
        <a href="<?php echo base_url('customer/seemore/'.base64_encode('top').'/'.base64_encode('location')); ?>"><button class="btn btn-primary " style="position:absolute;top:15px;right:10px"> See More</button></a>

             <?php } else{ ?>
       <div style="text-align:center;">No Products are Avaiable</div>
      <?php } ?> 
          </div>
        </div>
      </div>
    </div>
    <!--Top Category silder End--> 
    <!-- best Pro Slider -->
    
     <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>TRENDING PRODUCTS </h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		   <?php $t=0;foreach ($tredings as $productslist){

				$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
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
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
			   <div class="img_size">
               
                   <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
				   
                
				</div>
            
                <?php if($productslist['item_quantity']<=0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $t; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $t; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $t; ?>');" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $t; ?>');" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $t; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?>&nbsp;<?php echo isset($productslist['colour'])?$productslist['colour']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?$productslist['internal_memeory']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?'('.$productslist['ram'].'Ram'.')':''; ?></a></h6>
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
		 
            
           
          
          </div>
        </div>
	<a href="<?php echo base_url('customer/seemore/'.base64_encode('tren').'/'.base64_encode('location')); ?>"><button class="btn btn-primary " style="position:absolute;top:15px;right:10px"> See More</button></a>

      </div>
    </section> 
     <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Offers for You</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
             <?php $f=3;foreach ($offers as $productslist){
				$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
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
			
		   <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
			   <div class="img_size">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                   <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
           
                </a>
				</div>
              <?php if($productslist['item_quantity']<=0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $f; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $f; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>	
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0)"  onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $f; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $f; ?>');" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $f; ?>" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?>&nbsp;<?php echo isset($productslist['colour'])?$productslist['colour']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?$productslist['internal_memeory']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?'('.$productslist['ram'].'Ram'.')':''; ?></a></h6>
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
			
			</form>
      
       <?php $f++;} ?>
            
           
            
          </div>
        </div>
		 <a href="<?php echo base_url('customer/seemore/'.base64_encode('offer').'/'.base64_encode('location')); ?>"><button class="btn btn-primary " style="position:absolute;top:15px;right:10px"> See More</button></a>

      </div>
    </section>

     <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2> Deals of the Day </h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		  
		  <?php $d=6;foreach($deals_of_day as $productslist)  { 
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
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
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
			   <div class="img_size">
                
                   <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
           
              
				</div>
               <?php if($productslist['item_quantity']<=0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $d; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $d; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $d; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $d; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);"  onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $d; ?>');" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $d; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $d; ?>');" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $d; ?>" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?>&nbsp;<?php echo isset($productslist['colour'])?$productslist['colour']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?$productslist['internal_memeory']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?'('.$productslist['ram'].'Ram'.')':''; ?></a></h6>
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
            
      <?php  $d++;} ?>
          </div>
        </div>
				        <a href="<?php echo base_url('customer/seemore/'.base64_encode('deal').'/'.base64_encode('location')); ?>"><button class="btn btn-primary " style="position:absolute;top:15px;right:10px"> See More</button></a>

      </div>
    </section>
	  <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Season Sales</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
      <?php 
	  $customerdetails=$this->session->userdata('userdetails');
	  $s=4;foreach($season_sales as $productslist)  { 
			$currentdate=date('Y-m-d h:i:s A');
			if($productslist['offer_expairdate']>=$currentdate){
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
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
			   <div class="img_size">
                
                   <img class="" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
              
				</div>
                <?php if($productslist['item_quantity']<=0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $s; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $s; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $s; ?>');" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $s; ?>');" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?>&nbsp;<?php echo isset($productslist['colour'])?$productslist['colour']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?$productslist['internal_memeory']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?'('.$productslist['ram'].'Ram'.')':''; ?></a></h6>
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
            
		<?php  $s++;} ?>
          </div>
        </div>
		 <a href="<?php echo base_url('customer/seemore/'.base64_encode('season').'/'.base64_encode('location')); ?>"><button class="btn btn-primary " style="position:absolute;top:15px;right:10px"> See More</button></a>

      </div>
    </section>
  </div>
 <div class="clearfix"></div>
 <script type="text/javascript">
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
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addticartitem"+itemid+val).addClass("text-primary");
						//$('#addwhish').css("color", "yellow");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }
 
 
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
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addwishlistids"+id+val).addClass("text-primary");
						//$('#addwhish').css("color", "yellow");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

      }
    });
  
  
}
</script>