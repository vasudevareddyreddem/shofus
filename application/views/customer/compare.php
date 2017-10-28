
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
					  <?php if(isset($compore_products['colour']) && $compore_products['colour']!=''){ ?>
					 <li class="list-group-item">Display Type :
                        <?php echo $compore_products['colour']; ?>
                     </li>
					  <?php } ?>
					</a>
					
				</form>
                </ul>
            </div>
        </div>
		<div id="compare_items" class="col-md-4 text-center" style="display:none;"></div>
		
		
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
		<div id="compare_items2" class="col-md-4 text-center" style="display:none;"></div>
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
	</div>
</div>
<input type="hidden" name="category_id" id="category_id" value="<?php echo $compore_products['category_id']; ?>">      
   
         
    

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
		var category_id = $("#category_id").val();
		$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>category/compare_items_list",
				data: {
					item_id:id,
					category_id:category_id
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
