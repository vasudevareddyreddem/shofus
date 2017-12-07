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
				 <label for="exampleInputEmail1">Resolution</label>
				<input type="text" class="form-control" id="resolution" name="resolution" value="<?php echo isset($item_details['resolution'])?$item_details['resolution']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Sensor Type</label>
				<input type="text" class="form-control"  id="sensor_type" name="sensor_type" value="<?php echo isset($item_details['sensor_type'])?$item_details['sensor_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Color</label>
				<input type="text" class="form-control" id="colour" name="colour" value="<?php echo isset($item_details['colour'])?$item_details['colour']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">LCD Screen Size</label>
				<input type="text" class="form-control"  id="lcd_screen_size" name="lcd_screen_size" value="<?php echo isset($item_details['lcd_screen_size'])?$item_details['lcd_screen_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Battery Type</label>
				<input type="text" class="form-control" id="battery_type" name="battery_type" value="<?php echo isset($item_details['battery_type'])?$item_details['battery_type']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Type</label>
				<input type="text" class="form-control" id="type" name="type" value="<?php echo isset($item_details['type'])?$item_details['type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Wi-Fi</label>
				<input type="text" class="form-control" id="wifi" name="wifi" value="<?php echo isset($item_details['wifi'])?$item_details['wifi']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Model Name</label>
				<input type="text" class="form-control" id="model_name" name="model_name" value="<?php echo isset($item_details['model_name'])?$item_details['model_name']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
		<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Lens</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Lens Mount</label>
				<input type="text" class="form-control" id="lens_mount" name="lens_mount" value="<?php echo isset($item_details['lens_mount'])?$item_details['lens_mount']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<label for="exampleInputEmail1">Exposure :</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Exposure Mode</label>
				<input type="text" class="form-control" id="exposure_mode" name="exposure_mode" value="<?php echo isset($item_details['exposure_mode'])?$item_details['exposure_mode']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Exposure Meter Coupling</label>
				<input type="text" class="form-control" id="meter_coupling" name="meter_coupling" value="<?php echo isset($item_details['meter_coupling'])?$item_details['meter_coupling']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Focus</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Lens Auto Focus</label>
				<input type="text" class="form-control" id="lens_auto_focus" name="lens_auto_focus" value="<?php echo isset($item_details['lens_auto_focus'])?$item_details['lens_auto_focus']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Focal Length</label>
				<input type="text" class="form-control" id="focus_length" name="focus_length" value="<?php echo isset($item_details['focus_length'])?$item_details['focus_length']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Focal Point</label>
				<input type="text" class="form-control" id="focus_point" name="focus_point" value="<?php echo isset($item_details['focus_point'])?$item_details['focus_point']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Focus Lock</label>
				<input type="text" class="form-control" id="focus_lock" name="focus_lock" value="<?php echo isset($item_details['focus_lock'])?$item_details['focus_lock']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Manual Focus</label>
				<input type="text" class="form-control" id="manual_focus" name="manual_focus" value="<?php echo isset($item_details['manual_focus'])?$item_details['manual_focus']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">AF Area Mode</label>
				<input type="text" class="form-control" id="af_area_mode" name="af_area_mode" value="<?php echo isset($item_details['af_area_mode'])?$item_details['af_area_mode']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Detection Range</label>
				<input type="text" class="form-control" id="detection_range" name="detection_range" value="<?php echo isset($item_details['detection_range'])?$item_details['detection_range']:''; ?>" >
			</div>
		</div>
		
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >LCD</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Number Of Dots/Effective Pixels</label>
				<input type="text" class="form-control" id="number_of_dots_effective_pixels" name="number_of_dots_effective_pixels" value="<?php echo isset($item_details['number_of_dots_effective_pixels'])?$item_details['number_of_dots_effective_pixels']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Display Type</label>
				<input type="text" class="form-control" id="display_type" name="display_type" value="<?php echo isset($item_details['display_type'])?$item_details['display_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Brightness Setting</label>
				<input type="text" class="form-control" id="brightness_setting" name="brightness_setting" value="<?php echo isset($item_details['brightness_setting'])?$item_details['brightness_setting']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">ViewFinder</label>
				<input type="text" class="form-control" id="viewfinder" name="viewfinder" value="<?php echo isset($item_details['viewfinder'])?$item_details['viewfinder']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">ViewFinderMagnifiaction</label>
				<input type="text" class="form-control" id="viewfindermagnifiaction" name="viewfindermagnifiaction" value="<?php echo isset($item_details['viewfindermagnifiaction'])?$item_details['viewfindermagnifiaction']:''; ?>" >
			</div>
		</div>
		
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Resolution</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Aspect Ratio</label>
				<input type="text" class="form-control" id="aspect_ratio" name="aspect_ratio" value="<?php echo isset($item_details['aspect_ratio'])?$item_details['aspect_ratio']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Image Size at Megapixels</label>
				<input type="text" class="form-control" id="image_size" name="image_size" value="<?php echo isset($item_details['image_size'])?$item_details['image_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image Resolution</label>
				<input type="text" class="form-control" id="image_resolution" name="image_resolution" value="<?php echo isset($item_details['image_resolution'])?$item_details['image_resolution']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Video Resolution</label>
				<input type="text" class="form-control" id="video_resolution" name="video_resolution" value="<?php echo isset($item_details['video_resolution'])?$item_details['video_resolution']:''; ?>" >
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Flash</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Flash Mode</label>
				<input type="text" class="form-control" id="flash_mode" name="flash_mode" value="<?php echo isset($item_details['flash_mode'])?$item_details['flash_mode']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Flash Range</label>
				<input type="text" class="form-control" id="flash_range" name="flash_range" value="<?php echo isset($item_details['flash_range'])?$item_details['flash_range']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Built-in Flash</label>
				<input type="text" class="form-control" id="built_in_flash" name="built_in_flash" value="<?php echo isset($item_details['built_in_flash'])?$item_details['built_in_flash']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">External Flash</label>
				<input type="text" class="form-control" id="external_flash" name="external_flash" value="<?php echo isset($item_details['external_flash'])?$item_details['external_flash']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Interface</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Audio Recording Device</label>
				<input type="text" class="form-control" id="audio_recording_device" name="audio_recording_device" value="<?php echo isset($item_details['audio_recording_device'])?$item_details['audio_recording_device']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Audio Recording Format</label>
				<input type="text" class="form-control" id="audio_recording_format" name="audio_recording_format"  value="<?php echo isset($item_details['audio_recording_format'])?$item_details['audio_recording_format']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Video Compression</label>
				<input type="text" class="form-control" id="video_compression" name="video_compression"  value="<?php echo isset($item_details['video_compression'])?$item_details['video_compression']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Face Detection</label>
				<input type="text" class="form-control" id="face_detection" name="face_detection" value="<?php echo isset($item_details['face_detection'])?$item_details['face_detection']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Video Format</label>
				<input type="text" class="form-control" id="video_format" name="video_format" value="<?php echo isset($item_details['video_format'])?$item_details['video_format']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Image Format</label>
				<input type="text" class="form-control" id="image_format" name="image_format" value="<?php echo isset($item_details['image_format'])?$item_details['image_format']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Microphone</label>
				<input type="text" class="form-control" id="microphone" name="microphone" value="<?php echo isset($item_details['microphone'])?$item_details['microphone']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">PictBridge</label>
				<input type="text" class="form-control" id="pictbridge" name="pictbridge" value="<?php echo isset($item_details['pictbridge'])?$item_details['pictbridge']:''; ?>" >
			</div>
		</div>
	</div>
	 <div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Memory</label>
	
	</div><br>
	
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Memory Card Type</label>
				<input type="text" class="form-control" id="card_type" name="card_type" value="<?php echo isset($item_details['card_type'])?$item_details['card_type']:''; ?>" >
			</div>
		</div>
	</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Power Source</label>
	
	</div><br>
	
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Supplied Battery</label>
				<input type="text" class="form-control" id="supplied_battery" name="supplied_battery" value="<?php echo isset($item_details['supplied_battery'])?$item_details['supplied_battery']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">AC Adapter</label>
				<input type="text" class="form-control" id="ac_adapter" name="ac_adapter" value="<?php echo isset($item_details['ac_adapter'])?$item_details['ac_adapter']:''; ?>" >
			</div>
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
				 <label for="exampleInputEmail1">ISO Rating</label>
				<input type="text" class="form-control" id="iso_rating" name="iso_rating" value="<?php echo isset($item_details['iso_rating'])?$item_details['iso_rating']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">ISO Sensitivity</label>
				<input type="text" class="form-control" id="iso_sensitivity" name="iso_sensitivity" value="<?php echo isset($item_details['iso_sensitivity'])?$item_details['iso_sensitivity']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Dust Reduction</label>
				<input type="text" class="form-control" id="dust_reduction" name="dust_reduction" value="<?php echo isset($item_details['dust_reduction'])?$item_details['dust_reduction']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Metering Method</label>
				<input type="text" class="form-control" id="metering_method" name="metering_method" value="<?php echo isset($item_details['metering_method'])?$item_details['metering_method']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Metering System</label>
				<input type="text" class="form-control" id="metering_system" name="metering_system" value="<?php echo isset($item_details['metering_system'])?$item_details['metering_system']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Supported Languages</label>
				<input type="text" class="form-control" id="supported_languages" name="supported_languages" value="<?php echo isset($item_details['supported_languages'])?$item_details['supported_languages']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Sync Terminal</label>
				<input type="text" class="form-control" id="sync_terminal" name="sync_terminal" value="<?php echo isset($item_details['sync_terminal'])?$item_details['sync_terminal']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">View finder</label>
				<input type="text" class="form-control" id="view_finder" name="view_finder" value="<?php echo isset($item_details['view_finder'])?$item_details['view_finder']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">White Balancing</label>
				<input type="text" class="form-control" id="white_balancing" name="white_balancing" value="<?php echo isset($item_details['white_balancing'])?$item_details['white_balancing']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">HDMI</label>
				<input type="text" class="form-control" id="hdmi" name="hdmi" value="<?php echo isset($item_details['hdmi'])?$item_details['hdmi']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Self Timer</label>
				<input type="text" class="form-control" id="self_timer" name="self_timer" value="<?php echo isset($item_details['self_timer'])?$item_details['self_timer']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Scene Modes</label>
				<input type="text" class="form-control" id="scene_modes" name="scene_modes" value="<?php echo isset($item_details['scene_modes'])?$item_details['scene_modes']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Operating Environment</label>
				<input type="text" class="form-control" id="environment" name="environment" value="<?php echo isset($item_details['environment'])?$item_details['environment']:''; ?>" >
			</div>
		</div>
	</div>
	
	
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Dimensions & Weight</label>
	
	</div><br>
	
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Weight (With Battery & Memory Stick)</label>
				<input type="text" class="form-control" id="weight" name="weight" value="<?php echo isset($item_details['weight'])?$item_details['weight']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Dimension</label>
				<input type="text" class="form-control" id="dimension" name="dimension" value="<?php echo isset($item_details['dimension'])?$item_details['dimension']:''; ?>" >
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



