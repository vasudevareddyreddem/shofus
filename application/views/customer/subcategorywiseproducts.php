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
	.fa {
    padding-right: 0px !important;
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

	
	 <div class=" clearfix"></div>
	 <!-- Filter Sidebar -->
	 <span id="withoursearchsubcategory">
		<div class="col-sm-3">
		 <div class="title"><span>Filters</span></div>

				
				
			<form action="<?php echo  base_url('category/subcategorywiseearch'); ?>" method="POST" >
			<div class="example">
			<h3>Price</h3>
			<div id="html5"  name="html5" onclick="submobileaccessories(this.value, '<?php echo ''; ?>','<?php echo ''; ?>');" class="noUi-target noUi-ltr noUi-horizontal">

			</div>
			<select id="input-select" name="min_amount" >
			<?php for( $i=floor($minimum_price['item_cost']); $i<=floor($maximum_price['item_cost']); $i+=500 ){  ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
			
			</select>
			<input type="text" name="max_amount"   step="1" id="input-number">
			</div>
			<input type="hidden" name="categoryid" id="categoryid" value="<?php echo $cat_subcat_ids['category_id'];?>">
			<input type="hidden" name="subcategoryid" id="subcategoryid" value="<?php echo $cat_subcat_ids['subcategory_id'];?>">
			
			<?php if($cat_subcat_ids['category_id']=='18'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
						 <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    My Restaurant
					</a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
								<?php foreach ($myrestaurant as $reslist){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'res'; ?>','<?php echo ''; ?>');" id="restrarent" name="products[res][]" value="<?php echo $reslist['seller_id']; ?>"><span>&nbsp;<?php echo $reslist['seller_name']; ?></span></label></div>
						
						<?php } ?>
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
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cusine'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cusine][]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="submobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				
			</div>
			
			<?php }else if($cat_subcat_ids['category_id']=='21'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php if(count($offer_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Offer	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($offer_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if(count($brand_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  BRAND	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($brand_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if(count($discount_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Discount	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($discount_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="submobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				
			</div>
			<?php }else if($cat_subcat_ids['category_id']=='19'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php if(count($offer_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Offer	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($offer_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } if(count($brand_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  BRAND	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($brand_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } if(count($color_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Colors	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($color_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } if(count($sizes_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  SIZE	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($sizes_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[size][]" value="<?php echo $list['p_size_name']; ?>"><span>&nbsp;<?php echo $list['p_size_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($discount_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Discount	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($discount_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='29' || $cat_subcat_ids['subcategory_id']=='28' || $cat_subcat_ids['subcategory_id']!='9' || $cat_subcat_ids['subcategory_id']=='52' || $cat_subcat_ids['subcategory_id']=='27' || $cat_subcat_ids['subcategory_id']!='26' || $cat_subcat_ids['subcategory_id']=='25' || $cat_subcat_ids['subcategory_id']=='24' || $cat_subcat_ids['subcategory_id']=='23' || $cat_subcat_ids['subcategory_id']=='51' || $cat_subcat_ids['subcategory_id']=='22' || $cat_subcat_ids['subcategory_id']=='21' || $cat_subcat_ids['subcategory_id']=='20' || $cat_subcat_ids['subcategory_id']=='19' || $cat_subcat_ids['subcategory_id']=='50' || $cat_subcat_ids['subcategory_id']=='18' || $cat_subcat_ids['subcategory_id']=='17' || $cat_subcat_ids['subcategory_id']=='16' || $cat_subcat_ids['subcategory_id']!='10' || $cat_subcat_ids['subcategory_id']!='53'){  ?>
				<?php if(count($ideal_for)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ideal_for" aria-expanded="false" aria-controls="ideal_for">
					  Ideal for	
					  </a>
				  </h4>

					</div>
					<div id="ideal_for" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($ideal_for as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ideal_for'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ideal_for][]" value="<?php echo $list['ideal_for']; ?>"><span>&nbsp;<?php echo $list['ideal_for']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				
				<?php } ?>
				
				<?php if($cat_subcat_ids['subcategory_id']=='23' || $cat_subcat_ids['subcategory_id']=='51' || $cat_subcat_ids['subcategory_id']=='50' ||$cat_subcat_ids['subcategory_id']=='13' || $cat_subcat_ids['subcategory_id']=='16' || $cat_subcat_ids['subcategory_id']=='17'){  ?>
				
				<?php if(count($producttype_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Type	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($producttype_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cameratype][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				
				
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='29' || $cat_subcat_ids['subcategory_id']=='28' || $cat_subcat_ids['subcategory_id']=='52' || $cat_subcat_ids['subcategory_id']=='22' || $cat_subcat_ids['subcategory_id']=='20' || $cat_subcat_ids['subcategory_id']=='8' || $cat_subcat_ids['subcategory_id']=='14' || $cat_subcat_ids['subcategory_id']=='19'){  ?>
				<?php if(count($theme_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#theme" aria-expanded="false" aria-controls="theme">
					  THEME	
					  </a>
				  </h4>

					</div>
					<div id="theme" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($theme_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'theme'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[theme][]" value="<?php echo $list['theme']; ?>"><span>&nbsp;<?php echo $list['theme']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($producttype_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Type	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($producttype_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cameratype][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='10'){  ?>
				
				<?php if(count($dial_shape)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dial_shape" aria-expanded="false" aria-controls="dial_shape">
								DIAL SHAPE	
								</a>
								</h4>

							</div>
							<div id="dial_shape" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($dial_shape as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'dial_shape'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[dial_shape][]" value="<?php echo $list['dial_shape']; ?>"><span>&nbsp;<?php echo $list['dial_shape']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($compatibleos)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#compatibleos" aria-expanded="false" aria-controls="compatibleos">
								COMPATIBLE OS	
								</a>
								</h4>

							</div>
							<div id="compatibleos" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($compatibleos as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'compatibleos'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[compatibleos][]" value="<?php echo $list['compatibleos']; ?>"><span>&nbsp;<?php echo $list['compatibleos']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($usage_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usage" aria-expanded="false" aria-controls="usage">
								USAGE	
								</a>
								</h4>

							</div>
							<div id="usage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($usage_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'usage'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[usage][]" value="<?php echo $list['usage']; ?>"><span>&nbsp;<?php echo $list['usage']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($display_type)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#display_type" aria-expanded="false" aria-controls="display_type">
								DISPLAY TYPE	
								</a>
								</h4>

							</div>
							<div id="display_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($display_type as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'display_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[display_type][]" value="<?php echo $list['display_type']; ?>"><span>&nbsp;<?php echo $list['display_type']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='27'){  ?>
				
				<?php if(count($dial_shape)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dial_shape" aria-expanded="false" aria-controls="dial_shape">
								DIAL SHAPE	
								</a>
								</h4>

							</div>
							<div id="dial_shape" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($dial_shape as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'dial_shape'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[dial_shape][]" value="<?php echo $list['dial_shape']; ?>"><span>&nbsp;<?php echo $list['dial_shape']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($usage_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usage" aria-expanded="false" aria-controls="usage">
								USAGE	
								</a>
								</h4>

							</div>
							<div id="usage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($usage_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'usage'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[usage][]" value="<?php echo $list['usage']; ?>"><span>&nbsp;<?php echo $list['usage']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($display_type)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#display_type" aria-expanded="false" aria-controls="display_type">
								DISPLAY TYPE	
								</a>
								</h4>

							</div>
							<div id="display_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($display_type as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'display_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[display_type][]" value="<?php echo $list['display_type']; ?>"><span>&nbsp;<?php echo $list['display_type']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					
				
				<?php } ?>
				
				
				<?php if($cat_subcat_ids['subcategory_id']=='25' || $cat_subcat_ids['subcategory_id']=='11' || $cat_subcat_ids['subcategory_id']=='21'){  ?>
				<?php if(count($theme_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#theme" aria-expanded="false" aria-controls="theme">
					  THEME	
					  </a>
				  </h4>

					</div>
					<div id="theme" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($theme_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'theme'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[theme][]" value="<?php echo $list['theme']; ?>"><span>&nbsp;<?php echo $list['theme']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='53' || $cat_subcat_ids['subcategory_id']=='51'){  ?>
				<?php if(count($theme_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#theme" aria-expanded="false" aria-controls="theme">
					  THEME	
					  </a>
				  </h4>

					</div>
					<div id="theme" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($theme_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'theme'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[theme][]" value="<?php echo $list['theme']; ?>"><span>&nbsp;<?php echo $list['theme']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($occasion)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#theme" aria-expanded="false" aria-controls="occasion">
					  OCCASION	
					  </a>
				  </h4>

					</div>
					<div id="occasion" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($occasion as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'occasion'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[occasion][]" value="<?php echo $list['occasion']; ?>"><span>&nbsp;<?php echo $list['occasion']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='15'){  ?>
					<?php if(count($material)>0){ ?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingThree">
							 <h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#theme" aria-expanded="false" aria-controls="material">
						  Material	
						  </a>
					  </h4>

						</div>
						<div id="material" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
							<?php foreach ($material as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'material'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[material][]" value="<?php echo $list['material']; ?>"><span>&nbsp;<?php echo $list['material']; ?></span></label></div>
							
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(count($gemstones)>0){ ?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingThree">
							 <h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#gemstones" aria-expanded="false" aria-controls="gemstones">
						  Gemstones	
						  </a>
					  </h4>

						</div>
						<div id="gemstones" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
							<?php foreach ($gemstones as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'gemstones'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[gemstones][]" value="<?php echo $list['gemstones']; ?>"><span>&nbsp;<?php echo $list['gemstones']; ?></span></label></div>
							
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='50'){ ?>
				
					<?php if(count($material)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThree">
								 <h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#theme" aria-expanded="false" aria-controls="material">
							  Material	
							  </a>
						  </h4>

							</div>
							<div id="material" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
								<div class="panel-body">
								<?php foreach ($material as $list){ ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'material'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[material][]" value="<?php echo $list['material']; ?>"><span>&nbsp;<?php echo $list['material']; ?></span></label></div>
								
								<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php if(count($dial_shape)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dial_shape" aria-expanded="false" aria-controls="dial_shape">
								DIAL SHAPE	
								</a>
								</h4>

							</div>
							<div id="dial_shape" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($dial_shape as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'dial_shape'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[dial_shape][]" value="<?php echo $list['dial_shape']; ?>"><span>&nbsp;<?php echo $list['dial_shape']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($strap_color)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#strap_color" aria-expanded="false" aria-controls="strap_color">
								STRAP COLOR	
								</a>
								</h4>

							</div>
							<div id="strap_color" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($strap_color as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'strap_color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[strap_color][]" value="<?php echo $list['strap_color']; ?>"><span>&nbsp;<?php echo $list['strap_color']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($dial_color)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dial_color" aria-expanded="false" aria-controls="dial_color">
								DIAL COLOR	
								</a>
								</h4>

							</div>
							<div id="dial_color" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($dial_color as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'dial_color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[dial_color][]" value="<?php echo $list['dial_color']; ?>"><span>&nbsp;<?php echo $list['dial_color']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='22'){ ?>
				
						<?php if(count($packof)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#packof" aria-expanded="false" aria-controls="packof">
								PACK OF	
								</a>
								</h4>

							</div>
							<div id="packof" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($packof as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'packof'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[packof][]" value="<?php echo $list['packof']; ?>"><span>&nbsp;<?php echo $list['packof']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				
				<?php } ?>
				<?php if($cat_subcat_ids['subcategory_id']=='51'){ ?>
				
						<?php if(count($packof)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#packof" aria-expanded="false" aria-controls="packof">
								PACK OF	
								</a>
								</h4>

							</div>
							<div id="packof" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($packof as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'packof'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[packof][]" value="<?php echo $list['packof']; ?>"><span>&nbsp;<?php echo $list['packof']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				
				<?php } ?>
				
				
				
				
				
				
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="submobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				
			</div>
			<?php }else if($cat_subcat_ids['category_id']=='20'){ ?>
			
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php if(count($offer_list)>0){  ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Offer	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($offer_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($brand_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  BRAND	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($brand_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } if(count($color_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Colors	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($color_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } if(count($discount_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Discount	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($discount_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
					<?php if($cat_subcat_ids['subcategory_id']=='30'){
					if(isset($comatability_mobile_list) && count($comatability_mobile_list)>0){ ?>
					<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThreecom">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  COMPATIBLE MOBILES	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
						<div class="panel-body">
						<?php foreach ($comatability_mobile_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'mobileacc'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['compatible_mobiles']; ?>"><span>&nbsp;<?php echo $list['compatible_mobiles']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
					</div>
					
					<?php }  }	?>
					<?php if($cat_subcat_ids['subcategory_id']=='34'){ ?>
					<?php if(count($producttype_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Type	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($producttype_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cameratype][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($megapuxel_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								MEGA PIXEL	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($megapuxel_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'mega_pixel'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[magepixel][]" value="<?php echo $list['mega_pixel']; ?>"><span>&nbsp;<?php echo $list['mega_pixel']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($sensor_type)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								SENSOR TYPE	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($sensor_type as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'sensor_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[sensor_type][]" value="<?php echo $list['sensor_type']; ?>"><span>&nbsp;<?php echo $list['sensor_type']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($battery_type)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								BATTERY TYPE	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($battery_type as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'battery_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[battery_type][]" value="<?php echo $list['battery_type']; ?>"><span>&nbsp;<?php echo $list['battery_type']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php }	?>
					<?php if($cat_subcat_ids['subcategory_id']=='35'){ ?>
					<?php if(count($display_size)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										DISPLAY SIZE	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
										<div class="panel-body">
										<?php foreach ($display_size as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'display_size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[display_size][]" value="<?php echo $list['display_size']; ?>"><span>&nbsp;<?php echo $list['display_size']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($connectivity_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomconnectivty">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										CONNECTIVITY	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomconnectivty">
										<div class="panel-body">
										<?php foreach ($connectivity_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'connectivity'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[connectivity][]" value="<?php echo $list['connectivity']; ?>"><span>&nbsp;<?php echo $list['connectivity']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($ram_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										RAM	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($ram_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ram'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($voice_calling_facility)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="voice_calling_facility">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										VOICE CALLING FACILITY	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="voice_calling_facility">
										<div class="panel-body">
										<?php foreach ($voice_calling_facility as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'voice'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[voice_calling_facility][]" value="<?php echo $list['voice_calling_facility']; ?>"><span>&nbsp;<?php echo $list['voice_calling_facility']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($operating_system)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										OPERATING SYSTEM	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($operating_system as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'os'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['operatingsystem']; ?>"><span>&nbsp;<?php echo $list['operatingsystem']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($internal_storage)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#internal_storage" aria-expanded="false" aria-controls="internal_storage">
										INTERNAL STORAGE	
										</a>
										</h4>

									</div>
									<div id="internal_storage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($internal_storage as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'internal_storage'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['internal_storage']; ?>"><span>&nbsp;<?php echo $list['internal_storage']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($battery_capacity)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#battery_capacity" aria-expanded="false" aria-controls="battery_capacity">
										BATTERY CAPACITY	
										</a>
										</h4>

									</div>
									<div id="battery_capacity" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($battery_capacity as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'battery_capacity'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[battery_capacity][]" value="<?php echo $list['battery_capacity']; ?>"><span>&nbsp;<?php echo $list['battery_capacity']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($primary_camera)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#primary_camera" aria-expanded="false" aria-controls="primary_camera">
										PRIMARY CAMERA	
										</a>
										</h4>

									</div>
									<div id="primary_camera" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($primary_camera as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'primary_camera'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[primary_camera][]" value="<?php echo $list['primary_camera']; ?>"><span>&nbsp;<?php echo $list['primary_camera']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($processor_clock_speed)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#processor_clock_speed" aria-expanded="false" aria-controls="processor_clock_speed">
										PROCESSOR CLOCK SPEED	
										</a>
										</h4>

									</div>
									<div id="processor_clock_speed" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="processor_clock_speed">
										<div class="panel-body">
										<?php foreach ($processor_clock_speed as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'processorclockspeed'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[processor_clock_speed][]" value="<?php echo $list['processor_clock_speed']; ?>"><span>&nbsp;<?php echo $list['processor_clock_speed']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					
					<?php } ?>
					<?php if($cat_subcat_ids['subcategory_id']=='36'){ ?>
						<?php if(count($producttype_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Type	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($producttype_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cameratype][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php if(count($wireless_speed)>0){ ?>
							<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#wireless_speed" aria-expanded="false" aria-controls="wireless_speed">
								WIRELESS SPEED	
								</a>
								</h4>

							</div>
							<div id="wireless_speed" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($wireless_speed as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'wireless_speed'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[wireless_speed][]" value="<?php echo $list['wireless_speed']; ?>"><span>&nbsp;<?php echo $list['wireless_speed']; ?></span></label></div>
								<?php }  ?>
								</div>
							</div>
							</div>
							<?php } ?>
							<?php if(count($frequency_band)>0){ ?>
							<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#frequency_band" aria-expanded="false" aria-controls="frequency_band">
								FREQUENCY BAND	
								</a>
								</h4>

							</div>
							<div id="frequency_band" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($frequency_band as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'frequency_band'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[frequency_band][]" value="<?php echo $list['frequency_band']; ?>"><span>&nbsp;<?php echo $list['frequency_band']; ?></span></label></div>
								<?php }  ?>
								</div>
							</div>
							</div>
							<?php } ?>
							<?php if(count($broadband_compatibility)>0){ ?>
							<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#broadband_compatibility" aria-expanded="false" aria-controls="broadband_compatibility">
								BROADBAND COMPATIBILITY	
								</a>
								</h4>

							</div>
							<div id="broadband_compatibility" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($broadband_compatibility as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'broadband_compatibility'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[broadband_compatibility][]" value="<?php echo $list['broadband_compatibility']; ?>"><span>&nbsp;<?php echo $list['broadband_compatibility']; ?></span></label></div>
								<?php }  ?>
								</div>
							</div>
							</div>
							<?php } ?>
							<?php if(count($usb_ports)>0){ ?>
							<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usb_ports" aria-expanded="false" aria-controls="usb_ports">
								NO. OF USB PORTS
								</a>
								</h4>

							</div>
							<div id="usb_ports" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($usb_ports as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'usb_ports'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[usb_ports][]" value="<?php echo $list['usb_ports']; ?>"><span>&nbsp;<?php echo $list['usb_ports']; ?></span></label></div>
								<?php }  ?>
								</div>
							</div>
							</div>
							<?php } ?>
							<?php if(count($frequency_list)>0){ ?>
							<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom1">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#frequency" aria-expanded="false" aria-controls="frequency">
								FREQUENCY
								</a>
								</h4>

							</div>
							<div id="frequency" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom1">
								<div class="panel-body">
								<?php foreach ($frequency_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'frequency'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[frequency][]" value="<?php echo $list['frequency']; ?>"><span>&nbsp;<?php echo $list['frequency']; ?></span></label></div>
								<?php }  ?>
								</div>
							</div>
							</div>
							<?php } ?>
							<?php if(count($antennae_list)>0){ ?>
							<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom12">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#antennae" aria-expanded="false" aria-controls="antennae">
								ANTENNAE
								</a>
								</h4>

							</div>
							<div id="antennae" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom12">
								<div class="panel-body">
								<?php foreach ($antennae_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'antennae'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[antennae][]" value="<?php echo $list['antennae']; ?>"><span>&nbsp;<?php echo $list['antennae']; ?></span></label></div>
								<?php }  ?>
								</div>
							</div>
							</div>
							<?php } ?>
						
						
					<?php } ?>
					
					<?php if($cat_subcat_ids['subcategory_id']=='39'){ ?>
						<?php if(count($display_size)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										DISPLAY SIZE	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
										<div class="panel-body">
										<?php foreach ($display_size as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'display_size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[display_size][]" value="<?php echo $list['display_size']; ?>"><span>&nbsp;<?php echo $list['display_size']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($processor_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#processor" aria-expanded="false" aria-controls="processor">
										processor	
										</a>
										</h4>

									</div>
									<div id="processor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
										<div class="panel-body">
										<?php foreach ($processor_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'processor'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[processor][]" value="<?php echo $list['processor']; ?>"><span>&nbsp;<?php echo $list['processor']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($processor_brand)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom213">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#processor_brand" aria-expanded="false" aria-controls="processor_brand">
										PROCESSOR BRAND	
										</a>
										</h4>

									</div>
									<div id="processor_brand" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom213">
										<div class="panel-body">
										<?php foreach ($processor_brand as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'processor_brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[processor_brand][]" value="<?php echo $list['processor_brand']; ?>"><span>&nbsp;<?php echo $list['processor_brand']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($operating_system)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										OPERATING SYSTEM	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($operating_system as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'os'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['operatingsystem']; ?>"><span>&nbsp;<?php echo $list['operatingsystem']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($ram_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										RAM	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($ram_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ram'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($lifestyle_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#life_style" aria-expanded="false" aria-controls="life_style">
										LIFESTYLE	
										</a>
										</h4>

									</div>
									<div id="life_style" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($lifestyle_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'life_style'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[life_style][]" value="<?php echo $list['life_style']; ?>"><span>&nbsp;<?php echo $list['life_style']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($storage_type)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#storage_type" aria-expanded="false" aria-controls="storage_type">
										STORAGE TYPE	
										</a>
										</h4>

									</div>
									<div id="storage_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($storage_type as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'storage_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[storage_type][]" value="<?php echo $list['storage_type']; ?>"><span>&nbsp;<?php echo $list['storage_type']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($graphics_memory)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#graphics_memory" aria-expanded="false" aria-controls="graphics_memory">
										DEDICATED GRAPHICS MEMORY	
										</a>
										</h4>

									</div>
									<div id="graphics_memory" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($graphics_memory as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'graphics_memory'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[graphics_memory][]" value="<?php echo $list['graphics_memory']; ?>"><span>&nbsp;<?php echo $list['graphics_memory']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($touch_screen)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#touch_screen" aria-expanded="false" aria-controls="touch_screen">
										TOUCH SCREEN	
										</a>
										</h4>

									</div>
									<div id="touch_screen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($touch_screen as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'touch_screen'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[touch_screen][]" value="<?php echo $list['touch_screen']; ?>"><span>&nbsp;<?php echo $list['touch_screen']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($weight_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#weight_list" aria-expanded="false" aria-controls="weight_list">
										Weight	
										</a>
										</h4>

									</div>
									<div id="weight_list" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($weight_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'weight'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[weight][]" value="<?php echo $list['weight']; ?>"><span>&nbsp;<?php echo $list['weight']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
						<?php if(count($internal_storage)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#internal_storage" aria-expanded="false" aria-controls="internal_storage">
										HARD DISK CAPACITY	
										</a>
										</h4>

									</div>
									<div id="internal_storage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($internal_storage as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'internal_storage'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['internal_storage']; ?>"><span>&nbsp;<?php echo $list['internal_storage']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($memory_type)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#memory_type" aria-expanded="false" aria-controls="memory_type">
										GRAPHICS MEMORY TYPE	
										</a>
										</h4>

									</div>
									<div id="memory_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="memory_type">
										<div class="panel-body">
										<?php foreach ($memory_type as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'memory_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[memory_type][]" value="<?php echo $list['memory_type']; ?>"><span>&nbsp;<?php echo $list['memory_type']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($ram_type)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ram_type" aria-expanded="false" aria-controls="ram_type">
										RAM TYPE	
										</a>
										</h4>

									</div>
									<div id="ram_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="ram_type">
										<div class="panel-body">
										<?php foreach ($ram_type as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ram_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram_type][]" value="<?php echo $list['ram_type']; ?>"><span>&nbsp;<?php echo $list['ram_type']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					
					
					<?php } ?>
					<?php if($cat_subcat_ids['subcategory_id']=='40'){ ?>
						<?php if(count($ram_list)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecomram">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										RAM	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
										<div class="panel-body">
										<?php foreach ($ram_list as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ram'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($operating_system)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										OPERATING SYSTEM	
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($operating_system as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'os'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['operatingsystem']; ?>"><span>&nbsp;<?php echo $list['operatingsystem']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($internal_storage)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#internal_storage" aria-expanded="false" aria-controls="internal_storage">
										INTERNAL STORAGE	
										</a>
										</h4>

									</div>
									<div id="internal_storage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($internal_storage as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'internal_storage'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['internal_storage']; ?>"><span>&nbsp;<?php echo $list['internal_storage']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($display_size)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										SCREEN SIZE
										</a>
										</h4>

									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
										<div class="panel-body">
										<?php foreach ($display_size as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'display_size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[display_size][]" value="<?php echo $list['display_size']; ?>"><span>&nbsp;<?php echo $list['display_size']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($battery_capacity)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#battery_capacity" aria-expanded="false" aria-controls="battery_capacity">
										BATTERY CAPACITY	
										</a>
										</h4>

									</div>
									<div id="battery_capacity" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($battery_capacity as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'battery_capacity'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[battery_capacity][]" value="<?php echo $list['battery_capacity']; ?>"><span>&nbsp;<?php echo $list['battery_capacity']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($producttype_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Type	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($producttype_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cameratype][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($network_type)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#network_type" aria-expanded="false" aria-controls="network_type">
								NETWORK TYPE	
								</a>
								</h4>

							</div>
							<div id="network_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($network_type as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'network_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[network_type][]" value="<?php echo $list['network_type']; ?>"><span>&nbsp;<?php echo $list['network_type']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($speciality_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#speciality" aria-expanded="false" aria-controls="speciality">
								SPECIALITY	
								</a>
								</h4>

							</div>
							<div id="speciality" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($speciality_list as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'speciality'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[speciality][]" value="<?php echo $list['speciality']; ?>"><span>&nbsp;<?php echo $list['speciality']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($operating_system_version_name)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecom">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#operating_system_version_name" aria-expanded="false" aria-controls="operating_system_version_name">
								OPERATING SYSTEM VERSION NAME	
								</a>
								</h4>

							</div>
							<div id="operating_system_version_name" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom">
								<div class="panel-body">
								<?php foreach ($operating_system_version_name as $list){  ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'osversion'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operating_system_version_name][]" value="<?php echo $list['operating_system_version_name']; ?>"><span>&nbsp;<?php echo $list['operating_system_version_name']; ?></span></label></div>
								<?php  } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if(count($processor_brand)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom213">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#processor_brand" aria-expanded="false" aria-controls="processor_brand">
										PROCESSOR BRAND	
										</a>
										</h4>

									</div>
									<div id="processor_brand" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom213">
										<div class="panel-body">
										<?php foreach ($processor_brand as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'processor_brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[processor_brand][]" value="<?php echo $list['processor_brand']; ?>"><span>&nbsp;<?php echo $list['processor_brand']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($resolution_type)>0){?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="headingThreecom213">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#resolution_type" aria-expanded="false" aria-controls="resolution_type">
										RESOLUTION TYPE	
										</a>
										</h4>

									</div>
									<div id="resolution_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecom213">
										<div class="panel-body">
										<?php foreach ($resolution_type as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'resolution_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[resolution_type][]" value="<?php echo $list['resolution_type']; ?>"><span>&nbsp;<?php echo $list['resolution_type']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($primary_camera)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#primary_camera" aria-expanded="false" aria-controls="primary_camera">
										PRIMARY CAMERA	
										</a>
										</h4>

									</div>
									<div id="primary_camera" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operatingsystem">
										<div class="panel-body">
										<?php foreach ($primary_camera as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'primary_camera'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[primary_camera][]" value="<?php echo $list['primary_camera']; ?>"><span>&nbsp;<?php echo $list['primary_camera']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($secondary_camera)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#secondary_camera" aria-expanded="false" aria-controls="secondary_camera">
										SECONDARY CAMERA	
										</a>
										</h4>

									</div>
									<div id="secondary_camera" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="secondary_camera">
										<div class="panel-body">
										<?php foreach ($secondary_camera as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'secondary_camera'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[secondary_camera][]" value="<?php echo $list['secondary_camera']; ?>"><span>&nbsp;<?php echo $list['secondary_camera']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($sim_type)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sim_type" aria-expanded="false" aria-controls="sim_type">
										SIM TYPE	
										</a>
										</h4>

									</div>
									<div id="sim_type" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sim_type">
										<div class="panel-body">
										<?php foreach ($sim_type as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'sim_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[sim_type][]" value="<?php echo $list['sim_type']; ?>"><span>&nbsp;<?php echo $list['sim_type']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($clock_speed)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#clock_speed" aria-expanded="false" aria-controls="clock_speed">
										CLOCK SPEED	
										</a>
										</h4>

									</div>
									<div id="clock_speed" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="clock_speed">
										<div class="panel-body">
										<?php foreach ($clock_speed as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'clock_speed'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[clock_speed][]" value="<?php echo $list['clock_speed']; ?>"><span>&nbsp;<?php echo $list['clock_speed']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					<?php if(count($cores)>0){ ?>
								<div class="panel panel-primary">
									<div class="panel-heading" role="tab" id="operatingsystem">
										<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#clock_speed" aria-expanded="false" aria-controls="cores">
										NUMBER OF CORES	
										</a>
										</h4>

									</div>
									<div id="cores" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="cores">
										<div class="panel-body">
										<?php foreach ($cores as $list){  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cores'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cores][]" value="<?php echo $list['cores']; ?>"><span>&nbsp;<?php echo $list['cores']; ?></span></label></div>
										<?php  } ?>
										</div>
									</div>
								</div>
					<?php } ?>
					
					
					<?php } ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="submobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				
			</div>
			<?php } ?>
			</form>
				
				
				
				
			
		</div>
        <!-- End Filter Sidebar -->

        <!-- Product List -->
        <div class="col-sm-9">
          <div class="title"><span><?php echo $cat_subcat_ids['subcategory_name']; ?></span></div>
		  <div  style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
            </button>
		</div>
		<?php //echo '<pre>';print_r($subcategory_porduct_list);exit; ?>
		<?php 
          $customerdetails=$this->session->userdata('userdetails');
		$cnt=1;foreach($subcategory_porduct_list as $productslist){ 
		//echo'<pre>';print_r($whishlist_item_ids_list);exit;
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
				?>
		 <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $productslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $productslist['category_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
			
          <div class=" col-md-3 box-product-outer" style="width:23%">
            <div class="box-product">
              <div class="img-wrapper">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                  <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
               
				<?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
              <div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo ($item_price); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo $orginal_price; ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
              <div class="rating">
                <?php foreach ($avg_count as $li){
				$idslist[]=$li['item_id'];			
				if($productslist['item_id']==$li['item_id']){?>
				<?php if(round($li['avg'])==1){  ?>
					    <i class="fa fa-star product-rateing"> </i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
					 	<?php }else if(round($li['avg'])==2){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if(round($li['avg'])==3){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if(round($li['avg'])==4){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
					  <?php }else if(round($li['avg'])==5){  ?>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <?php } ?>			
				
				<?php }?>
					 <?php } ?>	
					 	<?php 	if (!in_array($productslist['item_id'], $idslist)){ ?>
							<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
							
						<?php } ?>
				<?php foreach ($rating_count as $li){ 
				if($productslist['item_id']==$li['item_id']){?>
				<a href="<?php echo base_url('category/productview/'.base64_encode($li['item_id'])); ?>">(<?php echo $li['count']; ?>  reviews)</a>
				<?php }} ?>
			</div>
            </div>
          </div>
		  </form>
		  <?php  
			if(($cnt % 4)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
		   
		  <?php  $cnt++;} ?>
         
         
        </div>
		</span>
	
        <!-- End Product List -->

      
   
	 </div>
	 <div class="clearfix"></div>
	 <br>
</body>
<script>
 function itemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/onclickaddcart');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          producr_id: itemid,
		  category_id: catid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
           if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#sucessmsg').show();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						if(data.msg==2){
						$("#addticartitem"+itemid+val).removeClass("text-primary");
						$('#sucessmsg').html('Product Successfully removed to Whishlist');  
						}
						if(data.msg==1){
						 $("#addticartitem"+itemid+val).addClass("text-primary");
						//$('#addwhish').css("color", "yellow");
						$('#sucessmsg').html('Product Successfully added to Whishlist');  
						}
				}

        }
      });

 }
function addwhishlidts(id,val){
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
				$('#sucessmsg').show('');
				$("#addwishlistids"+id+val).removeClass("text-primary");
				$('#sucessmsg').html('Product Successfully removed to Whishlist');
				document.getElementById("sucessmsg").focus();
				
				}
				if(data.msg==1){
				$('#sucessmsg').show('');
				 $("#addwishlistids"+id+val).addClass("text-primary");
				$('#sucessmsg').html('Product Successfully added to Whishlist');
				document.getElementById("sucessmsg").focus();				
				}
			

			}
		});
	
	
}

function submobileaccessories(val,status,check){
	
	jQuery.ajax({
		
				url: "<?php echo site_url('category/subcategorywiseearch');?>",
				type: 'post',
			
				data: {
					form_key : window.FORM_KEY,
					categoryid: $('#categoryid').val(),
					subcategoryid: $('#subcategoryid').val(),
					productsvalues: val,
					searchvalue: status,
					unchecked: check,
					mini_mum: $('#input-select').val(),
					maxi_mum: $('#input-number').val(),

					},
				dataType: 'html',
				success: function (data) {
					$("#withoursearchsubcategory").empty();
					//$("#containerhighold").hide();
					//$("#containerhigh").show();
					$("#withoursearchsubcategory").append(data);
	}
});
}



(function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery);

		var select = document.getElementById('input-select');

// Append the option elements
for ( var i = '<?php echo floor($minimum_price['item_cost']); ?>'; i <= '<?php echo floor($maximum_price['item_cost']); ?>'; i++ ){

	var option = document.createElement("option");
		option.text = i;
		option.value = i;

	select.appendChild(option);
}

		var html5Slider = document.getElementById('html5');

noUiSlider.create(html5Slider, {
	start: [ '<?php echo floor($minimum_price['item_cost']); ?>', '<?php echo floor($maximum_price['item_cost']); ?>' ],
	connect: true,
	range: {
		'min': <?php echo floor($minimum_price['item_cost']); ?>,
		'max': <?php echo floor($maximum_price['item_cost']); ?>
	}
});

		var inputNumber = document.getElementById('input-number');

html5Slider.noUiSlider.on('update', function( values, handle ) {

	var value = values[handle];

	if ( handle ) {
		inputNumber.value = value;
	} else {
		select.value = Math.round(value);
	}
});

select.addEventListener('change', function(){
	html5Slider.noUiSlider.set([this.value, null]);
});

inputNumber.addEventListener('change', function(){
	html5Slider.noUiSlider.set([null, this.value]);
});
</script>