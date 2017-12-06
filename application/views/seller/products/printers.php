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
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Model Series</label>
				<input type="text" class="form-control" id="model_series" name="model_series" value="<?php echo isset($item_details['model_series'])?$item_details['model_series']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Installation</label>
				<input type="text" class="form-control"  id="installation" name="installation" value="<?php echo isset($item_details['installation'])?$item_details['installation']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Warranty card</label>
				<input type="text" class="form-control" id="warranty_card" name="warranty_card" value="<?php echo isset($item_details['warranty_card'])?$item_details['warranty_card']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Type</label>
				<input type="text" class="form-control"  id="type" name="type" value="<?php echo isset($item_details['type'])?$item_details['type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Functions</label>
				<input type="text" class="form-control" id="functions" name="functions" value="<?php echo isset($item_details['functions'])?$item_details['functions']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Printer Type</label>
				<input type="text" class="form-control" id="printer_type" name="printer_type" value="<?php echo isset($item_details['printer_type'])?$item_details['printer_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Interface</label>
				<input type="text" class="form-control" id="interface" name="interface" value="<?php echo isset($item_details['interface'])?$item_details['interface']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Printer Output</label>
				<input type="text" class="form-control" id="printer_output" name="printer_output" value="<?php echo isset($item_details['printer_output'])?$item_details['printer_output']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Model ID</label>
				<input type="text" class="form-control" id="model_id" name="model_id" value="<?php echo isset($item_details['model_id'])?$item_details['model_id']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Print</label>
	
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Max Print Resolution</label>
				<input type="text" class="form-control" id="max_print_resolution" name="max_print_resolution" value="<?php echo isset($item_details['max_print_resolution'])?$item_details['max_print_resolution']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Max Print Speed</label>
				<input type="text" class="form-control" id="print_speed" name="print_speed" value="<?php echo isset($item_details['print_speed'])?$item_details['print_speed']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Scan</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Scanner Type</label>
				<input type="text" class="form-control" id="scanner_type" name="scanner_type" value="<?php echo isset($item_details['scanner_type'])?$item_details['scanner_type']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Max Document Size</label>
				<input type="text" class="form-control" id="document_size" name="document_size" value="<?php echo isset($item_details['document_size'])?$item_details['document_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Optical Scanning Resolution</label>
				<input type="text" class="form-control" id="scanning_resolution" name="scanning_resolution" value="<?php echo isset($item_details['scanning_resolution'])?$item_details['scanning_resolution']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Copy</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Maximum Copies From Standalone</label>
				<input type="text" class="form-control" id="copies_from" name="copies_from" value="<?php echo isset($item_details['copies_from'])?$item_details['copies_from']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Maximum Copy Size</label>
				<input type="text" class="form-control" id="copy_size" name="copy_size" value="<?php echo isset($item_details['copy_size'])?$item_details['copy_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">ISO 29183, A4, Simplex</label>
				<input type="text" class="form-control" id="iso_29183" name="iso_29183" value="<?php echo isset($item_details['iso_29183'])?$item_details['iso_29183']:''; ?>" >
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
				 <label for="exampleInputEmail1">Noise Level</label>
				<input type="text" class="form-control" id="noise_level" name="noise_level" value="<?php echo isset($item_details['noise_level'])?$item_details['noise_level']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Paper Hold Input Capacity</label>
				<input type="text" class="form-control" id="paper_hold_input" name="paper_hold_input" value="<?php echo isset($item_details['paper_hold_input'])?$item_details['paper_hold_input']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Paper Hold OutPut Capacity</label>
				<input type="text" class="form-control" id="paper_hold_output" name="paper_hold_output" value="<?php echo isset($item_details['paper_hold_output'])?$item_details['paper_hold_output']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Paper Size</label>
				<input type="text" class="form-control" id="paper_size" name="paper_size" value="<?php echo isset($item_details['paper_size'])?$item_details['paper_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Print Margin</label>
				<input type="text" class="form-control" id="print_margin" name="print_margin" value="<?php echo isset($item_details['print_margin'])?$item_details['print_margin']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Print Margin</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Standby</label>
				<input type="text" class="form-control" id="standby" name="standby" value="<?php echo isset($item_details['standby'])?$item_details['standby']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Operating Temperature Range</label>
				<input type="text" class="form-control" id="operating_temperature_range" name="operating_temperature_range" value="<?php echo isset($item_details['operating_temperature_range'])?$item_details['operating_temperature_range']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Power</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Power Requirement</label>
				<input type="text" class="form-control" id="power" name="power" value="<?php echo isset($item_details['power'])?$item_details['power']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Frequency</label>
				<input type="text" class="form-control" id="frequency" name="frequency"  value="<?php echo isset($item_details['frequency'])?$item_details['frequency']:''; ?>" >
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
	



		