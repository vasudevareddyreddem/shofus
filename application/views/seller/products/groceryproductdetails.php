<style>
	.pad_btn{
		padding:9px 12px;
	}
</style>
<script>

$('#product_price').val(<?php echo isset($item_details['item_cost'])?$item_details['item_cost']:''; ?>);
$('#special_price').val(<?php echo isset($item_details['special_price'])?$item_details['special_price']:''; ?>);
$('#pqty').val(<?php echo isset($item_details['item_quantity'])?$item_details['item_quantity']:''; ?>);
$('#highlights').val(<?php echo isset($item_details['highlights'])?$item_details['highlights']:''; ?>);
$('#warranty_summary').val(<?php echo isset($item_details['warranty_summary'])?$item_details['warranty_summary']:''; ?>);
$('#warranty_type').val(<?php echo isset($item_details['warranty_type'])?$item_details['warranty_type']:''; ?>);
$('#service_type').val(<?php echo isset($item_details['service_type'])?$item_details['service_type']:''; ?>);
$('#return_policy').val(<?php echo isset($item_details['return_policy'])?$item_details['return_policy']:''; ?>);
</script><?php //echo '<pre>';print_r($item_details);exit; ?>

	
	
 
  
  
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
					<label for="exampleInputEmail1">Ingredients</label>
					<input type="text" class="form-control" id="ingredients" name="ingredients" value="<?php echo isset($item_details['ingredients'])?$item_details['ingredients']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Key Features</label>
					<input type="text" class="form-control" id="key_feature" name="key_feature" value="<?php echo isset($item_details['key_feature'])?$item_details['key_feature']:''; ?>" >
				</div>
			</div>
		
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Unit</label>
					<input type="text" class="form-control" id="unit" name="unit" value="<?php echo isset($item_details['unit'])?$item_details['unit']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Packaging Type</label>
					<input type="text" class="form-control" id="packingtype" name="packingtype" value="<?php echo isset($item_details['packingtype'])?$item_details['packingtype']:''; ?>" >
				</div>
			</div>
		
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Disclaimer</label>
				<textarea  placeholder="Disclaimer" style="width: 1034px; height: 59px;" class="form-control" rows="3" id="disclaimer" name="disclaimer"><?php echo isset($item_details['disclaimer'])?$item_details['disclaimer']:''; ?></textarea>
			</div>
		</div>
	</div>
	
	
	

	
	



	



		