<body class="bac_img">
<div class="banner_home con_start" style="margin-top:-20px;">
     
      <div id="myCarousel" class="carousel slide"> 
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
  
  <div class="cart_bdy" style="display:none;" id="location_seacrh_result"></div>
  <div class="cart_bdy" id="location_seacrh">
    
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
        <?php foreach ($top_offers as $tops){  ?>
        <a href="<?php echo base_url('category/productview/'.base64_encode($tops['item_id'])); ?>">
					<div class="item" style="border: 1px #ddd solid;">
					<div class="pro-img img-wrapper  img_hover"><img src="<?php echo base_url('uploads/products/'.$tops['item_image']); ?>" alt="<?php echo $tops['item_name']; ?>">
					</div>
					<div class="pro-info" style="border-top:1px solid #ddd;"><?php echo $tops['item_name']; ?></div>
					</div>
					</a>
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
		   <?php foreach ($tredings as $treding){  ?>
            <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($treding['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$treding['item_image']); ?>">
				   
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" id="compare" onclick="compare(<?php echo $treding['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare" value="<?php echo $treding['item_name']; ?>"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($treding['item_id'])); ?>"><?php echo $treding['item_name']; ?></a></h6>
              <div class="price">
              <?php if(date('m/d/Y') <= $treding['offer_expairdate']) {?>
                <div class="pull-left" ><?php echo ($treding['item_cost'])-($treding['offer_amount']); ?> 
                 <span class="label-tags"><span class="label label-default">-<?php echo $treding['offer_percentage']; ?>%</span></span>
                </div>
                <span class="price-old"><?php echo $treding['item_cost']; ?></span>
                <?php }else { ?>
                  <span><?php echo $treding['item_cost']; ?></span>
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
          <h2>Offers for You</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
            <?php foreach ($offers as $topslist){  ?>
            <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$topslist['item_image']); ?>">
				   
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
      <?php foreach($deals_of_day as $deals_day)  {    ?>
           <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($deals_day['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$deals_day['item_image']); ?>">
				   
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  
                  <a href="#" id="compare" onclick="compare(<?php echo $deals_day['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($deals_day['item_id'])); ?>"><?php echo $deals_day['item_name']; ?></a></h6>
              <div class="price">
                <?php if(date('Y-m-d') <= $deals_day['expairdate']) {?>
                  
                <div class="pull-left" ><?php echo ($deals_day['item_cost'])-($topslist['offer_amount']); ?> 
                 <span class="label-tags"><span class="label label-default">-<?php echo $deals_day['offer_percentage']; ?>%</span></span>
                </div>
                <span class="price-old"><?php echo $deals_day['item_cost']; ?></span>
                <?php }else { ?>
                  <span><?php echo $deals_day['item_cost']; ?></span>
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
      <?php foreach($season_sales as $season_sale)  {    ?>
               <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($season_sale['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$season_sale['item_image']); ?>">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>

                
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>                  
                  <a href="#" id="compare" onclick="compare(<?php echo $season_sale['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left" ></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($season_sale['item_id'])); ?>"><?php echo $season_sale['item_name']; ?></a></h6>
              <div class="price">
                <?php if(date('Y-m-d') <= $season_sale['expairdate']) {?>
                <div class="pull-left" ><?php echo ($season_sale['item_cost'])-($season_sale['offer_amount']); ?> 
                 <span class="label-tags"><span class="label label-default">-<?php echo $season_sale['offer_percentage']; ?>%</span></span>
                </div>
                <span class="price-old"><?php echo $season_sale['item_cost']; ?></span>
                <?php }else { ?>
                  <span><?php echo $season_sale['item_cost']; ?></span>
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