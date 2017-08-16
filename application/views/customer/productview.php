<style>
#sticky {
 
    height:80%;

 
}
#sticky.stick {
    position: fixed;
    top: 0;
    z-index: 10;
    border-radius: 0 0 0.5em 0.5em;
}
</style>
<div class="">
	
</div>
<div class="pad_bod" style="margin-bottom:220px;">
		<div class="row">
		<div id="sticky-anchor"></div>
		<div class="col-md-4 z_ind " id="sticky">
			<div class="bzoom_wrap">
			<ul id="bzoom">
					<li>
				
						<img  class="bzoom_thumb_image img_prod" src="<?php echo base_url('uploads/products/'.$products_list['item_image']); ?>" title="<?php echo $products_list['item_image']; ?>" />
						<img class="bzoom_big_image"  src="<?php echo base_url('uploads/products/'.$products_list['item_image']); ?>"/>
					</li>
					
					<?php if(isset($products_list['item_image1']) && $products_list['item_image1'] ){  ?>
					<li>
						<img class="bzoom_thumb_image img_prod" src="<?php echo base_url('uploads/products/'.$products_list['item_image1']); ?>"/>
						<img class="bzoom_big_image" src="<?php echo base_url('uploads/products/'.$products_list['item_image1']); ?>"/>
					</li>
					<?php } ?>
					<?php if(isset($products_list['item_image2']) && $products_list['item_image2']!='' ){  ?>
					<li>
						<img class="bzoom_thumb_image img_prod" src="<?php echo base_url('uploads/products/'.$products_list['item_image2']); ?>"/>
						<img class="bzoom_big_image" src="<?php echo base_url('uploads/products/'.$products_list['item_image2']); ?>"/>
					</li>
					<?php } ?>
					<?php if(isset($products_list['item_image3']) && $products_list['item_image3']!='' ){  ?>
					<li>
						<img class="bzoom_thumb_image img_prod" src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>"/>
						<img class="bzoom_big_image" src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>"/>
					</li>
					<?php } ?>
					
					
				</ul>
			</div>
		</div>
        <!-- End Image List -->

        <div class="col-md-8 col-md-offset-4">
          <?php if($this->session->flashdata('success')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('success');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('error');?></div>
			<?php endif; ?>
		<div style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"></div>

          <div class="title-detail"><?php echo $products_list['item_name']; ?></div>
		  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $products_list['item_id']; ?>" >
         
		 <table class="table table-detail">
            <tbody>
              <tr>
                <td>Price</td>
                <td>
				<?php if(date('m/d/Y') <= $products_list['offer_expairdate']) {?>
				<div class="price">
                    <div><?php echo ($products_list['item_cost'])-($products_list['offer_amount']); ?><span class="label label-default arrowed">-<?php echo $products_list['offer_percentage']; ?>%</span></div>
                    <span class="price-old"><?php echo $products_list['item_cost']; ?></span>
                  </div>
				<?php }else{ ?>
                  <div class="price">
                    <span><?php echo $products_list['item_cost']; ?></span>
                  </div>				  
				<?php } ?>
                </td>
              </tr>
              <tr>
                <td>Availability</td>
                <td><span class="label label-success arrowed">
				 <?php if($products_list['item_status']==1){ 
					echo "Ready Stock";
				}
				else{
					echo "Out of Stock";
				}				?>
				
				</span></td>
              </tr>
              <tr>
                <td>Quantity</td>
                <td>
                  <div class="input-qty">
						<div class="input-group number-spinner">
							<span class="input-group-btn data-dwn">
								<a class="btn btn-primary " data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
							</span>
							<input type="text" name="qty" id="qty" class="form-control text-center" value="1" min="1" max="20">
							<span class="input-group-btn data-up">
								<a class="btn btn-primary " data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
							</span>
						</div>
                  </div>
                </td>
              </tr>

         
            </tbody>
			<div class="clearfix"></div>
          </table>
		    <tr>
                <td></td>
                <td>
                  <button class="btn btn-theme m-b-1" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
				  <a href="" id="compare" class="btn btn-theme m-b-1" type="button" ><i class="fa fa-align-left"></i> Add to Compare</a>
                  <input type="hidden" name="compare_id" id="compare_id"  value="<?php echo $products_list['item_id']; ?>"> 
					<?php if($products_list['yes']==1){ ?>
					<a href="javascript:void(0);" style="color:yellow;" onclick="addwhishlidt(<?php echo $products_list['item_id']; ?>);" id="addwhish" class="btn btn-theme m-b-1" type="button"><i class="fa fa-heart"></i>Add to Wishlist</a>  
					<?php }else{ ?>	
					<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $products_list['item_id']; ?>);" id="addwhish" class="btn btn-theme m-b-1" type="button"><i class="fa fa-heart"></i>Add to Wishlist</a>  
					<?php } ?>			  
				 
                </td>
              </tr>
			 </form>
			 <div class="clearfix">&nbsp;</div>
			 <table class="table table-bordered">
  
    <tbody>
      <tr>
        <th>Specifications</th>
      </tr>
      <tr>
        <td>
			<div class="row">
				<h4 style="padding:0px 15px">General</h4>
			</div>
			<div class="row" style="margin-top:15px;">
				<div class="col-md-3">
					fsdkfks
				</div>
				<div class="col-md-5">
					fsdkfks
				</div>
			</div>
				<div class="row" style="margin-top:15px;">
				<div class="col-md-3">
					fsdkfks
				</div>
				<div class="col-md-5">
					fsdkfks
				</div>
			</div>
				<div class="row" style="margin-top:15px;">
				<div class="col-md-3">
					fsdkfks
				</div>
				<div class="col-md-5">
					fsdkfks
				</div>
			</div>
			</div>
			
		</td>
        
      </tr>
	  
	   <tr class="read_div" style="display:none;">
        <td>
			<div class="row">
				<h4 style="padding:0px 15px">General</h4>
			</div>
			<div class="row" style="margin-top:15px;">
				<div class="col-md-3">
					fsdkfks
				</div>
				<div class="col-md-5">
					fsdkfks
				</div>
			</div>
				<div class="row" style="margin-top:15px;">
				<div class="col-md-3">
					fsdkfks
				</div>
				<div class="col-md-5">
					fsdkfks
				</div>
			</div>
				<div class="row" style="margin-top:15px;">
				<div class="col-md-3">
					fsdkfks
				</div>
				<div class="col-md-5">
					fsdkfks
				</div>
			</div>
			</div>
			
		</td>
        
      </tr>
	     <tr>
        <td>
			<div class=" read_mor">
				Read more...
			</div>
		</td>
        
      </tr>
    
    </tbody>
  </table>
        </div>

        <div class="col-md-8 col-md-offset-4 mar_t20" >

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Description</a></li>
            <li role="presentation"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Detail</a></li>
            <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews (<?php echo count($products_reviews); ?>)</a></li>
          </ul>
          <!-- End Nav tabs -->

          <!-- Tab panes -->
          <div class="tab-content tab-content-detail">

              <!-- Description Tab Content -->
              <div role="tabpanel" class="tab-pane active" id="desc">
                 <div class="well">
                  <p>
                  <?php echo $products_list['item_description']; ?> </p>
                </div>
              </div>
              <!-- End Description Tab Content -->

              <!-- Detail Tab Content -->
              <div role="tabpanel" class="tab-pane" id="detail">
                <div class="well">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Item Name</td>
                        <td><?php echo $products_list['item_name']; ?></td>
                      </tr>
                      <tr>
                        <td>Item Cost</td>
                        <?php if(date('m/d/Y') <= $products_list['offer_expairdate'] && date('H:ia')<= $products_list['offer_time']) {?>
                        	<td><?php echo ($products_list['item_cost'])-($products_list['offer_amount']); ?></td>
                        	<?php }else{ ?>
                        		<td><?php echo $products_list['item_cost']; ?></td>
                        		<?php }?>
                      </tr>
                      <tr>
                        <td>Item Status</td>
							<td>
							<?php if($products_list['item_status']==1){ 
							echo "Ready Stock";
							}
							else{
							echo "Out of Stock";
							}				?>
							</td>
                      </tr>
                      <tr>
                        <td>Item Code</td>
                        <td><?php echo $products_list['item_code']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  </table>
                </div>
              </div>
              <!-- End Detail Tab Content -->

              <!-- Review Tab Content -->
              <div role="tabpanel" class="tab-pane" id="review">
                <div class="well">
                  <?php
					if(count($products_reviews)>0){ 
					foreach($products_reviews as $reviewslist){ ?>
				   <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object img-thumbnail" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                      </a>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                      </div>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading"><strong><?php echo $reviewslist['name']; ?></strong></h5>
						<?php echo $reviewslist['review_content']; ?>
                    </div>
                  </div>
					<?php } }else{ ?>
					<div class="media"> NO Reviews</div>
					<?php } ?>
				
                  <hr/>
                  <h4 class="m-b-2">Add your review</h4>
                  <form role="form" name="addreview" id="addreview" action="<?php echo base_url('category/productreview'); ?>" method="post">
					<div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="Email">Email</label>
                      <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
					
					
                    <div class="form-group">
                      <label for="Review">Your Review</label>
                      <textarea id="review" name="review" class="form-control" rows="5" placeholder="Your Review"></textarea>
                    </div>
                    <button type="submit" class="btn btn-theme">Submit Review</button>
                  </form>
              
              </div>
              <!-- End Review Tab Content -->

          </div>
          <!-- End Tab panes -->

        </div>
          </div>
          </div>
          </div>
		  <div class="clearfix"></div>
		  <div class="compar_btn" id="compar_btn" >
	 		<div class="btn-group show-on-hover">
	 		<!-- <a href="javascript:void(0);" onclick="getcategoryid(<?php echo $products_list['category_id']; ?>);"  class="btn btn-primary" ><?php echo $products_list['item_name'];?>&nbsp;<span><?php echo count($products_list['item_id']) ?></span> 
          </a> -->
          <a href="<?php echo base_url('category/productscompare/'.base64_encode($products_list['item_id']).'/'.base64_encode($products_list['category_id'])); ?>"  class="btn btn-primary" >Click Here To Compare<!-- <?php echo $products_list['item_name'];?>&nbsp;<span><?php echo count($products_list['item_id']) ?> --></span> 
          </a>
          <input type="hidden" name="category_id" id="category_id"  value="<?php echo $products_list['category_id']; ?>"> 
          <!--  <ul class="dropdown-menu" role="menu" style="position: absolute;top:-100px;height:150px;width:10px;left:-50px;opacity: 0.8;">
				<li>
					<img src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>" style="width: 80%;height: 80%">
				</li>
          </ul> --> 
        </div>
			
	  </div>
          



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
				jQuery('#sucessmsg').show();
				//alert(data.msg);
				if(data.msg==2){
				$('#addwhish').css("color", "");
				$('#sucessmsg').html('Product Successfully removed to Whishlist');	
				}
				if(data.msg==1){
				$('#addwhish').css("color", "yellow");
				$('#sucessmsg').html('Product Successfully added to Whishlist');	
				}
			

			}
		});
	
	
}


