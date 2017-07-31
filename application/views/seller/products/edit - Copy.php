<style>
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
 .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		border:none;
	}

</style>
 <div class="content-wrapper mar_t_con" >
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
      
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
            <div class="panel-body">
			  <form name="addproduct" id="addproduct" action="<?php echo base_url('seller/products/update/'); ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="product_id" id="product_id" value="<?php echo isset($productdetails['item_id'])?$productdetails['item_id']:''; ?>">				
											
											<div class="form-group nopaddingRight col-md-12 san-lg">
											    <label for="exampleInputEmail1">Select Category</label>
												<select class="form-control " onchange="getsubcategory(this.value);" id="category_id" name="category_id">
												<option value="">Select Category</option>
												<?php foreach($category_details as $list){ ?>
												<?php if($productdetails['category_id']==$list['seller_category_id']){ ?>
													<option selected="selected" value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>

												<?php }else{ ?>
												<option value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>
												<?php }} ?>
												
											  </select>
											 
											</div>
											<div class="clear-fix"></div>
											<div id="editsubcat" class="form-group nopaddingRight col-md-6 san-lg" style="display:none">
											    <label for="exampleInputEmail1">Sub Category </label>
												<select class="form-control " id="subcategorylistes" name="editsubcategorylist" >
												<option value="">Select Subcategory </option>
												<?php foreach($subcatdata as $subcat_data){ ?>
												<?php if($productdetails['subcategory_id']==$subcat_data->subcategory_id){ ?>
												<option selected="selected" value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
												<?php } else{ ?>
												<option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
												<?php } } ?>
												</select>
											 </div>
											 <div id="chnagesubcat" class="form-group nopaddingRight col-md-6 san-lg" style="display:none">
											    <label for="exampleInputEmail1">Sub Category </label>
												<select class="form-control " id="subcategorylist" name="subcategorylist" >
												<option value="">Select Subcategory </option>

												</select>
											 
											</div>
										
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Sku code</label>
												<input type="text" class="form-control" name="skuid" id="skuid" value="<?php echo isset($productdetails['skuid'])?$productdetails['skuid']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Other Unique code</label>
												<input type="text" class="form-control" name="otherunique" id="otherunique" value="<?php echo isset($productdetails['item_code'])?$productdetails['item_code']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Product name</label>
												<input type="text" class="form-control" id="productname" name="productname" value="<?php echo isset($productdetails['item_name'])?$productdetails['item_name']:''; ?>" >
											</div>
											
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">price</label>
												<input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo isset($productdetails['item_cost'])?$productdetails['item_cost']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Special price</label>
												<input type="text" class="form-control" id="specialprice" name="specialprice" value="<?php echo isset($productdetails['special_price'])?$productdetails['special_price']:''; ?>" >
											</div>
											<div id="materialpurose" style="display:none;">
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label for="exampleInputEmail1">Sleeve / Fitting type </label>
											<input type="text" class="form-control" id="producttype" name="producttype" value="<?php echo isset($productdetails['producttype'])?$productdetails['producttype']:''; ?>">

											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Material</label>
												<input type="text" class="form-control" id="material" name="material" value="<?php echo isset($productdetails['material'])?$productdetails['material']:''; ?>" >
											</div>
											</div>
											<div >
											<div class="col-md-6">
											
												<div class="form-group ">
												<label class="col-md-2">Size 
												</label>
												<span class="pull-right col-md-10">

												<?php  //echo '<pre>';print_r($productcolors);exit;
												foreach($productsizes as $sizeslist){ ?> 
												<input type="hidden" name="oldsizes[]" value="<?php echo $sizeslist['p_size_name']; ?>">
												<a id="sizes_<?php echo $sizeslist['p_size_id'] ;?>" onclick="removesizes(<?php echo $sizeslist['p_size_id']?>);"class="btn btn-primary btn-xs"><?php echo $sizeslist['p_size_name']; ?>&nbsp;<span aria-hidden="true">×</span></a>
												<?php } ?>

												</span>
											<div class="clearfix"></div>
													<input class="form-control" id="sizes"  type="text"  name="sizes">
												</div>
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Weight</label>
												<input type="text" class="form-control" id="weight" name="weight" value="<?php echo isset($productdetails['weight'])?$productdetails['weight']:''; ?>" >
											</div>
											</div>
											
											<div class="col-md-6  ">
												<div class="form-group ">
												<label>Color</label>
												<span class="pull-right col-md-10">

												<?php  //echo '<pre>';print_r($productcolors);exit;
												foreach($productcolors as $colors_name){ ?> 
												<input type="hidden" name="oldcolors[]" value="<?php echo $colors_name['color_name']; ?>">
												<a id="colord_<?php echo $colors_name['p_color_id'] ;?>" onclick="removecolor(<?php echo $colors_name['p_color_id']?>);" class="btn btn-primary btn-xs"><?php echo $colors_name['color_name']; ?>&nbsp;<span aria-hidden="true">×</span></a>
												<?php } ?>

												</span>
												<div class="clearfix"></div>
													<input class="form-control" id="colors"  type="text" name="colors" value="">
													
												</div>
												
											</div>
											
											<div id="seasonpurpose" style="display:none;">
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Season</label>
												<input type="text" class="form-control" id="season" name="season" value="<?php echo isset($productdetails['season'])?$productdetails['season']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Brand </label>
												<input type="text" class="form-control" id="brand " name="brand" value="<?php echo isset($productdetails['brand'])?$productdetails['brand']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Gender</label>
												<select class="form-control " id="gender" name="gender"  >
												<option value="">Select </option>
												
													<?php if($productdetails['gender']=="0") {?> 
														<option value="0" selected>Male</option>	
															<?php }else{ ?>
														<option value="0">Male</option>	
													<?php } ?>
													<?php if($productdetails['gender']=="1") {?>
														<option value="1" selected>Female</option>	
															<?php }else{ ?>
														<option value="1">Female</option>
															<?php } ?>
															<?php if($productdetails['gender']=="2") {?> 
														<option value="2" selected>Both</option>	
															<?php }else{ ?>
														<option value="2">Both</option>	
													<?php } ?>
												</select>
											 </div>
											 
											 </div>
											 <div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Qty</label>
												<input type="text" class="form-control" id="qty" name="qty" value="<?php echo isset($productdetails['item_quantity'])?$productdetails['item_quantity']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Meta keywords</label>
												<input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo isset($productdetails['keywords'])?$productdetails['keywords']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Meta title</label>
												<input type="text" class="form-control" id="title" name="title" value="<?php echo isset($productdetails['title'])?$productdetails['title']:''; ?>" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Status</label>
												<select class="form-control " id="status" name="status" >
												<option value="">Select </option>
											
													<?php if($productdetails['item_status']=="1") {?>
														<option value="1" selected>Available</option>	
															<?php }else{ ?>
														<option value="1">Available</option>
															<?php } ?>
															<?php if($productdetails['item_status']=="0") {?> 
														<option value="0" selected>Unavailable</option>	
															<?php }else{ ?>
														<option value="0">Unavailable</option>	
													<?php } ?>
												</select>
											 </div>
											 <div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Product description</label>
												<textarea  placeholder="product Description" class="form-control" rows="3" id="product_description" name="product_description"><?php echo isset($productdetails['item_description'])?$productdetails['item_description']:''; ?></textarea>
											</div>
											<div  class="form-group nopaddingRight col-md-6 san-lg">
												<label for="exampleInputEmail1">Product specifications </label>
												<?php $i=0;foreach($productspcification as $spc){ ?>
												<div id="tab_sep11_<?php echo $spc['specification_id']; ?>">
													<div class="col-md-6" style="padding:0">
														<input style="border-radius:5px 0px 0px 5px" type="text" placeholder="Specification Name" class="form-control" id="specificationnameid" name="specificationname[]" value="<?php echo isset($spc['spc_name'])?$spc['spc_name']:''; ?>" >
													</div>
													<div class="col-md-6" style="padding:0">
														<input style="border-radius:0px 5px 5px 0px" type="text" placeholder="Specification Value"  class="form-control" id="specificationvalueid" name="specificationvalue[]" value="<?php echo isset($spc['spc_value'])?$spc['spc_value']:''; ?>" >
													</div>
													<button type="button" onclick="removeattachment(<?php echo $spc['specification_id']?>);" >
													<span aria-hidden="true">×</span>
													</button>
												</div>
												<?php $i++;} ?>
												<div id="tab_sep">
												<div class="col-md-6" style="padding:0">
														<input style="border-radius:5px 0px 0px 5px" type="text" placeholder="Specification Name" class="form-control" id="specificationnameid" name="specificationname[]" value="" >
													</div>
													<div class="col-md-6" style="padding:0">
														<input style="border-radius:0px 5px 5px 0px" type="text" placeholder="Specification Value"  class="form-control" id="specificationvalueid" name="specificationvalue[]" value="" >
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
											<div class="col-md-12"></div>
											<?php  if($productdetails['item_image'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image1</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image'];?>" <?php echo $productdetails['item_image'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image1</label>
												<input type="file" class="form-control" id="img1" name="img1"  >
											</div>
											<?php  if($productdetails['item_image1'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image2</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image1'];?>" <?php echo $productdetails['item_image1'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image2</label>
												<input type="file" class="form-control" id="img2" name="img2"  >
											</div>
											<?php  if($productdetails['item_image2'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image3</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image2'];?>" <?php echo $productdetails['item_image2'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image3</label>
												<input type="file" class="form-control" id="img3" name="img3"  >
											</div>
											<?php  if($productdetails['item_image3'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image4</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image3'];?>" <?php echo $productdetails['item_image3'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image4</label>
												<input type="file" class="form-control" id="img4" name="img4"  >
											</div>
											<?php  if($productdetails['item_image4'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image5</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image4'];?>" <?php echo $productdetails['item_image4'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image5</label>
												<input type="file" class="form-control" id="img5" name="img5"  >
											</div>
											<?php  if($productdetails['item_image5'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image6</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image5'];?>" <?php echo $productdetails['item_image5'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image6</label>
												<input type="file" class="form-control" id="img6" name="img6"  >
											</div>
											<?php  if($productdetails['item_image6'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image7</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image6'];?>" <?php echo $productdetails['item_image6'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image7</label>
												<input type="file" class="form-control" id="img7" name="img7"  >
											</div>
											<?php  if($productdetails['item_image7'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image8</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image7'];?>" <?php echo $productdetails['item_image7'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image8</label>
												<input type="file" class="form-control" id="img8" name="img8"  >
											</div>
											<?php  if($productdetails['item_image8'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image9</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image8'];?>" <?php echo $productdetails['item_image8'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image9</label>
												<input type="file" class="form-control" id="img9" name="img9"  >
											</div>
											<?php  if($productdetails['item_image9'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image10</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image9'];?>" <?php echo $productdetails['item_image9'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image10</label>
												<input type="file" class="form-control" id="img10" name="img10"  >
											</div>
											<?php  if($productdetails['item_image10'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image11</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image10'];?>" <?php echo $productdetails['item_image10'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image11</label>
												<input type="file" class="form-control" id="img11" name="img11"  >
											</div>
											<?php  if($productdetails['item_image11'] !=''){ ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label class="form-control-label" for="image">Product Image12</label>
											<img  style="width:50px;height:50px;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image11'];?>" <?php echo $productdetails['item_image11'];?>>
											</div>
											<?php }  ?>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">product Image12</label>
												<input type="file" class="form-control" id="img12" name="img12"  >
											</div>
											<div class="clearfix"></div>
											
											
											<div style="margin-top: 20px; margin-left: 15px;">
											<button type="submit" class="btn btn-primary" >Submit</button>
											<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/products'); ?>">Cancel</a>
											</div>
										</form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  </section>
  </div>
  <?php if($this->uri->segment(5)==2){ ?>
   <script>
  $('#seasonpurpose').show();
  $('#materialpurose').show();
   </script>
  <?php } ?>
	  
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
  <!--main content end--> 
  <script>
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
				 }
				});
			}
			
		}
   $('#editsubcat').show();
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
   $(document).ready(function(){
      var i=1;
	 
     $("#add_row").click(function(){
		  if(i <=11){
      $('#addr'+i).html("<td><input  name='picture_three[]'  type='file' class='form-control input-md' data-fv-notempty='true' data-fv-notempty-message='Please select an image' data-fv-file='true' data-fv-file-extension='jpeg,jpg,png' data-fv-file-type='image/jpeg,image/png' data-fv-file-maxsize='2097152' data-fv-file-message='The selected file is not valid'></td>");
	
				
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      $('#deletediv').show('');
	  
      i++; 
	   }
  });
 
     $("#delete_row").click(function(){
		 if(i==2){
			$('#deletediv').hide(''); 
		 }
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
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
		$('#editsubcat').hide();
		$('#chnagesubcat').show();
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
					regexp: /^[a-zA-Z0-9. -_&]+$/,
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
					regexp: /^[a-zA-Z0-9. -_&]+$/,
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
			producttype: {
					validators: {
					notEmpty: {
						message: 'Sleeve / Fitting type  is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Sleeve / Fitting type  can only consist of alphanumaric, space and dot'
					}
				}
			},
			material: {
					validators: {
					notEmpty: {
						message: 'Material is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Material  can only consist of alphanumaric, space and dot'
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
			weight: {
					validators: {
					notEmpty: {
						message: 'Weight is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Weight can only consist of alphanumaric, space and dot'
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
					regexp: /^[a-zA-Z0-9. -_&]+$/,
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
					regexp: /^[a-zA-Z0-9. -_&]+$/,
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
			'specificationvalue[]': {
					validators: {
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Specification value wont allow <> [] = % '
					}
				}
			},
			img2: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img3: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img4: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img5: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img6: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img7: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img8: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img9: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img10: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img11: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img12: {
				validators: {
					regexp: {
						regexp: /\.(jpe?g|png|gif)$/i,
						message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img1: {
					 validators: {
						
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
            }
			},
        }
    });
});

  
	  
</script>




		
