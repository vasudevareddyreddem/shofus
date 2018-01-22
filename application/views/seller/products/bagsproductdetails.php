<style>
	.pad_btn{
		padding:9px 12px;
	}
</style>
<?php //echo '<pre>';print_r($item_details);exit; ?>
<script>
$('#product_price').val("<?php echo isset($item_details['item_cost'])?$item_details['item_cost']:''; ?>");
$('#special_price').val("<?php echo isset($item_details['special_price'])?$item_details['special_price']:''; ?>");
$('#pqty').val("<?php echo isset($item_details['item_quantity'])?$item_details['item_quantity']:''; ?>");
$('#warranty_summary').val("<?php echo isset($item_details['warranty_summary'])?$item_details['warranty_summary']:''; ?>");
$('#warranty_type').val("<?php echo isset($item_details['warranty_type'])?$item_details['warranty_type']:''; ?>");
$('#service_type').val("<?php echo isset($item_details['service_type'])?$item_details['service_type']:''; ?>");
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
					<label for="exampleInputEmail1">Color</label>
					<input type="text" class="form-control" id="colour" name="colour" value="<?php echo isset($item_details['colour'])?$item_details['colour']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
					<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Type</label>
							<input type="text" class="form-control" id="type" name="type" value="<?php echo isset($item_details['type'])?$item_details['type']:''; ?>" >
						</div>
			</div>
		
	</div>
		<div class="row">
				
				
				<div class=" col-md-6 ">
					<div class="form-group nopaddingRight san-lg">
						<label for="exampleInputEmail1">Waterproof</label>
						<input type="text" class="form-control" id="waterproof" name="waterproof" value="<?php echo isset($item_details['waterproof'])?$item_details['waterproof']:''; ?>" >
					</div>
				</div>
				<div class=" col-md-6 ">
					<div class="form-group nopaddingRight san-lg">
						<label for="exampleInputEmail1">Laptop Compartment</label>
						<input type="text" class="form-control" id="laptop_compartment" name="laptop_compartment" value="<?php echo isset($item_details['laptop_compartment'])?$item_details['laptop_compartment']:''; ?>" >
					</div>
				</div>
			
		</div>
	<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Number Lock Mechanism</label>
					<input type="text" class="form-control" id="focus_lock" name="focus_lock" value="<?php echo isset($item_details['focus_lock'])?$item_details['focus_lock']:''; ?>" >
					</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Closure</label>
							<input type="text" class="form-control" id="closure" name="closure" value="<?php echo isset($item_details['closure'])?$item_details['closure']:''; ?>" >
						</div>
					</div>
				
	</div>
	<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Wheels</label>
							<input type="text" class="form-control" id="wheels" name="wheels" value="<?php echo isset($item_details['wheels'])?$item_details['wheels']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">No of Copartments</label>
							<input type="text" class="form-control" id="no_of_copartments" name="no_of_copartments" value="<?php echo isset($item_details['no_of_copartments'])?$item_details['no_of_copartments']:''; ?>" >
						</div>
					</div>
				
	</div>
	<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">No of Pockets</label>
							<input type="text" class="form-control" id="no_of_pockets" name="no_of_pockets" value="<?php echo isset($item_details['no_of_pockets'])?$item_details['no_of_pockets']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Inner Material</label>
							<input type="text" class="form-control" id="inner_material" name="inner_material" value="<?php echo isset($item_details['inner_material'])?$item_details['inner_material']:''; ?>" >
						</div>
					</div>
				
	</div>
	<div class="row">
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Outer Material</label>
							<input type="text" class="form-control" id="sole_material" name="sole_material" value="<?php echo isset($item_details['sole_material'])?$item_details['sole_material']:''; ?>" >
						</div>
					</div>
					
					<div class=" col-md-6 ">
						<div class="form-group nopaddingRight san-lg">
							<label for="exampleInputEmail1">Product Dimension (In CM)</label>
							<input type="text" class="form-control" id="product_dimension" name="product_dimension" value="<?php echo isset($item_details['product_dimension'])?$item_details['product_dimension']:''; ?>" >
						</div>
					</div>
				
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
		<div class="form-group nopaddingRight san-lg">
			<label for="exampleInputEmail1">Ideal For</label>
			<input type="text" class="form-control" id="ideal_for" name="ideal_for" value="<?php echo isset($item_details['ideal_for'])?$item_details['ideal_for']:''; ?>" >
		</div>
		</div>
	</div>
	
	
	

	
	



	



		