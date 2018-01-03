<style>
.help-owl .owl-item {
	
	width:170px !important
}
.owl-theme .owl-controls {
    position: absolute;
    top: 1px;
    right: 0;
    margin-top: 0;
}

</style>
	<?php
$customerdetails=$this->session->userdata('userdetails');
	if(isset($step_one) && count($step_one)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main ">
			<div class="row mar_t15" >
			<?php foreach ($step_one as $list){ ?>
					<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
						</div>
					</a>					
					<?php } ?>
					<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
						<?php if($list[1]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
							<div class="col-md-4">
							<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
							</div>
						</a>						
					<?php } ?>
					<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
						<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
						</div>
						</a>
                	  
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
	<?php if(isset($step_two) && count($step_two)>0){ ?>
	<section class="">
      <div class=" slider-items-products container_main">
       
		   <div id="best-seller" class="product-flexslider hidden-buttons cat_sl_s" >
				  
			<div class="slider-items slider-width-col4 products-grid  text-center help-owl" >
				<?php foreach ($step_two as $list) { ?>
				<a href="<?php echo base_url('category/subcategory/'.base64_encode($list['category_id']).'/'.base64_encode($list['subcategory_id'])); ?>">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/subcategoryimages/'.$list['subcategory_image']);?>" > 
					<h5 class="text-center"><?php echo $list['subcategory_name']; ?></h5>
					</div>
					
				  </div>
				</div>
				</a>
			<?php } ?>
			</div>

		   </div>
	
      
      </div>
    </section>
	<?php }	 ?>
	
	<!-- top brands-->
	<?php if(isset($step_three) && count($step_three)>0){  ?>
	<section class="">
      <div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Top Brands</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons cat_sl_s" >
		   <div class="slider-items slider-width-col4 products-grid  text-center help-owl" >
				<?php foreach ($step_three as $list){ ?>
					<a href="<?php echo base_url('category/groupwise/'.base64_encode($list['category_id']).'/'.base64_encode($list['brand']).'/'.base64_encode('brand')); ?>">
					<div class="item cat_ma-t" >
					  <div class="top-brands" >
						<div class="box-product">
						   <img src="<?php echo base_url('assets/brands/'.$list['image']);?>" alt="<?php echo $list['image']; ?>" > 
						</div>
					  </div>
					</div>
					</a>
				<?php } ?>
			</div>
			</div>
      </div>
</section>
	<?php }?>
	
	
	
	<?php if(isset($step_four) && count($step_four)>0){ ?>
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="row mar_t15" >
		<?php foreach ($step_four as $list){ ?>
			<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
				<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-6">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
					</div> 
					</a>					
					<?php } ?>
					<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
						<?php if($list[1]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-6">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
						</div>
						</a>						
					<?php } ?>
			
		<?php } ?>
			
				
		</div>
	</div>
	<?php } ?>
		
    </section>
	
	<!--Shop by price start -->
	<?php if(isset($step_five) && count($step_five)>0){  ?>
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Shop by price</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons top-brands">
			<br>
			<?php foreach ($step_five as $list){ 
			
			
			//echo '<pre>';print_r($list);exit; ?>
			<a href="<?php echo base_url('category/price/'.base64_encode($list[4]).'/'.base64_encode($list[0][0]).'/'.base64_encode('price').'/'.base64_encode(0)); ?>">
				<div class="col-md-3 col-xs-12 col-sm-12  pri-bran">
					<div class="pric_fi">
						<h3> ₹ <?php echo round($list[0][0]); ?> </h3>
					</div>
				</div>
			</a>
			<a href="<?php echo base_url('category/price/'.base64_encode($list[4]).'/'.base64_encode($list[1][0]).'/'.base64_encode('price').'/'.base64_encode($list[0][0])); ?>">
				<div class="col-md-3 col-xs-12 col-sm-12 pri-bran">
					<div class="pric_se">
						<h3> ₹ <?php echo round($list[0][0]); ?> - ₹<?php echo round($list[1][0]); ?></h3>
					</div>
				</div>
				</a>
			
			
			
				<a href="<?php echo base_url('category/price/'.base64_encode($list[4]).'/'.base64_encode($list[2][0]).'/'.base64_encode('price').'/'.base64_encode($list[1][0])); ?>">
				<div class="col-md-3 col-xs-12 col-sm-12 pri-bran">
					<div class="pric_th">
						<h3> ₹ <?php echo round($list[1][0]); ?> - ₹<?php echo round($list[2][0]); ?></h3>
					</div>
				</div>
				</a>
				<a href="<?php echo base_url('category/price/'.base64_encode($list[4]).'/'.base64_encode($list[3][0]).'/'.base64_encode('price').'/'.base64_encode($list[2][0])); ?>">
				<div class="col-md-3 col-xs-12 col-sm-12 pri-bran">
					<div class="pric_fo">
						<h3> ₹ <?php echo round($list[2][0]); ?> - ₹<?php echo round($list[3][0]); ?></h3>
					</div>
				</div>
				</a>
				<?php } ?>
		
			
			<div class="clearfix">&nbsp;</div>
		</div>
		
	</div>
</section>

<?php } ?>
	<!--shop by x start-->
	<?php if(isset($step_six) && count($step_six)>0) { ?>
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Shop by <?php echo isset($step_sixlabel) && $step_sixlabel?$step_sixlabel:''; ?></h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid ">
			<?php $f=2;foreach($step_six as $list){ 
			
				$currentdate=date('Y-m-d h:i:s A');
				if($list['offer_expairdate']>=$currentdate){
				$item_price= ($list['item_cost']-$list['offer_amount']);
				$percentage= $list['offer_percentage'];
				$orginal_price=$list['item_cost'];
				}else{
					//echo "expired";
					$item_price= $list['special_price'];
					$prices= ($list['item_cost']-$list['special_price']);
					$percentage= (($prices) /$list['item_cost'])*100;
					$orginal_price=$list['item_cost'];
				}

			?>
				<a href="#">
					
				<!--<form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >-->
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $list['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $list['category_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
			 <a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>">
		   <div class="item">
          <div class=" box-product-outer">
            <div class="box-product">
              <div class="img-wrapper  img_hover item">
			  <div class="img_size">
               
                   <img class=""src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
           
                
				</div>
            
              <?php if($list['item_quantity']<=0 || $list['item_status']==0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($list['item_quantity']>0 && $list['category_id']==18 || $list['category_id']==21){ ?>
				<?php 	if (in_array($list['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>	
				<?php } ?>
				<?php 	if (in_array($list['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0)"  onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>"><?php echo $list['item_name']; ?></a></h6>
            <div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }?>
				</div>
				<div class="clearfix"></div>
            
              </div>
         
            </div>
          </div>
		  
            </div>
				</a>
			<?php $f++;} ?>
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
<?php } ?>
	
	
	
	<?php if(isset($step_seven) && count($step_seven)>0){ ?>
	<?php //echo '<pre>';print_r($step_seven);exit;?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_seven as $list){ ?>
					<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
					</div> 
						</a>					
					<?php } ?>
					<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
					<?php if($list[1]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
						</div> 
							</a>						
					<?php } ?>
					<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
					<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
						</div>
                	  </a>
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
	
	<!--sub items-->
	<?php if(isset($step_eight) && count($step_eight)>0){ ?>
			<section class="">
      <div class=" slider-items-products container_main">
       
		   <div id="best-seller" class="product-flexslider hidden-buttons cat_sl_s" >
				  
			<div class="slider-items slider-width-col4 products-grid  text-center help-owl" >
				<?php foreach ($step_eight as $list){ ?>
				<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list['subitem_id']).'/'.base64_encode($list['subcategory_id']).'/'.base64_encode($list['category_id'])); ?>">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/subitemimages/'.$list['image']); ?>" > 
					<h5 class="text-center"><?php echo $list['subitem_name']; ?></h5>
					</div>
					
				  </div>
				</div>
				</a>
			<?php } ?>
			</div>

		   </div>
	
      
      </div>
    </section>
	<?php } ?>
	
	<!--shop by Y start-->
	
	<?php if(isset($step_nine) && count($step_nine)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="new_title">
				<h2>Shop by <?php echo isset($step_ninelabel) && $step_ninelabel?$step_ninelabel:''; ?></h2>
			</div>
			<div id="best-seller" class="product-flexslider hidden-buttons">
				<div class="slider-items slider-width-col4 products-grid ">
					<?php $f=2;foreach($step_nine as $list){ 
						$currentdate=date('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$currentdate){
						$item_price= ($list['item_cost']-$list['offer_amount']);
						$percentage= $list['offer_percentage'];
						$orginal_price=$list['item_cost'];
						}else{
							//echo "expired";
							$item_price= $list['special_price'];
							$prices= ($list['item_cost']-$list['special_price']);
							$percentage= (($prices) /$list['item_cost'])*100;
							$orginal_price=$list['item_cost'];
						}

						?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>">
								<!--<form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >-->
							<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $list['item_id']; ?>" >
							<input type="hidden" name="category_id" id="category_id" value="<?php echo $list['category_id']; ?>" >
							<input type="hidden" name="qty" id="qty" value="1" >
							
						   <div class="item">
						  <div class=" box-product-outer">
							<div class="box-product">
							  <div class="img-wrapper  img_hover item">
							  <div class="img_size">
							   
								   <img class=""src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
						   
								
								</div>
							
							  <?php if($list['item_quantity']<=0 || $list['item_status']==0){ ?>
								<div  class="text-center out_of_stoc">
									<div style="z-index:1026"><h4>out of stock</h4></div>
								</div>
								<?php } ?>
								
								<div class="option">
								<?php if($list['item_quantity']>0 && $list['category_id']==18 || $list['category_id']==21){ ?>
								<?php 	if (in_array($list['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
								<?php }else{ ?>	
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart"></i></a>                  
								<?php } ?>	
								<?php } ?>
								<?php 	if (in_array($list['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
								<a href="javascript:void(0)"  onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart text-primary"></i></a> 
								<?php }else{ ?>	
								<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart"></i></a> 
								<?php } ?>	
								</div>
							  </div>
							  <h6><a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>"><?php echo $list['item_name']; ?></a></h6>
							<div class="price">
							   
								<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
							<?php if($percentage!=''){ ?> &nbsp;
							<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
								<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
							<?Php }?>
								</div>
								<div class="clearfix"></div>
							
							  </div>
						 
							</div>
						  </div>
						  
							</div>
					</a>
					<?php $f++;} ?>
					
				</div>
			</div>
			<div class="clearfix"></div>
			
		</div>
	</section>
	<?php } ?>

<!--shop by Z start-->
	<?php if(isset($step_ten) && count($step_ten)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="new_title">
				<h2>Shop by <?php echo isset($step_tenlabel) && $step_tenlabel?$step_tenlabel:''; ?></h2>
			</div>
			<div id="best-seller" class="product-flexslider hidden-buttons">
				<div class="slider-items slider-width-col4 products-grid ">
					<?php $f=2;foreach($step_ten as $list){ 
						$currentdate=date('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$currentdate){
						$item_price= ($list['item_cost']-$list['offer_amount']);
						$percentage= $list['offer_percentage'];
						$orginal_price=$list['item_cost'];
						}else{
							//echo "expired";
							$item_price= $list['special_price'];
							$prices= ($list['item_cost']-$list['special_price']);
							$percentage= (($prices) /$list['item_cost'])*100;
							$orginal_price=$list['item_cost'];
						}

						?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>">
								<!--<form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >-->
							<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $list['item_id']; ?>" >
							<input type="hidden" name="category_id" id="category_id" value="<?php echo $list['category_id']; ?>" >
							<input type="hidden" name="qty" id="qty" value="1" >
							
						   <div class="item">
						  <div class=" box-product-outer">
							<div class="box-product">
							  <div class="img-wrapper  img_hover item">
							  <div class="img_size">
							   
								   <img class=""src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
						   
								
								</div>
							
							  <?php if($list['item_quantity']<=0 || $list['item_status']==0){ ?>
								<div  class="text-center out_of_stoc">
									<div style="z-index:1026"><h4>out of stock</h4></div>
								</div>
								<?php } ?>
								
								<div class="option">
								<?php if($list['item_quantity']>0 && $list['category_id']==18 || $list['category_id']==21){ ?>
								<?php 	if (in_array($list['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
								<?php }else{ ?>	
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart"></i></a>                  
								<?php } ?>	
								<?php } ?>
								<?php 	if (in_array($list['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
								<a href="javascript:void(0)"  onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart text-primary"></i></a> 
								<?php }else{ ?>	
								<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart"></i></a> 
								<?php } ?>	
								</div>
							  </div>
							  <h6><a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>"><?php echo $list['item_name']; ?></a></h6>
							<div class="price">
							   
								<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
							<?php if($percentage!=''){ ?> &nbsp;
							<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
								<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
							<?Php }?>
								</div>
								<div class="clearfix"></div>
							
							  </div>
						 
							</div>
						  </div>
						  
							</div>
					</a>
					<?php $f++;} ?>
					
				</div>
			</div>
			<div class="clearfix"></div>
			
		</div>
	</section>
	<?php } ?>

	
	<?php if(isset($step_eleven) && count($step_eleven)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_eleven as $list){ ?>
					<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
					</div> 
						</a>					
					<?php } ?>
					<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
					<?php if($list[1]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
						</div> 
							</a>						
					<?php } ?>
					<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
					<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
						</div>
                	  </a>
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
<!-- Most Viewed-->
<?php if(isset($step_twelve) && count($step_twelve)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="new_title">
				<h2>Most Viewed</h2>
			</div>
			<div id="best-seller" class="product-flexslider hidden-buttons">
				<div class="slider-items slider-width-col4 products-grid ">
					<?php $f=2;foreach($step_twelve as $list){ 
						$currentdate=date('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$currentdate){
						$item_price= ($list['item_cost']-$list['offer_amount']);
						$percentage= $list['offer_percentage'];
						$orginal_price=$list['item_cost'];
						}else{
							//echo "expired";
							$item_price= $list['special_price'];
							$prices= ($list['item_cost']-$list['special_price']);
							$percentage= (($prices) /$list['item_cost'])*100;
							$orginal_price=$list['item_cost'];
						}

						?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>">
								<!--<form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >-->
							<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $list['item_id']; ?>" >
							<input type="hidden" name="category_id" id="category_id" value="<?php echo $list['category_id']; ?>" >
							<input type="hidden" name="qty" id="qty" value="1" >
							
						   <div class="item">
						  <div class=" box-product-outer">
							<div class="box-product">
							  <div class="img-wrapper  img_hover item">
							  <div class="img_size">
							   
								   <img class=""src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
						   
								
								</div>
							
							  <?php if($list['item_quantity']<=0 || $list['item_status']==0){ ?>
								<div  class="text-center out_of_stoc">
									<div style="z-index:1026"><h4>out of stock</h4></div>
								</div>
								<?php } ?>
								
								<div class="option">
								<?php if($list['item_quantity']>0 && $list['category_id']==18 || $list['category_id']==21){ ?>
								<?php 	if (in_array($list['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
								<?php }else{ ?>	
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart"></i></a>                  
								<?php } ?>	
								<?php } ?>
								<?php 	if (in_array($list['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
								<a href="javascript:void(0)"  onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart text-primary"></i></a> 
								<?php }else{ ?>	
								<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart"></i></a> 
								<?php } ?>	
								</div>
							  </div>
							  <h6><a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>"><?php echo $list['item_name']; ?></a></h6>
							<div class="price">
							   
								<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
							<?php if($percentage!=''){ ?> &nbsp;
							<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
								<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
							<?Php }?>
								</div>
								<div class="clearfix"></div>
							
							  </div>
						 
							</div>
						  </div>
						  
							</div>
					</a>
					<?php $f++;} ?>
					
				</div>
			</div>
			<div class="clearfix"></div>
			
		</div>
	</section>
	<?php } ?>
<!-- Recommended -->
<?php if(isset($step_thirteen) && count($step_thirteen)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="new_title">
				<h2>Recommended</h2>
			</div>
			<div id="best-seller" class="product-flexslider hidden-buttons">
				<div class="slider-items slider-width-col4 products-grid ">
					<?php $f=2;foreach($step_thirteen as $list){ 
						$currentdate=date('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$currentdate){
						$item_price= ($list['item_cost']-$list['offer_amount']);
						$percentage= $list['offer_percentage'];
						$orginal_price=$list['item_cost'];
						}else{
							//echo "expired";
							$item_price= $list['special_price'];
							$prices= ($list['item_cost']-$list['special_price']);
							$percentage= (($prices) /$list['item_cost'])*100;
							$orginal_price=$list['item_cost'];
						}

						?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>">
								<!--<form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >-->
							<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $list['item_id']; ?>" >
							<input type="hidden" name="category_id" id="category_id" value="<?php echo $list['category_id']; ?>" >
							<input type="hidden" name="qty" id="qty" value="1" >
							
						   <div class="item">
						  <div class=" box-product-outer">
							<div class="box-product">
							  <div class="img-wrapper  img_hover item">
							  <div class="img_size">
							   
								   <img class=""src="<?php echo base_url('uploads/products/'.$list['item_image']); ?>">
						   
								
								</div>
							
							  <?php if($list['item_quantity']<=0 || $list['item_status']==0){ ?>
								<div  class="text-center out_of_stoc">
									<div style="z-index:1026"><h4>out of stock</h4></div>
								</div>
								<?php } ?>
								
								<div class="option">
								<?php if($list['item_quantity']>0 && $list['category_id']==18 || $list['category_id']==21){ ?>
								<?php 	if (in_array($list['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
								<?php }else{ ?>	
								<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $list['item_id']; ?>','<?php echo $list['category_id']; ?>','<?php echo $f; ?>');" id="cartitemtitle<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-shopping-cart"></i></a>                  
								<?php } ?>	
								<?php } ?>
								<?php 	if (in_array($list['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
								<a href="javascript:void(0)"  onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart text-primary"></i></a> 
								<?php }else{ ?>	
								<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $list['item_id']; ?>','<?php echo $f; ?>');" id="addwhish<?php echo $list['item_id']; ?><?php echo $f; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $list['item_id']; ?><?php echo $f; ?>" class="fa fa-heart"></i></a> 
								<?php } ?>	
								</div>
							  </div>
							  <h6><a href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>"><?php echo $list['item_name']; ?></a></h6>
							<div class="price">
							   
								<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
							<?php if($percentage!=''){ ?> &nbsp;
							<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
								<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
							<?Php }?>
								</div>
								<div class="clearfix"></div>
							
							  </div>
						 
							</div>
						  </div>
						  
							</div>
					</a>
					<?php $f++;} ?>
					
				</div>
			</div>
			<div class="clearfix"></div>
			
		</div>
	</section>
	<?php } ?>
	<?php if(isset($step_fourteen) && count($step_fourteen)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_fourteen as $list){ ?>
					<?php if(isset($list[0]['name']) && $list[0]['name']!=''){ ?>
					<?php if($list[0]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php }else if($list[0]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[0]['category_id']).'/'.base64_encode($list[0]['subcategory_id'])); ?>">
						<?php }else if($list[0]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[0]['subitem_id']).'/'.base64_encode($list[0]['subcategory_id']).'/'.base64_encode($list[0]['category_id'])); ?>">
						<?php }else if($list[0]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[0]['item_id'])); ?>">
						<?php }else if($list[0]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[0]['selected_id'])); ?>">
						<?php } ?>
					<div class="col-md-3">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[0]['name']); ?>" alt="<?php echo $list[0]['name']; ?>">
					</div> 
					</a>
					<?php } ?>
					<?php if(isset($list[1]['name']) && $list[1]['name']!=''){ ?>
					<?php if($list[1]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php }else if($list[1]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[1]['category_id']).'/'.base64_encode($list[1]['subcategory_id'])); ?>">
						<?php }else if($list[1]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[1]['subitem_id']).'/'.base64_encode($list[1]['subcategory_id']).'/'.base64_encode($list[1]['category_id'])); ?>">
						<?php }else if($list[1]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[1]['item_id'])); ?>">
						<?php }else if($list[1]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[1]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-3">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[1]['name']); ?>" alt="<?php echo $list[1]['name']; ?>">
						</div> 
						</a>						
					<?php } ?>
					<?php if(isset($list[2]['name']) && $list[2]['name']!=''){ ?>
					<?php if($list[2]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php }else if($list[2]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[2]['category_id']).'/'.base64_encode($list[2]['subcategory_id'])); ?>">
						<?php }else if($list[2]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[2]['subitem_id']).'/'.base64_encode($list[2]['subcategory_id']).'/'.base64_encode($list[2]['category_id'])); ?>">
						<?php }else if($list[2]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[2]['item_id'])); ?>">
						<?php }else if($list[2]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[2]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[2]['name']); ?>" alt="<?php echo $list[2]['name']; ?>">
						</div>
                	  </a>
					<?php } ?>
					
					<?php if(isset($list[3]['name']) && $list[3]['name']!=''){ ?>
					<?php if($list[3]['link']==1){ ?>
							<a href="<?php echo base_url('category/subcategorys/'.base64_encode($list[3]['selected_id'])); ?>">
						<?php }else if($list[3]['link']==2){ ?>
							<a href="<?php echo base_url('category/subcategory/'.base64_encode($list[3]['category_id']).'/'.base64_encode($list[3]['subcategory_id'])); ?>">
						<?php }else if($list[3]['link']==3){ ?>
								<a href="<?php echo base_url('category/subitemwise/'.base64_encode($list[3]['subitem_id']).'/'.base64_encode($list[3]['subcategory_id']).'/'.base64_encode($list[3]['category_id'])); ?>">
						<?php }else if($list[3]['link']==4){ ?>
							<a href="<?php echo base_url('category/item/'.base64_encode($list[3]['item_id'])); ?>">
						<?php }else if($list[3]['link']==5){ ?>
							<a href="<?php echo base_url('category/productview/'.base64_encode($list[3]['selected_id'])); ?>">
						<?php } ?>
						<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$list[3]['name']); ?>" alt="<?php echo $list[3]['name']; ?>">
						</div>
                	  </a>
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
	
	

	