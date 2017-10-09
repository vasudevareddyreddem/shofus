<style>
.shad_down{
	-webkit-box-shadow: -1px 1px 5px -1px rgba(0,0,0,0.75);
	-moz-box-shadow: -1px 1px 5px -1px rgba(0,0,0,0.75);
	box-shadow: -1px 1px 5px -1px rgba(0,0,0,0.75);
	background-color:#fff;
	padding:8px;
	border-radius:5px;
}
.label-info{
	border: 1px solid #ddd !important;
	 background-color: #fafafa !important;
	 color:#555 !important;
 }
 #colors{
	width:100% !important;
} #sizes{
	width:100% !important;
}#ussizes{
	width:100% !important;
}
</style>

<div class="content-wrapper mar_t_con"  >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form name="" action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Listing</h1>
			<small>Edit Product</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>	
	<section class="content"><?php if($this->session->flashdata('addcus')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('addcus');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('error');?></div>
			<?php endif; ?>
	<form name="addproduct" id="addproduct" action="<?php echo base_url('seller/products/update/'); ?>" method="post" enctype="multipart/form-data" >
<?php //echo '<pe>';print_r($productdetails['subcategory_id']);?>
<?php //echo '<pe>';print_r($productdetails['category_id']);?>
						<input type="hidden" name="product_id" id="product_id" value="<?php echo isset($productdetails['item_id'])?$productdetails['item_id']:''; ?>">				

	<div class="row">
			<div class="form-group col-md-6">
				<label for="exampleInputEmail1">Category </label>
				<select class="form-control " onchange="getsubcategory(this.value);getsubcategorylist(this.value);getproductinputs(this.value);" id="category_id" name="category_id">
					<option value="">Select Category</option>
					<?php foreach($category_details as $list){ ?>
						<?php if($productdetails['category_id']==$list['seller_category_id']){ ?>
						<option selected="selected" value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>

						<?php }else{ ?>
							<option value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>
						<?php }} ?>

				</select>
			</div>
			<div id="oldsubcat" class="form-group col-md-6" style="display:none;">
				<label for="exampleInputEmail1">Sub Category </label>
				<select class="form-control " onchange="getspecialinputs(this.value);removeextrafields(this.value);" id="subcategorylistes" name="editsubcategorylist"  >
				<option value="">Select Subcategory </option>
			
				<?php foreach($subcatdata as $subcat_data){ ?>
				<?php if($productdetails['subcategory_id']==$subcat_data->subcategory_id){ ?>
				<option selected="selected" value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
				<?php } else{ ?>
				<option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
				<?php } } ?>
				
				</select>
				
			</div>
			<div id="editsubcat" class="form-group col-md-6" style="display:none;">
				<label for="exampleInputEmail1">Sub Category </label>
				
				<select class="form-control" onchange="getspecialinputs(this.value);removeextrafields(this.value);" id="subcategorylist" name="subcategorylist" >
				<option value="">Select Subcategory </option>

				</select>
			</div>
		
			
	</div>
	
	
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					    <label for="exampleInputEmail1">Product name</label>
						<input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo isset($productdetails['item_name'])?$productdetails['item_name']:''; ?>" >
											
				</div>
			</div>
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">price</label>
					<input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo isset($productdetails['item_cost'])?$productdetails['item_cost']:''; ?>" >
				</div>
			</div>
	</div>
	
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Special price</label>
					<input onkeyup="enablesubbmit();" type="text" class="form-control" id="special_price" name="special_price" value="<?php echo isset($productdetails['special_price'])?$productdetails['special_price']:''; ?>" >
				</div>
				<span style="color:red;" id="errormsgvalidation"></span>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Qty</label>
					<input type="text" class="form-control" id="pqty" name="pqty" value="<?php echo isset($productdetails['item_quantity'])?$productdetails['item_quantity']:''; ?>" >
				</div>
			</div>
		
	</div>
	
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Highlights</label>
				<textarea  placeholder="Highlights" style="width: 1034px; height: 59px;" class="form-control" rows="3" id="highlights" name="highlights"><?php echo isset($productdetails['highlights'])?$productdetails['highlights']:''; ?></textarea>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Description</label>
				<textarea  placeholder="Description" style="width: 1034px; height: 59px;" class="form-control" rows="3" id="description" name="description"><?php echo isset($productdetails['description'])?$productdetails['description']:''; ?></textarea>
			</div>
		</div>
	</div>
	<hr>
	<label for="exampleInputEmail1">Warranty Details</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Warranty Summary</label>
				<input type="text" class="form-control" id="warranty_summary" name="warranty_summary" value="<?php echo isset($productdetails['warranty_summary'])?$productdetails['warranty_summary']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Warranty Type</label>
				<input type="text" class="form-control" id="warranty_type" name="warranty_type" value="<?php echo isset($productdetails['warranty_type'])?$productdetails['warranty_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Service Type</label>
				<input type="text" class="form-control" id="service_type" name="service_type" value="<?php echo isset($productdetails['service_type'])?$productdetails['service_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<hr>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Return Policy</label>
				<textarea  placeholder="Return Policy" style="width: 1034px; height: 59px;" class="form-control" rows="3" id="return_policy" name="return_policy"><?php echo isset($productdetails['return_policy'])?$productdetails['return_policy']:''; ?></textarea>
			</div>
		</div>
	</div>
	<hr>
	<label for="exampleInputEmail1">Specifications :</label><br>
		
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Brand</label>
				<input type="text" class="form-control" id="pbrand" name="pbrand" value="<?php echo isset($productdetails['brand'])?$productdetails['brand']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Product Code</label>
				<input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo isset($productdetails['product_code'])?$productdetails['product_code']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Processor</label>
				<input type="text" class="form-control" id="Processor" name="Processor" value="<?php echo isset($productdetails['Processor'])?$productdetails['Processor']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Screen Size</label>
				<input type="text" class="form-control" id="screen_size" name="screen_size" value="<?php echo isset($productdetails['screen_size'])?$productdetails['screen_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Internal Memory</label>
				<input type="text" class="form-control" id="internal_memeory" name="internal_memeory" value="<?php echo isset($productdetails['internal_memeory'])?$productdetails['internal_memeory']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Camera</label>
				<input type="text" class="form-control" id="camera" name="camera" value="<?php echo isset($productdetails['camera'])?$productdetails['camera']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Sim Type</label>
				<input type="text" class="form-control" id="sim_type" name="sim_type" value="<?php echo isset($productdetails['sim_type'])?$productdetails['sim_type']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">OS</label>
				<input type="text" class="form-control" id="os" name="os" value="<?php echo isset($productdetails['os'])?$productdetails['os']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Colour</label>
				<input type="text" class="form-control" id="colour" name="colour" value="<?php echo isset($productdetails['colour'])?$productdetails['colour']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">RAM</label>
				<input type="text" class="form-control" id="ram" name="ram" value="<?php echo isset($productdetails['ram'])?$productdetails['ram']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Model Name</label>
				<input type="text" class="form-control" id="model_name" name="model_name" value="<?php echo isset($productdetails['model_name'])?$productdetails['model_name']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Model ID</label>
				<input type="text" class="form-control" id="model_id" name="model_id" value="<?php echo isset($productdetails['model_id'])?$productdetails['model_id']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Memory :</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Internal Memory</label>
				<input type="text" class="form-control" id="internal_memory" name="internal_memory" value="<?php echo isset($productdetails['internal_memory'])?$productdetails['internal_memory']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Expandable Memory</label>
				<input type="text" class="form-control" id="expand_memory" name="expand_memory" value="<?php echo isset($productdetails['expand_memory'])?$productdetails['expand_memory']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Camera & Video Features :</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Primary Camera</label>
				<input type="text" class="form-control" id="primary_camera" name="primary_camera" value="<?php echo isset($productdetails['primary_camera'])?$productdetails['primary_camera']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Primary Camera Features</label>
				<input type="text" class="form-control" id="primary_camera_feature" name="primary_camera_feature" value="<?php echo isset($productdetails['primary_camera_feature'])?$productdetails['primary_camera_feature']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Secondary Camera</label>
				<input type="text" class="form-control" id="secondary_camera" name="secondary_camera" value="<?php echo isset($productdetails['secondary_camera'])?$productdetails['secondary_camera']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Secondary Camera Features </label>
				<input type="text" class="form-control" id="secondary_camera_feature" name="secondary_camera_feature" value="<?php echo isset($productdetails['secondary_camera_feature'])?$productdetails['secondary_camera_feature']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Video Recording</label>
				<input type="text" class="form-control" id="video_recording" name="video_recording" value="<?php echo isset($productdetails['video_recording'])?$productdetails['video_recording']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">HD Recording</label>
				<input type="text" class="form-control" id="hd_recording" name="hd_recording" value="<?php echo isset($productdetails['hd_recording'])?$productdetails['hd_recording']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Flash</label>
				<input type="text" class="form-control" id="flash" name="flash" value="<?php echo isset($productdetails['flash'])?$productdetails['flash']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Other Camera Features</label>
				<input type="text" class="form-control" id="other_camera_features" name="other_camera_features" value="<?php echo isset($productdetails['other_camera_features'])?$productdetails['other_camera_features']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Battery & Power Features</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Battery Capacity</label>
				<input type="text" class="form-control" id="battery_capacity" name="battery_capacity" value="<?php echo isset($productdetails['battery_capacity'])?$productdetails['battery_capacity']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Talk Time</label>
				<input type="text" class="form-control" id="talk_time" name="talk_time" value="<?php echo isset($productdetails['talk_time'])?$productdetails['talk_time']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Standby Time</label>
				<input type="text" class="form-control" id="standby_time" name="standby_time" value="<?php echo isset($productdetails['standby_time'])?$productdetails['standby_time']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Internet & Connectivity</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Operating Frequency</label>
				<input type="text" class="form-control" id="operating_frequency" name="operating_frequency" value="<?php echo isset($productdetails['operating_frequency'])?$productdetails['operating_frequency']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Preinstalled Browser</label>
				<input type="text" class="form-control" id="preinstalled_browser" name="preinstalled_browser" value="<?php echo isset($productdetails['preinstalled_browser'])?$productdetails['preinstalled_browser']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">2G</label>
				<input type="text" class="form-control" id="2g" name="2g" value="<?php echo isset($productdetails['2g'])?$productdetails['2g']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">3G</label>
				<input type="text" class="form-control" id="3g" name="3g" value="<?php echo isset($productdetails['3g'])?$productdetails['3g']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">4G</label>
				<input type="text" class="form-control" id="4g" name="4g" value="<?php echo isset($productdetails['4g'])?$productdetails['4g']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Wifi</label>
				<input type="text" class="form-control" id="wifi" name="wifi" value="<?php echo isset($productdetails['wifi'])?$productdetails['wifi']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">GPS</label>
				<input type="text" class="form-control" id="gps" name="gps" value="<?php echo isset($productdetails['gps'])?$productdetails['gps']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">USB Connectivity</label>
				<input type="text" class="form-control" id="usb_connectivity" name="usb_connectivity" value="<?php echo isset($productdetails['usb_connectivity'])?$productdetails['usb_connectivity']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Bluetooth</label>
				<input type="text" class="form-control" id="bluetooth" name="bluetooth" value="<?php echo isset($productdetails['bluetooth'])?$productdetails['bluetooth']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">NFC</label>
				<input type="text" class="form-control" id="nfc" name="nfc" value="<?php echo isset($productdetails['nfc'])?$productdetails['nfc']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Edge</label>
				<input type="text" class="form-control" id="edge" name="edge" value="<?php echo isset($productdetails['edge'])?$productdetails['edge']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Edge Features</label>
				<input type="text" class="form-control" id="edge_features" name="edge_features" value="<?php echo isset($productdetails['edge_features'])?$productdetails['edge_features']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Multimedia Features</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Music Player</label>
				<input type="text" class="form-control" id="music_player" name="music_player" value="<?php echo isset($productdetails['music_player'])?$productdetails['music_player']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Video Player</label>
				<input type="text" class="form-control" id="video_player" name="video_player" value="<?php echo isset($productdetails['video_player'])?$productdetails['video_player']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Audio Jack</label>
				<input type="text" class="form-control" id="audio_jack" name="audio_jack" value="<?php echo isset($productdetails['audio_jack'])?$productdetails['audio_jack']:''; ?>" >
			</div>
		</div>
	</div>
	<label for="exampleInputEmail1">Additional Features</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">GPU</label>
				<input type="text" class="form-control" id="gpu" name="gpu" value="<?php echo isset($productdetails['gpu'])?$productdetails['gpu']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Sim Size</label>
				<input type="text" class="form-control" id="sim_size" name="sim_size"  value="<?php echo isset($productdetails['sim_size'])?$productdetails['sim_size']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Sim Supported</label>
				<input type="text" class="form-control" id="sim_supported" name="sim_supported"  value="<?php echo isset($productdetails['sim_supported'])?$productdetails['sim_supported']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Call Memory</label>
				<input type="text" class="form-control" id="call_memory" name="call_memory" value="<?php echo isset($productdetails['call_memory'])?$productdetails['call_memory']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">SMS Memory</label>
				<input type="text" class="form-control" id="sms_memory" name="sms_memory" value="<?php echo isset($productdetails['sms_memory'])?$productdetails['sms_memory']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Phone Book Memory</label>
				<input type="text" class="form-control" id="phone_book_memory" name="phone_book_memory" value="<?php echo isset($productdetails['phone_book_memory'])?$productdetails['phone_book_memory']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Sensors</label>
				<input type="text" class="form-control" id="sensors" name="sensors" value="<?php echo isset($productdetails['sensors'])?$productdetails['sensors']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Java</label>
				<input type="text" class="form-control" id="java" name="java" value="<?php echo isset($productdetails['java'])?$productdetails['java']:''; ?>" >
			</div>
		</div>
	</div>
	 <label for="exampleInputEmail1">In the Box</label>
	 <div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">In Sales Package</label>
				<input type="text" class="form-control" id="insales_package" name="insales_package" value="<?php echo isset($productdetails['insales_package'])?$productdetails['insales_package']:''; ?>" >
			</div>
		</div>
		
	</div>
	<label for="exampleInputEmail1">Display & Resolution</label>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Display & resolution</label>
				<input type="text" class="form-control" id="dislay_resolution" name="dislay_resolution" value="<?php echo isset($productdetails['dislay_resolution'])?$productdetails['dislay_resolution']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Display Type</label>
				<input type="text" class="form-control" id="display_type" name="display_type" value="<?php echo isset($productdetails['display_type'])?$productdetails['display_type']:''; ?>" >
			</div>
		</div>
	</div>


	<label for="exampleInputEmail1">Images</label>
	<div class="row">
		<?php  if($productdetails['item_image'] !=''){ ?>
		<div class="form-group nopaddingRight col-md-6 san-lg">
		<label class="form-control-label" for="image">Product Image1</label>
		<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image'];?>" <?php echo $productdetails['item_image'];?>>
		</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images1</label>
				<input type="file" name='picture1' id="picture1"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image1'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image2</label>
			<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image1'];?>" <?php echo $productdetails['item_image1'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images2</label>
				<input type="file" name='picture2' id="picture2"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
	<?php  if($productdetails['item_image2'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image3</label>
			<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image2'];?>" <?php echo $productdetails['item_image2'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images3</label>
				<input type="file" name='picture3' id="picture3"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image3'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image4</label>
			<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image3'];?>" <?php echo $productdetails['item_image3'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images4</label>
				<input type="file" name='picture4' id="picture4"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
	<?php  if($productdetails['item_image4'] !=''){ ?>
		<div class="form-group nopaddingRight col-md-6 san-lg">
		<label class="form-control-label" for="image">Product Image5</label>
		<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image4'];?>" <?php echo $productdetails['item_image4'];?>>
		</div>
	<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images5</label>
				<input type="file" name='picture5' id="picture5"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image5'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image6</label>
			<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image5'];?>" <?php echo $productdetails['item_image5'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images6</label>
				<input type="file" name='picture6' id="picture6"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
	<?php  if($productdetails['item_image6'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image7</label>
			<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image6'];?>" <?php echo $productdetails['item_image6'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images7</label>
				<input type="file" name='picture7' id="picture7"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image7'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image8</label>
			<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image7'];?>" <?php echo $productdetails['item_image7'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Images7</label>
				<input type="file" name='picture8' id="picture8"  class="form-control" >
			</div>
		</div>
	</div>
	
	<div >
		<button type="submit" name="buttonSubmit" class="btn btn-primary" >Submit</button>
		<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/products'); ?>">Cancel</a>
		</div>
	</form>
	</section>
</div>

  <!--main content end--> 
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
	

  <script>
  
  function removeextrafields(){
	  
	   $('#productname').val('');
	   $('#skuid').val('');
	   $('#otherunique').val('');
	   $('#product_price').val('');
	   $('#specialprice').val('');
	   $('#offers').val('');
	   $('#discount').val('');
	   $('#qty').val('');
	   $('#keywords').val('');
	   $('#title').val('');
	   $('#status').val('');
	   $('#product_description').val('');
	   $('#product_sub_tem').val('');
	   $('#ideal_for').val('');
	   $('#brand').val('');
	   $('#product_scusine').val('');
	   $('#product_sufficient').val('');
	   $('#product_type8').val('');
	   $('#product_type7').val('');
	   $('#product_theme1').val('');
	   $('#product_theme').val('');
	   $('#dial_shape2').val('');
	   $('#compatible_os').val('');
	   $('#prouduct_usage').val('');
	   $('#prouduct_display_type').val('');
	   $('#product_theme5').val('');
	   $('#product_occasion2').val('');
	   $('#product_theme4').val('');
	   $('#material1').val('');
	   $('#product_gemstones').val('');
	   $('#Material2').val('');
	   $('#product_type6').val('');
	   $('#dial_shape1').val('');
	   $('#prouduct_strap_color').val('');
	   $('#prouduct_dial_color').val('');
	   $('#product_type5').val('');
	   $('#product_theme3').val('');
	   $('#product_packof2').val('');
	   $('#product_theme2').val('');
	   $('#product_occasion1').val('');
	   $('#product_type4').val('');
	   $('#product_packof1').val('');
	   $('#product_compatible_mobiles').val('');
	   $('#product_type3').val('');
	   $('#product_mega_pixel').val('');
	   $('#product_sensor_type').val('');
	   $('#product_battery_type').val('');
	   $('#product_type2').val('');
	   $('#wireless_speed').val('');
	   $('#frequency_band').val('');
	   $('#broadband_compatibility').val('');
	   $('#usb_ports').val('');
	   $('#product_frequency').val('');
	   $('#product_antennae').val('');
	   $('#product_display_size3').val('');
	   $('#product_connectivity').val('');
	   $('#product_ram3').val('');
	   $('#voice_calling_facility').val('');
	   $('#operating_system3').val('');
	   $('#internal_storage3').val('');
	   $('#battery_capacity2').val('');
	   $('#primary_camera2').val('');
	   $('#processor_clock_speed').val('');
	   $('#product_display_size2').val('');
	   $('#product_processor').val('');
	   $('#product_processor_brand1').val('');
	   $('#operating_system2').val('');
	   $('#product_ram2').val('');
	   $('#life_style').val('');
	   $('#storage_type').val('');
	   $('#dedicated_graphics_memory').val('');
	   $('#touch_screentouch_screen').val('');
	   $('#weight').val('');
	   $('#internal_storage2').val('');
	   $('#graphics_memory_type').val('');
	   $('#ram_type').val('');
	   $('#product_ram1').val('');
	   $('#operating_system1').val('');
	   $('#internal_storage4').val('');
	   $('#product_display_size1').val('');
	   $('#network_type').val('');
	   $('#battery_capacity1').val('');
	   $('#product_speciality').val('');
	   $('#product_type1').val('');
	   $('#operating_system_version_name').val('');
	   $('#product_processor_brand2').val('');
	   $('#resolution_type').val('');
	   $('#primary_camera1').val('');
	   $('#secondary_camera').val('');
	   $('#sim_type').val('');
	   $('#clock_speed').val('');
	   $('#number_of_cores').val('');
	   $('#internal_storage1').val('');
	   $('#specificationnameid').val('');
	   $('#specificationvalueid').val('');
	  
  }
  function removesizes(id){

	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('seller/products/removesizes');?>",
					data: {
						sizeid: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#sizes_'+id).hide();
					}
				 }
				});
			}
			
		}
	function removeuksizes(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('seller/products/removeuksizes');?>",
					data: {
						sizeid: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#uksizes_'+id).hide();
					}
				 }
				});
			}
			
		}

	function removeattachment(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('seller/products/removespciciations');?>",
					data: {
						specification: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#tab_sep11_'+id).hide();
					}
				 }
				});
			}
			
		}
	function removecolor(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('seller/products/removecolors');?>",
					data: {
						colid: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#colord_'+id).hide();
					}
				 }				});
			}
			
		}
	
 
   $('#oldsubcat').show();
   $('#oldsubcat').show();
 	  
  getspecialinputs('<?php echo htmlentities($productdetails['category_id']);?>');
  function getproductinputs(id){
	 if(id==18){
		  $('#foodcategoryinputs').show();
		  $('#idealfor').hide();
		  $('#sizeid').hide();
		  $('#colorid').hide();
	   }else if(id==21){
		$('#colorid').hide(); 
		$('#sizeid').show();		
		$('#idealfor').hide();  
		  
	  }else{
		  $('#foodcategoryinputs').hide();
		  $('#idealfor').show();
		  $('#sizeid').show();
		  $('#colorid').show();
	  }
	 
	  
}
  $('#personalcareappliancesinputs').show();
 getspecialinputs('<?php echo htmlentities($productdetails['subcategory_id']);?>');
	function getspecialinputs(ids){
	
	if(ids=1){
		$('#sizeid').hide();
		$('#colorid').hide();
	}else{
		$('#sizeid').show();
		$('#colorid').show();
	}
	if(ids==7 || ids==24){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#womensaccessoriesinputs').hide();
	}
	
	if(ids==9){
		$('#sizeid').hide();
		$('#colorid').hide();
	}
	if(ids==10){
		$('#smartwatchesinputs').show();
	}else{
		$('#smartwatchesinputs').hide();

	}
	if(ids==53){
		$('#footwareinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#footwareinputs').hide();

	}
	if(ids==11 || ids==21){
		$('#womensaccessoriesinputs').show();
		$('#sizeid').hide();
		$('#colorid').hide();
	}else{
		$('#womensaccessoriesinputs').hide();

	}
	if(ids==13 || ids==16 || ids==17){
		$('#mensfabricsinputs1').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#mensfabricsinputs1').hide();

	}
	if(ids==14 || ids==19 || ids==20 || ids==22 || ids==8){
		$('#winterwaerinputs1').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#winterwaerinputs1').hide();

	}
	if(ids==15){
		$('#jwelleryinputs').show();
		$('#colorid').show();
	}else{
		$('#jwelleryinputs').hide();

	}
	if(ids==16){
		$('#mensfabricsinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#mensfabricsinputs').hide();

	}
	if(ids==17){
		$('#mensfabricsinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#mensfabricsinputs').hide();

	}
	if(ids==18){
		$('#sizeid').show();
		$('#colorid').show();
	}
	if(ids==50){
		$('#womenswatchesinputs').show();
	}else{
		$('#womenswatchesinputs').hide();
	}
	if(ids==19){
		$('#winterwaerinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#winterwaerinputs').hide();
	}
	if(ids==20){
		$('#winterwaerinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#winterwaerinputs').hide();
	}
	if(ids==21){
		$('#product_theme').show();
		$('#sizeid').hide();
		$('#colorid').hide();
	}else{
		$('#product_theme').hide();
	}
	if(ids==22){
		$('#winterwaerinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#winterwaerinputs').hide();
	}
	if(ids==51){
		$('#mensehinicwearinputs').show();
		$('#sizeid').show();
		$('#colorid').show();
	}else{
		$('#mensehinicwearinputs').hide();
	}
	if(ids==23){
		$('#mensfabricsinputs').show();
		$('#colorid').show();
	}else{
		$('#mensfabricsinputs').hide();
	}
	if(ids==24){
		$('#sizeid').hide();
		$('#colorid').hide();
	}
	if(ids==25){
		$('#sizeid').show();
		$('#colorid').show();
		$('#product_theme').show();
	}else{
		$('#product_theme').hide();	
	}
	if(ids==26){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#idealfor').hide();
	}
	if(ids==52){
		$('#sizeid').show();
		$('#colorid').show();
		$('#winterwaerinputs').show();
	}else{
		$('#winterwaerinputs').hide();	
	}
	if(ids==28){
		$('#sizeid').show();
		$('#colorid').show();
		$('#winterwaerinputs').show();
	}else{
		$('#winterwaerinputs').hide();	
	}
	if(ids==29){
		$('#sizeid').show();
		$('#colorid').show();
		$('#winterwaerinputs').show();
	}else{
		$('#winterwaerinputs').hide();	
	}
	if(ids==30){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#mobileaccessoriesinputs').show();
	}else{
		$('#mobileaccessoriesinputs').hide();	
	}
	if(ids==31 || ids==32  || ids==33){
		$('#sizeid').hide();
		$('#colorid').hide();
	}
	if(ids==34){
		$('#sizeid').hide();
		$('#colorid').show();
		$('#camerainputs').show();
	}else{
		$('#camerainputs').hide();	
	}
	if(ids==35){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#tabletsinputs').show();
	}else{
		$('#tabletsinputs').hide();	
	}
	if(ids==36){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#routersinputs').show();
	}else{
		$('#routersinputs').hide();	
	}
	if(ids==39){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#laptopsinputs').show();
	}else{
		$('#laptopsinputs').hide();	
	}
	if(ids==40){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#mobilesinputs').show();
	}else{
		$('#mobilesinputs').hide();
		//$('#sizeid').show();
	}
	
	 
	
	   
		  
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
			product_price: {
					validators: {
					notEmpty: {
						message: 'Price is required'
					},
                   regexp: {
					regexp: /^[0-9.]+$/,
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
			},
			
		
        }
    });
});
  

  function getsubcat(ids){
	  var cat=ids;
	 var myarr = cat.split("/");
	var dataString = 'category_id='+myarr[0];
	$.ajax
		({
		type: "POST",
		url: "<?php echo base_url();?>seller/products/getajaxsubcat",
		data: dataString,
		cache: false,
		success: function(data)
		{
		$("#subcategory_id_import").html(data);
		} 
		});
  }
 
