
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/font-awesome.min.css">
<!--Style start here -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/owl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/owl_002.css">

<!--Style end here -->
<!--for image zooming -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/jquery.simpleLens.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/jquery.simpleGallery.css">
<!--for image zooming -->
<!-- pop up plugins -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/component.css" />
<script src="<?php echo base_url(); ?>assets/home/js/jquery.js"></script>


<script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>

<body class="bac_img">

  <!--header part end here --> 
  <!--body part start here -->
 <div class="cart_bdy" id="location_seacrh">
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
			  <div class="text-center"><button class="btn btn-primary"><a href="<?php echo base_url('customer/seemore'); ?>"> See Morexxx</a></button></div>
              
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
              <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $topslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $topslist['category_id']; ?>" >
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
				<button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
				<a href="#" id="compare" onclick="compare(<?php echo $topslist['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare" value="<?php echo $topslist['item_name']; ?>"><i class="fa fa-align-left"></i></a>
				<?php if($topslist['yes']==1){ ?>
				<a href="javascript:void(0);" data-toggle="tooltip" style="color:yellow;" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $topslist['item_id']; ?>);" id="addwhish" ><i class="fa fa-heart"></i></a>  
				<?php }else{ ?> 
				<a href="javascript:void(0);" data-toggle="tooltip" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $topslist['item_id']; ?>);" id="addwhish"><i class="fa fa-heart"></i></a>  
				<?php } ?>
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>"><?php echo $topslist['item_name']; ?></a></h6>

              
             <div class="price">
           <?php 
		   $current_date=date('m/d/Y h:ia');
			$offerexpirydate=$topslist['offer_expairdate'].' '.$topslist['offer_time'];
			if($current_date <= $offerexpirydate) {?>
				<div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $topslist['item_cost']; ?></span>
            <?php } else{?> 
				   <span><?php echo $topslist['item_cost']; ?></span>
              <?php  } ?>
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
            <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $topslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $topslist['category_id']; ?>" >
			
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
                  <button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                  <a href="#" id="compare" onclick="compare(<?php echo $topslist['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
					<?php if($topslist['yes']==1){ ?>
					<a href="javascript:void(0);" data-toggle="tooltip" style="color:yellow;" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $topslist['item_id']; ?>);" id="addwhish" ><i class="fa fa-heart"></i></a>  
					<?php }else{ ?> 
					<a href="javascript:void(0);" data-toggle="tooltip" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $topslist['item_id']; ?>);" id="addwhish"><i class="fa fa-heart"></i></a>  
					<?php } ?>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($topslist['item_id'])); ?>"><?php echo $topslist['item_name']; ?></a></h6>
               <div class="price">
           <?php 
		   $current_date=date('m/d/Y h:ia');
			$offerexpirydate=$topslist['offer_expairdate'].' '.$topslist['offer_time'];
			if($current_date <= $offerexpirydate) {?>
				<div class="pull-left" ><?php echo ($topslist['item_cost'])-($topslist['offer_amount']); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo $topslist['offer_percentage']; ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $topslist['item_cost']; ?></span>
            <?php } else{?> 
				   <span><?php echo $topslist['item_cost']; ?></span>
              <?php  } ?>
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
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
    
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
		  
		  <?php //echo '<pre>';print_r($recentproducts);exit; ?>
      <?php foreach($deals_of_the_day as $recent_products)  {    ?>
              <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $items['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $items['category_id']; ?>" >
			
           <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>">
           
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                   <a href="#" id="compare"  id="compare" onclick="compare(<?php echo $items['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
					<?php if($items['yes']==1){ ?>
					<a href="javascript:void(0);" data-toggle="tooltip" style="color:yellow;" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $items['item_id']; ?>);" id="addwhish" ><i class="fa fa-heart"></i></a>  
					<?php }else{ ?> 
					<a href="javascript:void(0);" data-toggle="tooltip" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $items['item_id']; ?>);" id="addwhish"><i class="fa fa-heart"></i></a>  
					<?php } ?> 
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>"><?php echo $items['item_name']; ?></a></h6>
               <div class="price">
           <?php 
		   $current_date=date('m/d/Y h:ia');
			$offerexpirydate=$items['offer_expairdate'].' '.$items['offer_time'];
			if($current_date <= $offerexpirydate) {?>
				<div class="pull-left" ><?php echo ($items['item_cost'])-($items['offer_amount']); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo $items['offer_percentage']; ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $items['item_cost']; ?></span>
            <?php } else{?> 
				   <span><?php echo $items['item_cost']; ?></span>
              <?php  } ?>
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
      <?php foreach($season_sales as $items)  {    ?>
                <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $items['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $items['category_id']; ?>" >
			
               <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>                  
                  <a href="#" id="compare" onclick="compare(<?php echo $items['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left" ></i></a>
					<?php if($items['yes']==1){ ?>
					<a href="javascript:void(0);" data-toggle="tooltip" style="color:yellow;" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $items['item_id']; ?>);" id="addwhish" ><i class="fa fa-heart"></i></a>  
					<?php }else{ ?> 
					<a href="javascript:void(0);" data-toggle="tooltip" title="Add to Wishlist" class="wishlist" onclick="addwhishlidt(<?php echo $items['item_id']; ?>);" id="addwhish"><i class="fa fa-heart"></i></a>  
					<?php } ?>
					</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>"><?php echo $items['item_name']; ?></a></h6>
              <div class="price">
                 <?php $current_date=date('m/d/Y h:ia');
			$offerexpirydate=$items['offer_expairdate'].' '.$items['offer_time'];
			if($current_date <= $offerexpirydate) {?>
				<div class="pull-left" ><?php echo ($items['item_cost'])-($items['offer_amount']); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo $items['offer_percentage']; ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $items['item_cost']; ?></span>
            <?php } else{?> 
				   <span><?php echo $items['item_cost']; ?></span>
              <?php  } ?>
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
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 
