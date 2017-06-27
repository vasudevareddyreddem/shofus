<style>
#sticky {
    height:80%;
}
#sticky.stick {
    position: fixed;
    top: 0;
    
}
</style>
<div class="" style="margin-top:110px;">
	<img  src="<?php echo base_url(); ?>assets/home/images/ban1.png">
</div>
<body >
		<div class="pad_bod">
		<div class="row">
		<div id="sticky-anchor"></div>
		 <div class="col-sm-2 bac_col_side side_bar" id="sticky">
          <div class="filter-sidebar">
            <div class="title"><span>Enabled Filters</span></div>
          
          </div>
		   <div class="filter-sidebar">
            <div class="title"><span>Price Range</span></div>
            <div id="range-value">Range: <span id="min-price"></span> - <span id="max-price"></span></div>
            <input type="hidden" name="min-price" value="">
            <input type="hidden" name="max-price" value="">
            <div class="price-range">
              <div id="price"></div>
            </div>
          </div>
          <div class="filter-sidebar">
            <div class="title"><span>products</span></div>
			<?php foreach ($category_list as $catlist){ ?>
            <div class="checkbox">
			<label>
			<input type="checkbox" value="<?php echo $catlist['item_id'] ?>" checked="checked"><span> <?php echo $catlist['item_name'] ?></span></label>
			</div>
			<?php } ?>
          
          </div>
       
       
          <div class="filter-sidebar">
            <div class="title"><span>Availability</span></div>
            <div class="checkbox"><label><input type="checkbox" checked="checked"><span> In Stock (<?php echo count($stock); ?>)</span></label></div>
          </div>
        
         
        </div>

 <!-- Product List -->
 <?php //echo '<pre>';print_r($category_list);exit;?>

        <div class="row pad_bod col-md-offset-2">
          <div class="title"><span><?php echo $category_name['category_name'];; ?></span></div>

		<?php foreach ($category_list as $catlist){ ?>
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  ">
				
						<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
							<div class='carousel-outer'>
								<!-- me art lab slider -->
								<div class='carousel-inner '>
									<div class='item active'>
										<img src="<?php echo base_url('uploads/products/'.$catlist['item_image']); ?>" alt=''id="zoom_05"  data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image']); ?>"/>
									</div>
									<div class='item'  id="zoom_05">
										<img src="<?php echo base_url('uploads/products/'.$catlist['item_image1']); ?>" alt='' data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image1']); ?>" />
									</div>
									<div class='item'>
										<img src="<?php echo base_url('uploads/products/'.$catlist['item_image2']); ?>" alt='' data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image2']); ?>" />
									</div>
										
									<div class='item'>
										<img src="<?php echo base_url('uploads/products/'.$catlist['item_image3']); ?>" alt='' data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image3']); ?>" id="zoom_05"/>
									</div>
								
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
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($catlist['item_id'])); ?>"><?php echo $catlist['item_name']; ?></a></h6>
              <div class="price">
			  
			  <?php if(isset($catlist['offer_amount']) && $catlist['offer_percentage']!=''){ ?>
				  <div class="pull-left" ><?php echo ($catlist['item_cost'])-($catlist['offer_amount']); ?> 
					<span class="label-tags"><span class="label label-default">-<?php echo $catlist['offer_percentage']; ?>%</span></span>
				</div>
				<?php }else{ ?>
              
				<?php } ?>
              
				<div class="pull-right inc_des">
					<span class="inc_btn"> Qty:</span>&nbsp;
					<span class="glyphicon glyphicon-minus"></span>&nbsp;
					<span class=""><input class=""style="width:20px;" type="text" value="1"></span>&nbsp;
					<span class="glyphicon glyphicon-plus"></span>&nbsp;
					
				</div>
				<div class="clearfix"></div>
                <span class="price-old"><?php echo $catlist['item_cost']; ?></span>
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
		  <?php } ?>
		  
		  
		  <div class="clearfix"></div>
		 
          
          </div>
          </div>
          </div>

</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
  <script>


function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var footer_top = $("#footer-start").offset().top;
    var div_top = $('#sticky-anchor').offset().top;
    var div_height = $("#sticky").height();
    
    var padding = 20;  // tweak here or get from margins etc
    
    if (window_top + div_height > footer_top - padding)
        $('#sticky').css({top: (window_top + div_height - footer_top + padding) * -1})
    else if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('#sticky').css({top: 150})
    } else {
        $('#sticky').removeClass('stick');
		$('#sticky').css({top: 0})
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});
</script>