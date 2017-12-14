<style>
.owl-item{
	width:170px !important
}
</style>
	<?php if(isset($step_one) && count($step_one)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_one as $lists){ ?>
					<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
					<?php if(isset($lists[2]['name']) && $lists[2]['name']!=''){ ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[2]['name']); ?>" alt="<?php echo $lists[2]['name']; ?>">
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
				  
			<div class="slider-items slider-width-col4 products-grid  text-center" >
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
	<?php if(isset($step_four) && count($step_four)>0){ ?>
	<section>
	<div class="best-pro slider-items-products container_main">
		<div class="row mar_t15" >
		<?php foreach ($step_four as $lists){ ?>
			<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-6">
					<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-6">
						<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
			
		<?php } ?>
			
				
		</div>
	</div>
	<?php } ?>
		
    </section>
	<section class="">
      <div class=" slider-items-products container_main">
       
		   <div id="best-seller" class="product-flexslider hidden-buttons cat_sl_s" >
				  
			<div class="slider-items slider-width-col4 products-grid  text-center" >
				<a href="#">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/home/images/fruit.png'); ?>" > 
					<h5 class="text-center">Sample test</h5>
					</div>
					
				  </div>
				</div>
				</a>
				<a href="#">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/home/images/fruit.png'); ?>" > 
					<h5 class="text-center">Sample test</h5>
					</div>
					
				  </div>
				</div>
				</a><a href="#">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/home/images/fruit.png'); ?>" > 
					<h5 class="text-center">Sample test</h5>
					</div>
					
				  </div>
				</div>
				</a>
			</div>

		   </div>
	
      
      </div>
    </section>
	<?php if(isset($step_seven) && count($step_seven)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_seven as $lists){ ?>
					<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
					<?php if(isset($lists[2]['name']) && $lists[2]['name']!=''){ ?>
						<div class="col-md-4">
								<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[2]['name']); ?>" alt="<?php echo $lists[2]['name']; ?>">
						</div>
                	  
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
	<?php if(isset($step_eleven) && count($step_eleven)>0){ ?>
		<section>
		<div class="best-pro slider-items-products container_main">
			<div class="row mar_t15" >
			<?php foreach ($step_eleven as $lists){ ?>
					<?php if(isset($lists[0]['name']) && $lists[0]['name']!=''){ ?>
					<div class="col-md-3">
					<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[0]['name']); ?>" alt="<?php echo $lists[0]['name']; ?>">
					</div>                	  
					<?php } ?>
					<?php if(isset($lists[1]['name']) && $lists[1]['name']!=''){ ?>
						<div class="col-md-3">
						<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[1]['name']); ?>" alt="<?php echo $lists[1]['name']; ?>">
						</div>                	  
					<?php } ?>
					<?php if(isset($lists[2]['name']) && $lists[2]['name']!=''){ ?>
						<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[2]['name']); ?>" alt="<?php echo $lists[2]['name']; ?>">
						</div>
                	  
					<?php } ?>
					<?php if(isset($lists[3]['name']) && $lists[3]['name']!=''){ ?>
						<div class="col-md-3">
								<img class="img-responsive" src="<?php echo base_url('assets/banners/'.$lists[3]['name']); ?>" alt="<?php echo $lists[3]['name']; ?>">
						</div>
                	  
					<?php } ?>
				
				
			<?php } ?>
					
			</div>
		</div>
			
		</section>
	<?php } ?>
	<section class="">
      <div class=" slider-items-products container_main">
       
		   <div id="best-seller" class="product-flexslider hidden-buttons cat_sl_s" >
				  
			<div class="slider-items slider-width-col4 products-grid  text-center" >
				<a href="#">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/home/images/fruit.png'); ?>" > 
					<h5 class="text-center">Sample test</h5>
					</div>
					
				  </div>
				</div>
				</a>
				<a href="#">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/home/images/fruit.png'); ?>" > 
					<h5 class="text-center">Sample test</h5>
					</div>
					
				  </div>
				</div>
				</a><a href="#">
				<div class="item cat_ma" >
				  <div class=" box-product-outer" >
					<div class="box-product">
					   <img src="<?php echo base_url('assets/home/images/fruit.png'); ?>" > 
					<h5 class="text-center">Sample test</h5>
					</div>
					
				  </div>
				</div>
				</a>
			</div>

		   </div>
	
      
      </div>
    </section>