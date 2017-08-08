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
}
#ussizes{
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
			<?php if($this->session->flashdata('addsuccess')){ ?>

					<div class="alert dark alert-warning alert-dismissible" id="infoMessage">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					 <?php foreach($this->session->flashdata('addsuccess') as $error){?>
					
					<?php echo $error.'<br/>'; ?>
					
					
					<?php } ?></div><?php } ?>
	
	<div class="col-md-6 " style="position:absolute;right:24px; width:39%;">
	<label >&nbsp; </label>
		<div  class=" shad_down " >
			<h4 class="text-center" style="color:#006a99 ">Download this File to add Multiple Products</h4>
				<form id="importproducts" name="importproducts" onsubmit="return validations();" action ="<?php echo base_url('seller/import/uploadproducts/');?>" method="post" enctype="multipart/form-data">
				<input type="hidden" id="category_ids" name="category_ids">
				<input type="hidden" id="subcategory_ids" name="subcategory_ids">
				<p class="text-center" id="labelids" style="display:none;">
				<a id="documentfilelink" type="button" class="btn btn-primary btn-xs">Download</a>
				<a type="button" class="btn btn-warning btn-xs" data-toggle="collapse" data-target="#fileups">Upload</a>
				</p>
				<div class="collapse  form-group nopaddingRight san-lg" id="fileups">
					 <label for="exampleInputEmail1">Import File</label>
					<input type="file" class="form-control" name="categoryfile" id="categoryfile" >
					</br>
					<button type="submit" class="btn btn-warning btn-xs">Submit</button>
				</div>
				</form>
			
		</div >
	</div>
	
	<form name="addproduct" id="addproduct" action="<?php echo base_url('seller/products/insert/'); ?>" method="post" enctype="multipart/form-data" >
	<div class="row">
			<span id="errormsg"></span>
			<div class="form-group col-md-6 nopaddingRight san-lg">
				<label for="exampleInputEmail1">Category </label>
				<select class="form-control " onchange="getsubcategory(this.value);getproductinputs(this.value);" id="category_id" name="category_id">
				<option value="">Select Category</option>
				<?php foreach($category_details as $list){ ?>
				<option value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>
				<?php } ?>

				</select>
				<p  id="categoryhideshow" class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Category</a> </p>
				<div style="display:none;margin-top:14px;" id="addcat">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Request for Add Category</label>
					<input type="text" class="form-control" placeholder="category Name"  name="addcategoryname" id="addcategoryname" >
				</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-6 nopaddingRight san-lg">
				<label for="exampleInputEmail1">Sub Category </label>
				<select class="form-control" onchange="getspecialinputs(this.value);getinputfiledshideshow(this.value);" id="subcategorylist" name="subcategorylist" >
				<option value="">Select Subcategory </option>

				</select>
				<p id="subcategoryhideshow" class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Subcategory</a> </p>
				<div style="display:none;margin-top:14px;" id="addsubcat">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Request for Add SubCategory </label>
					<input type="text" class="form-control" placeholder="Subcategory Name" name="addsubcategoryname" id="addsubcategoryname" >
				</div>
				</div>
			</div>
			
			
	</div>
	<div class="clearfix"></div>
	<hr>
	<div id="inputfiledshideshow" style="display:none;">
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
		<div class=" col-md-12">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">sub item</label>
					<input type="text" class="form-control" id="product_sub_tem" name="product_sub_tem" >
				</div>
			</div>
	</div>
	<div class="row col-md-12 form-group" id="sizeid"  >
			<label>Size</label>
			<input class="form-control" id="sizes"  type="text" name="sizes"/>
					
	</div>
	<div class="row col-md-12 form-group" id="colorid">
			<label>Color</label>
			<input class="form-control" id="colors"  type="text" name="colors"/>
					
	</div>
	<div class="row" class=" col-md-12" >
			<div class="col-md-6 form-group" id="idealfor"style="display:none;">
			<div class="form-group nopaddingRight san-lg">
			<label for="exampleInputEmail1">Ideal FOR</label>
			<input type="text" class="form-control" id="ideal_for" name="ideal_for" >
			</div>
			</div>
		<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Brand</label>
					<input type="text" class="form-control" id="brand" name="brand" >
				</div>
		</div>
						
		
		
	</div>
	
	<!-- food category purpose-->
	<div class="row" id="foodcategoryinputs" style="display:none;">
			
			<div class="col-md-6 form-group">
			<label>Cuisine</label>
			<input class="form-control" id="product_scusine"  type="text" name="product_scusine"/>
			</div>
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
					<input type="text" class="form-control" id="product_type8" name="product_type8" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
				</div>
			</div>
	
	</div>
	<div class="row" id="mensfabricsinputs1" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Type</label>
					<input type="text" class="form-control" id="product_type8" name="product_type8" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
				</div>
			</div>
	
	</div>	
	
	<div class="row" id="winterwaerinputs1" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Type</label>
					<input type="text" class="form-control" id="product_type7" name="product_type7" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
				</div>
			</div>
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme1"  type="text" name="product_theme1" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
			</div>
	</div>
	<div class="row" id="winterwaerinputs" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Type</label>
					<input type="text" class="form-control" id="product_type7" name="product_type7" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
				</div>
			</div>
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme1"  type="text" name="product_theme1" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
			</div>
	</div>
	<div class="row" id="product_themeetc" style="display:none;">
		
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme"  type="text" name="product_theme" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
			</div>
	</div>
	<div class="row" id="product_theme" style="display:none;">
		
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme"  type="text" name="product_theme" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
			</div>
	</div>
	<div class="row" id="smartwatchesinputs" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">DIAL SHAPE</label>
					<input type="text" class="form-control" id="dial_shape2" name="dial_shape2" value="<?php echo isset($productdetails['dial_shape'])?$productdetails['dial_shape']:''; ?>" >
				</div>
			</div>
			<div id="compatibleos" class="col-md-6 form-group">
			<label>COMPATIBLE OS</label>
			<input class="form-control" id="compatible_os"  type="text" name="compatible_os" value="<?php echo isset($productdetails['compatibleos'])?$productdetails['compatibleos']:''; ?>" />
			</div>
			<div class="col-md-6 form-group">
			<label>USAGE</label>
			<input class="form-control" id="prouduct_usage"  type="text" name="prouduct_usage" value="<?php echo isset($productdetails['usage'])?$productdetails['usage']:''; ?>" />
			</div>
			<div class="col-md-6 form-group">
			<label>DISPLAY TYPE</label>
			<input class="form-control" id="prouduct_display_type"  type="text" name="prouduct_display_type" value="<?php echo isset($productdetails['display_type'])?$productdetails['display_type']:''; ?>" />
			</div>
	</div>
	<div class="row" id="watchesinputs" style="display:none;">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">DIAL SHAPE</label>
					<input type="text" class="form-control" id="dial_shape2" name="dial_shape2" value="<?php echo isset($productdetails['dial_shape'])?$productdetails['dial_shape']:''; ?>" >
				</div>
			</div>
			<div class="col-md-6 form-group">
			<label>USAGE</label>
			<input class="form-control" id="prouduct_usage"  type="text" name="prouduct_usage" value="<?php echo isset($productdetails['usage'])?$productdetails['usage']:''; ?>" />
			</div>
			<div class="col-md-12 form-group">
			<label>DISPLAY TYPE</label>
			<input class="form-control" id="prouduct_display_type"  type="text" name="prouduct_display_type" value="<?php echo isset($productdetails['display_type'])?$productdetails['display_type']:''; ?>" />
			</div>
	</div>
	<div class="row" id="footwareinputs" style="display:none;">
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme5"  type="text" name="product_theme5" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
			</div>
			<div class="col-md-6 form-group">
			<label>OCCASION</label>
			<input class="form-control" id="product_occasion2"  type="text" name="product_occasion2" value="<?php echo isset($productdetails['occasion'])?$productdetails['occasion']:''; ?>" />
			</div>
			<div class="col-md-6 form-group">
			<label>Size(UK)</label>
			<input class="form-control" id="ussizes"  type="text" name="ussizes"/>
			</div>
	</div>
	<div class="row" id="womensaccessoriesinputs" style="display:none;">
			<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme4"  type="text" name="product_theme4" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
			</div>
	</div>
	
	<div class="row" id="jwelleryinputs" style="display:none;">
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Material</label>
		<input type="text" class="form-control" id="material1" name="material1" value="<?php echo isset($productdetails['material'])?$productdetails['material']:''; ?>" >
		</div>
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Gemstones</label>
		<input type="text" class="form-control" id="product_gemstones" name="product_gemstones" value="<?php echo isset($productdetails['gemstones'])?$productdetails['gemstones']:''; ?>" >
		</div>
	</div>
	<div class="row" id="womenswatchesinputs" style="display:none;">
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Material</label>
		<input type="text" class="form-control" id="Material2" name="Material2" value="<?php echo isset($productdetails['material'])?$productdetails['material']:''; ?>" >
		</div>
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type6" name="product_type6" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
		</div>
		<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">DIAL SHAPE</label>
					<input type="text" class="form-control" id="dial_shape1" name="dial_shape1" value="<?php echo isset($productdetails['dial_shape'])?$productdetails['dial_shape']:''; ?>" >
				</div>
			</div>
		<div class="col-md-6 form-group">
			<label>STRAP COLOR</label>
			<input class="form-control" id="prouduct_strap_color"  type="text" name="prouduct_strap_color"  value="<?php echo isset($productdetails['strap_color'])?$productdetails['strap_color']:''; ?>" />
		</div>
		<div class="col-md-12 form-group">
			<label>DIAL COLOR</label>
			<input class="form-control" id="prouduct_dial_color"  type="text" name="prouduct_dial_color" value="<?php echo isset($productdetails['dial_color'])?$productdetails['dial_color']:''; ?>"/>
		</div>
	</div>
	<div class="row" id="mensaccessoriesinputs" style="display:none;">
		<div class="col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type5" name="product_type5" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
		</div>
		<div class="col-md-6 form-group">
			<label>Theme</label>
			<input class="form-control" id="product_theme3"  type="text" name="product_theme3" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>"/>
		</div>
		<div class="col-md-12 form-group">
		 <label for="exampleInputEmail1">PACK OF</label>
		<input type="text" class="form-control" id="product_packof2" name="product_packof2" value="<?php echo isset($productdetails['packof'])?$productdetails['packof']:''; ?>" >
		</div>
		
	</div>
	<div class="row" id="mensehinicwearinputs" style="display:none;">
		<div class="col-md-6 form-group">
		<label>Theme</label>
		<input class="form-control" id="product_theme2"  type="text" name="product_theme2" value="<?php echo isset($productdetails['theme'])?$productdetails['theme']:''; ?>" />
		</div>
		<div class="col-md-6 form-group">
		<label>OCCASION</label>
		<input class="form-control" id="product_occasion1"  type="text" name="product_occasion1" value="<?php echo isset($productdetails['occasion'])?$productdetails['occasion']:''; ?>"/>
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type4" name="product_type4" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PACK OF</label>
		<input type="text" class="form-control" id="product_packof1" name="product_packof1" value="<?php echo isset($productdetails['packof'])?$productdetails['packof']:''; ?>" >
		</div>
		
	</div>
	<!--- for electronic purpose-->
	<div class="row" id="mobileaccessoriesinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		<label>COMPATIBLE MOBILES</label>
		<input class="form-control" id="product_compatible_mobiles"  type="text" name="product_compatible_mobiles"/>
		</div>
	</div>
	<div class="row" id="camerainputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type3" name="product_type3" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">MEGA PIXEL</label>
		<input type="text" class="form-control" id="product_mega_pixel" name="product_mega_pixel" value="<?php echo isset($productdetails['mega_pixel'])?$productdetails['mega_pixel']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SENSOR TYPE</label>
		<input type="text" class="form-control" id="product_sensor_type" name="product_sensor_type" value="<?php echo isset($productdetails['sensor_type'])?$productdetails['sensor_type']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BATTERY TYPE</label>
		<input type="text" class="form-control" id="product_battery_type" name="product_battery_type" value="<?php echo isset($productdetails['battery_type'])?$productdetails['battery_type']:''; ?>" >
		</div>
	</div>
	<div class="row" id="routersinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type2" name="product_type2" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">WIRELESS SPEED</label>
		<input type="text" class="form-control" id="wireless_speed" name="wireless_speed" value="<?php echo isset($productdetails['wireless_speed'])?$productdetails['wireless_speed']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">FREQUENCY BAND</label>
		<input type="text" class="form-control" id="frequency_band" name="frequency_band" value="<?php echo isset($productdetails['frequency_band'])?$productdetails['frequency_band']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BROADBAND COMPATIBILITY</label>
		<input type="text" class="form-control" id="broadband_compatibility" name="broadband_compatibility" value="<?php echo isset($productdetails['broadband_compatibility'])?$productdetails['broadband_compatibility']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">NO. OF USB PORTS</label>
		<input type="text" class="form-control" id="usb_ports" name="usb_ports" value="<?php echo isset($productdetails['usb_ports'])?$productdetails['usb_ports']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">FREQUENCY</label>
		<input type="text" class="form-control" id="product_frequency" name="product_frequency" value="<?php echo isset($productdetails['frequency'])?$productdetails['frequency']:''; ?>" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">ANTENNAE</label>
		<input type="text" class="form-control" id="product_antennae" name="product_antennae" value="<?php echo isset($productdetails['antennae'])?$productdetails['antennae']:''; ?>" >
		</div>
		
	</div>
	<div class="row" id="tabletsinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">DISPLAY SIZE</label>
		<input type="text" class="form-control" id="product_display_size3" name="product_display_size3" value="<?php echo isset($productdetails['display_size'])?$productdetails['display_size']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">CONNECTIVITY</label>
		<input type="text" class="form-control" id="product_connectivity" name="product_connectivity" value="<?php echo isset($productdetails['connectivity'])?$productdetails['connectivity']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RAM</label>
		<input type="text" class="form-control" id="product_ram3" name="product_ram3" value="<?php echo isset($productdetails['ram'])?$productdetails['ram']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">VOICE CALLING FACILITY</label>
		<input type="text" class="form-control" id="voice_calling_facility" name="voice_calling_facility" value="<?php echo isset($productdetails['voice_calling_facility'])?$productdetails['voice_calling_facility']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM</label>
		<input type="text" class="form-control" id="operating_system3" name="operating_system3" value="<?php echo isset($productdetails['operatingsystem'])?$productdetails['operatingsystem']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">INTERNAL STORAGE</label>
		<input type="text" class="form-control" id="internal_storage3" name="internal_storage3" value="<?php echo isset($productdetails['internal_storage'])?$productdetails['internal_storage']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BATTERY CAPACITY</label>
		<input type="text" class="form-control" id="battery_capacity2" name="battery_capacity2" value="<?php echo isset($productdetails['battery_capacity'])?$productdetails['battery_capacity']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PRIMARY CAMERA</label>
		<input type="text" class="form-control" id="primary_camera2" name="primary_camera2" value="<?php echo isset($productdetails['primary_camera'])?$productdetails['primary_camera']:''; ?>" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">PROCESSOR CLOCK SPEED</label>
		<input type="text" class="form-control" id="processor_clock_speed" name="processor_clock_speed" value="<?php echo isset($productdetails['clock_speed'])?$productdetails['clock_speed']:''; ?>" >
		</div>
	</div>
	<div class="row" id="laptopsinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SCREEN SIZE</label>
		<input type="text" class="form-control" id="product_display_size2" name="product_display_size2" value="<?php echo isset($productdetails['display_size'])?$productdetails['display_size']:''; ?>"  >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PROCESSOR</label>
		<input type="text" class="form-control" id="product_processor" name="product_processor" value="<?php echo isset($productdetails['processor'])?$productdetails['processor']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PROCESSOR BRAND</label>
		<input type="text" class="form-control" id="product_processor_brand1" name="product_processor_brand1" value="<?php echo isset($productdetails['processor_brand'])?$productdetails['processor_brand']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM</label>
		<input type="text" class="form-control" id="operating_system2" name="operating_system2" value="<?php echo isset($productdetails['operatingsystem'])?$productdetails['operatingsystem']:''; ?>">
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RAM</label>
		<input type="text" class="form-control" id="product_ram2" name="product_ram2" value="<?php echo isset($productdetails['ram'])?$productdetails['ram']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">LIFESTYLE</label>
		<input type="text" class="form-control" id="life_style" name="life_style" value="<?php echo isset($productdetails['life_style'])?$productdetails['life_style']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">STORAGE TYPE</label>
		<input type="text" class="form-control" id="storage_type" name="storage_type" value="<?php echo isset($productdetails['storage_type'])?$productdetails['storage_type']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">DEDICATED GRAPHICS MEMORY</label>
		<input type="text" class="form-control" id="dedicated_graphics_memory" name="dedicated_graphics_memory" value="<?php echo isset($productdetails['graphics_memory'])?$productdetails['graphics_memory']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">TOUCH SCREEN</label>
		<input type="text" class="form-control" id="touch_screen" name="touch_screen" value="<?php echo isset($productdetails['touch_screen'])?$productdetails['touch_screen']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		<label for="exampleInputEmail1">Weight</label>
		<input type="text" class="form-control" id="weight" name="weight" value="<?php echo isset($productdetails['weight'])?$productdetails['weight']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">HARD DISK CAPACITY</label>
		<input type="text" class="form-control" id="internal_storage2" name="internal_storage2" value="<?php echo isset($productdetails['internal_storage'])?$productdetails['internal_storage']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">GRAPHICS MEMORY TYPE</label>
		<input type="text" class="form-control" id="graphics_memory_type" name="graphics_memory_type" value="<?php echo isset($productdetails['memory_type'])?$productdetails['memory_type']:''; ?>" >
		</div>
		<div class=" col-md-12 form-group">
		 <label for="exampleInputEmail1">RAM TYPE</label>
		<input type="text" class="form-control" id="ram_type" name="ram_type" value="<?php echo isset($productdetails['ram_type'])?$productdetails['ram_type']:''; ?>">
		</div>
		
	</div>
	<div class="row" id="mobilesinputs" style="display:none;">
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RAM</label>
		<input type="text" class="form-control" id="product_ram1" name="product_ram1" value="" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM</label>
		<input type="text" class="form-control" id="operating_system1" name="operating_system1" value="" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">INTERNAL STORAGE</label>
		<input type="text" class="form-control" id="internal_storage4" name="internal_storage4" value="<?php echo isset($productdetails['internal_storage'])?$productdetails['internal_storage']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SCREEN SIZE</label>
		<input type="text" class="form-control" id="product_display_size1" name="product_display_size1" value="<?php echo isset($productdetails['display_size'])?$productdetails['display_size']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">NETWORK TYPE</label>
		<input type="text" class="form-control" id="network_type" name="network_type" value="<?php echo isset($productdetails['network_type'])?$productdetails['network_type']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">BATTERY CAPACITY</label>
		<input type="text" class="form-control" id="battery_capacity1" name="battery_capacity1" value="<?php echo isset($productdetails['battery_capacity'])?$productdetails['battery_capacity']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SPECIALITY</label>
		<input type="text" class="form-control" id="product_speciality" name="product_speciality" value="<?php echo isset($productdetails['speciality'])?$productdetails['speciality']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">Type</label>
		<input type="text" class="form-control" id="product_type1" name="product_type1" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">OPERATING SYSTEM VERSION NAME</label>
		<input type="text" class="form-control" id="operating_system_version_name" name="operating_system_version_name" value="<?php echo isset($productdetails['operating_system_version_name'])?$productdetails['operating_system_version_name']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PROCESSOR BRAND</label>
		<input type="text" class="form-control" id="product_processor_brand2" name="product_processor_brand2" value="<?php echo isset($productdetails['processor_brand'])?$productdetails['processor_brand']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">RESOLUTION TYPE</label>
		<input type="text" class="form-control" id="resolution_type" name="resolution_type" value="<?php echo isset($productdetails['resolution_type'])?$productdetails['resolution_type']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">PRIMARY CAMERA</label>
		<input type="text" class="form-control" id="primary_camera1" name="primary_camera1" value="<?php echo isset($productdetails['primary_camera'])?$productdetails['primary_camera']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SECONDARY CAMERA</label>
		<input type="text" class="form-control" id="secondary_camera" name="secondary_camera" value="<?php echo isset($productdetails['secondary_camera'])?$productdetails['secondary_camera']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">SIM TYPE</label>
		<input type="text" class="form-control" id="sim_type" name="sim_type" value="<?php echo isset($productdetails['sim_type'])?$productdetails['sim_type']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">CLOCK SPEED</label>
		<input type="text" class="form-control" id="clock_speed" name="clock_speed" value="<?php echo isset($productdetails['clock_speed'])?$productdetails['clock_speed']:''; ?>" >
		</div>
		<div class=" col-md-6 form-group">
		 <label for="exampleInputEmail1">NUMBER OF CORES</label>
		<input type="text" class="form-control" id="number_of_cores" name="number_of_cores" value="<?php echo isset($productdetails['cores'])?$productdetails['cores']:''; ?>" >
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
</div>
	</form>
	</section>
