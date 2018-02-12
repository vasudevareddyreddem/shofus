
<html lang="en">
<style>
.col-md-3{
	padding-left:0px;
	padding-right:0px;
}

.panel-pricing {
  -moz-transition: all .3s ease;
  -o-transition: all .3s ease;
  -webkit-transition: all .3s ease;
}
.panel-pricing:hover {
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
}
.panel-pricing .panel-heading {
  padding: 20px 10px;
}
.panel-pricing .panel-heading .fa {
  margin-top: 10px;
  font-size: 58px;
}
.panel-pricing .list-group-item {
  color: #777777;
  border-bottom: 1px solid rgba(250, 250, 250, 0.5);
}
.panel-pricing .list-group-item:last-child {
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px;
}
.panel-pricing .list-group-item:first-child {
  border-top-right-radius: 0px;
  border-top-left-radius: 0px;
}
.panel-pricing .panel-body {
  background-color: #f0f0f0;
  font-size: 40px;
  color: #777777;
  padding: 20px;
  margin: 0px;
}
/*.panel-heading span
{
    margin-top: -26px;
    font-size: 15px;
    margin-right: -12px;
}

.clickable {
    background: rgba(0, 0, 0, 0.15);
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
}*/


</style>
<!--wrapper start here -->
 
<div class="container" style="margin-top:20px">

  <div class="row">
    <div class="col-md-12">
      <div><h3>Compare Products</h3></div>
    </div>
  </div>
  <?php //echo '<pre>';print_r($compore_products);exit;

