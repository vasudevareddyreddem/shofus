<style>
	.pad_btn{
		padding:9px 12px;
	}
</style>
<?php //echo '<pre>';print_r($subcategory_id); ?>
<script>
$('#product_price').val("<?php echo isset($item_details['item_cost'])?$item_details['item_cost']:''; ?>");
$('#special_price').val("<?php echo isset($item_details['special_price'])?$item_details['special_price']:''; ?>");
$('#pqty').val("<?php echo isset($item_details['item_quantity'])?$item_details['item_quantity']:''; ?>");
$('#warranty_summary').val("<?php echo isset($item_details['warranty_summary'])?$item_details['warranty_summary']:''; ?>");
$('#warranty_type').val("<?php echo isset($item_details['warranty_type'])?$item_details['warranty_type']:''; ?>");
$('#service_type').val("<?php echo isset($item_details['service_type'])?$item_details['service_type']:''; ?>");
$('#pbrand').val("<?php echo isset($item_details['pbrand'])?$item_details['service_type']:''; ?>");
</script>
<?php //echo '<pre>';print_r($item_details); ?>

	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Return Policy</label>
				<textarea  placeholder="Return Policy" style="width: 1034px; height: 59px;" class="form-control" rows="3" id="return_policy" name="return_policy"><?php echo isset($item_details['return_policy'])?$item_details['return_policy']:''; ?></textarea>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Highlights</label>
				<textarea  placeholder="Highlights" style="height: 59px;" class="form-control" rows="3" id="highlights" name="highlights"><?php echo isset($item_details['highlights'])?$item_details['highlights']:''; ?></textarea>
			</div>
		</div>
	</div>
	
	<hr>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Specifications</label>
	
	</div><br>
	
 
  
  
