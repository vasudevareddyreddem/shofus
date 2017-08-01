<div class="content-wrapper pad_t100" >
<section class="content" ">
<div class="container">
	<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>

	<div class="banner_home">
      <div id="myCarousel" class="carousel slide"> 
        <!-- Indicators -->
		<form action="<?php echo base_url('inventory/previewok'); ?>" method="post">
			<?php foreach($topoffers as $list){ ?>
			<input type="hidden" name="topoffers[]" value="<?php echo $list['item_id']; ?>">
			<?php } ?>
			<?php foreach($deals_of_the_day as $list){ ?>
			<input type="hidden" name="deals_of_the_day[]" value="<?php echo $list['item_id']; ?>">
			<?php } ?>
			<?php foreach($season_sales as $list){ ?>
			<input type="hidden" name="season_sales[]" value="<?php echo $list['item_id']; ?>">
			<?php } ?>
        <ol class="carousel-indicators">
         
		  	  <?php  $i=0;foreach($homebanners as $list){ ?>
			   <?php if($i==0){ ?>
			    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
			     <?php }else{?>
				 <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
				 <?php } ?>
          
		   <?php $i++;} ?>
        </ol>
        <div class="carousel-inner">
         <?php  $k=0;foreach($homebanners as $list){ ?>
		  	<input type="hidden" name="bannerimage[]" value="<?php echo $list['image_id']; ?>">
		  <?php if($k==0){ ?>
		 
		  <div class="item active"><img src="<?php echo base_url('uploads/banners/'.$list['file_name']);?>" class="img-responsive">
            <div class="container">
              <div class="carousel-caption"> </div>
            </div>
           </div>
		  <?php }else{?>
		   <div class="item"> <img src="<?php echo base_url('uploads/banners/'.$list['file_name']);?>" class="img-responsive">
            <div class="container">
              <div class="carousel-caption"> </div>
            </div>
           </div>
		  <?php }?>
		  
		  <?php $k ++;} ?>
       
	   
        </div>
        
        <!-- Controls --> 
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="glyphicon glyphicon-chevron-left"></i> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="glyphicon glyphicon-chevron-right"></i> </a> </div>
      <!-- /.carousel --> 
      
    </div>
	<div class="cart_bdy"> 
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
               
				 <!-- start Item --> 
				<?php foreach($topoffers as $list){ ?>
                <div class="item">
                  <div class="pro-img">
				 	

				  <?php if($list['item_image']!=''){ ?>
				  	<img src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>" alt="">
				  <?php }else{ ?>
				  	<img src="<?php echo base_url(); ?>assets/home/images/p2.jpg" alt="">
				  <?php } ?>
                    <div class="pro-info"><?php echo $list['item_name']; ?></div>
                  </div>
                </div>
               <?php } ?>
                <!-- End Item --> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Top Category silder End--> 
    <!-- best Pro Slider -->
    
    <section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Deals of the Day</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
            
			
			

            <!-- Item -->
			  <?php  foreach($deals_of_the_day as $list){ ?>
			  
             <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="javascript:void(0);">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
				   
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="javascript:void(0);" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  
                  <a href="javascript:void(0);" id="compare" onclick="compare(<?php echo $list['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="javascript:void(0);" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="javascript:void(0);"><?php echo $list['item_name']; ?></a></h6>
              <div class="price">
                <div class="pull-left" ><?php echo ($list['item_price'])-($list['offer_amount']); ?> 
					<span class="label-tags"><span class="label label-default">-<?php echo $list['offer_percentage']; ?>%</span></span>
				</div>
				
			
                <span class="price-old"><?php echo $list['item_price']; ?></span>
              </div>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="javascript:void(0);">(5 reviews)</a>
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
<!--   deals_of_the_day  --->
	<section>
      <div class="best-pro slider-items-products container_main">
        <div class="new_title">
          <h2>Season Sales</h2>
        </div>
        <!--<div class="cate-banner-img"><img src="images/category-banner.jpg" alt="Retis lapen casen"></div>-->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
            
			
			

            <!-- Item -->
			  <?php  foreach($season_sales as $list){ ?> 
             <div class="item">
			  <input type="hidden" name="seasonsales[]" id="seasonsales[]"  value="<?php echo $list['item_id']; ?>">

          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="javascript:void(0);">
                   <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
				   
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="javascript:void(0);" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  
                  <a href="javascript:void(0);" id="compare" onclick="compare(<?php echo $list['item_id']; ?>);" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="javascript:void(0);" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="javascript:void(0);"><?php echo $list['item_name']; ?></a></h6>
              <div class="price">
                <div class="pull-left" ><?php echo ($list['item_price'])-($list['offer_amount']); ?> 
					<span class="label-tags"><span class="label label-default">-<?php echo $list['offer_percentage']; ?>%</span></span>
				</div>
				
			
                <span class="price-old"><?php echo $list['item_price']; ?></span>
              </div>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="javascript:void(0);">(5 reviews)</a>
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
	
	
	
  </div>
   </section>
     <button type="submit" class="box-title btn btn-primary pull-right" style="margin-right:50px;"> preview ok</button>
   <div class="clearfix"></div>
   <br>
   </form>
  </div>

  
 
 
  
<!--home page product scroller start here --> 

</html>





