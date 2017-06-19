<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/home/js/jquery.elevatezoom.js"></script>
<div class="banner_home ">
      <div class="inner_bnr"><img src="<?php echo base_url();?>assets/home/images/product.jpg"></div>
    </div>
  </div>
  <!--header part end here --> 
  <!--body part start here -->
  <div class="cart_bdy">
    <section class="main-container col2-left-layout">
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="pro-coloumn cart_zoom">
              <div class="col-md-6 col-xs-12"> 
                <!--<img id="zoom_01" class="img-responsive" src='images/image11.jpg' data-zoom-image="images/image1.jpg"/>-->
                <div class="simpleLens-gallery-container" id="demo-1">
                  <div class="simpleLens-container">
                    <div class="simpleLens-big-image-container"> 
					<a class="simpleLens-lens-image" data-lens-image="<?php echo base_url();?>uploads/products/<?php  echo $singleproduct->item_image; ?>" > 
					<img src="<?php echo base_url();?>uploads/products/<?php  echo $singleproduct->item_image; ?>" class="simpleLens-big-image"> </a> </div>
                  </div>
                  <div class="simpleLens-thumbnails-container"> 
				  <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="<?php echo base_url();?>uploads/products/<?php  echo $singleproduct->item_image; ?>"  data-big-image="<?php echo base_url();?>uploads/products/<?php  echo $singleproduct->item_image; ?>"> 
				  <img src="<?php echo base_url();?>uploads/products/<?php  echo $singleproduct->item_image; ?>"> </a>
				  <?php foreach($mutiimages as $muti_images)     { ?>
				  <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="<?php echo base_url();?>uploads/productsimages/<?php  echo $muti_images->image_name; ?>" data-big-image="<?php echo base_url();?>uploads/productsimages/<?php  echo $muti_images->image_name; ?>"> 
				  <img src="<?php echo base_url();?>uploads/productsimages/<?php  echo $muti_images->image_name; ?>"> </a> 
				  
				  <?php } ?>
				  
				 <!-- <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="<?php //echo base_url();?>assets/home/demo/large/cart_3.jpg" data-big-image="<?php //echo base_url();?>assets/home/demo/large/cart_3.jpg"> 
				  <img src="<?php //echo base_url();?>assets/home/demo/large/cart_3.jpg"> </a>--> </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="car_zm_rgt">
                  <h3><?php echo $singleproduct->item_name; ?></h3>
                </div>
                <div class="price-box">
                  <h3 class="pric">Rs. <?php echo $singleproduct->item_cost;   ?></h3>
                </div>
                <div class="price-box price-Pin">
                  <div class="pin_cart">Check Availability :</div>
                  <div class="input-group car_pin">
                    <input type="text" class="form-control" placeholder="Enter Pincode">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Check!</button>
                    </span> </div>
                </div>
                <p class="availability in-stock"> <span>In stock</span></p>
                <div class="price-des">
                  <h3>Quick Overview</h3>
                  <p><?php echo  $singleproduct->item_description; ?> </p>
                </div>
                <div class="price-box price-Pin">
                  <div class="cart_emi">EMIs Availability : <a href="#">View Plans</a></div>
                </div>
                <div class="add-to-box">
                  <div class="pull-left">
                    <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--col-right sidebar--> 
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </section>
     <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Similar Products</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
    
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
      
      <?php foreach($similarproducts as $similar_products)    { ?>
            <div class="item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="<?php echo base_url();  ?>home/single_product/<?php  echo $similar_products->item_id; ?>" class="product-image"> <img src="<?php echo base_url();?>uploads/products/<?php  echo $similar_products->item_image; ?>" style="width : 214px; height : 214px" alt=""></a> </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"><a href="<?php echo base_url();  ?>home/single_product/<?php  echo $similar_products->item_id; ?>"><?php echo $similar_products->item_name; ?></a> </div>
                    <div class="item-content">
                      <div class="item-price">
                        <div class="price-box"><span class="regular-price" ><span class="price">RS. <?php echo $similar_products->item_cost; ?></span> </span> </div>
                      </div>
                      <div class="add_cart">
                        <button class="button btn-cart" type="button"><span>More Details</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
           
            <?php   } ?>
           
            
           
            
            
            
           
          </div>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>assets/home/js/common.js"></script> 

<!--<script type="text/javascript" src="js/owl.carousel.min.js"></script>--> 
<script type="text/javascript" src="<?php echo base_url();?>assets/home/js/owl.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/home/js/jquery_003.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/home/js/jquery.simpleGallery.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/home/js/jquery.simpleLens.js"></script> 
<script>
    $(document).ready(function(){
        $('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
            loading_image: '<?php echo base_url();?>assets/home/demo/images/loading.gif'
        });

        $('#demo-1 .simpleLens-big-image').simpleLens({
            loading_image: '<?php echo base_url();?>assets/home/demo/images/loading.gif'
        });
    });
</script> 