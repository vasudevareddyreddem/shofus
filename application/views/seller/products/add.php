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
			<small>Add Listing</small>
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
	<form name="addproduct" id="addproduct" action="<?php echo base_url('seller/products/insert/'); ?>" method="post" enctype="multipart/form-data" >

	<div class="row">
	<div class=" col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Category </label>
				<select class="form-control " onchange="getsubcategory(this.value);getproductinputs(this.value);" id="category_id" name="category_id">
				<option value="">Select Category</option>
				<?php foreach($category_details as $list){ ?>
				<option value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>
				<?php } ?>

				</select>
				<p class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Category</a> </p>
			</div>
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Sub Category </label>
				<select class="form-control" onchange="getspecialinputs(this.value);" id="subcategorylist" name="subcategorylist" >
				<option value="">Select Subcategory </option>

				</select>
				<p class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Subcategory</a> </p>
			</div>
			
			
	</div>	
	<div class=" col-md-6 ">
	<label >&nbsp; </label>
		<div  class=" shad_down " >
			<h4 class="text-center" style="color:#006a99 ">Download this File to add Multiple Products</h4>
			<p class="text-center">
			<button type="button" class="btn btn-primary btn-xs">Download</button>
			<button type="button" class="btn btn-warning btn-xs">Upload</button>
			</p>
			<p class="text-center">(for each Subcategory)</p>
		</div >
	</div>
	</div>
	
	<div class="clearfix"></div>
	<hr>
	
	
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					    <label for="exampleInputEmail1">Product name</label>
						<input type="text" class="form-control" id="productname" name="productname" >
											
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Sku code</label>
					<input type="text" class="form-control" name="skuid" id="skuid" >
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					   <label for="exampleInputEmail1">Other Unique code</label>
						<input type="text" class="form-control" name="otherunique" id="otherunique" >
				</div>
			</div>
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">price</label>
					<input type="text" class="form-control" id="product_price" name="product_price" >
			</div>
		</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Special price</label>
					<input type="text" class="form-control" id="specialprice" name="specialprice" >
				</div>
			</div>
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Offers</label>
					<input type="text" class="form-control" id="offers" name="offers" >
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Discount</label>
					<input type="text" class="form-control" id="discount" name="discount" >
				</div>
			</div>
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Qty</label>
					<input type="text" class="form-control" id="qty" name="qty" >
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					   <label for="exampleInputEmail1">Meta keywords</label>
						<input type="text" class="form-control" id="keywords" name="keywords" >
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Meta title</label>
					<input type="text" class="form-control" id="title" name="title" >
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Status</label>
					<select class="form-control " id="status" name="status" >
					<option value="">Select </option>
					<option value="1">Available</option>
					<option value="0">Unavailable</option>
					</select>
				</div>
			</div>
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					    <label for="exampleInputEmail1">Product description</label>
						<textarea  placeholder="product Description" style="width: 478px; height: 38px;" class="form-control" rows="3" id="product_description" name="product_description"></textarea>
											
				</div>
			</div>
	</div>
	<div class="row">
		<div class=" col-md-6">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">sub item</label>
					<input type="text" class="form-control" id="product_sub_tem" name="product_sub_tem" >
				</div>
			</div>
	</div>
	<div class="row" class=" col-md-12" id="size_color" style="display:none;">
			<div class="form-group col-md-6" id="personalcareappliancesinputs" style="display:none">
			<label>Size</label>
			<input class="form-control" id="sizes"  type="text" name="sizes"/>
			</div>
			<div class="form-group col-md-6">
			<label>Color</label>
			<input class="form-control" id="colors"  type="text" name="colors"/>
			</div>			
	</div>
	<div class="row" class=" col-md-12" id="idealfor" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Ideal FOR</label>
					<input type="text" class="form-control" id="ideal_for" name="ideal_for" >
				</div>
		</div>
						
		
		
	</div>
	
	<!-- food category purpose-->
	<div class="row" id="foodcategoryinputs" style="display:none;">
			
			<div class="col-md-6 form-group">
			<label>sufficient for?</label>
			<input class="form-control" id="product_sufficient"  type="text" name="product_sufficient"/>
			</div>
	</div>
	<!-- food category purpose-->
	<!-- special inputs for subcategory  --->
	<div class="row" id="mensfabricsinputs" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Type</label>
					<input type="text" class="form-control" id="product_type" name="product_type" >
				</div>
			</div>
	
	</div>
	<div class="row" id="winterwaerinputs" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Type</label>
					<input type="text" class="form-control" id="product_type" name="product_type" >
				</div>
			</div>
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme"  type="text" name="product_theme"/>
			</div>
	</div>
	<div class="row" id="smartwatchesinputs" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">DIAL SHAPE</label>
					<input type="text" class="form-control" id="dial_shape" name="dial_shape" >
				</div>
			</div>
			<div class="col-md-6 form-group">
			<label>COMPATIBLE OS</label>
			<input class="form-control" id="compatible_os"  type="text" name="compatible_os"/>
			</div>
			<div class="col-md-6 form-group">
			<label>USAGE</label>
			<input class="form-control" id="prouduct_usage"  type="text" name="prouduct_usage"/>
			</div>
			<div class="col-md-6 form-group">
			<label>DISPLAY TYPE</label>
			<input class="form-control" id="prouduct_display_type"  type="text" name="prouduct_display_type"/>
			</div>
	</div>
	<div class="row" id="footwareinputs" style="display:none;">
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme"  type="text" name="product_theme"/>
			</div>
			<div class="col-md-6 form-group">
			<label>OCCASION</label>
			<input class="form-control" id="product_occasion"  type="text" name="product_occasion"/>
			</div>
			<div class="col-md-6 form-group">
			<label>Size(UK)</label>
			<input class="form-control" id="ussizes"  type="text" name="ussizes"/>
			</div>
	</div>
	<div class="row" id="womensaccessoriesinputs" style="display:none;">
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme"  type="text" name="product_theme"/>
			</div>
	</div>
	
	<div class="row" id="jwelleryinputs" style="display:none;">
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Material</label>
		<input type="text" class="form-control" id="material" name="material" >
		</div>
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Gemstones</label>
		<input type="text" class="form-control" id="product_gemstones" name="product_gemstones" >
		</div>
	</div>
	<div class="row" id="womenswatchesinputs" style="display:none;">
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Material</label>
		<input type="text" class="form-control" id="Material" name="Material" >
		</div>
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type" name="product_type" >
		</div>
		<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">DIAL SHAPE</label>
					<input type="text" class="form-control" id="dial_shape" name="dial_shape" >
				</div>
			</div>
		<div class="col-md-6 form-group">
			<label>STRAP COLOR</label>
			<input class="form-control" id="prouduct_strap_color"  type="text" name="prouduct_strap_color"/>
		</div>
		<div class="col-md-12 form-group">
			<label>DIAL COLOR</label>
			<input class="form-control" id="prouduct_dial_color"  type="text" name="prouduct_dial_color"/>
		</div>
	</div>
	<div class="row" id="mensaccessoriesinputs" style="display:none;">
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type" name="product_type" >
		</div>
		<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme"  type="text" name="product_theme"/>
		</div>
		<div class="col-md-12 form-group">
		 <label for="exampleInputEmail1">PACK OF</label>
		<input type="text" class="form-control" id="product_packof" name="product_packof" >
		</div>
		
	</div>
	<div class="row" id="mensehinicwearinputs" style="display:none;">
		<div class="col-md-6 form-group">
		<label>Theme</label>
		<input class="form-control" id="product_theme"  type="text" name="product_theme"/>
		</div>
		<div class="col-md-6 form-group">
		<label>OCCASION</label>
		<input class="form-control" id="product_occasion"  type="text" name="product_occasion"/>
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type" name="product_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PACK OF</label>
		<input type="text" class="form-control" id="product_packof" name="product_packof" >
		</div>
		
	</div>
	<!-- electronice purpose-->
	<div class="row" id="mobileaccessoriesinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		<label>COMPATIBLE MOBILES</label>
		<input class="form-control" id="product_compatible_mobiles"  type="text" name="product_compatible_mobiles"/>
		</div>
	</div>
	<div class="row" id="camerainputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type" name="product_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">MEGA PIXEL</label>
		<input type="text" class="form-control" id="product_mega_pixel" name="product_mega_pixel" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SENSOR TYPE</label>
		<input type="text" class="form-control" id="product_sensor_type" name="product_sensor_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BATTERY TYPE</label>
		<input type="text" class="form-control" id="product_battery_type" name="product_battery_type" >
		</div>
	</div>
	<div class="row" id="routersinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type" name="product_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">WIRELESS SPEED</label>
		<input type="text" class="form-control" id="wireless_speed" name="wireless_speed" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">FREQUENCY BAND</label>
		<input type="text" class="form-control" id="frequency_band" name="frequency_band" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BROADBAND COMPATIBILITY</label>
		<input type="text" class="form-control" id="broadband_compatibility" name="broadband_compatibility" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">NO. OF USB PORTS</label>
		<input type="text" class="form-control" id="usb_ports" name="usb_ports" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">FREQUENCY</label>
		<input type="text" class="form-control" id="product_frequency" name="product_frequency" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">ANTENNAE</label>
		<input type="text" class="form-control" id="product_antennae" name="product_antennae" >
		</div>
		
	</div>
	<div class="row" id="tabletsinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">DISPLAY SIZE</label>
		<input type="text" class="form-control" id="product_display_size" name="product_display_size" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">CONNECTIVITY</label>
		<input type="text" class="form-control" id="product_connectivity" name="product_connectivity" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RAM</label>
		<input type="text" class="form-control" id="product_ram" name="product_ram" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">VOICE CALLING FACILITY</label>
		<input type="text" class="form-control" id="voice_calling_facility" name="voice_calling_facility" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM</label>
		<input type="text" class="form-control" id="operating_system" name="operating_system" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">INTERNAL STORAGE</label>
		<input type="text" class="form-control" id="internal_storage" name="internal_storage" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BATTERY CAPACITY</label>
		<input type="text" class="form-control" id="battery_capacity" name="battery_capacity" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PRIMARY CAMERA</label>
		<input type="text" class="form-control" id="primary_camera" name="primary_camera" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">PROCESSOR CLOCK SPEED</label>
		<input type="text" class="form-control" id="processor_clock_speed" name="processor_clock_speed" >
		</div>
	</div>
	<div class="row" id="laptopsinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SCREEN SIZE</label>
		<input type="text" class="form-control" id="product_display_size" name="product_display_size" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PROCESSOR</label>
		<input type="text" class="form-control" id="product_processor" name="product_processor" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PROCESSOR BRAND</label>
		<input type="text" class="form-control" id="product_processor_brand" name="product_processor_brand" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM</label>
		<input type="text" class="form-control" id="operating_system" name="operating_system" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RAM</label>
		<input type="text" class="form-control" id="product_ram" name="product_ram" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">LIFESTYLE</label>
		<input type="text" class="form-control" id="life_style" name="life_style" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">STORAGE TYPE</label>
		<input type="text" class="form-control" id="storage_type" name="storage_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">DEDICATED GRAPHICS MEMORY</label>
		<input type="text" class="form-control" id="dedicated_graphics_memory" name="dedicated_graphics_memory" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">TOUCH SCREEN</label>
		<input type="text" class="form-control" id="touch_screen" name="touch_screen" >
		</div>
		<div class=" col-md-6 form-group">
		<label for="exampleInputEmail1">Weight</label>
		<input type="text" class="form-control" id="weight" name="weight" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">HARD DISK CAPACITY</label>
		<input type="text" class="form-control" id="internal_storage" name="internal_storage" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">GRAPHICS MEMORY TYPE</label>
		<input type="text" class="form-control" id="graphics_memory_type" name="graphics_memory_type" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">RAM TYPE</label>
		<input type="text" class="form-control" id="ram_type" name="ram_type" >
		</div>
		
	</div>
	<div class="row" id="mobilesinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RAM</label>
		<input type="text" class="form-control" id="product_ram" name="product_ram" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM</label>
		<input type="text" class="form-control" id="operating_system" name="operating_system" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">INTERNAL STORAGE</label>
		<input type="text" class="form-control" id="internal_storage" name="internal_storage" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SCREEN SIZE</label>
		<input type="text" class="form-control" id="product_display_size" name="product_display_size" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">NETWORK TYPE</label>
		<input type="text" class="form-control" id="network_type" name="network_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BATTERY CAPACITY</label>
		<input type="text" class="form-control" id="battery_capacity" name="battery_capacity" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SPECIALITY</label>
		<input type="text" class="form-control" id="product_speciality" name="product_speciality" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type" name="product_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM VERSION NAME</label>
		<input type="text" class="form-control" id="operating_system_version_name" name="operating_system_version_name" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PROCESSOR BRAND</label>
		<input type="text" class="form-control" id="product_processor_brand" name="product_processor_brand" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RESOLUTION TYPE</label>
		<input type="text" class="form-control" id="resolution_type" name="resolution_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PRIMARY CAMERA</label>
		<input type="text" class="form-control" id="primary_camera" name="primary_camera" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SECONDARY CAMERA</label>
		<input type="text" class="form-control" id="secondary_camera" name="secondary_camera" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SIM TYPE</label>
		<input type="text" class="form-control" id="sim_type" name="sim_type" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">CLOCK SPEED</label>
		<input type="text" class="form-control" id="clock_speed" name="clock_speed" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">NUMBER OF CORES</label>
		<input type="text" class="form-control" id="number_of_cores" name="number_of_cores" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">INTERNAL STORAGE</label>
		<input type="text" class="form-control" id="internal_storage" name="internal_storage" >
		</div>
		
	</div>
	
	
	<div class="row">
			<div class=" col-md-6">
				<div id="tab_sep">
					<div class="col-md-6 form-group" style="padding:0">
						<label for="exampleInputEmail1">Product specifications </label>
						<input style="border-radius:5px 0px 0px 5px" type="text" placeholder="Specification Name" class="form-control" id="specificationnameid" name="specificationname[]" >
					</div>
					<div class="col-md-6 form-group" style="padding:0">
						<label for="exampleInputEmail1">&nbsp; </label>
						<input style="border-radius:0px 5px 5px 0px" type="text" placeholder="Specification Value"  class="form-control" id="specificationvalueid" name="specificationvalue[]" >
					</div>
				<div id="addrs1"></div>
				</div>

				<div class="pull-right" id="delbtn" style="padding-top:10px;display:none">
					<a id="tab_delet" class="btn btn-default btn-xs pull-left">Delete Row</a>
				</div>
				<div class="pull-right" style="padding-top:10px;">
					<a id="add_sep" class="btn btn-default btn-xs pull-left">Add Row</a>
				</div>
			</div>
			<div class=" col-md-6">
				<div id="tab_file">
					<div class="col-md-12 form-group" >
					<label for="exampleInputEmail1">Product Image</label>
						<input type="file" name='picture_three[]' id="picture_three"  class="form-control" >
					</div>
					<div  id="addfile1" style="padding:5px;;"></div>
				</div>
				<div class="pull-right" id="delbtnfile" style="padding-top:10px;display:none">
					<a id="tab_delet_file" class="btn btn-default btn-xs pull-left">Delete File</a>
				</div>
				<div class="pull-right" style="padding-top:10px;">
					<a id="add_file" class="btn btn-default btn-xs pull-left">Add File</a>
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
  
  $('#size_color').show()
  $('#personalcareappliancesinputs').show()
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
			skuid: {
					validators: {
					notEmpty: {
						message: 'Sku id is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Sku id can only consist of alphanumaric, space and dot'
					}
				}
			},
			otherunique: {
					validators: {
					notEmpty: {
						message: 'Other Unique code is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Other Unique can only consist of alphanumaric, space and dot'
					}
				}
			},
			productname: {
					validators: {
					notEmpty: {
						message: 'Product name is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Product name can only consist of alphanumaric, space and dot'
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
			specialprice: {
					validators: {
					notEmpty: {
						message: 'Special price is required'
					},
                   regexp: {
					regexp: /^[0-9.]+$/,
					message: 'Special price can only consist of digits'
					}
				}
			},
			discount: {
					validators: {
					notEmpty: {
						message: 'Discount is required'
					},
                   regexp: {
					regexp: /^[0-9.]+$/,
					message: 'Discount can only consist of digits'
					}
				}
			},
			offers: {
					validators: {
					notEmpty: {
						message: 'Offer is required'
					},
                    regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Offer  can only consist of alphanumaric, space and dot'
					}
				}
			},
			producttype: {
					validators: {
					notEmpty: {
						message: 'Sleeve / Fitting type  is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Sleeve / Fitting type  can only consist of alphanumaric, space and dot'
					}
				}
			},
		
			sizes: {
					validators: {
					notEmpty: {
						message: 'please select a Size'
					}
				}
			},
			colors: {
					validators: {
					notEmpty: {
						message: 'please select a color'
					}
				}
			},
			
			qty: {
					validators: {
					notEmpty: {
						message: 'Qty is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'Qty can only consist of digits'
					}
				}
			},
			keywords: {
					validators: {
					notEmpty: {
						message: 'Meta keywords is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Meta keywords can only consist of alphanumaric, space and dot'
					}
				}
			},
			title: {
					validators: {
					notEmpty: {
						message: 'Meta title is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Meta title can only consist of alphanumaric, space and dot'
					}
				}
			},
			status: {
					validators: {
					notEmpty: {
						message: 'please select a status'
					}
				}
			},
			product_description: {
					validators: {
					notEmpty: {
						message: 'Product description is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Product description wont allow <> [] = % '
					}
				}
			},
			'specificationname[]': {
					validators: {
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Specification Name wont allow <> [] = % '
					}
				}
			},
			
			'picture_three[]': {
					 validators: {
						 notEmpty: {
						message: 'product Image is required'
					},
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
            }
			},
			
			ideal_for: {
					validators: {
					notEmpty: {
						message: 'Ideal for is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Ideal for can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_sub_tem: {
					validators: {
					notEmpty: {
						message: 'sub item is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'sub item can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_sufficient: {
					validators: {
					notEmpty: {
						message: 'sufficient for is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'sufficient for can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_type: {
					validators: {
					notEmpty: {
						message: 'Type is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Type can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_theme: {
					validators: {
					notEmpty: {
						message: 'Theme is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Theme can only consist of alphanumaric, space and dot'
					}
				}
			},
			dial_shape: {
					validators: {
					notEmpty: {
						message: 'Dial shape is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Dial shape can only consist of alphanumaric, space and dot'
					}
				}
			},
			compatible_os: {
					validators: {
					notEmpty: {
						message: 'Compatible os is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Compatible os can only consist of alphanumaric, space and dot'
					}
				}
			},
			prouduct_usage: {
					validators: {
					notEmpty: {
						message: 'Usage  is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Usage can only consist of alphanumaric, space and dot'
					}
				}
			},
			prouduct_display_type: {
					validators: {
					notEmpty: {
						message: 'Display Type is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Display Type can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_occasion: {
					validators: {
					notEmpty: {
						message: 'Occasion is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Occasion can only consist of alphanumaric, space and dot'
					}
				}
			},
			ussizes: {
					validators: {
					notEmpty: {
						message: 'Size (UK) is required'
					}
				}
			},
			material: {
					validators: {
					notEmpty: {
						message: 'Material is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Material  can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_gemstones: {
					validators: {
					notEmpty: {
						message: 'Gemstones is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Gemstones can only consist of alphanumaric, space and dot'
					}
				}
			},
			dial_shape: {
					validators: {
					notEmpty: {
						message: 'Dial shape is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Dial shape can only consist of alphanumaric, space and dot'
					}
				}
			},
			prouduct_strap_color: {
					validators: {
					notEmpty: {
						message: 'Strap color is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Strap color can only consist of alphanumaric, space and dot'
					}
				}
			},
			prouduct_dial_color: {
					validators: {
					notEmpty: {
						message: 'Dial color is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Dial color can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_packof: {
					validators: {
					notEmpty: {
						message: 'Pack of is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Pack of can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_compatible_mobiles: {
					validators: {
					notEmpty: {
						message: 'Compatible mobiles is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Compatible mobiles can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_mega_pixel: {
					validators: {
					notEmpty: {
						message: 'Mega pixel is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Mega pixel can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_sensor_type: {
					validators: {
					notEmpty: {
						message: 'Sensor type is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Sensor type can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_battery_type: {
					validators: {
					notEmpty: {
						message: 'Battery Type is required'
					},
                    regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Battery Type can only consist of alphanumaric, space and dot'
					}
				}
			},
			wireless_speed: {
					validators: {
					notEmpty: {
						message: 'Wireless Speed is required'
					},
                    regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Wireless Speed can only consist of alphanumaric, space and dot'
					}
				}
			},
			frequency_band: {
					validators: {
					notEmpty: {
						message: 'Frequency Band is required'
					},
                    regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Frequency Band can only consist of alphanumaric, space and dot'
					}
				}
			},
			broadband_compatibility: {
					validators: {
					
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Compatibility can only consist of alphanumaric, space and dot'
					}
				}
			},
			usb_ports: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Ports can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_frequency: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Frequency can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_antennae: {
					validators: {
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Frequency can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_display_size: {
					validators: {
					notEmpty: {
					message: 'DisPlay Size is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'DisPlay Size can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_connectivity: {
					validators: {
					notEmpty: {
					message: 'Connectivity is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Connectivity can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_ram: {
					validators: {
					notEmpty: {
					message: 'Ram is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Ram can only consist of alphanumaric, space and dot'
					}
				}
			},
			voice_calling_facility: {
					validators: {
					notEmpty: {
					message: 'voice calling facility is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'voice calling facility can only consist of alphanumaric, space and dot'
					}
				}
			},
			operating_system: {
					validators: {
					notEmpty: {
					message: 'Operating system is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Operating system can only consist of alphanumaric, space and dot'
					}
				}
			},
			internal_storage: {
					validators: {
					notEmpty: {
					message: 'Internal storage is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Internal storage can only consist of alphanumaric, space and dot'
					}
				}
			},
			battery_capacity: {
					validators: {
					notEmpty: {
					message: 'Battery capacity is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Battery capacity can only consist of alphanumaric, space and dot'
					}
				}
			},
			primary_camera: {
					validators: {
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Primary camera can only consist of alphanumaric, space and dot'
					}
				}
			},
			processor_clock_speed: {
					validators: {
						notEmpty: {
					message: 'Clock speed is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Clock speed can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_processor: {
					validators: {
						notEmpty: {
					message: 'Processor is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Processor can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_processor_brand: {
					validators: {
						notEmpty: {
					message: 'Brand is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Brand can only consist of alphanumaric, space and dot'
					}
				}
			},
			life_style: {
					validators: {
						notEmpty: {
					message: 'Life style is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Life style can only consist of alphanumaric, space and dot'
					}
				}
			},
			storage_type: {
					validators: {
					
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'storage type can only consist of alphanumaric, space and dot'
					}
				}
			},
			dedicated_graphics_memory: {
					validators: {
					
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Graphics memory can only consist of alphanumaric, space and dot'
					}
				}
			},
			touch_screen: {
					validators: {
						notEmpty: {
					message: 'touch screen is required'
					},regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'touch screen can only consist of alphanumaric, space and dot'
					}
				}
			},
			weight: {
					validators: {
					notEmpty: {
						message: 'Weight is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Weight can only consist of alphanumaric, space and dot'
					}
				}
			},
			graphics_memory_type: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Graphics memory type can only consist of alphanumaric, space and dot'
					}
				}
			},
			ram_type: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Ram type can only consist of alphanumaric, space and dot'
					}
				}
			},
			network_type: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Network type can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_speciality: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Speciality can only consist of alphanumaric, space and dot'
					}
				}
			},
			operating_system_version_name: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Operating system version name can only consist of alphanumaric, space and dot'
					}
				}
			},
			resolution_type: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Resolution type can only consist of alphanumaric, space and dot'
					}
				}
			},
			secondary_camera: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Secondary camera can only consist of alphanumaric, space and dot'
					}
				}
			},
			sim_type: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Sim Type can only consist of alphanumaric, space and dot'
					}
				}
			},
			clock_speed: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'clock speed can only consist of alphanumaric, space and dot'
					}
				}
			},
			number_of_cores: {
					validators: {
					
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Number of cores can only consist of alphanumaric, space and dot'
					}
				}
			},
			
			'specificationname[]': {
					 validators: {
						 notEmpty: {
						message: 'specificationname is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'specificationname  wont allow <> [] = % '
					}
            }
			},
			'specificationvalue[]': {
					 validators: {
						 notEmpty: {
						message: 'specificationvalue is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'specificationvalue value wont allow <> [] = % '
					}
            }
			},
			
			
			
        }
    });
});
  
  
 
  function getspecialinputs(id){
	  if(id==8 || id==19 || id==20 || id==28 || id==52 || id==29){
		  $('#winterwaerinputs').show();
	  }else{
		  $('#winterwaerinputs').hide();
	  }
	  if(id==9){
		  $('#personalcareappliancesinputs').hide();
	  }else{
		  $('#personalcareappliancesinputs').show();
	  }
	  if(id==10){
		  $('#smartwatchesinputs').show();
	  }else{
		  $('#smartwatchesinputs').hide();
	  }
	  if(id==11){
		  $('#footwareinputs').show();
	  }else{
		  $('#footwareinputs').hide();
	  }
	  if(id==12 || id==13 || id==14 || id==16 || id==17){
		  $('#womensaccessoriesinputs').show();
	  }else{
		  $('#womensaccessoriesinputs').hide();
	  } 
	  if(id==15){
		  $('#jwelleryinputs').show();
	  }else{
		  $('#jwelleryinputs').hide();
	  }
	  if(id==50){
		  $('#womenswatchesinputs').show();
	  }else{
		  $('#womenswatchesinputs').hide();
	  } 
	  if(id==22){
		  $('#mensaccessoriesinputs').show();
	  }else{
		  $('#mensaccessoriesinputs').hide();
	  }
	  if(id==51){
		  $('#mensehinicwearinputs').show();
	  }else{
		  $('#mensehinicwearinputs').hide();
	  }
	  if(id==23 || id==25){
		  $('#mensfabricsinputs').show();
	  }else{
		  $('#mensfabricsinputs').hide();
	  } 
	  if(id==30){
		  $('#mobileaccessoriesinputs').show();
	  }else{
		  $('#mobileaccessoriesinputs').hide();
	  } 
	  if(id==34){
		  $('#camerainputs').show();
	  }else{
		  $('#camerainputs').hide();
	  }
	  if(id==35){
		  $('#tabletsinputs').show();
	  }else{
		  $('#tabletsinputs').hide();
	  }
	  if(id==36){
		  $('#routersinputs').show();
		   $('#size_color').hide();
	  }else{
		  $('#routersinputs').hide();
		   $('#size_color').hide();

	  } 
	  if(id==39){
		  $('#laptopsinputs').show();
	  }else{
		  $('#laptopsinputs').hide();

	  }
	  if(id==40){
		  $('#mobilesinputs').show();
	  }else{
		  $('#mobilesinputs').hide();

	  } 
	   
		  
  }
	  
	  
  function getproductinputs(id){
	 if(id==18){
		  $('#foodcategoryinputs').show();
		  $('#idealfor').hide();
		  $('#size_color').hide();
	  }else{
		  $('#foodcategoryinputs').hide();
		  $('#idealfor').show();
		  $('#size_color').show();
	  }
	 
	  
}
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
	  if(id==2){
		  $('#materialpurose').show();
		  $('#seasonpurpose').show();
	  }else{
		  $('#materialpurose').hide(); 
		  $('#seasonpurpose').hide(); 
	  }
	  if(id!=''){
		$('#subcategorylist').empty();
		jQuery.ajax({
				url: "<?php echo site_url('seller/products/get_subcaregories_list');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					catid: id,
					},
				dataType: 'html',
				success: function (data) {
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
            var fruits = '<?php echo $sizes_lists; ?>'.split(',');
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
      $('#addrs'+k).html("<div class='col-md-6' style='padding:0'><input style='border-radius:5px 0px 0px 5px' type='text' class='form-control' id='specificationnameid[]' name='specificationname[]' ></div><div class='col-md-6' style='padding:0'><input style='border-radius:0px 5px 5px 0px' type='text' class='form-control' id='specificationvalueid[]' name='specificationvalue[]' ></div>");
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
  



		