// function getcategoryid(id){
// 	//alert(id);
// 	//var category_id =  $("#category_id").val();
// 	//alert(category_id);
// jQuery.ajax({
// 			url: "<?php echo site_url('category/productscompare');?>",
// 			type: 'post',
// 			data: {category_id:id},
//  			//dataType:"json",
// 			//data: {category_id: category_id},				
// 			success: function (data) {
// 				//alert('hello');
// 				alert(data);
// 			}
			
// 		});
// //alert(data);
	
	
//  }


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

;(function($){
	$.fn.zoom = function(options){
	
		var _option = {
			align: "left",				
			thumb_image_width: 300,		
			thumb_image_height: 400,	
			source_image_width: 900,  	
			source_image_height: 1200,	
			zoom_area_width: 600, 		
			zoom_area_height: 500,
			zoom_area_distance: 10,     
			zoom_easing: true,          
			click_to_zoom: false,
			zoom_element: "auto",
			show_descriptions: true,
			description_location: "bottom",
			description_opacity: 0.7,
			small_thumbs: 3,			
			smallthumb_inactive_opacity: 0.4, 	
			smallthumb_hide_single: true,    	
			smallthumb_select_on_hover: false,
			smallthumbs_position: "bottom",		
			show_icon: true,
			hide_cursor: false,			
			speed: 600,     			
			autoplay: true,				
			autoplay_interval: 6000, 	
			keyboard: true,
			right_to_left: false,
		}

		if(options){
			$.extend(_option, options);
		}

		var $ul = $(this);
		if($ul.is("ul") && $ul.children("li").length && $ul.find(".bzoom_big_image").length){

			$ul.addClass('bzoom clearfix').show();
			var $li = $ul.children("li").addClass("bzoom_thumb"),
				li_len = $li.length,
				autoplay = _option.autoplay;
			$li.first().addClass("bzoom_thumb_active").show();
			if(li_len<2){
				autoplay = false;
			}

			$ul.find(".bzoom_thumb_image").css({width:_option.thumb_image_width, height:_option.thumb_image_height}).show();

			var scalex = _option.thumb_image_width / _option.source_image_width,
				scaley = _option.thumb_image_height / _option.source_image_height,
				scxy = _option.thumb_image_width / _option.thumb_image_height;

			var $bzoom_magnifier, $bzoom_magnifier_img, $bzoom_zoom_area, $bzoom_zoom_img;


			if(!$(".bzoom_magnifier").length){
				$bzoom_magnifier = $('<li class="bzoom_magnifier"><div class=""><img src="" /></div></li>');
                $bzoom_magnifier_img = $bzoom_magnifier.find('img');

                $ul.append($bzoom_magnifier);

                $bzoom_magnifier.css({top:top, left:left});
                $bzoom_magnifier_img.attr('src', $ul.find('.bzoom_thumb_active .bzoom_thumb_image').attr('src')).css({width: _option.thumb_image_width, height: _option.thumb_image_height});
                $bzoom_magnifier.find('div').css({width:_option.thumb_image_width*scalex, height:_option.thumb_image_height*scaley});
			}
			

			if(!$('.bzoom_zoom_area').length){
                $bzoom_zoom_area = $('<li class="bzoom_zoom_area"><div><img class="bzoom_zoom_img" /></div></li>');
                $bzoom_zoom_img = $bzoom_zoom_area.find('.bzoom_zoom_img');
                var top = 0,
                    left = 0;

                $ul.append($bzoom_zoom_area);

                if(_option.align=="left"){
                	top = 0;
                	left = 0 + _option.thumb_image_width + _option.zoom_area_distance;
                }

                $bzoom_zoom_area.css({top:top, left:left});
                $bzoom_zoom_img.css({width: _option.source_image_width, height: _option.source_image_height});
			}

			var autoPlay = {
				autotime : null,
				isplay : autoplay,

				start : function(){
					if(this.isplay && !this.autotime){
						this.autotime = setInterval(function(){
							var index = $ul.find('.bzoom_thumb_active').index();
							changeLi((index+1)%_option.small_thumbs);
						}, _option.autoplay_interval);
					}
				},

				stop : function(){
					clearInterval(this.autotime);
					this.autotime = null;
				},

				restart : function(){
					this.stop();
					this.start();
				}
			}


			var $small = '';
			if(!$(".bzoom_small_thumbs").length){
				var top = _option.thumb_image_height+10,
					width = _option.thumb_image_width,
					smwidth = (_option.thumb_image_width / _option.small_thumbs) - 10,
					smheight = smwidth / scxy,
					ulwidth = 
					smurl = '',
					html = '';

				for(var i=0; i<_option.small_thumbs; i++){
					smurl = $li.eq(i).find('.bzoom_thumb_image').attr("src");

					if(i==0){
						html += '<li class="bzoom_smallthumb_active"><img src="'+smurl+'" alt="small" style="width:'+smwidth+'px; height:'+smheight+'px;" /></li>';
					}else{
						html += '<li style="opacity:0.4;"><img src="'+smurl+'" alt="small" style="width:'+smwidth+'px; height:'+smheight+'px;" /></li>';
					}
				}

				$small = $('<li class="bzoom_small_thumbs" style="top:'+top+'px; width:'+width+'px;"><ul class="clearfix" style="width: 485px;">'+html+'</ul></li>');
				$ul.append($small);

				$small.delegate("li", "click", function(event){
					changeLi($(this).index());
					autoPlay.restart();
				});

				autoPlay.start();
			}

			function changeLi(index){
				$ul.find('.bzoom_thumb_active').removeClass('bzoom_thumb_active').stop().animate({opacity: 0}, _option.speed, function() {
                    $(this).hide();
                });
                $small.find('.bzoom_smallthumb_active').removeClass('bzoom_smallthumb_active').stop().animate({opacity: _option.smallthumb_inactive_opacity}, _option.speed);

                $li.eq(index).addClass('bzoom_thumb_active').show().stop().css({opacity: 0}).animate({opacity: 1}, _option.speed);
                $small.find('li:eq('+index+')').addClass('bzoom_smallthumb_active').show().stop().css({opacity: _option.smallthumb_inactive_opacity}).animate({opacity: 1}, _option.speed);

                $bzoom_magnifier_img.attr("src", $li.eq(index).find('.bzoom_thumb_image').attr("src"));
			}

			
			

			_option.zoom_area_height = _option.zoom_area_width / scxy;
			$bzoom_zoom_area.find('div').css({width:_option.zoom_area_width, height:_option.zoom_area_height});

			$li.add($bzoom_magnifier).mousemove(function(event){
				var xpos = event.pageX - $ul.offset().left,
					ypos = event.pageY - $ul.offset().top,
					magwidth = _option.thumb_image_width*scalex,
					magheight = _option.thumb_image_height*scalex,
					magx = 0,
					magy = 0,
					bigposx = 0,
					bigposy = 0;

				if(xpos < _option.thumb_image_width/2){
					magx = xpos > magwidth/2 ? xpos-magwidth/2 : 0;
				}else{
					magx = xpos+magwidth/2 > _option.thumb_image_width ? _option.thumb_image_width-magwidth : xpos-magwidth/2;
				}
				if(ypos < _option.thumb_image_height/2){
					magy = ypos > magheight/2 ? ypos-magheight/2 : 0;
				}else{
					magy = ypos+magheight/2 > _option.thumb_image_height ? _option.thumb_image_height-magheight : ypos-magheight/2;
				}

				bigposx = magx / scalex;
				bigposy = magy / scaley;
				
				$bzoom_magnifier.css({'left':magx, 'top':magy});
				$bzoom_magnifier_img.css({'left':-magx, 'top': -magy});

				$bzoom_zoom_img.css({'left': -bigposx, 'top': -bigposy});
			}).mouseenter(function(event){
				autoPlay.stop();

				$bzoom_zoom_img.attr("src", $(this).find('.bzoom_big_image').attr('src'));
				$bzoom_zoom_area.css({"background-image":"none"}).stop().fadeIn(400);

				$ul.find('.bzoom_thumb_active').stop().animate({'opacity':0.5}, _option.speed*0.7);
				$bzoom_magnifier.stop().animate({'opacity':1}, _option.speed*0.7).show();
			}).mouseleave(function(event){
				$bzoom_zoom_area.stop().fadeOut(400);
				$ul.find('.bzoom_thumb_active').stop().animate({'opacity':1}, _option.speed*0.7);
				$bzoom_magnifier.stop().animate({'opacity':0}, _option.speed*0.7, function(){
					$(this).hide();
				});

				autoPlay.start();
			})
		}
	}
})(jQuery);