<div class="clear"></div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Brand</label>
				<input type="text" class="form-control" id="pbrand" name="pbrand" value="<?php echo isset($item_details['brand'])?$item_details['brand']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Product Code</label>
				<input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo isset($item_details['product_code'])?$item_details['product_code']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Size</label>
					<input type="text" class="form-control" id="size" name="size" value="<?php echo isset($item_details['size'])?$item_details['size']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Color</label>
					<input type="text" class="form-control" id="colour" name="colour" value="<?php echo isset($item_details['colour'])?$item_details['colour']:''; ?>" >
				</div>
			</div>
		
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Occasion</label>
					<input type="text" class="form-control" id="occasion" name="occasion" value="<?php echo isset($item_details['occasion'])?$item_details['occasion']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Material</label>
					<input type="text" class="form-control" id="material" name="material" value="<?php echo isset($item_details['material'])?$item_details['material']:''; ?>" >
				</div>
			</div>
		
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Wash Care</label>
					<input type="text" class="form-control" id="wash_care" name="wash_care" value="<?php echo isset($item_details['wash_care'])?$item_details['wash_care']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Style Code</label>
					<input type="text" class="form-control" id="style_code" name="style_code" value="<?php echo isset($item_details['style_code'])?$item_details['style_code']:''; ?>" >
				</div>
			</div>
		
	</div>
	<?php if( $subcategory_id==55 || $subcategory_id==56 || $subcategory_id==57 || $subcategory_id==58 || $subcategory_id==59 || $subcategory_id==60 || $subcategory_id==61 || $subcategory_id==63){ ?>
	
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Look</label>
					<input type="text" class="form-control" id="look" name="look" value="<?php echo isset($item_details['look'])?$item_details['look']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Collar Type</label>
					<input type="text" class="form-control" id="collar_type" name="collar_type" value="<?php echo isset($item_details['collar_type'])?$item_details['collar_type']:''; ?>" >
				</div>
			</div>
		
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Sleeve</label>
					<input type="text" class="form-control" id="sleeve" name="sleeve" value="<?php echo isset($item_details['sleeve'])?$item_details['sleeve']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Fit</label>
					<input type="text" class="form-control" id="fit" name="fit" value="<?php echo isset($item_details['fit'])?$item_details['fit']:''; ?>" >
				</div>
			</div>
		
	</div>
	<?php } ?>
	<?php if($subcategory_id==55 || $subcategory_id==56 || $subcategory_id==57  || $subcategory_id==58 || $subcategory_id==59 || $subcategory_id==60 || $subcategory_id==61 || $subcategory_id==63 || $subcategory_id==64){ ?>
		
		<?php if($subcategory_id==63 || $subcategory_id==64){ ?>
		<?php if($subcategory_id==63 || $subcategory_id==64){ ?>
			<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Type</label>
							<input type="text" class="form-control" id="type" name="type" value="<?php echo isset($item_details['type'])?$item_details['type']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Neck Type</label>
							<input type="text" class="form-control" id="neck_type" name="neck_type" value="<?php echo isset($item_details['neck_type'])?$item_details['neck_type']:''; ?>" >
						</div>
					</div>
				
			</div>
			<?php } ?>
			<?php if($subcategory_id==63){ ?>
			<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Length</label>
							<input type="text" class="form-control" id="length" name="length" value="<?php echo isset($item_details['length'])?$item_details['length']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Pockets</label>
							<input type="text" class="form-control" id="pockets" name="pockets" value="<?php echo isset($item_details['pockets'])?$item_details['pockets']:''; ?>" >
						</div>
					</div>
				
			</div>
			<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Blouse Length</label>
							<input type="text" class="form-control" id="blouse_length" name="blouse_length" value="<?php echo isset($item_details['blouse_length'])?$item_details['blouse_length']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Saree Length</label>
							<input type="text" class="form-control" id="saree_length" name="saree_length" value="<?php echo isset($item_details['saree_length'])?$item_details['saree_length']:''; ?>" >
						</div>
					</div>
				
			</div>
			<div class="row">
				<div class=" col-md-12">
					<div class="form-group nopaddingRight san-lg">
						<label for="exampleInputEmail1">Disclaimer</label>
						<textarea  placeholder="Disclaimer" style="width: 1034px; height: 59px;" class="form-control" rows="3" id="disclaimer" name="disclaimer"><?php echo isset($item_details['disclaimer'])?$item_details['disclaimer']:''; ?></textarea>
					</div>
				</div>
			</div>
				<?php } ?>
			<?php }else{ ?>
				<div class="row">
					
					<div class=" col-md-12 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Pattern</label>
							<input type="text" class="form-control" id="pattern" name="pattern" value="<?php echo isset($item_details['pattern'])?$item_details['pattern']:''; ?>" >
						</div>
					</div>
				
				</div>
			<?php } ?>
		<?php } ?>
	<?php if($subcategory_id==62){ ?>
	<div class="row">
			
			<div class=" col-md-12 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Set Contents</label>
					<input type="text" class="form-control" id="set_contents" name="set_contents" value="<?php echo isset($item_details['set_contents'])?$item_details['set_contents']:''; ?>" >
				</div>
			</div>
		
	</div>
	<?php }?>
		<?php if($subcategory_id==55 || $subcategory_id==57  || $subcategory_id==56 || $subcategory_id==58 || $subcategory_id==59 || $subcategory_id==60 || $subcategory_id==61 || $subcategory_id==62){ ?>

	<div class="row">
			<div class=" col-md-12 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Gender</label>
					<select class="form-control" id="gender" name="gender" >
					<option value="">Select</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>

					</select>
				</div>
			</div>
	</div>
	<?php } ?>
	<?php if($subcategory_id==64){ ?>
		<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Package Contents</label>
							<input type="text" class="form-control" id="package_contents" name="package_contents" value="<?php echo isset($item_details['package_contents'])?$item_details['package_contents']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Style</label>
							<input type="text" class="form-control" id="style" name="style" value="<?php echo isset($item_details['style'])?$item_details['style']:''; ?>" >
						</div>
					</div>
				
		</div>
		<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Age</label>
							<input type="text" class="form-control" id="age" name="age" value="<?php echo isset($item_details['age'])?$item_details['age']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Ideal For</label>
							<input type="text" class="form-control" id="ideal_for" name="ideal_for" value="<?php echo isset($item_details['ideal_for'])?$item_details['ideal_for']:''; ?>" >
						</div>
					</div>
				
		</div>
		<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Pattern</label>
							<input type="text" class="form-control" id="pattern1" name="pattern1" value="<?php echo isset($item_details['pattern'])?$item_details['pattern']:''; ?>" >
						</div>
					</div>
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Sleeve</label>
							<input type="text" class="form-control" id="sleeve1" name="sleeve1" value="<?php echo isset($item_details['sleeve'])?$item_details['sleeve']:''; ?>" >
						</div>
					</div>
				
				</div>
		
	<?php } ?>
	
	
	
	

	
	



	



		