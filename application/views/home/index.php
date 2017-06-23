<body class="bac_img">
<div class="banner_home con_start">
     
      <div id="myCarousel" class="carousel slide"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active"> <img src="<?php echo base_url(); ?>assets/home/images/food_bnr.jpg" class="img-responsive">
            <div class="container">
              <div class="carousel-caption"> </div>
            </div>
          </div>
          <div class="item"> <img src="<?php echo base_url(); ?>assets/home/images/slide-img2.jpg" class="img-responsive">
            <div class="container">
              <div class="carousel-caption"> </div>
            </div>
          </div>
          <div class="item"> <img src="<?php echo base_url(); ?>assets/home/images/slide-img1.jpg" class="img-responsive">
            <div class="container">
              <div class="carousel-caption"> </div>
            </div>
          </div>
        </div>
        
        <!-- Controls --> 
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="glyphicon glyphicon-chevron-left"></i> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="glyphicon glyphicon-chevron-right"></i> </a> </div>
      <!-- /.carousel --> 
      
    </div>
  </div>
  <!--header part end here --> 
  <!--body part start here -->
  <div class="cart_bdy" id="homepageoffers"> 
    <!--Top Category slider Start-->
    <div class="top-cate">
      <div class="featured-pro container_main">
        <div class="row">
          <div class="slider-items-products">
            <div class="new_title">
              <h2>Top Offers </h2>
            </div>
            <div id="top-categories" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4 products-grid">
			  <?php foreach ($topoffers as $tops){  ?>
				<div class="item">
                  <div class="pro-img"><img src="<?php echo base_url('assets/home/images/'.$tops['item_image']); ?>" alt="<?php echo $tops['item_name']; ?>">
                    <div class="pro-info"><?php echo $tops['item_name']; ?></div>
					</div>
                  </div>
              <?php } ?>
			  </div>
            </div>
			<div class="clearfix"></div>
			  <div class="text-center"><button class="btn btn-primary"> See More</button></div>
              
          </div>
        </div>
      </div>
    </div>
    <!--Top Category silder End--> 
    <!-- best Pro Slider -->
    
    <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Treding Products</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		   <?php foreach ($trending_products as $topslist){  ?>
            <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('testing');?>">
                   <img class="thumbnail"src="<?php echo base_url('assets/home/images/'.$topslist['item_image']); ?>">
				   
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('testing');?>"><?php echo $topslist['item_name']; ?></a></h6>
              <div class="price">
                <div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
					<span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
				</div>
				
			
                <span class="price-old"><?php echo $topslist['item_cost']; ?></span>
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
            <?php foreach ($offer_for_you as $topslist){  ?>
            <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('testing');?>">
                   <img class="thumbnail"src="<?php echo base_url('assets/home/images/'.$topslist['item_image']); ?>">
				   
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('testing');?>"><?php echo $topslist['item_name']; ?></a></h6>
              <div class="price">
                <div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
					<span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
				</div>
				
			
                <span class="price-old"><?php echo $topslist['item_cost']; ?></span>
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
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		  
		  <?php //echo '<pre>';print_r($recentproducts);exit; ?>
      <?php foreach($deals_of_the_day as $recent_products)  {    ?>
            <div class="item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="#" class="product-image"> <img src="<?php echo base_url();?>uploads/products/<?php  echo $recent_products['item_image']; ?>" style="width : 214px; height : 214px" alt=""></a> </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"><a href="#"><?php echo $recent_products['item_name'];  ?></a> </div>
                    <div class="item-content">
                      <div class="item-price">
                        <div class="price-box"><span class="regular-price" ><span class="price">RS. <?php echo $recent_products['item_cost'];  ?></span> </span> </div>
                      </div>
                      <div class="add_cart">
                        <button class="button btn-cart" type="button"><span>More Details</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
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
      <?php foreach($season_sales as $recent_products)  {    ?>
               <div class="item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="#" class="product-image"> <img src="<?php echo base_url();?>uploads/products/<?php  echo $recent_products['item_image']; ?>" style="width : 214px; height : 214px" alt=""></a> </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"><a href="#"><?php echo $recent_products['item_name'];  ?></a> </div>
                    <div class="item-content">
                      <div class="item-price">
                        <div class="price-box"><span class="regular-price" ><span class="price">RS. <?php echo $recent_products['item_cost'];  ?></span> </span> </div>
                      </div>
                      <div class="add_cart">
                        <button class="button btn-cart" type="button"><span>More Details</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
      <?php  } ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  
  <?php if($this->session->userdata('location_name') == "")   {?>
  <div class="popup1" style="display: block;">
  <div class="newsletter-sign-box">
    <div class="newsletter"> <img src="<?php echo base_url(); ?>assets/home/images/close-icon.ico" alt="close" class="x" onClick="HideMe();">
      <form method="post" id="popup-newsletter" name="popup-newsletter" class="email-form">
        <h3>Select Your Delivery Location</h3>
        <div class="newsletter-form">
          <div class="form-group">
            <label class="control-label">Address Line 1</label>
            <input maxlength="100" type="text"  name="pan_card" class="form-control" value="" />
          </div>
		  <div class="input-box">
				<select name="location_name" id="location" class="validate-select sel_are">
				<option value="">Select Area </option>
				<?php foreach($locationdata as $location_data) {?>
				<option value="<?php echo $location_data->location_name; ?>"><?php echo $location_data->location_name; ?></option>

				<?php } ?>
				</select>
            <button type="submit" id="location_submit" class="button subscribe" name="location_submit"><span>SUBMIT</span></button>
          </div>
          <!--input-box--> 
        </div>
        <!--newsletter-form-->
        
      </form>
    </div>
    <!--newsletter--> 
    
  </div>
  <!--newsletter-sign-box--> 
</div>
<div id="fade" style="display: block;"></div>
  <?php } ?>
</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script type="text/javascript" language="javascript">
 
		$(document).ready(function(){
		$("#location_submit").click(function(e){
		e.preventDefault();
		
		var location_name= $("#location").val();
		
	//alert(location_name); 
	
		$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>home/location',
		data: {location_name:location_name},
		success:function(data)
		{
			//alert(data);
		if(data == 1)
		{
			
			location.reload();
		}
		else{
		
		//$("#login-response").html("Invalid  Password").css("color", "red");
		
		}
		},
		error:function()
		{
		//$("#signupsuccess").html("Oops! Error.  Please try again later!!!");
		}
		});
		
		});
		});
	
	
</script>