$("#bzoom").zoom({
	zoom_area_width: 1000,
	zoom_area_height: 500,
    autoplay_interval :3000,
    small_thumbs : 4,
    autoplay : false
});
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

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
        $('#sticky').css({top: 90})
    } else {
        $('#sticky').removeClass('stick');
		$('#sticky').css({top:0})
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});

$(document).ready(function() {
    $('#addreview').bootstrapValidator({
       
        fields: {
            
			
            name: {
              validators: {
					notEmpty: {
						message: 'Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			email: {
             validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			review: {
               validators: {
					notEmpty: {
						message: 'Please enter a review'
					}
				}
            }
        }
    });
});

    $(document).ready(function(){
    $('#compare').click(function(e){
    e.preventDefault();
    $("#compar_btn").css("display", "block");
    //alert('hello');
    var item_id =  $("#compare_id").val();
    var category_id =  $("#category_id").val();
    
    //alert(category_id);
    // $.ajax
    // ({
    // type: "POST",
    // url: "<?php echo base_url();?>category/productscompare",
    //  data: {category_id:category_id},
    //  //   success: function (data) {
    // 	// alert(data);
    //  // } 
    // });
    
  
    
    });
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
<script>
		$(document).ready(function(){
		$(".read_mor").click(function(){
        $(".read_div").toggle(1000);
    });
});
</script>
<!--quantity script end-->