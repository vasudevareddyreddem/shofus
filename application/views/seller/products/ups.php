<style>
	.pad_btn{
		padding:9px 12px;
	}
</style>
<script>
$('#product_price').val("<?php echo isset($item_details['item_cost'])?$item_details['item_cost']:''; ?>");
$('#special_price').val("<?php echo isset($item_details['special_price'])?$item_details['special_price']:''; ?>");
$('#pqty').val("<?php echo isset($item_details['item_quantity'])?$item_details['item_quantity']:''; ?>");
$('#warranty_summary').val("<?php echo isset($item_details['warranty_summary'])?$item_details['warranty_summary']:''; ?>");
$('#warranty_type').val("<?php echo isset($item_details['warranty_type'])?$item_details['warranty_type']:''; ?>");
$('#service_type').val("<?php echo isset($item_details['service_type'])?$item_details['service_type']:''; ?>");
</script><?php //echo '<pre>';print_r($item_details);exit; ?>
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
							<label for="exampleInputEmail1">Type</label>
							<input type="text" class="form-control" id="type" name="type" value="<?php echo isset($item_details['type'])?$item_details['type']:''; ?>" >
						</div>
			</div>
			
			<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Weight</label>
				<input type="text" class="form-control" id="weight" name="weight"  value="<?php echo isset($item_details['weight'])?$item_details['weight']:''; ?>" >
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Model Name</label>
				<input type="text" class="form-control" id="model_name" name="model_name" value="<?php echo isset($item_details['model_name'])?$item_details['model_name']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Model ID</label>
				<input type="text" class="form-control" id="model_id" name="model_id" value="<?php echo isset($item_details['model_id'])?$item_details['model_id']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Input Voltage</label>
				<input type="text" class="form-control" id="inputvoltage" name="inputvoltage"  value="<?php echo isset($item_details['inputvoltage'])?$item_details['inputvoltage']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Output Voltage</label>
				<input type="text" class="form-control" id="outputvoltage" name="outputvoltage"  value="<?php echo isset($item_details['outputvoltage'])?$item_details['outputvoltage']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Input Frequency</label>
				<input type="text" class="form-control" id="inputfrequency" name="inputfrequency"  value="<?php echo isset($item_details['inputfrequency'])?$item_details['inputfrequency']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Output Frequency</label>
				<input type="text" class="form-control" id="operating_frequency" name="operating_frequency"  value="<?php echo isset($item_details['operating_frequency'])?$item_details['operating_frequency']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Output Power Wattage</label>
				<input type="text" class="form-control" id="power" name="power"  value="<?php echo isset($item_details['power'])?$item_details['power']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Capacity</label>
				<input type="text" class="form-control" id="battery_capacity" name="battery_capacity"  value="<?php echo isset($item_details['battery_capacity'])?$item_details['battery_capacity']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Dimensions</label>
				<input type="text" class="form-control" id="dimension" name="dimension"  value="<?php echo isset($item_details['dimension'])?$item_details['dimension']:''; ?>" >
			</div>
		</div>
	</div>
	 <div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >In the Box</label>
	
	</div><br>
	 <div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">In Sales Package</label>
				<input type="text" class="form-control" id="insales_package" name="insales_package" value="<?php echo isset($item_details['insales_package'])?$item_details['insales_package']:''; ?>" >
			</div>
		</div>
		
	</div>
	
	


		