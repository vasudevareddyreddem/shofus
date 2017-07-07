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
            <div class="title"><span>Brand</span></div>
			<?php foreach ($listcategory as $list){ ?>
            <div class="checkbox">
			<label>
			<a href="javascript:void(0);" onclick="multisearch(<?php echo $list['subcategory_id']; ?>)"><input type="checkbox" value="<?php echo $list['subcategory_id']; ?>" ><span> <?php echo $list['subcategory_name'] ?></span></a></label>
			</div>
			<?php } ?>
          <?php //echo base_url('category/categorysearch/'.base64_encode($list['subcategory_id']));?>
          </div>
       
       
          <div class="filter-sidebar">
            <div class="title"><span>Availability</span></div>
            <div class="checkbox"><label><input type="checkbox" checked="checked"><span> In Stock (4)</span></label></div>
          </div>
        
         
        </div>

 <!-- Product List -->
 <?php //echo '<pre>';print_r($category_list);exit;?>

        <div class="row pad_bod col-md-offset-2">
          <div class="title"><span><?php echo 'category Name'; ?></span></div>
	<?php if($this->session->flashdata('adderror')): ?>	
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('adderror');?></div>
			<?php endif; ?>
		<?php 
		//echo '<pre>';print_r($category_list);exit;
		foreach ($category_list as $catlist){ 
		
		//echo '<pre>';print_r($catlist);exit;
		?>
		
		  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $catlist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $this->uri->segment(3); ?>" >
		 <div class="col-sm-4 col-md-3 box-product-outer" style="border:1px solid #e5e5e5;margin:0 5px;">
            <div class="box-product">
              <div class="img-wrapper  ">
			  
				
						<div id='carousel-custom' class='carousel slide' data-ride=''>
							<div class='carousel-outer'>
								<!-- me art lab slider -->
								<div class='carousel-inner '>
									<div class='item active'>
										<img class="img-responsive thumbnail" src="<?php echo base_url('uploads/products/'.$catlist['item_image']); ?>" alt=''id="zoom_05"  data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image']); ?>"/>
									</div>
									<div class='item'  id="zoom_05">
										<img class="img-responsive thumbnail" src="<?php echo base_url('uploads/products/'.$catlist['item_image1']); ?>" alt='' data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image1']); ?>" />
									</div>
									<div class='item'>
										<img class="img-responsive thumbnail" src="<?php echo base_url('uploads/products/'.$catlist['item_image2']); ?>" alt='' data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image2']); ?>" />
									</div>
										
									<div class='item'>
										<img class="img-responsive thumbnail" src="<?php echo base_url('uploads/products/'.$catlist['item_image3']); ?>" alt='' data-zoom-image="<?php echo base_url('uploads/products/'.$catlist['item_image3']); ?>" id="zoom_05"/>
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
                  <button  style="background-color:transparent;border: none;cursor:pointer;color:#fff;font-size:20px;
           "type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                
				<?php if($catlist['yes']==1){ ?>
					<a href="javascript:void(0);" style="color:#ef5350;" onclick="addwhishlidts(<?php echo $catlist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a> 
					<?php }else{ ?>	
					<a href="javascript:void(0);"  onclick="addwhishlidts(<?php echo $catlist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a> 
					<?php } ?>	
				</div>
              </div>
              <h4><a href="<?php echo base_url('category/productview/'.base64_encode($catlist['item_id'])); ?>"><?php echo $catlist['item_name']; ?></a></h4>
              <div class="price">
			  
			  <?php if(isset($catlist['offer_amount']) && $catlist['offer_percentage']!=''){ ?>
				  <div class="pull-left" ><?php echo ($catlist['item_cost'])-($catlist['offer_amount']); ?> 
					<span class="label-tags"><span class="label label-default">-<?php echo $catlist['offer_percentage']; ?>%</span></span>
				</div>
				<?php }else{ ?>
              
				<?php } ?>
              
				  <div style="width:40%" class="input-qty">
						<div class="input-group number-spinner">
							<span class="input-group-btn data-dwn">
								<a style="padding:9px 5px" class="btn btn-primary " data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
							</span>
							<input  type="text" name="qty" id="qty" class="form-control text-center" value="1" min="1" max="20">
							<span class="input-group-btn data-up">
								<a  style="padding:9px 5px" class="btn btn-primary " data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
							</span>
						</div>
                  </div>
				<div class="clearfix"></div>
				 <?php if(isset($catlist['offer_amount']) && $catlist['offer_percentage']!=''){ ?>
                <span class="price-old"><?php echo $catlist['item_cost']; ?></span>
				<?php }else{ ?>
				   <span class=""><?php echo $catlist['item_cost']; ?></span>
				<?php } ?>
              </div>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
				<!--<?php if($catlist['reviewcount']!='' && $catlist['reviewcount']!=0 ){ ?>
				<a href="<?php echo base_url('category/productview/'.base64_encode($catlist['item_id'])); ?>">( <?php echo $catlist['reviewcount']; ?> reviews)</a>
				<?php }else{ ?>
				<a href="<?php echo base_url('category/productview/'.base64_encode($catlist['item_id'])); ?>">(reviews)</a>
				<?php } ?>-->
                
              </div>
            </div>
          </div>
		  
		  </form>
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

function multisearch(ids){
	//alert(ids);return false;
	jQuery.ajax({
			url: "<?php echo site_url('category/categorysearch');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				sub_cat_id: ids,
				},
			dataType: 'JSON',
			success: function (data) {
				jQuery('#sucessmsg').show();
				//alert(data.msg);
				
			

			}
		});
	
}
function addwhishlidts(id){
jQuery.ajax({
			url: "<?php echo site_url('customer/addwhishlist');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				item_id: id,
				},
			dataType: 'JSON',
			success: function (data) {
				jQuery('#sucessmsg').show();
				//alert(data.msg);
				if(data.msg==2){
				$('#addwhish').css("color", "");
				$('#sucessmsg').html('Product Successfully removed to Whishlist');	
				}
				if(data.msg==1){
				$('#addwhish').css("color", "#ef5350");
				$('#sucessmsg').html('Product Successfully added to Whishlist');	
				}
			

			}
		});
	
	
}
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});



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

$(function() {
    var action;
    $(".number-spinner a").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('a').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});

</script>