<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-6 nopadding"><div class="form-group"> <textarea type="text" class="form-control" id="description" name="description[]" value="" placeholder="description"></textarea></div></div><div class="col-sm-6 nopadding"><div class="form-group"><div class="input-group">  <input type="file" class="form-control" id="descimg" name="descimg[]"><div class="input-group-btn"> <button class="btn btn-danger pad_btn" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
$(document).ready(function() {

    $('#addproduct').bootstrapValidator({
       
        fields: {
            category_id: {
					validators: {
					notEmpty: {
					message: 'Please select a category'
					}
				}
			},
			subcategorylist: {
					validators: {
					notEmpty: {
					message: 'Please select a subcategory'
					}
				}
			},
		
			
			product_name: {
					validators: {
					notEmpty: {
						message: 'Product name is required'
					}
                  
				}
			},
			'description[]': {
					validators: {
					notEmpty: {
						message: 'Description is required'
					}
				}
			},
			picture1: {
					validators: {
					notEmpty: {
						message: 'Images1 is required'
					},
                   regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			product_price: {
					validators: {
					notEmpty: {
						message: 'Price is required'
					},
                   regexp: {
					regexp: /^[0-9.,]+$/,
					message: 'Price  can only consist of digits'
					}
				}
			},
			special_price: {
					validators: {
						notEmpty: {
						message: 'Special Price is required'
					},
                    between: {
                            min: 1,
                            max: 'product_price',
                            message: 'Special price must be less than or equal to price'
                        }
                }
			}
			
		
        }
    });
});
</script>

	



		