<style>
.top-navbar1{
	display:none;
}
.panel-title > a:before {
    float: right !important;
    font-family: FontAwesome;
	content:"\f077";
    padding-right: 5px;
}
.panel-heading {
    background:#45b1b5 ;
}
.panel-title > a.collapsed:before {
    float: right !important;
    content:"\f078";
}
.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
	
}
.fluid_mod{
	margin:0px 60px;
	background:#fff;
}

</style>
<!--<div class="" style="margin-top:50px;">
	<img  src="<?php echo base_url(); ?>assets/home/images/ban1.png">
</div>-->
<body >
	 <div class="container-fluid fluid_mod ">
	 <div class="row ">
			<div class="col-md-12  ">
			  
			  <div class="col-md-12 gir_alg" style="border-right:1px solid #45b1b5">
			  <div class="title text-left mar_t10"><span><?php echo ucfirst(strtolower(isset($category_name['category_name'])?$category_name['category_name']:'')); ?> Sub Categories list</span></div>
			  <?php foreach($subcategory_list as $list){ ?>
				  <div class="col-md-2"  onclick="getproduct(<?php echo $list['subcategory_id']; ?>);">
					 <div class="catg_sty">
						<?php echo $list['subcategory_name']; ?>
					  </div>
				  </div> 
			  <?php } ?>
			</div>
			</div>
	 </div>
	<br>
	<hr>
	 <div class=" clearfix"></div>
	 <!-- Filter Sidebar -->
	 <div id="subcategorywise_products" style="">
		<div class="col-sm-3">
		 <div class="title"><span>Filters</span></div>
		 <form action="<?php echo base_url('category/categorywiseearch'); ?>" method="POST" >
			<input type="hidden" name="categoryid" id="categoryid" value="<?php echo $this->uri->segment(3);?>">
			
			<?php if(base64_decode($this->uri->segment(3))=='18'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
						 <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    My Restaurant
					</a>
				  </h4>

					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="mobileaccessories(this.value);" name="products[res]" class="form-control" id="sel1">
								<option value="">Select</option>
								<?php foreach ($myrestaurant as $reslist){ ?>
								<option value="<?php echo $reslist['seller_id']; ?>"><?php echo $reslist['seller_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Cuisine
					</a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($cusine_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value);" id="checkbox1" name="products[cusine]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingFive">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					  COMPATIBLE MOBILES
					</a>
				  </h4>

					</div>
					<div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
						<div class="panel-body">
							<div class="checkbox"><label><input type="checkbox" value="1" onclick="compatiblemobiles(this.value);" id="checkbox1" name="products[amount]" value="20"><span>&nbsp;Acer beTouch E110</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="2" id="checkbox2"><span>&nbsp;Acer beTouch E130</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="3" id="checkbox3"><span>&nbsp;Acer BeTouch E210</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="4" id="checkbox4"><span>&nbsp;Acer Ferrari Edition Liquid E</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="5" id="checkbox5"><span>&nbsp;Acer Liquid E700</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="6"  id="checkbox6"><span>&nbsp;Acer Liquid Jade</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="7" id="checkbox6"><span>&nbsp;3309 MORE</span></label></div>
						</div>
					</div>
				</div>
				
				
			</div>
			
			<?php }else if(base64_decode($this->uri->segment(3))=='21'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    My Restaurant
					</a>
				  </h4>

					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="mobileaccessories(this.value);" name="products[res]" class="form-control" id="sel1">
								<option value="">Select</option>
								<?php foreach ($myrestaurant as $reslist){ ?>
								<option value="<?php echo $reslist['seller_id']; ?>"><?php echo $reslist['seller_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  OFFERS
					</a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($cusine_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value);" id="checkbox1" name="products[cusine]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingFive">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					  COMPATIBLE MOBILES
					</a>
				  </h4>

					</div>
					<div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
						<div class="panel-body">
							<div class="checkbox"><label><input type="checkbox" value="1" onclick="compatiblemobiles(this.value);" id="checkbox1" name="products[amount]" value="20"><span>&nbsp;Acer beTouch E110</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="2" id="checkbox2"><span>&nbsp;Acer beTouch E130</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="3" id="checkbox3"><span>&nbsp;Acer BeTouch E210</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="4" id="checkbox4"><span>&nbsp;Acer Ferrari Edition Liquid E</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="5" id="checkbox5"><span>&nbsp;Acer Liquid E700</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="6"  id="checkbox6"><span>&nbsp;Acer Liquid Jade</span></label></div>
							<div class="checkbox"><label><input type="checkbox" value="7" id="checkbox6"><span>&nbsp;3309 MORE</span></label></div>
						</div>
					</div>
				</div>
				
				
			</div>
			<?php } ?>
			<button type="submit" name="test">Submit</button>
			</form>
		</div>
        <!-- End Filter Sidebar -->

        <!-- Product List -->
        <div class="col-sm-9">
          <div class="title"><span><?php echo ucfirst(strtolower(isset($category_name['category_name'])?$category_name['category_name']:'')); ?>&nbsp; Category Products lists</span></div>
		<?php //echo '<pre>';print_r($subcategory_porduct_list);exit; ?>
		<?php $cnt=1;foreach($subcategory_porduct_list as $productslist){ ?>
          <div class="col-sm-4 col-md-3 box-product-outer">
            <div class="box-product">
              <div class="img-wrapper">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                  <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-primary arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
				<div class="option">
				<button  style="background-color:transparent;border: none;cursor:pointer;color:#fff;font-size:20px;
				"type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
				<a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>

				<?php if($productslist['yes']==1){ ?>
				<a href="javascript:void(0);" style="color:#ef5350;" onclick="addwhishlidts(<?php echo $productslist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);"  onclick="addwhishlidts(<?php echo $productslist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
              <div class="price">
                <div>$13.50 <span class="label-tags"><span class="label label-primary">-<?php echo $productslist['discount']; ?>%</span></span> &nbsp;<span class="price-old"><?php echo $productslist['item_cost']; ?></span></div>
               
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
		  <?php  
			if(($cnt % 4)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
		   
		  <?php  $cnt++;} ?>
         
       
         
          
          <div class="col-sm-4 col-md-3 hidden-sm box-product-outer">
            <div class="box-product">
              <div class="img-wrapper">
                <a href="detail.html">
                  <img alt="Product" src="<?php echo base_url(); ?>assets/home/images/polo1.jpg">
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
              <h6><a href="detail.html">IncultGeo Print Polo T-Shirt</a></h6>
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
         
        </div>
	
        <!-- End Product List -->
</div>
      
    </div>
	 </div>
	 <div class="clearfix"></div>
	 <br>
</body>
<script>

function mobileaccessories(val){
	alert(val);return false;
	jQuery.ajax({
				url: "<?php echo site_url('category/categorywiseearch');?>",
				type: 'post',
				data: {
				productvalues: val,
				categoryid: '<?php echo $this->uri->segment(3); ?>',
				},
				dataType: 'html',
				success: function (data) {
					alert(data);
				
				}
			});
}
function discount(id){
	var form = document.getElementById("discountform");

document.getElementById("discountform").addEventListener("click", function () {
  form.submit();
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
function getproduct(id){
	if(id!=''){
	
	jQuery.ajax({
				url: "<?php echo site_url('category/categorywiseproductslist');?>",
				type: 'post',
				data: {
				subcategoryid: id,
				},
				dataType: 'html',
				success: function (data) {
					$("#subcategorywise_products").empty();
					$("#subcategorywise_products").append(data);
				}
			});
			
	}
	
	
}
(function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery);
</script>