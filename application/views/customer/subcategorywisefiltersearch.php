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
 <span id="againsubcategorysearch">

	
	 <div class=" clearfix"></div>
	 <!-- Filter Sidebar -->
	<span id="againsubcategorysearch1">
		<div class="col-sm-3">
		 <div class="title"><span>Filters</span></div>

				
		 <?php 
		//echo '<pre>';print_r($previousdata);
		 foreach($previousdata as $predata){ 
				
				
				$cusine[]=$predata['cusine'];
				$restraent[]=$predata['restraent'];
				$offers[]=$predata['offers'];
				$brand[]=$predata['brand'];
				$discount[]=$predata['discount'];
				if($predata['status']!=''){
				$status[]=$predata['status'];	
				}
				
				$size[]=$predata['size'];
				$color[]=$predata['color'];
				$mobileacclist[]=$predata['mobileacc'];
				$producttype[]=$predata['producttype'];
				$mega_pixel[]=$predata['mega_pixel'];
				$sensor_types[]=$predata['sensor_type'];
				$battery_types[]=$predata['battery_type'];
				$display_sizes[]=$predata['display_size'];
				$connectivitys[]=$predata['connectivity'];
				$rams[]=$predata['ram'];
				$oslist[]=$predata['operatingsystem'];
				$voice_calling_facilitys[]=$predata['voice_calling_facility'];
				$internal_storages[]=$predata['internal_storage'];
				$battery_capacitys[]=$predata['battery_capacity'];
				$primary_cameras[]=$predata['primary_camera'];
				$processor_clock_speeds[]=$predata['processor_clock_speed'];
				$min_am[]=$predata['mini_amount'];
				$max_amt[]=$predata['max_amount'];
			
			//echo '<pre>';print_r($offers);
		  }
		  //exit;
		  //echo '<pre>';print_r($mobileacclist);exit;		  
		 ?>
				
			<form action="#" method="POST" >
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
			<input type="hidden" name="categoryid" id="categoryid" value="<?php echo $cat_subcat_ids[0]['category_id']; ?>">
			<input type="hidden" name="subcategoryid" id="subcategoryid" value="<?php echo $cat_subcat_ids[0]['subcategory_id']; ?>">
			
			<?php if($cat_subcat_ids[0]['category_id']=='18'){ ?>
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
								<?php foreach ($myrestaurant as $reslist){ 
								if (in_array($reslist['seller_id'], $restraent)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'res'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[res][]" value="<?php echo $reslist['seller_id']; ?>"><span>&nbsp;<?php echo $reslist['seller_name']; ?></span></label></div>
								<?php } else{ ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'res'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[res][]" value="<?php echo $reslist['seller_id']; ?>"><span>&nbsp;<?php echo $reslist['seller_name']; ?></span></label></div>

								<?php } } ?>
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
							<?php //echo '<pe>';print_r($list['cusine']);exit; 
							if (in_array($list['cusine'], $cusine)) { ?>
								<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'cusine'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[cusine][]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>

							<?php }else{  ?>
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cusine'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cusine][]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>
							<?php }
						 } ?>
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
								
								<?php foreach ($avalibility_list as $list){ 
									if (isset($status) && $status[0]== $list) {?>
									<option value="<?php echo $list; ?>" selected><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
									<?php } else{  ?>
										<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>

									<?php } } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				
			</div>
			
			<?php }else if($cat_subcat_ids[0]['category_id']=='21'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
						<?php foreach ($offer_list as $list){ 
						if (in_array($list['offers'], $offers)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo $list['offers']; ?></span></label></div>
						<?php } else{  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo $list['offers']; ?></span></label></div>

						<?php } } ?>
						</div>
					</div>
				</div>
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
						<?php foreach ($brand_list as $list){ 
							if (in_array($list['brand'], $brand)) { ?>
								<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
								<?php } else{ ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>

								<?php } } ?>
						</div>
					</div>
				</div>
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
						<?php foreach ($discount_list as $list){ 
							if (in_array($list['discount'], $discount)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
							<?php } else{ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>

							<?php } } ?>
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
					<?php //echo '<pre>';print_r($status[0]);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<select onchange="submobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ 
									if (isset($status) && $status[0]== $list) {?>
									<option value="<?php echo $list; ?>" selected><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
									<?php } else{  ?>
										<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>

									<?php } } ?>
							</select>
						</div>
					</div>
				</div>
				
				
				
			</div>
			<?php }else if($cat_subcat_ids[0]['category_id']=='19'){ ?>
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
							<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo $list['offers']; ?></span></label></div>
						
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
			<?php }else if($cat_subcat_ids[0]['category_id']=='20'){ ?>
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
						<?php foreach ($offer_list as $list){ 
						if (in_array($list['offers'], $offers)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo $list['offers']; ?></span></label></div>
						<?php } else{  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo $list['offers']; ?></span></label></div>

						<?php } } ?>
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
						<?php foreach ($color_list as $list){ 
						if (in_array($list['color_name'], $color)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
						<?php } else{ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>

						<?php } } ?>
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
						<?php foreach ($brand_list as $list){ 
							if (in_array($list['brand'], $brand)) { ?>
								<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
								<?php } else{ ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>

								<?php } } ?>
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
						<?php foreach ($discount_list as $list){ 
							if (in_array($list['discount'], $discount)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
							<?php } else{ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>

							<?php } } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php 
				//echo '<pre>';print_r($comatability_mobile_list);exit;
				if($cat_subcat_ids[0]['subcategory_id']=='30'){ ?>
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
						<?php foreach ($comatability_mobile_list as $list){ 
							if (in_array($list['compatible_mobiles'], $mobileacclist)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'mobileacc'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[mobileacc][]" value="<?php echo $list['compatible_mobiles']; ?>"><span>&nbsp;<?php echo $list['compatible_mobiles']; ?></span></label></div>
						<?php } else{ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'mobileacc'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[mobileacc][]" value="<?php echo $list['compatible_mobiles']; ?>"><span>&nbsp;<?php echo $list['compatible_mobiles']; ?></span></label></div>

						<?php } } ?>
						</div>
					</div>
				</div>
					
					<?php }	?>
					
					<?php if($cat_subcat_ids[0]['subcategory_id']=='34'){ ?>
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
						<?php foreach ($producttype_list as $list){ 
							if (in_array($list['producttype'], $producttype)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[mobileacc][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>
						<?php } else{ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'cameratype'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[mobileacc][]" value="<?php echo $list['producttype']; ?>"><span>&nbsp;<?php echo $list['producttype']; ?></span></label></div>

						<?php } } ?>
						</div>
					</div>
					</div>
					<?php } ?>
					<?php if(count($megapuxel_list)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecommega">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								MEGA PIXEL	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecommega">
								<div class="panel-body">
								<?php foreach ($megapuxel_list as $list){  
								if (in_array($list['mega_pixel'], $mega_pixel)) { ?>
									<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'mega_pixel'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[magepixel][]" value="<?php echo $list['mega_pixel']; ?>"><span>&nbsp;<?php echo $list['mega_pixel']; ?></span></label></div>
								<?php } else{ ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'mega_pixel'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[magepixel][]" value="<?php echo $list['mega_pixel']; ?>"><span>&nbsp;<?php echo $list['mega_pixel']; ?></span></label></div>

								<?php } } ?>
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
								<?php foreach ($sensor_type as $list){ 
								if (in_array($list['sensor_type'], $sensor_types)) { ?>
									<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'sensor_type'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[sensor_type][]" value="<?php echo $list['sensor_type']; ?>"><span>&nbsp;<?php echo $list['sensor_type']; ?></span></label></div>
								<?php } else{ ?>
									<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'sensor_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[sensor_type][]" value="<?php echo $list['sensor_type']; ?>"><span>&nbsp;<?php echo $list['sensor_type']; ?></span></label></div>

								<?php } } ?>
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
								<?php foreach ($battery_type as $list){  
								if (in_array($list['battery_type'], $battery_types)) { ?>
									<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'battery_type'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[battery_type][]" value="<?php echo $list['battery_type']; ?>"><span>&nbsp;<?php echo $list['battery_type']; ?></span></label></div>
								<?php }else{  ?>
										<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'battery_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[battery_type][]" value="<?php echo $list['battery_type']; ?>"><span>&nbsp;<?php echo $list['battery_type']; ?></span></label></div>
								<?php }  }?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php }	?>
					<?php if($cat_subcat_ids[0]['subcategory_id']=='35'){ ?>
									
					<?php if(count($display_size)>0){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThreecomsize">
								<h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								DISPLAY SIZE	
								</a>
								</h4>

							</div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomsize">
								<div class="panel-body">
								<?php foreach ($display_size as $list){  
								if (in_array($list['display_size'], $display_sizes)) { ?>
									<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'display_size'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[display_size][]" value="<?php echo $list['display_size']; ?>"><span>&nbsp;<?php echo $list['display_size']; ?></span></label></div>
								<?php }else{  ?>
										<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'display_size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[display_size][]" value="<?php echo $list['display_size']; ?>"><span>&nbsp;<?php echo $list['display_size']; ?></span></label></div>
								<?php }  } ?>
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
										<?php foreach ($connectivity_list as $list){  
										if (in_array($list['connectivity'], $connectivitys)) { ?>
											<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'connectivity'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[connectivity][]" value="<?php echo $list['connectivity']; ?>"><span>&nbsp;<?php echo $list['connectivity']; ?></span></label></div>
										<?php }else{  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'connectivity'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[connectivity][]" value="<?php echo $list['connectivity']; ?>"><span>&nbsp;<?php echo $list['connectivity']; ?></span></label></div>
									<?php }  } ?>
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
							<?php foreach ($ram_list as $list){ 
							if (in_array($list['ram'], $rams)) { ?>
								<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ram'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>
							<?php }else{  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'ram'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>

							<?php }  } ?>
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
										<?php foreach ($voice_calling_facility as $list){
										if (in_array($list['voice_calling_facility'], $voice_calling_facilitys)) { ?>
											<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="submobileaccessories(this.value, '<?php echo 'voice'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[voice_calling_facility][]" value="<?php echo $list['voice_calling_facility']; ?>"><span>&nbsp;<?php echo $list['voice_calling_facility']; ?></span></label></div>
										<?php }else{  ?>
												<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'voice'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[voice_calling_facility][]" value="<?php echo $list['voice_calling_facility']; ?>"><span>&nbsp;<?php echo $list['voice_calling_facility']; ?></span></label></div>

										<?php }  } ?>
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
										<?php foreach ($operating_system as $list){ 
										if (in_array($list['operatingsystem'], $oslist)) { ?>
											<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'os'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['operatingsystem']; ?>"><span>&nbsp;<?php echo $list['operatingsystem']; ?></span></label></div>
										<?php }else{  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'os'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['operatingsystem']; ?>"><span>&nbsp;<?php echo $list['operatingsystem']; ?></span></label></div>

										<?php }  } ?>
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
										<?php foreach ($internal_storage as $list){
											if (in_array($list['internal_storage'], $internal_storages)) { ?>
											<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'internal_storage'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['internal_storage']; ?>"><span>&nbsp;<?php echo $list['internal_storage']; ?></span></label></div>
										<?php }else{  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'internal_storage'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[operatingsystem][]" value="<?php echo $list['internal_storage']; ?>"><span>&nbsp;<?php echo $list['internal_storage']; ?></span></label></div>

										<?php }  } ?>
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
										<?php foreach ($battery_capacity as $list){  
										if (in_array($list['battery_capacity'], $battery_capacitys)) { ?>
											<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'battery_capacity'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[battery_capacity][]" value="<?php echo $list['battery_capacity']; ?>"><span>&nbsp;<?php echo $list['battery_capacity']; ?></span></label></div>
										<?php }else{  ?>
												<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'battery_capacity'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[battery_capacity][]" value="<?php echo $list['battery_capacity']; ?>"><span>&nbsp;<?php echo $list['battery_capacity']; ?></span></label></div>

										<?php }  } ?>
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
										<?php foreach ($primary_camera as $list){ 
										if (in_array($list['primary_camera'], $primary_cameras)) { ?>
											<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'primary_camera'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[primary_camera][]" value="<?php echo $list['primary_camera']; ?>"><span>&nbsp;<?php echo $list['primary_camera']; ?></span></label></div>
										<?php }else{  ?>
										<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'primary_camera'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[primary_camera][]" value="<?php echo $list['primary_camera']; ?>"><span>&nbsp;<?php echo $list['primary_camera']; ?></span></label></div>

										<?php }  } ?>
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
										<?php foreach ($processor_clock_speed as $list){
										if (in_array($list['processor_clock_speed'], $processor_clock_speeds)) { ?>
											<div class="checkbox"><label><input checked="checked" type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'processorclockspeed'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[processor_clock_speed][]" value="<?php echo $list['processor_clock_speed']; ?>"><span>&nbsp;<?php echo $list['processor_clock_speed']; ?></span></label></div>
										<?php }else{  ?>
											<div class="checkbox"><label><input type="checkbox" onclick="submobileaccessories(this.value, '<?php echo 'processorclockspeed'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[processor_clock_speed][]" value="<?php echo $list['processor_clock_speed']; ?>"><span>&nbsp;<?php echo $list['processor_clock_speed']; ?></span></label></div>
										<?php }  } ?>
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
								
								<?php foreach ($avalibility_list as $list){ 
									if (isset($status) && $status[0]== $list) {?>
									<option value="<?php echo $list; ?>" selected><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
									<?php } else{  ?>
										<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>

									<?php } } ?>
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
          <div class="title"><span><?php echo $cat_subcat_ids[0]['subcategory_name']; ?></span></div>
		<?php //echo '<pre>';print_r($subcategory_porduct_list);exit; ?>
		<?php 
		
		if(count($subcategory_porduct_list)>0){
		$cnt=1;foreach($subcategory_porduct_list as $productslist){ ?>
         <div class=" col-md-3 box-product-outer" style="width:23%">
            <div class="box-product">
              <div class="img-wrapper">
                <a href="detail.html">
                  <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-primary arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
                <div class="option">
                  <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-align-left"></i></a>
                  <a href="#" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
              <h6><a href="detail.html"><?php echo $productslist['item_name']; ?></a></h6>
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
		  <?php  
			if(($cnt % 4)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
		   
		<?php  $cnt++;} }else{ ?>
		<div>NO products are available.</div>
		<?php } ?>
         
         
        </div>
		</span>
		</span>
	
        <!-- End Product List -->

      
   
	 </div>
	 <div class="clearfix"></div>
	 <br>
</body>
<script>

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
					$("#againsubcategorysearch").empty();
					$("#againsubcategorysearch").append(data);
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
					
					$("#againsubcategorysearch").empty();
					$("#againsubcategorysearch").append(data);
				}
			});
			
	}
	
	
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
	start: [ '<?php echo floor(reset($min_am)); ?>', '<?php echo floor(end($max_amt)); ?>' ],
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