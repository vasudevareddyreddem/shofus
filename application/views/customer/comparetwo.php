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
     



	