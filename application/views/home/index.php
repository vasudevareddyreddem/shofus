 <style>
 .hi {
  color: green;
}
</style>
	<body class="bac_img">
<div class="banner_home con_start" style="margin-top:-20px;">
     
      <div id="myCarousel" class="carousel slide"> 
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
  </div>
  <!--header part end here --> 
  <!--body part start here -->
  <?php $customerdetails=$this->session->userdata('userdetails'); ?>
  <div class="cart_bdy" style="display:none;" id="location_seacrh_result"></div>
  <div class="" id="location_seacrh">
    <!--Top Category slider Start-->
    <div class="top-cate" style="margin-top:30px;">
      <div class="featured-pro container_main">
        <div class="row">
          <div class="slider-items-products">
            <div class="new_title">
			<?php //echo date('Y-m-d H:i:s A'); ?>
              <h2>Top Offers </h2>
            </div>
            <div id="top-categories" class="product-flexslider hidden-buttons">
				<div class="slider-items slider-width-col4 products-grid">
					<?php foreach ($topoffers as $tops){  ?>
					<a href="<?php echo base_url('category/productview/'.base64_encode($tops['item_id'])); ?>">
					<div class="item" style="border: 1px #ddd solid;">
					<div class="pro-img img-wrapper  img_hover"><img class="img-responsive" src="<?php echo base_url('uploads/products/'.$tops['item_image']); ?>" alt="<?php echo $tops['item_name']; ?>">
					</div>
					<div class="pro-info" style="border-top:1px solid #ddd;"><?php echo $tops['item_name']; ?></div>
					</div>
					</a>
					<?php } ?>
				</div>
            </div>
      <div class="clearfix"></div>
        <a href="<?php echo base_url('customer/seemore'); ?>"><button class="btn btn-primary " style="position:absolute;top:15px;right:10px"> See More</button></a>
          </div>
        </div>
      </div>
    </div>
    <!--Top Category silder End--> 
    <!-- best Pro Slider -->
    
    <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Trending products</h2>
        </div>
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
       <?php foreach ($trending_products as $productslist){
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
          <div class=" box-product-outer" >
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
               <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>"> 
				 
           
                </a>
               <!-- <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>-->
				<?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>                  
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);"  onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist btn-danger"><i id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
				<div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo ($item_price); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo $orginal_price; ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 0, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
            
              
             <!-- <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="#">(5 reviews)</a>
              </div>-->
            </div>
          </div>
            </div>
			
			
			</form>
      
       <?php } ?>
            
           
            <!-- End Item --> 
          </div>
        </div>
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
            <?php foreach ($offer_for_you as $productslist){
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
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
           
                </a>
               <!-- <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>-->
              <?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>                  
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);"  onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist btn-danger"><i id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
               <div class="price">
               
				<div class="pull-left" ><?php echo ($item_price); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo number_format($percentage, 2, '.', ''); ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $orginal_price; ?></span>
            
              </div>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="#">(5 reviews)</a>
              </div>
            </div>
          </div>
            </div>
			
			</form>
      
       <?php } ?>
            
           
            
          </div>
        </div>
      </div>
    </section>

     <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2> Deals of the Day </h2>
        </div>
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
      
      <?php //echo '<pre>';print_r($deals_of_the_day);exit; ?>
      <?php foreach($deals_of_the_day as $productslist)  { 
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
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
           
                </a>
                <!--<div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>-->
               <?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>                  
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);"  onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist btn-danger"><i id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
               <div class="price">
               	<div class="pull-left" ><?php echo ($item_price); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo number_format($percentage, 2, '.', ''); ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $orginal_price; ?></span>
				</div>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="#">(5 reviews)</a>
              </div>
            </div>
          </div>
            </div>
			</form>
            
      <?php  } ?>
          </div>
        </div>
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
		  <?php //echo '<pre>';print_r($season_sales);exit; ?>
      <?php foreach($season_sales as $productslist)  { 
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
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
                <!--<div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>-->
                <?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>                  
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist btn-danger"><i id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
              <div class="price">
               
				<div class="pull-left" ><?php echo ($item_price); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo number_format($percentage, 2, '.', ''); ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $orginal_price; ?></span>
            
              </div>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="#">(5 reviews)</a>
              </div>
            </div>
          </div>
            </div>
			</form>
            
      <?php  } ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- <div class="compar_btn" id="compar_btn">
   <div class="btn-group show-on-hover">
          <a href="" class="btn btn-primary" ><?php echo $topslist['item_name'];?>&nbsp;<span><?php echo count($topslist['item_id']) ?></span> 
          </a>
          <ul class="dropdown-menu" role="menu" style="position: absolute;top:-100px;height:150px;width:10px;left:-50px;opacity: 0.8;">
        <li>
          <img src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>" style="width: 80%;height: 80%">
        </li>
          </ul>
        </div>
      
    </div> -->
  
    <?php if($this->session->userdata('location_area') == "")   {?>

  <div class="popup1" style="display: block;">
  <div class="newsletter-sign-box">
    <div class="newsletter"> <img src="<?php echo base_url(); ?>assets/home/images/close-icon.ico" alt="close" class="x" onClick="HideMe();">
      <form method="post" id="popup-newsletter" name="popup-newsletter" class="email-form">
        <h3>Select Your Delivery Location</h3>
        <div class="newsletter-form">
         

      <div class="input-box">
        <select onchange="selectsearchlocation(this.value);" name="locationid" id="locationid" class="validate-select sel_are">
        <option value="">Select Area </option>
        <?php foreach($locationdata as $location_data) {?>
        <option value="<?php echo $location_data['location_id']; ?>"><?php echo $location_data['location_name']; ?></option>

        <?php } ?>
        </select>
		<input type="hidden" name="locationvalue" id="locationvalue" value="">
       <div style="display:none;" class="alert alert-danger alert-dismissible" id="address1errormsg"></div>

          </div>
  
        </div>
        
        
      </form>
    </div>
 
    
  </div>

</div>

<div id="fade" style="display: block;"></div>

  <?php } ?>
</body>
<script type="text/javascript" language="javascript">

 

 function selectsearchlocation(id){
	 
    if(id==''){
		 jQuery('#address1errormsg').show();
        jQuery('#address1errormsg').html('Please Select Area');
        return false;
     }
	 
    jQuery('#address1errormsg').html(''); 
    jQuery('#address1errormsg').hide();
    $("#location_seacrh_result").empty();
    jQuery.ajax({
        url: "<?php echo site_url('home/search_location_offers');?>",
        type: 'post',
        data: {
          form_key : window.FORM_KEY,
          area: id,
          },
        dataType: 'html',
        success: function (data) {
          jQuery('.popup1').hide();
          jQuery('#fade').hide();
          $("#location_seacrh").hide();
          $("#location_seacrh_result").show();
          $("#location_seacrh_result").append(data);

        }
      });

 }
  
  
</script>
<script type="text/javascript">
function addwhishlidt(id){
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
						$("#addwhish"+id).removeClass("btn-danger");
						$('#sucessmsg').html('Product Successfully removed to Whishlist');  
						}
						if(data.msg==1){
						 $("#addwhish"+id).addClass("btn-danger");
						//$('#addwhish').css("color", "yellow");
						$('#sucessmsg').html('Product Successfully added to Whishlist');  
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

</script>