$currentdate=date('Y-m-d h:i:s A');
				if($compore_products['offer_expairdate']>=$currentdate){
				$item_price= ($compore_products['item_cost']-$compore_products['offer_amount']);
				$percentage= $compore_products['offer_percentage'];
				$orginal_price=$compore_products['item_cost'];
				}else{
					//echo "expired";
					$item_price= $compore_products['special_price'];
					$prices= ($compore_products['item_cost']-$compore_products['special_price']);
					$percentage= (($prices) /$compore_products['item_cost'])*100;
					$orginal_price=$compore_products['item_cost'];
				}  ?>

    <div class="row">
        <div class="col-md-3 text-center">
            <div class="panel panel-default panel-pricing">
                <a href="<?php echo base_url('category/productview/'.base64_encode($compore_products['item_id']));?>">
				<div class="panel-heading" >
				<div >
                    <img style="height:200px;width:auto;margin: 0 auto;" class="img-responsive" src="<?php echo base_url('uploads/products/'.$compore_products['item_image']); ?>">                   
                </div>
                </div>

                <ul class="list-group text-center">
									
					<li class="list-group-item">Product Name :
                        <?php echo $compore_products[ 'item_name'];?>
                    </li>
                    <li class="list-group-item">Product Price :
                        <?php echo number_format($item_price, 2); ?>
                    </li>
                    <li class="list-group-item">Product Code :
                        <?php echo $compore_products[ 'product_code']; ?>
                    </li>
					<li class="list-group-item">brand :
                        <?php echo $compore_products[ 'brand']; ?>
                    </li>
					<?php if(isset($compore_products['Processor']) && $compore_products['Processor']!=''){ ?>
					 <li class="list-group-item">Processor :
                        <?php echo $compore_products['Processor']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['screen_size']) && $compore_products['screen_size']!=''){ ?>
					 <li class="list-group-item">screen size :
                        <?php echo $compore_products['screen_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['internal_memeory']) && $compore_products['internal_memeory']!=''){ ?>
					 <li class="list-group-item">Internal memeory :
                        <?php echo $compore_products['internal_memeory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['camera']) && $compore_products['camera']!=''){ ?>
					 <li class="list-group-item">camera :
                        <?php echo $compore_products['camera']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sim_type']) && $compore_products['sim_type']!=''){ ?>
					 <li class="list-group-item">Sim type :
                        <?php echo $compore_products['sim_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['os']) && $compore_products['os']!=''){ ?>
					 <li class="list-group-item">OS :
                        <?php echo $compore_products['os']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['colour']) && $compore_products['colour']!=''){ ?>
					 <li class="list-group-item">Colour :
                        <?php echo $compore_products['colour']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['ram']) && $compore_products['ram']!=''){ ?>
					 <li class="list-group-item">Ram :
                        <?php echo $compore_products['ram']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['model_name']) && $compore_products['model_name']!=''){ ?>
					 <li class="list-group-item">Model name :
                        <?php echo $compore_products['model_name']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['model_id']) && $compore_products['model_id']!=''){ ?>
					 <li class="list-group-item">Model Id :
                        <?php echo $compore_products['model_id']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['expand_memory']) && $compore_products['expand_memory']!=''){ ?>
					 <li class="list-group-item">Expand memory : 
                        <?php echo $compore_products['expand_memory']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['primary_camera']) && $compore_products['primary_camera']!=''){ ?>
					 <li class="list-group-item">Primary camera :
                        <?php echo $compore_products['primary_camera']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['primary_camera_feature']) && $compore_products['primary_camera_feature']!=''){ ?>
					 <li class="list-group-item">Primary camera feature :
                        <?php echo $compore_products['primary_camera_feature']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['secondary_camera']) && $compore_products['secondary_camera']!=''){ ?>
					 <li class="list-group-item">Secondary camera :
                        <?php echo $compore_products['secondary_camera']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['secondary_camera_feature']) && $compore_products['secondary_camera_feature']!=''){ ?>
					 <li class="list-group-item">Secondary camera feature :
                        <?php echo $compore_products['secondary_camera_feature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['video_recording']) && $compore_products['video_recording']!=''){ ?>
					 <li class="list-group-item">Video recording :
                        <?php echo $compore_products['video_recording']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['hd_recording']) && $compore_products['hd_recording']!=''){ ?>
					 <li class="list-group-item">Hd recording :
                        <?php echo $compore_products['hd_recording']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['flash']) && $compore_products['flash']!=''){ ?>
					 <li class="list-group-item">Flash :
                        <?php echo $compore_products['flash']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['other_camera_features']) && $compore_products['other_camera_features']!=''){ ?>
					 <li class="list-group-item">Other camera features :
                        <?php echo $compore_products['other_camera_features']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['battery_capacity']) && $compore_products['battery_capacity']!=''){ ?>
					 <li class="list-group-item">Battery capacity :
                        <?php echo $compore_products['battery_capacity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['talk_time']) && $compore_products['talk_time']!=''){ ?>
					 <li class="list-group-item">Talk time :
                        <?php echo $compore_products['talk_time']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['standby_time']) && $compore_products['standby_time']!=''){ ?>
					 <li class="list-group-item">Standby time :
                        <?php echo $compore_products['standby_time']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['operating_frequency']) && $compore_products['operating_frequency']!=''){ ?>
					 <li class="list-group-item">Operating frequency :
                        <?php echo $compore_products['operating_frequency']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['preinstalled_browser']) && $compore_products['preinstalled_browser']!=''){ ?>
					 <li class="list-group-item">preinstalled browser :
                        <?php echo $compore_products['preinstalled_browser']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['2g']) && $compore_products['2g']!=''){ ?>
					 <li class="list-group-item">2g :
                        <?php echo $compore_products['2g']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['3g']) && $compore_products['3g']!=''){ ?>
					 <li class="list-group-item">3g :
                        <?php echo $compore_products['3g']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['4g']) && $compore_products['4g']!=''){ ?>
					 <li class="list-group-item">4g :
                        <?php echo $compore_products['4g']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['wifi']) && $compore_products['wifi']!=''){ ?>
					 <li class="list-group-item">Wifi :
                        <?php echo $compore_products['wifi']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['gps']) && $compore_products['gps']!=''){ ?>
					 <li class="list-group-item">Gps :
                        <?php echo $compore_products['gps']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['edge']) && $compore_products['edge']!=''){ ?>
					 <li class="list-group-item">Edge :
                        <?php echo $compore_products['edge']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['edge_features']) && $compore_products['edge_features']!=''){ ?>
					 <li class="list-group-item">Edge Features :
                        <?php echo $compore_products['edge_features']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['bluetooth']) && $compore_products['bluetooth']!=''){ ?>
					 <li class="list-group-item">Bluetooth :
                        <?php echo $compore_products['bluetooth']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['nfc']) && $compore_products['nfc']!=''){ ?>
					 <li class="list-group-item">NFC :
                        <?php echo $compore_products['nfc']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['usb_connectivity']) && $compore_products['usb_connectivity']!=''){ ?>
					 <li class="list-group-item">USB Connectivity :
                        <?php echo $compore_products['usb_connectivity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['music_player']) && $compore_products['music_player']!=''){ ?>
					 <li class="list-group-item">Music player :
                        <?php echo $compore_products['music_player']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['video_player']) && $compore_products['video_player']!=''){ ?>
					 <li class="list-group-item">Video player :
                        <?php echo $compore_products['video_player']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['audio_jack']) && $compore_products['audio_jack']!=''){ ?>
					 <li class="list-group-item">Audio jack :
                        <?php echo $compore_products['audio_jack']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['gpu']) && $compore_products['gpu']!=''){ ?>
					 <li class="list-group-item">GPU :
                        <?php echo $compore_products['gpu']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sim_size']) && $compore_products['sim_size']!=''){ ?>
					 <li class="list-group-item">Sim size :
                        <?php echo $compore_products['sim_size']; ?>
                     </li>
					  <?php } ?> 
					  <?php if(isset($compore_products['sim_supported']) && $compore_products['sim_supported']!=''){ ?>
					 <li class="list-group-item">Sim Supportede :
                        <?php echo $compore_products['sim_supported']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['call_memory']) && $compore_products['call_memory']!=''){ ?>
					 <li class="list-group-item">Call memory :
                        <?php echo $compore_products['call_memory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sms_memory']) && $compore_products['sms_memory']!=''){ ?>
					 <li class="list-group-item">SMS memory :
                        <?php echo $compore_products['sms_memory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['phone_book_memory']) && $compore_products['phone_book_memory']!=''){ ?>
					 <li class="list-group-item">phone book memory :
                        <?php echo $compore_products['phone_book_memory']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sensors']) && $compore_products['sensors']!=''){ ?>
					 <li class="list-group-item">Sensors :
                        <?php echo $compore_products['sensors']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['java']) && $compore_products['java']!=''){ ?>
					 <li class="list-group-item">Java :
                        <?php echo $compore_products['java']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['insales_package']) && $compore_products['insales_package']!=''){ ?>
					 <li class="list-group-item">Insales Package :
                        <?php echo $compore_products['insales_package']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['dislay_resolution']) && $compore_products['dislay_resolution']!=''){ ?>
					 <li class="list-group-item">Dislay Resolution :
                        <?php echo $compore_products['dislay_resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['display_type']) && $compore_products['display_type']!=''){ ?>
					 <li class="list-group-item">Display Type :
                        <?php echo $compore_products['display_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['ingredients']) && $compore_products['ingredients']!=''){ ?>
					 <li class="list-group-item">Ingredients :
                        <?php echo $compore_products['ingredients']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['key_feature']) && $compore_products['key_feature']!=''){ ?>
					 <li class="list-group-item">Key Features :
                        <?php echo $compore_products['key_feature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['unit']) && $compore_products['unit']!=''){ ?>
					 <li class="list-group-item">Unit :
                        <?php echo $compore_products['unit']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['packingtype']) && $compore_products['packingtype']!=''){ ?>
					 <li class="list-group-item">Packaging Type :
                        <?php echo $compore_products['packingtype']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['disclaimer']) && $compore_products['disclaimer']!=''){ ?>
					 <li class="list-group-item">Disclaimer :
                        <?php echo $compore_products['disclaimer']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['wash_care']) && $compore_products['wash_care']!=''){ ?>
					 <li class="list-group-item">Wash care :
                        <?php echo $compore_products['wash_care']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['style_code']) && $compore_products['style_code']!=''){ ?>
					 <li class="list-group-item">Style code :
                        <?php echo $compore_products['style_code']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['look']) && $compore_products['look']!=''){ ?>
					 <li class="list-group-item">Look :
                        <?php echo $compore_products['look']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['size']) && $compore_products['size']!=''){ ?>
					 <li class="list-group-item">Size :
                        <?php echo $compore_products['size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['material']) && $compore_products['material']!=''){ ?>
					 <li class="list-group-item">Material :
                        <?php echo $compore_products['material']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['occasion']) && $compore_products['occasion']!=''){ ?>
					 <li class="list-group-item">Occasion :
                        <?php echo $compore_products['occasion']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['pattern']) && $compore_products['pattern']!=''){ ?>
					 <li class="list-group-item">Pattern :
                        <?php echo $compore_products['pattern']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sleeve']) && $compore_products['sleeve']!=''){ ?>
					 <li class="list-group-item">Sleeve :
                        <?php echo $compore_products['sleeve']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['fit']) && $compore_products['fit']!=''){ ?>
					 <li class="list-group-item">Fit :
                        <?php echo $compore_products['fit']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['gender']) && $compore_products['gender']!=''){ ?>
					 <li class="list-group-item">Gender :
                        <?php echo $compore_products['gender']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['collar_type']) && $compore_products['collar_type']!=''){ ?>
					 <li class="list-group-item">Collar Type :
                        <?php echo $compore_products['collar_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['set_contents']) && $compore_products['set_contents']!=''){ ?>
					 <li class="list-group-item">Set Contents :
                        <?php echo $compore_products['set_contents']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['type']) && $compore_products['type']!=''){ ?>
					 <li class="list-group-item">Type :
                        <?php echo $compore_products['type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['neck_type']) && $compore_products['neck_type']!=''){ ?>
					 <li class="list-group-item">Neck type :
                        <?php echo $compore_products['neck_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['package_contents']) && $compore_products['package_contents']!=''){ ?>
					 <li class="list-group-item">Package Contents :
                        <?php echo $compore_products['package_contents']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['style']) && $compore_products['style']!=''){ ?>
					 <li class="list-group-item">Style :
                        <?php echo $compore_products['style']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['age']) && $compore_products['age']!=''){ ?>
					 <li class="list-group-item">Age :
                        <?php echo $compore_products['age']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['ideal_for']) && $compore_products['ideal_for']!=''){ ?>
					 <li class="list-group-item">Ideal for :
                        <?php echo $compore_products['ideal_for']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['blouse_length']) && $compore_products['blouse_length']!=''){ ?>
					 <li class="list-group-item">Blouse length :
                        <?php echo $compore_products['blouse_length']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['saree_length']) && $compore_products['saree_length']!=''){ ?>
					 <li class="list-group-item">Saree length :
                        <?php echo $compore_products['saree_length']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['pockets']) && $compore_products['pockets']!=''){ ?>
					 <li class="list-group-item">Pockets :
                        <?php echo $compore_products['pockets']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['length']) && $compore_products['length']!=''){ ?>
					 <li class="list-group-item">Length :
                        <?php echo $compore_products['length']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['waterproof']) && $compore_products['waterproof']!=''){ ?>
					 <li class="list-group-item">Waterproof :
                        <?php echo $compore_products['waterproof']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['laptop_compartment']) && $compore_products['laptop_compartment']!=''){ ?>
					 <li class="list-group-item">Laptop Compartment :
                        <?php echo $compore_products['laptop_compartment']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['closure']) && $compore_products['closure']!=''){ ?>
					 <li class="list-group-item">Closure :
                        <?php echo $compore_products['closure']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['wheels']) && $compore_products['wheels']!=''){ ?>
					 <li class="list-group-item">Wheels :
                        <?php echo $compore_products['wheels']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['no_of_pockets']) && $compore_products['no_of_pockets']!=''){ ?>
					 <li class="list-group-item">No Of Pockets :
                        <?php echo $compore_products['no_of_pockets']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['inner_material']) && $compore_products['inner_material']!=''){ ?>
					 <li class="list-group-item">Inner Material :
                        <?php echo $compore_products['inner_material']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['product_dimension']) && $compore_products['product_dimension']!=''){ ?>
					 <li class="list-group-item">Product Dimension :
                        <?php echo $compore_products['product_dimension']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['usage']) && $compore_products['usage']!=''){ ?>
					 <li class="list-group-item">Usage :
                        <?php echo $compore_products['usage']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['part_number']) && $compore_products['part_number']!=''){ ?>
					 <li class="list-group-item">Part Number :
                        <?php echo $compore_products['part_number']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['series']) && $compore_products['series']!=''){ ?>
					 <li class="list-group-item">Series :
                        <?php echo $compore_products['series']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['os']) && $compore_products['os']!=''){ ?>
					 <li class="list-group-item">Operating System :
                        <?php echo $compore_products['os']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['hdd_capacity']) && $compore_products['hdd_capacity']!=''){ ?>
					 <li class="list-group-item">HDD Capacity :
                        <?php echo $compore_products['hdd_capacity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['processorbrand']) && $compore_products['processorbrand']!=''){ ?>
					 <li class="list-group-item">Processor Brand :
                        <?php echo $compore_products['processorbrand']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['variant']) && $compore_products['variant']!=''){ ?>
					 <li class="list-group-item">Variant :
                        <?php echo $compore_products['variant']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['chipset']) && $compore_products['chipset']!=''){ ?>
					 <li class="list-group-item">Chipset :
                        <?php echo $compore_products['chipset']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['clock_speed']) && $compore_products['clock_speed']!=''){ ?>
					 <li class="list-group-item">Clock Speed :
                        <?php echo $compore_products['clock_speed']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['cache']) && $compore_products['cache']!=''){ ?>
					 <li class="list-group-item">Cache :
                        <?php echo $compore_products['cache']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['screen_type']) && $compore_products['screen_type']!=''){ ?>
					 <li class="list-group-item">Screen Type :
                        <?php echo $compore_products['screen_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['resolution']) && $compore_products['resolution']!=''){ ?>
					 <li class="list-group-item">Resolution :
                        <?php echo $compore_products['resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['graphic_processor']) && $compore_products['graphic_processor']!=''){ ?>
					 <li class="list-group-item">Graphic Processor :
                        <?php echo $compore_products['graphic_processor']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['memory_slots']) && $compore_products['memory_slots']!=''){ ?>
					 <li class="list-group-item">Memory Slots :
                        <?php echo $compore_products['memory_slots']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['hdd_capacitys']) && $compore_products['hdd_capacitys']!=''){ ?>
					 <li class="list-group-item">HDD Capacity :
                        <?php echo $compore_products['hdd_capacitys']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['rpm']) && $compore_products['rpm']!=''){ ?>
					 <li class="list-group-item">rpm :
                        <?php echo $compore_products['rpm']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['optical_drive']) && $compore_products['optical_drive']!=''){ ?>
					 <li class="list-group-item">Optical Drive :
                        <?php echo $compore_products['optical_drive']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['wan']) && $compore_products['wan']!=''){ ?>
					 <li class="list-group-item">Wireless WAN :
                        <?php echo $compore_products['wan']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['ethernet']) && $compore_products['ethernet']!=''){ ?>
					 <li class="list-group-item">Ethernet :
                        <?php echo $compore_products['ethernet']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['vgaport']) && $compore_products['vgaport']!=''){ ?>
					 <li class="list-group-item">VGA Port :
                        <?php echo $compore_products['vgaport']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['usb_port']) && $compore_products['usb_port']!=''){ ?>
					 <li class="list-group-item">USB Port :
                        <?php echo $compore_products['usb_port']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['hdmi_port']) && $compore_products['hdmi_port']!=''){ ?>
					 <li class="list-group-item">HDMI Port :
                        <?php echo $compore_products['hdmi_port']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['multi_card_slot']) && $compore_products['multi_card_slot']!=''){ ?>
					 <li class="list-group-item">Multi Card Slot :
                        <?php echo $compore_products['multi_card_slot']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['web_camera']) && $compore_products['web_camera']!=''){ ?>
					 <li class="list-group-item">Web Camera :
                        <?php echo $compore_products['web_camera']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['keyboard']) && $compore_products['keyboard']!=''){ ?>
					 <li class="list-group-item">keyboard :
                        <?php echo $compore_products['keyboard']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['speakers']) && $compore_products['speakers']!=''){ ?>
					 <li class="list-group-item">Speakers :
                        <?php echo $compore_products['speakers']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['mic_in']) && $compore_products['mic_in']!=''){ ?>
					 <li class="list-group-item">Mic In :
                        <?php echo $compore_products['mic_in']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['power_supply']) && $compore_products['power_supply']!=''){ ?>
					 <li class="list-group-item">Power Supply :
                        <?php echo $compore_products['power_supply']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['battery_backup']) && $compore_products['battery_backup']!=''){ ?>
					 <li class="list-group-item">Battery Backup :
                        <?php echo $compore_products['battery_backup']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['battery_cell']) && $compore_products['battery_cell']!=''){ ?>
					 <li class="list-group-item">Battery Cell :
                        <?php echo $compore_products['battery_cell']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['dimension']) && $compore_products['dimension']!=''){ ?>
					 <li class="list-group-item">Dimension :
                        <?php echo $compore_products['dimension']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['weight']) && $compore_products['weight']!=''){ ?>
					 <li class="list-group-item">Weight :
                        <?php echo $compore_products['weight']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['adapter']) && $compore_products['adapter']!=''){ ?>
					 <li class="list-group-item">Adapter :
                        <?php echo $compore_products['adapter']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['office']) && $compore_products['office']!=''){ ?>
					 <li class="list-group-item">Office :
                        <?php echo $compore_products['office']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['fingerprint_point']) && $compore_products['fingerprint_point']!=''){ ?>
					 <li class="list-group-item">Fingerprint Point :
                        <?php echo $compore_products['fingerprint_point']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['noise_reduction']) && $compore_products['noise_reduction']!=''){ ?>
					 <li class="list-group-item">Noise Reduction :
                        <?php echo $compore_products['noise_reduction']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['connectivity']) && $compore_products['connectivity']!=''){ ?>
					 <li class="list-group-item">Connectivity :
                        <?php echo $compore_products['connectivity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['headphone_jack']) && $compore_products['headphone_jack']!=''){ ?>
					 <li class="list-group-item">Headphone jack :
                        <?php echo $compore_products['headphone_jack']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['compatible_for']) && $compore_products['compatible_for']!=''){ ?>
					 <li class="list-group-item">Compatible for :
                        <?php echo $compore_products['compatible_for']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['total_power_output']) && $compore_products['total_power_output']!=''){ ?>
					 <li class="list-group-item">Total Power Output :
                        <?php echo $compore_products['total_power_output']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sound_system']) && $compore_products['sound_system']!=''){ ?>
					 <li class="list-group-item">Sound System :
                        <?php echo $compore_products['sound_system']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['speaker_driver']) && $compore_products['speaker_driver']!=''){ ?>
					 <li class="list-group-item">Speaker Driver :
                        <?php echo $compore_products['speaker_driver']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['power']) && $compore_products['power']!=''){ ?>
					 <li class="list-group-item">Power :
                        <?php echo $compore_products['power']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['wired_wireless']) && $compore_products['wired_wireless']!=''){ ?>
					 <li class="list-group-item">Wired Wireless :
                        <?php echo $compore_products['wired_wireless']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['bluetooth_range']) && $compore_products['bluetooth_range']!=''){ ?>
					 <li class="list-group-item">Bluetooth Range :
                        <?php echo $compore_products['bluetooth_range']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['model_series']) && $compore_products['model_series']!=''){ ?>
					 <li class="list-group-item">Model Series :
                        <?php echo $compore_products['model_series']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['installation']) && $compore_products['installation']!=''){ ?>
					 <li class="list-group-item">Installation :
                        <?php echo $compore_products['installation']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['warranty_card']) && $compore_products['warranty_card']!=''){ ?>
					 <li class="list-group-item">Warranty Card :
                        <?php echo $compore_products['warranty_card']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['functions']) && $compore_products['functions']!=''){ ?>
					 <li class="list-group-item">Functions :
                        <?php echo $compore_products['functions']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['printer_type']) && $compore_products['printer_type']!=''){ ?>
					 <li class="list-group-item">Printer Type :
                        <?php echo $compore_products['printer_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['interface']) && $compore_products['interface']!=''){ ?>
					 <li class="list-group-item">Interface :
                        <?php echo $compore_products['interface']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['printer_output']) && $compore_products['printer_output']!=''){ ?>
					 <li class="list-group-item">Printer Output :
                        <?php echo $compore_products['printer_output']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['max_print_resolution']) && $compore_products['max_print_resolution']!=''){ ?>
					 <li class="list-group-item">Maximum Print Resolution :
                        <?php echo $compore_products['max_print_resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['print_speed']) && $compore_products['print_speed']!=''){ ?>
					 <li class="list-group-item">Print Speed :
                        <?php echo $compore_products['print_speed']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['scanner_type']) && $compore_products['scanner_type']!=''){ ?>
					 <li class="list-group-item">Scanner Type :
                        <?php echo $compore_products['scanner_type']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['document_size']) && $compore_products['document_size']!=''){ ?>
					 <li class="list-group-item">Document Size :
                        <?php echo $compore_products['document_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['scanning_resolution']) && $compore_products['scanning_resolution']!=''){ ?>
					 <li class="list-group-item">Scanning Resolution :
                        <?php echo $compore_products['scanning_resolution']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['copies_from']) && $compore_products['copies_from']!=''){ ?>
					 <li class="list-group-item">Maximum Copies From Standalone :
                        <?php echo $compore_products['copies_from']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['copy_size']) && $compore_products['copy_size']!=''){ ?>
					 <li class="list-group-item">Maximum Copy Size :
                        <?php echo $compore_products['copy_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['iso_29183']) && $compore_products['iso_29183']!=''){ ?>
					 <li class="list-group-item">ISO 29183, A4, Simplex :
                        <?php echo $compore_products['iso_29183']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['noise_level']) && $compore_products['noise_level']!=''){ ?>
					 <li class="list-group-item">Noise Level :
                        <?php echo $compore_products['noise_level']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['paper_hold_input']) && $compore_products['paper_hold_input']!=''){ ?>
					 <li class="list-group-item">Paper Hold Input Capacity :
                        <?php echo $compore_products['paper_hold_input']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['paper_hold_output']) && $compore_products['paper_hold_output']!=''){ ?>
					 <li class="list-group-item">Paper Hold OutPut Capacity :
                        <?php echo $compore_products['paper_hold_output']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['paper_size']) && $compore_products['paper_size']!=''){ ?>
					 <li class="list-group-item">Paper Size :
                        <?php echo $compore_products['paper_size']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['print_margin']) && $compore_products['print_margin']!=''){ ?>
					 <li class="list-group-item">Print Margin :
                        <?php echo $compore_products['print_margin']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['standby']) && $compore_products['standby']!=''){ ?>
					 <li class="list-group-item">Standby :
                        <?php echo $compore_products['standby']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['operating_temperature_range']) && $compore_products['operating_temperature_range']!=''){ ?>
					 <li class="list-group-item">Operating Temperature Range :
                        <?php echo $compore_products['operating_temperature_range']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['frequency']) && $compore_products['frequency']!=''){ ?>
					 <li class="list-group-item">Frequency :
                        <?php echo $compore_products['frequency']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['sole_material']) && $compore_products['sole_material']!=''){ ?>
					 <li class="list-group-item">Sole Material :
                        <?php echo $compore_products['sole_material']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['fastening']) && $compore_products['fastening']!=''){ ?>
					 <li class="list-group-item">Fastening :
                        <?php echo $compore_products['fastening']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['toe_shape']) && $compore_products['toe_shape']!=''){ ?>
					 <li class="list-group-item">Toe Shape :
                        <?php echo $compore_products['toe_shape']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['ean_upc']) && $compore_products['ean_upc']!=''){ ?>
					 <li class="list-group-item">Ean Upc :
                        <?php echo $compore_products['ean_upc']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['factor']) && $compore_products['factor']!=''){ ?>
					 <li class="list-group-item">Factor :
                        <?php echo $compore_products['factor']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['connector1']) && $compore_products['connector1']!=''){ ?>
					 <li class="list-group-item">Connector 1 :
                        <?php echo $compore_products['connector1']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['connector2']) && $compore_products['connector2']!=''){ ?>
					 <li class="list-group-item">Connector 2 :
                        <?php echo $compore_products['connector2']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['portable']) && $compore_products['portable']!=''){ ?>
					 <li class="list-group-item">Connector 2 :
                        <?php echo $compore_products['portable']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['maximumbrightness']) && $compore_products['maximumbrightness']!=''){ ?>
					 <li class="list-group-item">Maximum Brightness :
                        <?php echo $compore_products['maximumbrightness']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['projectionratio']) && $compore_products['projectionratio']!=''){ ?>
					 <li class="list-group-item">Projection Ratio 1 :
                        <?php echo $compore_products['projectionratio']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['contrastratio']) && $compore_products['contrastratio']!=''){ ?>
					 <li class="list-group-item">Contrast Ratio :
                        <?php echo $compore_products['contrastratio']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['outputperspeaker']) && $compore_products['outputperspeaker']!=''){ ?>
					 <li class="list-group-item">Output Per Speaker :
                        <?php echo $compore_products['outputperspeaker']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['powersupply']) && $compore_products['powersupply']!=''){ ?>
					 <li class="list-group-item">Power Supply :
                        <?php echo $compore_products['powersupply']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['powerconsumption']) && $compore_products['powerconsumption']!=''){ ?>
					 <li class="list-group-item">Power Consumption :
                        <?php echo $compore_products['powerconsumption']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['minopertingtemperature']) && $compore_products['minopertingtemperature']!=''){ ?>
					 <li class="list-group-item">Minimum Operating Temperature :
                        <?php echo $compore_products['minopertingtemperature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['maxopertingtemperature']) && $compore_products['maxopertingtemperature']!=''){ ?>
					 <li class="list-group-item">Maximum Operting Temperature :
                        <?php echo $compore_products['maxopertingtemperature']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['remotecontrol']) && $compore_products['remotecontrol']!=''){ ?>
					 <li class="list-group-item">Remote Control :
                        <?php echo $compore_products['remotecontrol']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['voltagerange']) && $compore_products['voltagerange']!=''){ ?>
					 <li class="list-group-item">Voltage Range :
                        <?php echo $compore_products['voltagerange']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['turbospeed']) && $compore_products['turbospeed']!=''){ ?>
					 <li class="list-group-item">Maximum Turbo Speed :
                        <?php echo $compore_products['turbospeed']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['graphics']) && $compore_products['graphics']!=''){ ?>
					 <li class="list-group-item">Integrated Graphics :
                        <?php echo $compore_products['graphics']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['capacity']) && $compore_products['capacity']!=''){ ?>
					 <li class="list-group-item">Integrated Graphics :
                        <?php echo $compore_products['capacity']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['datarate']) && $compore_products['datarate']!=''){ ?>
					 <li class="list-group-item">Data Rate :
                        <?php echo $compore_products['datarate']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['technology']) && $compore_products['technology']!=''){ ?>
					 <li class="list-group-item">Technology :
                        <?php echo $compore_products['technology']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['externaldrivebays']) && $compore_products['externaldrivebays']!=''){ ?>
					 <li class="list-group-item">External Drive Bays :
                        <?php echo $compore_products['externaldrivebays']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['internaldrivebays']) && $compore_products['internaldrivebays']!=''){ ?>
					 <li class="list-group-item">Internal Drive Bays :
                        <?php echo $compore_products['internaldrivebays']; ?>
                     </li>
					  <?php } ?>
					  <?php if(isset($compore_products['micport']) && $compore_products['micport']!=''){ ?>
					 <li class="list-group-item">Front USB / Mic Port :
                        <?php echo $compore_products['micport']; ?>
                     </li>
					  <?php } ?>
					  
					  
					</a>
					
				</form>
                </ul>
            </div>
        </div>
		<div id="compare_items" class="col-md-4 text-center" style="display:none;"></div>
		
		
		<?php if(isset($item) && count($item)>0){ ?>
		<div class="col-md-4 text-center" id="item_hide1">
            <div class="form-group nopaddingRight col-md-6 san-lg" >
                <label for="exampleInputPassword1">Select Compare Product</label>
                <select class="form-control" onchange="productitem_one(this.value);" id="item_id" name="item_id">
                    <option>Select item</option>
                    <?php foreach($item as $item_data){ ?>
					<?php if($item_data->item_id!=$first_item){ ?>
                    <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
					<?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
		<?php } ?>
	
		<div id="compare_items2" class="col-md-4 text-center" style="display:none;"></div>
			<?php if(isset($item) && count($item)>0){ ?>
			<div class="col-md-4 text-center" id="item_hide2" style="display:none;">
            <div class="form-group nopaddingRight col-md-6 san-lg" >
                <label for="exampleInputPassword1">Select Compare Product</label>
                <select class="form-control" onchange="productitem_two(this.value);" id="item_idtwo" name="item_idtwo">
                    <option>Select item</option>
                     <?php foreach($item as $item_data){ ?>
					<?php if($item_data->item_id!=$first_item){ ?>
                    <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
					<?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
		<?php } ?>
	</div>
</div>
<input type="hidden" name="subcategory_id" id="subcategory_id" value="<?php echo $compore_products['subcategory_id']; ?>">      
<input type="hidden" name="subitemid" id="subitemid" value="<?php echo $compore_products['subitemid']; ?>">      
   
         
    

<script type="text/javascript">
   var $dropdown1 = $("select[name='item_id']");
var $dropdown2 = $("select[name='item_idtwo']");

$dropdown1.change(function() {
    $dropdown2.find('option').prop("disabled", false);
    var selectedItem = $(this).val();
    if (selectedItem) {
        $dropdown2.find('option[value="' + selectedItem + '"]').prop("disabled", true);
    }
});
$dropdown2.change(function() {
    $dropdown1.find('option').prop("disabled", false);
    var selectedItem = $(this).val();
    if (selectedItem) {
        $dropdown1.find('option[value="' + selectedItem + '"]').prop("disabled", true);
    }
});
    function productitem_one(id)
    {
		var subcategory_id = $("#subcategory_id").val();
		var subitemid = $("#subitemid").val();
		$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>category/compare_items_list",
				data: {
					item_id:id,
					subcategory_id:subcategory_id,
					subitem_id:subitemid
					},
				cache: false,
				dataType:'html',
				success: function (data) {
					$('#item_hide1').hide();
					$('#item_hide2').show();
					$('#compare_items').show();
					$('#compare_items').empty();
					$('#compare_items').append(data);
					
				} 
			});	
    
    }
	function productitem_two(id)
    {
		var category_id = $("#category_id").val();
		$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>category/compare_items_list_two",
				data: {
					item_id:id,
					category_id:category_id
					},
				cache: false,
				dataType:'html',
				success: function (data) {
					$('#item_hide2').hide();
					$('#compare_items2').show();
					$('#compare_items2').empty();
					$('#compare_items2').append(data);
					
				} 
			});	
    
    }
  
 </script>   
