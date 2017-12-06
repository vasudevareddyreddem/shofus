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
	
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Audio Feature</label>
	
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Total Power Output RMS (W)</label>
				<input type="text" class="form-control" id="total_power_output" name="total_power_output" value="<?php echo isset($item_details['total_power_output'])?$item_details['total_power_output']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Sound System</label>
				<input type="text" class="form-control" id="sound_system" name="sound_system" value="<?php echo isset($item_details['sound_system'])?$item_details['sound_system']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Speaker driver</label>
				<input type="text" class="form-control" id="speaker_driver" name="speaker_driver" value="<?php echo isset($item_details['speaker_driver'])?$item_details['speaker_driver']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Power</label>
				<input type="text" class="form-control" id="power" name="power" value="<?php echo isset($item_details['power'])?$item_details['power']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Battery type</label>
				<input type="text" class="form-control" id="battery_type" name="battery_type" value="<?php echo isset($item_details['battery_type'])?$item_details['battery_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Connectivity</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">USB Ports</label>
				<input type="text" class="form-control" id="usb_port" name="usb_port" value="<?php echo isset($item_details['usb_port'])?$item_details['usb_port']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Headphone Jack</label>
				<input type="text" class="form-control" id="headphone_jack" name="headphone_jack" value="<?php echo isset($item_details['headphone_jack'])?$item_details['headphone_jack']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Bluetooth</label>
				<input type="text" class="form-control" id="bluetooth" name="bluetooth" value="<?php echo isset($item_details['bluetooth'])?$item_details['bluetooth']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Wired/Wireless</label>
				<input type="text" class="form-control" id="wired_wireless" name="wired_wireless" value="<?php echo isset($item_details['wired_wireless'])?$item_details['wired_wireless']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Bluetooth range</label>
				<input type="text" class="form-control" id="bluetooth_range" name="bluetooth_range" value="<?php echo isset($item_details['bluetooth_range'])?$item_details['bluetooth_range']:''; ?>" >
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Additional Features</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Compatible Devices</label>
				<input type="text" class="form-control" id="compatible_for" name="compatible_for" value="<?php echo isset($item_details['compatible_for'])?$item_details['compatible_for']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Product weight</label>
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
	


		