</div>

  <!--main content end--> 
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
   <script type="text/javascript">

  $(document).ready(function() {
    $('#importproducts').bootstrapValidator({
       
        fields: {
           categoryfile: {
               validators: {
					notEmpty: {
						message: 'Please select a File'
					},
					regexp: {
						regexp: /\.(xlsx|xls|xlsm)$/i,
					message: 'Uploaded file is not a valid. Only xlsx,xls,xlsm files are allowed'
					}
				}
            }
        }
    });
});
function validations(){
	
	var catid= document.getElementById('category_id').value;
	var subcatid= document.getElementById('subcategorylist').value;
	document.getElementById('category_ids').value = catid;
	document.getElementById('subcategory_ids').value = subcatid;

	if(catid=='' && subcatid=='' ){
		 $("#errormsg").html("Please select Ctaegory  and Subcategory").css("color", "red");
		 return false;
	}
	if(catid=='' ){
		 $("#errormsg").html("Please select Ctaegory").css("color", "red");
		 return false;
	}if(subcatid=='' ){
		 $("#errormsg").html("Please select Subcategory").css("color", "red");
		 return false;
	}
	$("#errormsg").html("");
	return true;
	
}
$(document).ready(function(){
    $("#categoryhideshow").click(function(){
        $("#addcat").toggle();
    });
  
});
$(document).ready(function(){
    $("#subcategoryhideshow").click(function(){
        $("#addsubcat").toggle();
    });
  
});	


 function getproductinputs(id){
	
	 if(id==18){
		  $('#foodcategoryinputs').show();
		  $('#idealfor').hide();
		  $('#sizeid').hide();
		  $('#colorid').hide();
	  }else if(id==21){
		$('#colorid').hide();  
		$('#sizeid').show();  
		$('#ideal_for').hide();  
		  
	  }else{
		  $('#foodcategoryinputs').hide();
		
		  $('#idealfor').show();
		  $('#sizeid').show();
		  $('#colorid').show();
	  }
	 
	  
}
function getinputfiledshideshow(ids){
	
	if(ids!=''){
		$('#inputfiledshideshow').show();
		$('#labelids').show();
		$.ajax
		({
		type: "POST",
		url: "<?php echo base_url();?>seller/products/getproductdocumentfile",
		data: {
			form_key : window.FORM_KEY,
			subcategroyid: ids,
			},
		dataType: 'json',
		cache: false,
		success: function(data)
		{
		 var url='<?php echo base_url('assets/subcategoryimportfiles/'); ?>'+data.document;
		 $('a#documentfilelink').attr({target: '_blank', href  : url});

		} 
		});
		
	}else{
		$('#inputfiledshideshow').hide();
		$('#labelids').hide();
	}
	
}
function getspecialinputs(ids){
	if(ids==7 || ids==24){
		$('#sizeid').hide();
		$('#colorid').hide();
	}
	if(ids==40){
		$('#sizeid').hide();
		$('#colorid').hide();
		$('#mobilesinputs').show();
	}else{
		$('#mobilesinputs').hide();
		$('#sizeid').show();		
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
		
		$('#sizeid').show();
		$('#colorid').show();
		$('#mensfabricsinputs1').show();
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
	if(ids==27){
		$('#watchesinputs').show();
	}else{
		$('#watchesinputs').hide();	
	}
	if(ids==25){
		$('#sizeid').show();
		$('#colorid').show();
		$('#womensaccessoriesinputs').show();
	}else{
		$('#womensaccessoriesinputs').hide();	
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
			product_scusine: {
					validators: {
					notEmpty: {
						message: 'Cusine  is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Cusine  can only consist of alphanumaric, space and dot'
					}
				}
			},
			brand: {
					validators: {
					notEmpty: {
						message: 'Brand  is required'
					},
                   regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Brand  can only consist of alphanumaric, space and dot'
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
			product_theme1: {
					validators: {
					notEmpty: {
						message: 'Theme is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Theme can only consist of alphanumaric, space and dot'
					}
				}
			},product_theme2: {
					validators: {
					notEmpty: {
						message: 'Theme is required'
					},
					regexp: {
					regexp: /^[ a-zA-Z0-9.,$#@-_&]+$/,
					message: 'Theme can only consist of alphanumaric, space and dot'
					}
				}
			},product_theme3: {
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
			product_theme4: {
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
			product_theme5: {
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
  



		