function getsubcategory(id){

	  if(id!=''){
		
		jQuery.ajax({
				url: "<?php echo site_url('seller/products/get_subcaregories_list');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					catid: id,
					},
				dataType: 'html',
				success: function (data) {
					$("#oldsubcat").hide();	
					$("#editsubcat").show();
					$('#subcategorylist').empty();					
					$("#subcategorylist").append(data);	

				}
			});
			
	  }
	  
  }

 function hidemsg(id){
	  if(id=''){
		jQuery('#errormsg').html('Please select subcategory');  
	  }else{
		jQuery('#errormsg').html('');  
	  }
	  
  } 
function checkvalidation(){
		var e = document.getElementById("subcategory_id_import");
		var strUser = e.options[e.selectedIndex].value;
		if(strUser==''){
		jQuery('#errormsg').html('Please select subcategory');
		return false;
		}
		jQuery('#errormsg').html('');
	  
  }	

 $(document).ready(function() {
            var jsonData = [];
            var fruits = '<?php echo $color_lists; ?>'.split(',');
            for(var i=0;i<fruits.length;i++) jsonData.push({id:fruits[i],name:fruits[i]});
            var colors = $('#colors').tagSuggest({
                data: jsonData,
                sortOrder: 'name',
                maxDropHeight: 200,
                name: 'colors'
            });
        }); 
