<body class="bac_img">
<div class="banner_home con_start" style="margin-top:-20px;">
     
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
  
  <div class="cart_bdy" style="display:none;" id="location_seacrh_result"></div>
  <div class="cart_bdy" id="location_seacrh">
    <!--Top Category slider Start-->
    <div class="top-cate">
      <div class="featured-pro container_main">
        <div class="row">
          <div class="slider-items-products">
            <div class="new_title">
              <h2>Top Offers </h2>
            </div>
				<?php if(count($product_search)>0){ ?>
            <div id="top-categories" class="product-flexslider hidden-buttons">
				<div class="slider-items slider-width-col4 products-grid">
			  <?php foreach ($product_search as $tops){  ?>
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
          <h2>Treding Products</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		   <?php foreach ($product_search as $topslist){  ?>
            <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>">
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
                  <a href="#" id="compare" onclick="compare(<?php echo $topslist['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare" value="<?php echo $topslist['item_name']; ?>"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>"><?php echo $topslist['item_name']; ?></a></h6>
              <div class="price">
              <?php if(date('m/d/Y') <= $topslist['offer_expairdate']) {?>
                <div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
                 <span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
                </div>
                <span class="price-old"><?php echo $topslist['item_cost']; ?></span>
                <?php }else { ?>
                  <span><?php echo $topslist['item_cost']; ?></span>
                <?php } ?>
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
            <?php foreach ($product_search as $topslist){  ?>
            <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>">
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
                  <a href="#" id="compare" onclick="compare(<?php echo $topslist['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>"><?php echo $topslist['item_name']; ?></a></h6>
              <div class="price">
              <?php if(date('m/d/Y') <= $topslist['offer_expairdate']) {?>
                <div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
                   <span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
                  </div>
                  <span class="price-old"><?php echo $topslist['item_cost']; ?></span>
                  <?php }else { ?>
                  <span><?php echo $topslist['item_cost']; ?></span>
                <?php } ?>
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
      <?php foreach($product_search as $recent_products)  {    ?>
           <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>">
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
                  
                  <a href="#" id="compare" onclick="compare(<?php echo $topslist['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>"><?php echo $topslist['item_name']; ?></a></h6>
              <div class="price">
                <?php if(date('m/d/Y') <= $topslist['offer_expairdate']) {?>
                  
                <div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
                 <span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
                </div>
                <span class="price-old"><?php echo $topslist['item_cost']; ?></span>
                <?php }else { ?>
                  <span><?php echo $topslist['item_cost']; ?></span>
                <?php } ?>
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
      <?php foreach($product_search as $recent_products)  {    ?>
               <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>">
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
                  <a href="#" id="compare" onclick="compare(<?php echo $topslist['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left" ></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>"><?php echo $topslist['item_name']; ?></a></h6>
              <div class="price">
                <?php if(date('m/d/Y') <= $topslist['offer_expairdate']) {?>
                <div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
                 <span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
                </div>
                <span class="price-old"><?php echo $topslist['item_cost']; ?></span>
                <?php }else { ?>
                  <span><?php echo $topslist['item_cost']; ?></span>
                <?php } ?>
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
            
      <?php  } ?>
          </div>
        </div>
      </div>
    </section>
  </div>