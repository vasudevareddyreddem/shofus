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
					<label for="exampleInputEmail1">Portable</label>
					<input type="text" class="form-control" id="portable" name="portable" value="<?php echo isset($item_details['portable'])?$item_details['portable']:''; ?>" >
				</div>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Maximum Brightness</label>
					<input type="text" class="form-control" id="maximumbrightness" name="maximumbrightness" value="<?php echo isset($item_details['maximumbrightness'])?$item_details['maximumbrightness']:''; ?>" >
				</div>
			</div>
		
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Projection Ratio 1</label>
				<input type="text" class="form-control" id="projectionratio" name="projectionratio"  value="<?php echo isset($item_details['projectionratio'])?$item_details['projectionratio']:''; ?>" >
				</div>
			</div>
			
			<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Contrast Ratio</label>
				<input type="text" class="form-control" id="contrastratio" name="contrastratio"  value="<?php echo isset($item_details['contrastratio'])?$item_details['contrastratio']:''; ?>" >
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
				<label for="exampleInputEmail1">Output Per Speaker</label>
				<input type="text" class="form-control" id="outputperspeaker" name="outputperspeaker" value="<?php echo isset($item_details['outputperspeaker'])?$item_details['outputperspeaker']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Power Supply</label>
				<input type="text" class="form-control" id="powersupply" name="powersupply" value="<?php echo isset($item_details['powersupply'])?$item_details['powersupply']:''; ?>" >
			</div>
		</div>
	
	</div>
	<div class="row">
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Power Consumption</label>
				<input type="text" class="form-control" id="powerconsumption" name="powerconsumption" value="<?php echo isset($item_details['powerconsumption'])?$item_details['powerconsumption']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Minimum Operating Temperature</label>
				<input type="text" class="form-control" id="minopertingtemperature" name="minopertingtemperature" value="<?php echo isset($item_details['minopertingtemperature'])?$item_details['minopertingtemperature']:''; ?>" >
			</div>
		</div>
	
	</div>
	<div class="row">
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Maximum Operting Temperature</label>
				<input type="text" class="form-control" id="maxopertingtemperature" name="maxopertingtemperature" value="<?php echo isset($item_details['maxopertingtemperature'])?$item_details['maxopertingtemperature']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Remote Control </label>
				<input type="text" class="form-control" id="remotecontrol" name="remotecontrol" value="<?php echo isset($item_details['remotecontrol'])?$item_details['remotecontrol']:''; ?>" >
			</div>
		</div>
	
	</div>
	<div class="row">

		<div class=" col-md-12">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Weight</label>
				<input type="text" class="form-control" id="weight" name="weight" value="<?php echo isset($item_details['weight'])?$item_details['weight']:''; ?>" >
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
	
	


		