$(document).ready(function() {
            var jsonData = [];
            var fruits = '<?php echo $sizes_lists; ?>'.split(',');
            for(var i=0;i<fruits.length;i++) jsonData.push({id:fruits[i],name:fruits[i]});
            var sizes = $('#sizes').tagSuggest({
                data: jsonData,
                sortOrder: 'name',
                maxDropHeight: 200,
                name: 'sizes'
            });
        });
$(document).ready(function() {
            var jsonData = [];
            var fruits = '<?php echo $uksizes_lists; ?>'.split(',');
            for(var i=0;i<fruits.length;i++) jsonData.push({id:fruits[i],name:fruits[i]});
            var ussizes = $('#ussizes').tagSuggest({
                data: jsonData,
                sortOrder: 'name',
                maxDropHeight: 200,
                name: 'ussizes'
            });
        });


$(document).ready(function(){
  
	 var k=1;
     $("#add_sep").click(function(){
      $('#addrs'+k).html("<div class='col-md-6' style='padding:0'><input style='border-radius:5px 0px 0px 5px' type='text' class='form-control' id='specificationnameid' name='specificationname[]' ></div><div class='col-md-6' style='padding:0'><input style='border-radius:0px 5px 5px 0px' type='text' class='form-control' id='specificationvalueid[]' name='specificationvalue[]' ></div>");
		$('#tab_sep').append('<div id="addrs'+(k+1)+'"></div>');
		if(k >=1){
			$('#delbtn').show();
		}
	  k++; 
	
  });
 
     $("#tab_delet").click(function(){
		if(k==2){
			$('#delbtn').hide(''); 
		 }
    	 if(k>1){
		 $("#addrs"+(k-1)).html('');
		 k--;
		 }
		
	 });

});
$(document).ready(function(){
  
	 var k=1;
     $("#add_file").click(function(){
      $('#addfile'+k).html("<div class='col-md-12' style='padding:0'><input type='file' name='picture_three[]' id='picture_three'  class='form-control' ></div>");
		$('#tab_file').append('<div class="col-md-12" style="padding-top:4px;" id="addfile'+(k+1)+'"></div>');
		if(k >=1){
			$('#delbtnfile').show();
		}
	  k++; 
	
  });
 
     $("#delbtnfile").click(function(){
		if(k==2){
			$('#delbtnfile').hide(''); 
		 }
    	 if(k>1){
		 $("#addfile"+(k-1)).html('');
		 k--;
		 }
		
	 });

});		
</script>
  



		
