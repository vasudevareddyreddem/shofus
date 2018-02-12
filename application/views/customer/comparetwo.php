 <?php 
 $currentdate=date('Y-m-d h:i:s A');
				if($compare_one['offer_expairdate']>=$currentdate){
				$item_price= ($compare_one['item_cost']-$compare_one['offer_amount']);
				$percentage= $compare_one['offer_percentage'];
				$orginal_price=$compare_one['item_cost'];
				}else{
					//echo "expired";
					$item_price= $compare_one['special_price'];
					$prices= ($compare_one['item_cost']-$compare_one['special_price']);
					$percentage= (($prices) /$compare_one['item_cost'])*100;
					$orginal_price=$compare_one['item_cost'];
				}  ?>
 <div class="panel panel-default panel-pricing">
 
		<div class="panel-heading">
		<i style="position:absolute;right:36px;top:0;font-size:18px;background:#fff;border-radius:50%;padding:5px;" onclick="removefunction2('compare_items2','<?php echo $compare_one['item_id']; ?>');" class="fa fa-times" aria-hidden="true"></i>
			<div class="clearfix"></div>
			<a href="<?php echo base_url('category/productview/'.base64_encode($compare_one['item_id']));?>">
			<img style="height:200px;width:auto;margin: 0 auto;" class="img-responsive" src="<?php echo base_url('uploads/products/'.$compare_one['item_image']); ?>">
		</div>
		<ul class="list-group text-center">
			<li class="list-group-item">Product Name:
				<?php echo $compare_one[ 'item_name'];?>
			</li>
			<li class="list-group-item">Product Price:
				<?php echo number_format($item_price, 2); ?>
			</li>
			<li class="list-group-item">Product Code :
                        <?php echo $compare_one[ 'product_code']; ?>
                    </li>
					<li class="list-group-item">brand :
                        <?php echo $compare_one[ 'brand']; ?>
                    </li>
					<?php if(isset($compare_one['Processor']) && $compare_one['Processor']!=''){ ?>
					 <li class="list-group-item">Processor :
                        <?php echo $compare_one['Processor']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['screen_size']) && $compare_one['screen_size']!=''){ ?>
					 <li class="list-group-item">screen size :
                        <?php echo $compare_one['screen_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['internal_memeory']) && $compare_one['internal_memeory']!=''){ ?>
					 <li class="list-group-item">Internal memeory :
                        <?php echo $compare_one['internal_memeory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['camera']) && $compare_one['camera']!=''){ ?>
					 <li class="list-group-item">camera :
                        <?php echo $compare_one['camera']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sim_type']) && $compare_one['sim_type']!=''){ ?>
					 <li class="list-group-item">Sim type :
                        <?php echo $compare_one['sim_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['os']) && $compare_one['os']!=''){ ?>
					 <li class="list-group-item">OS :
                        <?php echo $compare_one['os']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['colour']) && $compare_one['colour']!=''){ ?>
					 <li class="list-group-item">Colour :
                        <?php echo $compare_one['colour']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['ram']) && $compare_one['ram']!=''){ ?>
					 <li class="list-group-item">Ram :
                        <?php echo $compare_one['ram']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['model_name']) && $compare_one['model_name']!=''){ ?>
					 <li class="list-group-item">Model name :
                        <?php echo $compare_one['model_name']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['model_id']) && $compare_one['model_id']!=''){ ?>
					 <li class="list-group-item">Model Id :
                        <?php echo $compare_one['model_id']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['expand_memory']) && $compare_one['expand_memory']!=''){ ?>
					 <li class="list-group-item">Expand memory : 
                        <?php echo $compare_one['expand_memory']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['primary_camera']) && $compare_one['primary_camera']!=''){ ?>
					 <li class="list-group-item">Primary camera :
                        <?php echo $compare_one['primary_camera']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['primary_camera_feature']) && $compare_one['primary_camera_feature']!=''){ ?>
					 <li class="list-group-item">Primary camera feature :
                        <?php echo $compare_one['primary_camera_feature']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['secondary_camera']) && $compare_one['secondary_camera']!=''){ ?>
					 <li class="list-group-item">Secondary camera :
                        <?php echo $compare_one['secondary_camera']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['secondary_camera_feature']) && $compare_one['secondary_camera_feature']!=''){ ?>
					 <li class="list-group-item">Secondary camera feature :
                        <?php echo $compare_one['secondary_camera_feature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['video_recording']) && $compare_one['video_recording']!=''){ ?>
					 <li class="list-group-item">Video recording :
                        <?php echo $compare_one['video_recording']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['hd_recording']) && $compare_one['hd_recording']!=''){ ?>
					 <li class="list-group-item">Hd recording :
                        <?php echo $compare_one['hd_recording']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['flash']) && $compare_one['flash']!=''){ ?>
					 <li class="list-group-item">Flash :
                        <?php echo $compare_one['flash']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['other_camera_features']) && $compare_one['other_camera_features']!=''){ ?>
					 <li class="list-group-item">Other camera features :
                        <?php echo $compare_one['other_camera_features']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['battery_capacity']) && $compare_one['battery_capacity']!=''){ ?>
					 <li class="list-group-item">Battery capacity :
                        <?php echo $compare_one['battery_capacity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['talk_time']) && $compare_one['talk_time']!=''){ ?>
					 <li class="list-group-item">Talk time :
                        <?php echo $compare_one['talk_time']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['standby_time']) && $compare_one['standby_time']!=''){ ?>
					 <li class="list-group-item">Standby time :
                        <?php echo $compare_one['standby_time']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['operating_frequency']) && $compare_one['operating_frequency']!=''){ ?>
					 <li class="list-group-item">Operating frequency :
                        <?php echo $compare_one['operating_frequency']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['preinstalled_browser']) && $compare_one['preinstalled_browser']!=''){ ?>
					 <li class="list-group-item">preinstalled browser :
                        <?php echo $compare_one['preinstalled_browser']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['2g']) && $compare_one['2g']!=''){ ?>
					 <li class="list-group-item">2g :
                        <?php echo $compare_one['2g']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['3g']) && $compare_one['3g']!=''){ ?>
					 <li class="list-group-item">3g :
                        <?php echo $compare_one['3g']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['4g']) && $compare_one['4g']!=''){ ?>
					 <li class="list-group-item">4g :
                        <?php echo $compare_one['4g']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['wifi']) && $compare_one['wifi']!=''){ ?>
					 <li class="list-group-item">Wifi :
                        <?php echo $compare_one['wifi']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['gps']) && $compare_one['gps']!=''){ ?>
					 <li class="list-group-item">Gps :
                        <?php echo $compare_one['gps']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['edge']) && $compare_one['edge']!=''){ ?>
					 <li class="list-group-item">Edge :
                        <?php echo $compare_one['edge']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['edge_features']) && $compare_one['edge_features']!=''){ ?>
					 <li class="list-group-item">Edge Features :
                        <?php echo $compare_one['edge_features']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['bluetooth']) && $compare_one['bluetooth']!=''){ ?>
					 <li class="list-group-item">Bluetooth :
                        <?php echo $compare_one['bluetooth']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['nfc']) && $compare_one['nfc']!=''){ ?>
					 <li class="list-group-item">NFC :
                        <?php echo $compare_one['nfc']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['usb_connectivity']) && $compare_one['usb_connectivity']!=''){ ?>
					 <li class="list-group-item">USB Connectivity :
                        <?php echo $compare_one['usb_connectivity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['music_player']) && $compare_one['music_player']!=''){ ?>
					 <li class="list-group-item">Music player :
                        <?php echo $compare_one['music_player']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['video_player']) && $compare_one['video_player']!=''){ ?>
					 <li class="list-group-item">Video player :
                        <?php echo $compare_one['video_player']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['audio_jack']) && $compare_one['audio_jack']!=''){ ?>
					 <li class="list-group-item">Audio jack :
                        <?php echo $compare_one['audio_jack']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['gpu']) && $compare_one['gpu']!=''){ ?>
					 <li class="list-group-item">GPU :
                        <?php echo $compare_one['gpu']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sim_size']) && $compare_one['sim_size']!=''){ ?>
					 <li class="list-group-item">Sim size :
                        <?php echo $compare_one['sim_size']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compare_one['sim_supported']) && $compare_one['sim_supported']!=''){ ?>
					 <li class="list-group-item">Sim Supportede :
                        <?php echo $compare_one['sim_supported']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['call_memory']) && $compare_one['call_memory']!=''){ ?>
					 <li class="list-group-item">Call memory :
                        <?php echo $compare_one['call_memory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sms_memory']) && $compare_one['sms_memory']!=''){ ?>
					 <li class="list-group-item">SMS memory :
                        <?php echo $compare_one['sms_memory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['phone_book_memory']) && $compare_one['phone_book_memory']!=''){ ?>
					 <li class="list-group-item">phone book memory :
                        <?php echo $compare_one['phone_book_memory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sensors']) && $compare_one['sensors']!=''){ ?>
					 <li class="list-group-item">Sensors :
                        <?php echo $compare_one['sensors']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['java']) && $compare_one['java']!=''){ ?>
					 <li class="list-group-item">Java :
                        <?php echo $compare_one['java']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['insales_package']) && $compare_one['insales_package']!=''){ ?>
					 <li class="list-group-item">Insales Package :
                        <?php echo $compare_one['insales_package']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['dislay_resolution']) && $compare_one['dislay_resolution']!=''){ ?>
					 <li class="list-group-item">Dislay Resolution :
                        <?php echo $compare_one['dislay_resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['display_type']) && $compare_one['display_type']!=''){ ?>
					 <li class="list-group-item">Display Type :
                        <?php echo $compare_one['display_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['colour']) && $compare_one['colour']!=''){ ?>
					 <li class="list-group-item">Display Type :
                        <?php echo $compare_one['colour']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['ingredients']) && $compare_one['ingredients']!=''){ ?>
					 <li class="list-group-item">Ingredients :
                        <?php echo $compare_one['ingredients']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['key_feature']) && $compare_one['key_feature']!=''){ ?>
					 <li class="list-group-item">Key Features :
                        <?php echo $compare_one['key_feature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['unit']) && $compare_one['unit']!=''){ ?>
					 <li class="list-group-item">Unit :
                        <?php echo $compare_one['unit']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['packingtype']) && $compare_one['packingtype']!=''){ ?>
					 <li class="list-group-item">Packaging Type :
                        <?php echo $compare_one['packingtype']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['disclaimer']) && $compare_one['disclaimer']!=''){ ?>
					 <li class="list-group-item">Disclaimer :
                        <?php echo $compare_one['disclaimer']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['wash_care']) && $compare_one['wash_care']!=''){ ?>
					 <li class="list-group-item">Wash care :
                        <?php echo $compare_one['wash_care']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['style_code']) && $compare_one['style_code']!=''){ ?>
					 <li class="list-group-item">Style code :
                        <?php echo $compare_one['style_code']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['look']) && $compare_one['look']!=''){ ?>
					 <li class="list-group-item">Look :
                        <?php echo $compare_one['look']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['size']) && $compare_one['size']!=''){ ?>
					 <li class="list-group-item">Size :
                        <?php echo $compare_one['size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['material']) && $compare_one['material']!=''){ ?>
					 <li class="list-group-item">Material :
                        <?php echo $compare_one['material']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['occasion']) && $compare_one['occasion']!=''){ ?>
					 <li class="list-group-item">Occasion :
                        <?php echo $compare_one['occasion']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['pattern']) && $compare_one['pattern']!=''){ ?>
					 <li class="list-group-item">Pattern :
                        <?php echo $compare_one['pattern']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sleeve']) && $compare_one['sleeve']!=''){ ?>
					 <li class="list-group-item">Sleeve :
                        <?php echo $compare_one['sleeve']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['fit']) && $compare_one['fit']!=''){ ?>
					 <li class="list-group-item">Fit :
                        <?php echo $compare_one['fit']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['gender']) && $compare_one['gender']!=''){ ?>
					 <li class="list-group-item">Gender :
                        <?php echo $compare_one['gender']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['collar_type']) && $compare_one['collar_type']!=''){ ?>
					 <li class="list-group-item">Collar Type :
                        <?php echo $compare_one['collar_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['set_contents']) && $compare_one['set_contents']!=''){ ?>
					 <li class="list-group-item">Set Contents :
                        <?php echo $compare_one['set_contents']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['type']) && $compare_one['type']!=''){ ?>
					 <li class="list-group-item">Type :
                        <?php echo $compare_one['type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['neck_type']) && $compare_one['neck_type']!=''){ ?>
					 <li class="list-group-item">Neck type :
                        <?php echo $compare_one['neck_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['package_contents']) && $compare_one['package_contents']!=''){ ?>
					 <li class="list-group-item">Package Contents :
                        <?php echo $compare_one['package_contents']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['style']) && $compare_one['style']!=''){ ?>
					 <li class="list-group-item">Style :
                        <?php echo $compare_one['style']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['age']) && $compare_one['age']!=''){ ?>
					 <li class="list-group-item">Age :
                        <?php echo $compare_one['age']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['ideal_for']) && $compare_one['ideal_for']!=''){ ?>
					 <li class="list-group-item">Ideal for :
                        <?php echo $compare_one['ideal_for']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['blouse_length']) && $compare_one['blouse_length']!=''){ ?>
					 <li class="list-group-item">Blouse length :
                        <?php echo $compare_one['blouse_length']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['saree_length']) && $compare_one['saree_length']!=''){ ?>
					 <li class="list-group-item">Saree length :
                        <?php echo $compare_one['saree_length']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['pockets']) && $compare_one['pockets']!=''){ ?>
					 <li class="list-group-item">Pockets :
                        <?php echo $compare_one['pockets']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['length']) && $compare_one['length']!=''){ ?>
					 <li class="list-group-item">Length :
                        <?php echo $compare_one['length']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['waterproof']) && $compare_one['waterproof']!=''){ ?>
					 <li class="list-group-item">Waterproof :
                        <?php echo $compare_one['waterproof']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['laptop_compartment']) && $compare_one['laptop_compartment']!=''){ ?>
					 <li class="list-group-item">Laptop Compartment :
                        <?php echo $compare_one['laptop_compartment']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['closure']) && $compare_one['closure']!=''){ ?>
					 <li class="list-group-item">Closure :
                        <?php echo $compare_one['closure']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['wheels']) && $compare_one['wheels']!=''){ ?>
					 <li class="list-group-item">Wheels :
                        <?php echo $compare_one['wheels']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['no_of_pockets']) && $compare_one['no_of_pockets']!=''){ ?>
					 <li class="list-group-item">No Of Pockets :
                        <?php echo $compare_one['no_of_pockets']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['inner_material']) && $compare_one['inner_material']!=''){ ?>
					 <li class="list-group-item">Inner Material :
                        <?php echo $compare_one['inner_material']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['product_dimension']) && $compare_one['product_dimension']!=''){ ?>
					 <li class="list-group-item">Product Dimension :
                        <?php echo $compare_one['product_dimension']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['usage']) && $compare_one['usage']!=''){ ?>
					 <li class="list-group-item">Usage :
                        <?php echo $compare_one['usage']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['part_number']) && $compare_one['part_number']!=''){ ?>
					 <li class="list-group-item">Part Number :
                        <?php echo $compare_one['part_number']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['series']) && $compare_one['series']!=''){ ?>
					 <li class="list-group-item">Series :
                        <?php echo $compare_one['series']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['os']) && $compare_one['os']!=''){ ?>
					 <li class="list-group-item">Operating System :
                        <?php echo $compare_one['os']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['hdd_capacity']) && $compare_one['hdd_capacity']!=''){ ?>
					 <li class="list-group-item">HDD Capacity :
                        <?php echo $compare_one['hdd_capacity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['processorbrand']) && $compare_one['processorbrand']!=''){ ?>
					 <li class="list-group-item">Processor Brand :
                        <?php echo $compare_one['processorbrand']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['variant']) && $compare_one['variant']!=''){ ?>
					 <li class="list-group-item">Variant :
                        <?php echo $compare_one['variant']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['chipset']) && $compare_one['chipset']!=''){ ?>
					 <li class="list-group-item">Chipset :
                        <?php echo $compare_one['chipset']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['clock_speed']) && $compare_one['clock_speed']!=''){ ?>
					 <li class="list-group-item">Clock Speed :
                        <?php echo $compare_one['clock_speed']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['cache']) && $compare_one['cache']!=''){ ?>
					 <li class="list-group-item">Cache :
                        <?php echo $compare_one['cache']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['screen_type']) && $compare_one['screen_type']!=''){ ?>
					 <li class="list-group-item">Screen Type :
                        <?php echo $compare_one['screen_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['resolution']) && $compare_one['resolution']!=''){ ?>
					 <li class="list-group-item">Resolution :
                        <?php echo $compare_one['resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['graphic_processor']) && $compare_one['graphic_processor']!=''){ ?>
					 <li class="list-group-item">Graphic Processor :
                        <?php echo $compare_one['graphic_processor']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['memory_slots']) && $compare_one['memory_slots']!=''){ ?>
					 <li class="list-group-item">Memory Slots :
                        <?php echo $compare_one['memory_slots']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['hdd_capacitys']) && $compare_one['hdd_capacitys']!=''){ ?>
					 <li class="list-group-item">HDD Capacity :
                        <?php echo $compare_one['hdd_capacitys']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['rpm']) && $compare_one['rpm']!=''){ ?>
					 <li class="list-group-item">rpm :
                        <?php echo $compare_one['rpm']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['optical_drive']) && $compare_one['optical_drive']!=''){ ?>
					 <li class="list-group-item">Optical Drive :
                        <?php echo $compare_one['optical_drive']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['wan']) && $compare_one['wan']!=''){ ?>
					 <li class="list-group-item">Wireless WAN :
                        <?php echo $compare_one['wan']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['ethernet']) && $compare_one['ethernet']!=''){ ?>
					 <li class="list-group-item">Ethernet :
                        <?php echo $compare_one['ethernet']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['vgaport']) && $compare_one['vgaport']!=''){ ?>
					 <li class="list-group-item">VGA Port :
                        <?php echo $compare_one['vgaport']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['usb_port']) && $compare_one['usb_port']!=''){ ?>
					 <li class="list-group-item">USB Port :
                        <?php echo $compare_one['usb_port']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['hdmi_port']) && $compare_one['hdmi_port']!=''){ ?>
					 <li class="list-group-item">HDMI Port :
                        <?php echo $compare_one['hdmi_port']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['multi_card_slot']) && $compare_one['multi_card_slot']!=''){ ?>
					 <li class="list-group-item">Multi Card Slot :
                        <?php echo $compare_one['multi_card_slot']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['web_camera']) && $compare_one['web_camera']!=''){ ?>
					 <li class="list-group-item">Web Camera :
                        <?php echo $compare_one['web_camera']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['keyboard']) && $compare_one['keyboard']!=''){ ?>
					 <li class="list-group-item">keyboard :
                        <?php echo $compare_one['keyboard']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['speakers']) && $compare_one['speakers']!=''){ ?>
					 <li class="list-group-item">Speakers :
                        <?php echo $compare_one['speakers']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['mic_in']) && $compare_one['mic_in']!=''){ ?>
					 <li class="list-group-item">Mic In :
                        <?php echo $compare_one['mic_in']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['power_supply']) && $compare_one['power_supply']!=''){ ?>
					 <li class="list-group-item">Power Supply :
                        <?php echo $compare_one['power_supply']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['battery_backup']) && $compare_one['battery_backup']!=''){ ?>
					 <li class="list-group-item">Battery Backup :
                        <?php echo $compare_one['battery_backup']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['battery_cell']) && $compare_one['battery_cell']!=''){ ?>
					 <li class="list-group-item">Battery Cell :
                        <?php echo $compare_one['battery_cell']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['dimension']) && $compare_one['dimension']!=''){ ?>
					 <li class="list-group-item">Dimension :
                        <?php echo $compare_one['dimension']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['weight']) && $compare_one['weight']!=''){ ?>
					 <li class="list-group-item">Weight :
                        <?php echo $compare_one['weight']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['adapter']) && $compare_one['adapter']!=''){ ?>
					 <li class="list-group-item">Adapter :
                        <?php echo $compare_one['adapter']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['office']) && $compare_one['office']!=''){ ?>
					 <li class="list-group-item">Office :
                        <?php echo $compare_one['office']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['fingerprint_point']) && $compare_one['fingerprint_point']!=''){ ?>
					 <li class="list-group-item">Fingerprint Point :
                        <?php echo $compare_one['fingerprint_point']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['noise_reduction']) && $compare_one['noise_reduction']!=''){ ?>
					 <li class="list-group-item">Noise Reduction :
                        <?php echo $compare_one['noise_reduction']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['connectivity']) && $compare_one['connectivity']!=''){ ?>
					 <li class="list-group-item">Connectivity :
                        <?php echo $compare_one['connectivity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['headphone_jack']) && $compare_one['headphone_jack']!=''){ ?>
					 <li class="list-group-item">Headphone jack :
                        <?php echo $compare_one['headphone_jack']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['compatible_for']) && $compare_one['compatible_for']!=''){ ?>
					 <li class="list-group-item">Compatible for :
                        <?php echo $compare_one['compatible_for']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['total_power_output']) && $compare_one['total_power_output']!=''){ ?>
					 <li class="list-group-item">Total Power Output :
                        <?php echo $compare_one['total_power_output']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sound_system']) && $compare_one['sound_system']!=''){ ?>
					 <li class="list-group-item">Sound System :
                        <?php echo $compare_one['sound_system']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['speaker_driver']) && $compare_one['speaker_driver']!=''){ ?>
					 <li class="list-group-item">Speaker Driver :
                        <?php echo $compare_one['speaker_driver']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['power']) && $compare_one['power']!=''){ ?>
					 <li class="list-group-item">Power :
                        <?php echo $compare_one['power']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['wired_wireless']) && $compare_one['wired_wireless']!=''){ ?>
					 <li class="list-group-item">Wired Wireless :
                        <?php echo $compare_one['wired_wireless']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['bluetooth_range']) && $compare_one['bluetooth_range']!=''){ ?>
					 <li class="list-group-item">Bluetooth Range :
                        <?php echo $compare_one['bluetooth_range']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['model_series']) && $compare_one['model_series']!=''){ ?>
					 <li class="list-group-item">Model Series :
                        <?php echo $compare_one['model_series']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['installation']) && $compare_one['installation']!=''){ ?>
					 <li class="list-group-item">Installation :
                        <?php echo $compare_one['installation']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['warranty_card']) && $compare_one['warranty_card']!=''){ ?>
					 <li class="list-group-item">Warranty Card :
                        <?php echo $compare_one['warranty_card']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['functions']) && $compare_one['functions']!=''){ ?>
					 <li class="list-group-item">Functions :
                        <?php echo $compare_one['functions']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['printer_type']) && $compare_one['printer_type']!=''){ ?>
					 <li class="list-group-item">Printer Type :
                        <?php echo $compare_one['printer_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['interface']) && $compare_one['interface']!=''){ ?>
					 <li class="list-group-item">Interface :
                        <?php echo $compare_one['interface']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['printer_output']) && $compare_one['printer_output']!=''){ ?>
					 <li class="list-group-item">Printer Output :
                        <?php echo $compare_one['printer_output']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['max_print_resolution']) && $compare_one['max_print_resolution']!=''){ ?>
					 <li class="list-group-item">Maximum Print Resolution :
                        <?php echo $compare_one['max_print_resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['print_speed']) && $compare_one['print_speed']!=''){ ?>
					 <li class="list-group-item">Print Speed :
                        <?php echo $compare_one['print_speed']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['scanner_type']) && $compare_one['scanner_type']!=''){ ?>
					 <li class="list-group-item">Scanner Type :
                        <?php echo $compare_one['scanner_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['document_size']) && $compare_one['document_size']!=''){ ?>
					 <li class="list-group-item">Document Size :
                        <?php echo $compare_one['document_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['scanning_resolution']) && $compare_one['scanning_resolution']!=''){ ?>
					 <li class="list-group-item">Scanning Resolution :
                        <?php echo $compare_one['scanning_resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['copies_from']) && $compare_one['copies_from']!=''){ ?>
					 <li class="list-group-item">Maximum Copies From Standalone :
                        <?php echo $compare_one['copies_from']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['copy_size']) && $compare_one['copy_size']!=''){ ?>
					 <li class="list-group-item">Maximum Copy Size :
                        <?php echo $compare_one['copy_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['iso_29183']) && $compare_one['iso_29183']!=''){ ?>
					 <li class="list-group-item">ISO 29183, A4, Simplex :
                        <?php echo $compare_one['iso_29183']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['noise_level']) && $compare_one['noise_level']!=''){ ?>
					 <li class="list-group-item">Noise Level :
                        <?php echo $compare_one['noise_level']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['paper_hold_input']) && $compare_one['paper_hold_input']!=''){ ?>
					 <li class="list-group-item">Paper Hold Input Capacity :
                        <?php echo $compare_one['paper_hold_input']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['paper_hold_output']) && $compare_one['paper_hold_output']!=''){ ?>
					 <li class="list-group-item">Paper Hold OutPut Capacity :
                        <?php echo $compare_one['paper_hold_output']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['paper_size']) && $compare_one['paper_size']!=''){ ?>
					 <li class="list-group-item">Paper Size :
                        <?php echo $compare_one['paper_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['print_margin']) && $compare_one['print_margin']!=''){ ?>
					 <li class="list-group-item">Print Margin :
                        <?php echo $compare_one['print_margin']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['standby']) && $compare_one['standby']!=''){ ?>
					 <li class="list-group-item">Standby :
                        <?php echo $compare_one['standby']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['operating_temperature_range']) && $compare_one['operating_temperature_range']!=''){ ?>
					 <li class="list-group-item">Operating Temperature Range :
                        <?php echo $compare_one['operating_temperature_range']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['frequency']) && $compare_one['frequency']!=''){ ?>
					 <li class="list-group-item">Frequency :
                        <?php echo $compare_one['frequency']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['sole_material']) && $compare_one['sole_material']!=''){ ?>
					 <li class="list-group-item">Sole Material :
                        <?php echo $compare_one['sole_material']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['fastening']) && $compare_one['fastening']!=''){ ?>
					 <li class="list-group-item">Fastening :
                        <?php echo $compare_one['fastening']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['toe_shape']) && $compare_one['toe_shape']!=''){ ?>
					 <li class="list-group-item">Toe Shape :
                        <?php echo $compare_one['toe_shape']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['ean_upc']) && $compare_one['ean_upc']!=''){ ?>
					 <li class="list-group-item">Ean Upc :
                        <?php echo $compare_one['ean_upc']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['factor']) && $compare_one['factor']!=''){ ?>
					 <li class="list-group-item">Factor :
                        <?php echo $compare_one['factor']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['connector1']) && $compare_one['connector1']!=''){ ?>
					 <li class="list-group-item">Connector 1 :
                        <?php echo $compare_one['connector1']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['connector2']) && $compare_one['connector2']!=''){ ?>
					 <li class="list-group-item">Connector 2 :
                        <?php echo $compare_one['connector2']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['portable']) && $compare_one['portable']!=''){ ?>
					 <li class="list-group-item">Connector 2 :
                        <?php echo $compare_one['portable']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['maximumbrightness']) && $compare_one['maximumbrightness']!=''){ ?>
					 <li class="list-group-item">Maximum Brightness :
                        <?php echo $compare_one['maximumbrightness']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['projectionratio']) && $compare_one['projectionratio']!=''){ ?>
					 <li class="list-group-item">Projection Ratio 1 :
                        <?php echo $compare_one['projectionratio']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['contrastratio']) && $compare_one['contrastratio']!=''){ ?>
					 <li class="list-group-item">Contrast Ratio :
                        <?php echo $compare_one['contrastratio']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['outputperspeaker']) && $compare_one['outputperspeaker']!=''){ ?>
					 <li class="list-group-item">Output Per Speaker :
                        <?php echo $compare_one['outputperspeaker']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['powersupply']) && $compare_one['powersupply']!=''){ ?>
					 <li class="list-group-item">Power Supply :
                        <?php echo $compare_one['powersupply']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['powerconsumption']) && $compare_one['powerconsumption']!=''){ ?>
					 <li class="list-group-item">Power Consumption :
                        <?php echo $compare_one['powerconsumption']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['minopertingtemperature']) && $compare_one['minopertingtemperature']!=''){ ?>
					 <li class="list-group-item">Minimum Operating Temperature :
                        <?php echo $compare_one['minopertingtemperature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['maxopertingtemperature']) && $compare_one['maxopertingtemperature']!=''){ ?>
					 <li class="list-group-item">Maximum Operting Temperature :
                        <?php echo $compare_one['maxopertingtemperature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['remotecontrol']) && $compare_one['remotecontrol']!=''){ ?>
					 <li class="list-group-item">Remote Control :
                        <?php echo $compare_one['remotecontrol']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['voltagerange']) && $compare_one['voltagerange']!=''){ ?>
					 <li class="list-group-item">Voltage Range :
                        <?php echo $compare_one['voltagerange']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['turbospeed']) && $compare_one['turbospeed']!=''){ ?>
					 <li class="list-group-item">Maximum Turbo Speed :
                        <?php echo $compare_one['turbospeed']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['graphics']) && $compare_one['graphics']!=''){ ?>
					 <li class="list-group-item">Integrated Graphics :
                        <?php echo $compare_one['graphics']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['capacity']) && $compare_one['capacity']!=''){ ?>
					 <li class="list-group-item">Integrated Graphics :
                        <?php echo $compare_one['capacity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['datarate']) && $compare_one['datarate']!=''){ ?>
					 <li class="list-group-item">Data Rate :
                        <?php echo $compare_one['datarate']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['technology']) && $compare_one['technology']!=''){ ?>
					 <li class="list-group-item">Technology :
                        <?php echo $compare_one['technology']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['externaldrivebays']) && $compare_one['externaldrivebays']!=''){ ?>
					 <li class="list-group-item">External Drive Bays :
                        <?php echo $compare_one['externaldrivebays']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['internaldrivebays']) && $compare_one['internaldrivebays']!=''){ ?>
					 <li class="list-group-item">Internal Drive Bays :
                        <?php echo $compare_one['internaldrivebays']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compare_one['micport']) && $compare_one['micport']!=''){ ?>
					 <li class="list-group-item">Front USB / Mic Port :
                        <?php echo $compare_one['micport']; ?>
                     </li>
					  <?php } ?>
			
			</a>
			

		</ul>

</div>

<script>
function removefunction2(id,itemid){
	$('#'+id).hide();
	$('#item_hide2').show();
	$("#item_idtwo").val('');
	$("#"+itemid).prop("disabled", false);
	document.getElementById("item_idtwo").selectedIndex = 0;
	
}
</script>
     



	