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
	<?php if(isset($step_one) && count($step_one)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main ">
			<div class="row mar_t15" >
			<?php foreach ($step_one as $lists){ ?>
					<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
					<?php if(isset($lists[2]['name']) && $lists[2]['name']!=''){ ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[2]['name']); ?>" alt="<?php echo $lists[2]['name']; ?>">
						</div>
                	  
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
				<a href="#">
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
					<a href="#">
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
		<?php foreach ($step_four as $lists){ ?>
			<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-6">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-6">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
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
			<a href="#">
				<div class="col-md-3 col-xs-12 col-sm-12  pri-bran">
					<div class="pric_fi">
						<h3> ₹ <?php echo $list[0][0]; ?> </h3>
					</div>
				</div>
			</a>
			<a href="#">
				<div class="col-md-3 col-xs-12 col-sm-12 pri-bran">
					<div class="pric_se">
						<h3> ₹ <?php echo $list[0][0]; ?> - ₹<?php echo $list[1][0] ; ?></h3>
					</div>
				</div>
				</a>
			
			
			
				<a href="#">
				<div class="col-md-3 col-xs-12 col-sm-12 pri-bran">
					<div class="pric_th">
						<h3> ₹ <?php echo $list[1][0]; ?> - ₹<?php echo $list[2][0] ; ?></h3>
					</div>
				</div>
				</a>
				<a href="#">
				<div class="col-md-3 col-xs-12 col-sm-12 pri-bran">
					<div class="pric_fo">
						<h3> ₹ <?php echo $list[2][0]; ?> - ₹<?php echo $list[3][0] ; ?></h3>
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
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Shop by X</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid ">
				<a href="#">
					<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="https://cartinhours.com/uploads/products/0.53575700 15094510621.jpeg">
									</div>
									<div class="option">	<a href="javascript:void(0);" onclick="addwhishlidt('901','1');" id="addwhish9011" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids9011" class="fa fa-heart "></i></a> 
									</div>
								</div>
								<h6><a href="category/productview/OTAx.html">REDMI MI 4 Grey (32GB ROM) (3GB RAM )</a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">₹ 10,742.73 &nbsp;	<span class="price-old">₹ 12,638.50</span>
										<span class="label-tags"><p class=" text-success"> 15.00% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
				
				
				
				
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
	
	
	
	<?php if(isset($step_seven) && count($step_seven)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_seven as $lists){ ?>
					<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
					<?php if(isset($lists[2]['name']) && $lists[2]['name']!=''){ ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[2]['name']); ?>" alt="<?php echo $lists[2]['name']; ?>">
						</div>
                	  
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
								   <img src="<?php echo base_url('assets/subitems/'.$list['image']); ?>" > 
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
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Shop by Y</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid ">
				<a href="#">
					<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="https://cartinhours.com/uploads/products/0.53575700 15094510621.jpeg">
									</div>
									<div class="option">	<a href="javascript:void(0);" onclick="addwhishlidt('901','1');" id="addwhish9011" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids9011" class="fa fa-heart "></i></a> 
									</div>
								</div>
								<h6><a href="category/productview/OTAx.html">REDMI MI 4 Grey (32GB ROM) (3GB RAM )</a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">₹ 10,742.73 &nbsp;	<span class="price-old">₹ 12,638.50</span>
										<span class="label-tags"><p class=" text-success"> 15.00% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
				
			
				
				
				
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>

<!--shop by Z start-->
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Shop by Z</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid ">
				<a href="#">
					<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="https://cartinhours.com/uploads/products/0.53575700 15094510621.jpeg">
									</div>
									<div class="option">	<a href="javascript:void(0);" onclick="addwhishlidt('901','1');" id="addwhish9011" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids9011" class="fa fa-heart "></i></a> 
									</div>
								</div>
								<h6><a href="category/productview/OTAx.html">REDMI MI 4 Grey (32GB ROM) (3GB RAM )</a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">₹ 10,742.73 &nbsp;	<span class="price-old">₹ 12,638.50</span>
										<span class="label-tags"><p class=" text-success"> 15.00% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
				
				
				
				
				
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>

	
	<?php if(isset($step_eleven) && count($step_eleven)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_eleven as $lists){ ?>
					<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-3">
					<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-3">
						<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
					<?php if(isset($lists[2]['name']) && $lists[2]['name']!=''){ ?>
						<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[2]['name']); ?>" alt="<?php echo $lists[2]['name']; ?>">
						</div>
                	  
					<?php } ?>
					<?php if(isset($lists[3]['name']) && $lists[3]['name']!=''){ ?>
						<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/categoryimages/'.$lists[3]['name']); ?>" alt="<?php echo $lists[3]['name']; ?>">
						</div>
                	  
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
<!-- Most Viewed-->
<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Most Viewed</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid ">
				<a href="#">
					<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="https://cartinhours.com/uploads/products/0.53575700 15094510621.jpeg">
									</div>
									<div class="option">	<a href="javascript:void(0);" onclick="addwhishlidt('901','1');" id="addwhish9011" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids9011" class="fa fa-heart "></i></a> 
									</div>
								</div>
								<h6><a href="category/productview/OTAx.html">REDMI MI 4 Grey (32GB ROM) (3GB RAM )</a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">₹ 10,742.73 &nbsp;	<span class="price-old">₹ 12,638.50</span>
										<span class="label-tags"><p class=" text-success"> 15.00% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
				
				
				
			
				
				
				
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
<!-- Recommended -->
<section>
	<div class="best-pro slider-items-products container_main">
		<div class="new_title">
			<h2>Recommended</h2>
		</div>
		<div id="best-seller" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col4 products-grid ">
				<a href="#">
					<div class="item">
						<div class=" box-product-outer">
							<div class="box-product">
								<div class="img-wrapper  img_hover">
									<div class="img_size">
										<img class="" src="https://cartinhours.com/uploads/products/0.53575700 15094510621.jpeg">
									</div>
									<div class="option">	<a href="javascript:void(0);" onclick="addwhishlidt('901','1');" id="addwhish9011" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids9011" class="fa fa-heart "></i></a> 
									</div>
								</div>
								<h6><a href="category/productview/OTAx.html">REDMI MI 4 Grey (32GB ROM) (3GB RAM )</a></h6>
								<div class="price">
									<div class="text-center" style="color:#187a7d;">₹ 10,742.73 &nbsp;	<span class="price-old">₹ 12,638.50</span>
										<span class="label-tags"><p class=" text-success"> 15.00% off</p></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</a>
				
				
				
				
				
				
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>	
	
	

	