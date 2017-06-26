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
            <div class="checkbox"><label><input type="checkbox" checked="checked"><span> T-Shirts (10)</span></label></div>
            <div class="checkbox"><label><input type="checkbox"><span> Polo T-Shirts (11)</span></label></div>
          </div>
          <div class="filter-sidebar">
            <div class="title"><span>Options</span></div>
            <ul>
              <li>
                <select class="selectpicker form-control" data-width="100%">
                  <option value="0">All Options</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </li>
              <li>
                <select class="selectpicker form-control" data-width="100%">
                  <option value="0">All Options</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </li>
            </ul>
          </div>
          <div class="filter-sidebar">
            <div class="title"><span>Options 2</span></div>
            <div class="radio"><label><input type="radio" name="options2" checked="checked"><span>All Options 2</span></label></div>
            <div class="radio"><label><input type="radio" name="options2"><span>Options 2.1</span></label></div>
            <div class="radio"><label><input type="radio" name="options2"><span>Options 2.2</span></label></div>
            <div class="radio"><label><input type="radio" name="options2"><span>Options 2.3</span></label></div>
          </div>
          <div class="filter-sidebar">
            <div class="title"><span>Availability</span></div>
            <div class="checkbox"><label><input type="checkbox" checked="checked"><span> In Stock (20)</span></label></div>
          </div>
          <div class="filter-sidebar">
            <div class="title"><span>Brand</span></div>
            <div class="checkbox"><label><input type="checkbox" checked="checked"><span> Brand Name 1 (11)</span></label></div>
            <div class="checkbox"><label><input type="checkbox"><span> Brand Name 2 (12)</span></label></div>
            <div class="checkbox"><label><input type="checkbox"><span> Brand Name 3 (13)</span></label></div>
            <div class="checkbox"><label><input type="checkbox"><span> Brand Name 4 (14)</span></label></div>
          </div>
         
          <div class="filter-sidebar">
            <div class="title"><span>Size</span></div>
            <label class="checkbox-inline"><input type="checkbox"><span> M (12)</span></label>
            <label class="checkbox-inline"><input type="checkbox"><span> L (13)</span></label>
            <label class="checkbox-inline"><input type="checkbox"><span> XL (14)</span></label>
          </div>
        </div>

 <!-- Product List -->
        <div class="row pad_bod col-md-offset-2">
          <div class="title"><span>T-Shirts</span></div>

          <!-- Product Sorting Bar -->
          <div class="product-sorting-bar">
            <div>Sort By
              <select name="sortby" class="selectpicker" data-width="180px">
                <option value="recomended">Recomended</option>
                <option value="low">Low Price &raquo; High Price</option>
                <option value="hight">High Price &raquo; High Price</option>
              </select>
            </div>
            <div>Show
              <select name="show" class="selectpicker" data-width="60px">
                <option value="8">8</option>
                <option value="12">12</option>
                <option value="16">16</option>
              </select> per page
            </div>
          </div>
          <!-- End Product Sorting Bar -->

          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  ">
				
						<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
							<div class='carousel-outer'>
								<!-- me art lab slider -->
								<div class='carousel-inner '>
									<div class='item active'>
										<img src='<?php echo base_url(); ?>assets/home/images/p3-1.jpg' alt=''id="zoom_05"  data-zoom-image="<?php echo base_url(); ?>assets/home/images/p3-1.jpg"/>
									</div>
									<div class='item'  id="zoom_05">
										<img src='<?php echo base_url(); ?>assets/home/images/p2-1.jpg' alt='' data-zoom-image="<?php echo base_url(); ?>assets/home/images/p2-1.jpg" />
									</div>
									<div class='item'>
										<img src='<?php echo base_url(); ?>assets/home/images/p4-1.jpg' alt='' data-zoom-image="<?php echo base_url(); ?>assets/home/images/p4-1.jpg" />
									</div>
										
									<div class='item'>
										<img src='<?php echo base_url(); ?>assets/home/images/p5-1.jpg' alt='' data-zoom-image="<?php echo base_url(); ?>assets/home/images/p5-1.jpg" id="zoom_05"/>
									</div>
									<div class='item'>
										<img src='<?php echo base_url(); ?>assets/home/images/p6-1.jpg' alt='' data-zoom-image="<?php echo base_url(); ?>assets/home/images/p6-1.jpg" id="zoom_05"/>
									</div>
									<div class='item'>
										<img src='<?php echo base_url(); ?>assets/home/images/p7-1.jpg' alt='' data-zoom-image="<?php echo base_url(); ?>assets/home/images/p7-1.jpg" id="zoom_05"/>
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
              <h6><a href="<?php echo base_url('singleproduct');?>">WranglerGrey Printed Slim Fit Round Neck T-Shirt</a></h6>
              <div class="price">
                <div class="pull-left" >$13.50 
					<span class="label-tags"><span class="label label-default">-10%</span></span>
				</div>
				<div class="pull-right inc_des">
					<span class="inc_btn"> Qty:</span>&nbsp;
					<span class="glyphicon glyphicon-minus"></span>&nbsp;
					<span class=""><input class=""style="width:20px;" type="text" value="1"></span>&nbsp;
					<span class="glyphicon glyphicon-plus"></span>&nbsp;
					
				</div>
				<div class="clearfix"></div>
                <span class="price-old">$15.00</span>
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
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/p2-1.jpg">
                </a>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-success arrowed-right">New Arrivals</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">CelioKhaki Printed Round Neck T-Shirt</a></h6>
              <div class="price">
                <div>$13.50 <span class="label-tags"><span class="label label-primary">-10%</span></span></div>
                <span class="price-old">$15.00</span>
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
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/p3-1.jpg">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-danger arrowed">Sale</span></span>
                  <span class="label-tags"><span class="label label-info arrowed">Collection</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">CelioOff White Printed Round Neck T-Shirt</a></h6>
              <div class="price">
                <div>$13.50</div>
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
          <div class="col-sm-4 col-md-3 hidden-sm box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/p4-1.jpg">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-primary arrowed">Popular</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">Levi'sNavy Blue Printed Round Neck T-Shirt</a></h6>
              <div class="price">
                <div>$13.50</div>
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
          <div class="clearfix"></div>
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/p5-1.jpg">
                </a>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-primary arrowed-right">Pupolar</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">IncultAcid Wash Raglan Crew Neck T-Shirt</a></h6>
              <div class="price">
                <div>$13.50 <span class="label-tags"><span class="label label-danger arrowed">-10%</span></span></div>
                <span class="price-old">$15.00</span>
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
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/p6-1.jpg">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-danger arrowed">Hot Item</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">Avoir EnvieOlive Printed Round Neck T-Shirt</a></h6>
              <div class="price">
                <div>$13.50 <span class="label-tags"><span class="label label-success arrowed">-10%</span></span></div>
                <span class="price-old">$15.00</span>
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
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/p7-1.jpg">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Hot Item</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">ElaboradoBrown Printed Round Neck T-Shirt</a></h6>
              <div class="price">
                <div>$13.50 <span class="label-tags"><span class="label label-primary arrowed">-10%</span></span></div>
                <span class="price-old">$15.00</span>
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
          <div class="col-sm-4 col-md-3 hidden-sm box-product-outer">
            <div class="box-product">
              <div class="img-wrapper img_hover">
                <a href="<?php echo base_url('singleproduct');?>">
                   <img src="<?php echo base_url(); ?>assets/home/images/polo1.jpg">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-success arrowed">New Arrivals</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="<?php echo base_url('singleproduct');?>">IncultGeo Print Polo T-Shirt</a></h6>
              <div class="price">
                <div>$13.50 <span class="label-tags"><span class="label label-default arrowed">-10%</span></span></div>
                <span class="price-old">$15.00</span>
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
		  <div class="clearfix"></div>
		  <br>
		  <br>
		  <br>
          <div class="col-xs-12 text-center">
          <div class="col-xs-5 text-center">&nbsp;</div>
			  <div class="col-xs-2 text-center">
				<div class="site_btn"> Load more ....</div>
			  </div>
          </div>
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