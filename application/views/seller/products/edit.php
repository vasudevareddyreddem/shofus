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
			<form name=""  action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
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
	<form name="addproduct" id="addproduct" onsubmit="return validateForm()" action="<?php echo base_url('seller/products/update/'); ?>" method="post" enctype="multipart/form-data" >
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
				<select class="form-control " onchange="subcatwisegroceryproducts(this.value);getspecialinputs(this.value);removeextrafields(this.value);" id="subcategorylistes" name="editsubcategorylist"  >
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
				
				<select class="form-control" onchange="subcatwisegroceryproducts(this.value);getspecialinputs(this.value);removeextrafields(this.value);" id="subcategorylist" name="subcategorylist" >
				<option value="">Select Subcategory </option>

				</select>
			</div>
			<?php if(isset($productdetails['subitemid']) && $productdetails['subitemid']!=''){ ?>
			<div class="form-group col-md-12 nopaddingRight san-lg" id="oldsubitems">
				<label for="exampleInputEmail1">Sub Item </label>
				<select class="form-control" id="subitemid" name="subitemid" >
				<option value="">Select Subitems </option>
				<?php foreach($subitems as $list){ ?>
				<?php if($productdetails['subitemid']==$list['subitem_id']){ ?>
				<option selected="selected" value="<?php echo $list['subitem_id']; ?>"><?php echo $list['subitem_name']; ?></option>
				<?php } else{ ?>
				<option value="<?php echo $list['subitem_id']; ?>"><?php echo $list['subitem_name']; ?></option>
				<?php } } ?>
			</select>
			</div>
			<div class="form-group col-md-12 nopaddingRight san-lg" id="subitems" style="display:none;">
				<label for="exampleInputEmail1">Sub Item </label>
				<select class="form-control" id="editsubitemid" name="editsubitemid" >
				<option value="">Select Subitems </option>
			</select>
			</div>
			
			<?php } ?>
		
			
	</div>
	
							<input type="hidden" class="form-control" id="name" name="name" value="<?php echo isset($productdetails['name'])?$productdetails['name']:''; ?>" >

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
		<label for="exampleInputEmail1">Description</label>
		<div id="dynamic_field"></div>
		<?php $cnt=1;
		$numItems = count($productdescriptions);
		foreach ($productdescriptions as $list){ ?>
		
		<?php if($cnt==$numItems) { ?>
			 <div class="row">  <div style="position:relative;">
									<div class="col-sm-6 nopadding">
										<div class="form-group">
											<textarea type="text" class="form-control" id="description" name="description[]" value="" placeholder="Description"><?php echo isset($list['description'])?$list['description']:''; ?></textarea>
										</div>
									</div>
									<div class="col-sm-6 nopadding">
									<div class="">
										<input type="file" class="form-control" id="descimg<?php echo $list['desc_id']; ?>" name="descimg[]" onchange="uploadimage(0);" value=""> 
										<input type="hidden" class="form-control" id="olddescimg<?php echo $list['desc_id']; ?>" name="olddescimg[]" value="<?php echo isset($list['image'])?$list['image']:''; ?>">
									</div>
									</div>
									<div style="position:absolute;top:1px;right:14px;">
									<button style="border-radius:0px;" type="button" name="add" id="add" onclick="addmore();" class="btn btn-success"><span style="padding:3px;border-radius:0px;"class="glyphicon glyphicon-plus"></span></button>
                                    </div> 
									
                                   </div> 
                                   </div> 
		  <?php }else{ ?>
		   <div class="row" id="deletedecs<?php echo $list['desc_id'];?>">  <div style="position:relative;">
									<div class="col-sm-6 nopadding">
										<div class="form-group">
											<textarea type="text" class="form-control" id="description" name="description[]" value="" placeholder="Description"><?php echo isset($list['description'])?$list['description']:''; ?></textarea>
										</div>
									</div>
									<div class="col-sm-6 nopadding">
									<div class="">
										<input type="file" class="form-control" id="descimg<?php echo $list['desc_id']; ?>" name="descimg[]" onchange="uploadimage(0);" value=""> 
										<input type="hidden" class="form-control" id="olddescimg<?php echo $list['desc_id']; ?>" name="olddescimg[]" value="<?php echo isset($list['image'])?$list['image']:''; ?>">
									</div>
									</div>
									<div style="position:absolute;top:1px;right:0px;">
									<button type="button" name="removing" id="removing" onclick="removemore(<?php echo $list['desc_id']; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-minus"></span></button>
                                    </div> 
									
                                   </div> 
                                   </div> 
		  <?php } ?>
				
				<?php $cnt++;} ?>
	</div>
	
	

	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Warranty Details</label>
	
	</div><br>
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
	<div id="mobile_products"></div>
	<span id="newmobile_products">
	
	</span>
	<div id="grocery_products"></div>
	<div id="cloths_category"></div>
	<div id="bags_category"></div>
	<div id="footware_category"></div>
	
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Images</label>
	
	</div><br>
	
	
	<div class="row">
		<?php  if($productdetails['item_image'] !=''){ ?>
		<div class="form-group nopaddingRight col-md-6 san-lg">
		<label class="form-control-label" for="image">Product Image1</label>
		<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image'];?>" <?php echo $productdetails['item_image'];?>>
		</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image1</label>
				<input type="file" name='picture1' id="picture1"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image1'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image2</label>
			<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image1'];?>" <?php echo $productdetails['item_image1'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image2</label>
				<input type="file" name='picture2' id="picture2"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
	<?php  if($productdetails['item_image2'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image3</label>
			<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image2'];?>" <?php echo $productdetails['item_image2'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image3</label>
				<input type="file" name='picture3' id="picture3"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image3'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image4</label>
			<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image3'];?>" <?php echo $productdetails['item_image3'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image4</label>
				<input type="file" name='picture4' id="picture4"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
	<?php  if($productdetails['item_image4'] !=''){ ?>
		<div class="form-group nopaddingRight col-md-6 san-lg">
		<label class="form-control-label" for="image">Product Image5</label>
		<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image4'];?>" <?php echo $productdetails['item_image4'];?>>
		</div>
	<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image5</label>
				<input type="file" name='picture5' id="picture5"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image5'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image6</label>
			<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image5'];?>" <?php echo $productdetails['item_image5'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image6</label>
				<input type="file" name='picture6' id="picture6"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
	<?php  if($productdetails['item_image6'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image7</label>
			<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image6'];?>" <?php echo $productdetails['item_image6'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image7</label>
				<input type="file" name='picture7' id="picture7"  class="form-control" >
			</div>
		</div>
		<?php  if($productdetails['item_image7'] !=''){ ?>
			<div class="form-group nopaddingRight col-md-6 san-lg">
			<label class="form-control-label" for="image">Product Image8</label>
			<img  style="height:60px;width:auto;padding:10px;" src="<?php echo site_url('uploads/products/'); ?><?php echo $productdetails['item_image7'];?>" <?php echo $productdetails['item_image7'];?>>
			</div>
		<?php }  ?>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image8</label>
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
  var catid='<?php echo $productdetails['category_id'];?>';
  jQuery.ajax({
				url: "<?php echo site_url('seller/products/getolditemdata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					productname: '<?php echo $productdetails['item_name'];?>',
					categoryid: '<?php echo $productdetails['category_id'];?>',
					subcategoryid: <?php echo $productdetails['subcategory_id'];?>,
					},
				dataType: 'html',
				success: function (data) {
					$("#footware_category").hide();
					$("#newmobile_products").hide();
					$("#mobile_products").hide();
					$("#cloths_category").hide();
					$("#bags_category").hide();
					$("#grocery_products").hide();
					if(catid==21){
					$("#grocery_products").show();
					$("#grocery_products").empty();
					$("#grocery_products").append(data);
					}else if(catid==22){
						$("#cloths_category").show();
						$("#cloths_category").empty();
						$("#cloths_category").append(data);
					}else if(catid==23){
						$("#bags_category").show();
						$("#bags_category").empty();
						$("#bags_category").append(data);
					}else if(catid==24){
						$("#footware_category").show();
						$("#footware_category").empty();
						$("#footware_category").append(data);
					}else if(catid==20){
							$("#mobile_products").show();
							$("#mobile_products").empty();
							$("#mobile_products").append(data);
					}
				}
			});
function subcatwisegroceryproducts(id){
		var catid=$('#category_id').val();
			if(catid==20 || catid==21 || catid==22 || catid==23 || catid==24){
			jQuery.ajax({
				url: "<?php echo site_url('seller/products/getolditemdata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					productname: 0,
					categoryid: catid,
					subcategoryid: id,
					},
				dataType: 'html',
				success: function (data) {
					$("#footware_category").hide();
					$("#newmobile_products").hide();
					$("#mobile_products").hide();
					$("#cloths_category").hide();
					$("#bags_category").hide();
					$("#grocery_products").hide();
					if(catid==21){
					$("#grocery_products").show();
					$("#grocery_products").empty();
					$("#grocery_products").append(data);
					}else if(catid==22){
						$("#cloths_category").show();
						$("#cloths_category").empty();
						$("#cloths_category").append(data);
					}else if(catid==23){
						$("#bags_category").show();
						$("#bags_category").empty();
						$("#bags_category").append(data);
					}else if(catid==24){
						$("#footware_category").show();
						$("#footware_category").empty();
						$("#footware_category").append(data);
					}else if(catid==20){
							$("#mobile_products").show();
							$("#mobile_products").empty();
							$("#mobile_products").append(data);
					}
				}
			});
		}
		
	}
  function getspecialinputs(ids){
	var cat_id=$('#category_id').val();
	if(cat_id==21){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>seller/products/getsubitemsname",
				data: {
				form_key : window.FORM_KEY,
				subcatid: ids,
				},
				cache: false,
				success: function(data)
				{
					$('#subitems').show();
					$('#oldsubitems').hide();
					$("#editsubitemid").empty();
					$("#editsubitemid").html(data);
				} 
			});
	}
		
	
}
  var i=1;  
      function addmore(){
	 i++;
	 var cnt=i-1;
           $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-sm-6 nopadding"><div class="form-group"> <textarea type="text" class="form-control" id="description" name="description[]" value="" placeholder="description"></textarea></div></div><div class="col-sm-6 nopadding"><div class="form-group"><div>  <input type="file" class="form-control" id="descimg'+i+'" onchange="uploadimage('+i+');" name="descimg[]"><input type="hidden" class="form-control" id="olddescimg'+cnt+'" name="olddescimg[]" value=""><div class="" style="position:absolute;top:1px;right:14px;"> <button style="border-radius:0px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><span style="padding:3px;border-radius:0px;"class="glyphicon glyphicon-minus" class="glyphicon glyphicon-minus"></span> </button></div></div></div></div></div><div class="clear"></div>');  
           //$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      }  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
	  
	  function uploadimage(id){
		  var cnt=id-1;
			var test=document.getElementById('descimg'+id).value;
			var name=test.replace(/C:\\fakepath\\/i, '');
			$('#olddescimg'+cnt).val(name);
	  }
  function validateForm(){
		   var price=document.getElementById('product_price').value;
		   var specialprice=document.getElementById('special_price').value;
		   if(Number(specialprice) > Number(price)){
			  $('#errormsgvalidation').html('special price must be less than price');
			  return false;
		   }else{
			  return true;
		   }
		   
	   }
	  
	   function removemore(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('seller/products/removedescription');?>",
					data: {
						descid: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#deletedecs'+id).hide();
					}
				 }
				});
			}
			
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
			editsubitemid: {
					validators: {
					notEmpty: {
					message: 'Please select a subitem name'
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

function removeextrafields(){
	  
	   $('#productname').val('');
	   $('#skuid').val('');
	   $('#otherunique').val('');
	   $('#product_price').val('');
	   $('#special_price').val('');
	   $('#pqty').val('');
	   $('#warranty_summary').val('');
	   $('#warranty_type').val('');
	   $('#service_type').val('');
	   $('#return_policy').val('');
	   $('#highlights').val('');
	   $('#pbrand').val('');
	   $('#product_code').val('');
	   $('#ingredients').val('');
	   $('#key_feature').val('');
	   $('#unit').val('');
	   $('#packingtype').val('');
	   $('#disclaimer').val('');
	   $('#Processor').val('');
	   $('#screen_size').val('');
	   $('#internal_memeory').val('');
	   $('#camera').val('');
	   $('#sim_type').val('');
	   $('#os').val('');
	   $('#colour').val('');
	   $('#ram').val('');
	   $('#model_name').val('');
	   $('#model_id').val('');
	   $('#internal_memory').val('');
	   $('#expand_memory').val('');
	   $('#primary_camera').val('');
	   $('#primary_camera_feature').val('');
	   $('#secondary_camera').val('');
	   $('#secondary_camera_feature').val('');
	   $('#video_recording').val('');
	   $('#hd_recording').val('');
	   $('#flash').val('');
	   $('#other_camera_features').val('');
	   $('#battery_capacity').val('');
	   $('#talk_time').val('');
	   $('#standby_time').val('');
	   $('#operating_frequency').val('');
	   $('#preinstalled_browser').val('');
	   $('#2g').val('');
	   $('#3g').val('');
	   $('#4g').val('');
	   $('#wifi').val('');
	   $('#gps').val('');
	   $('#usb_connectivity').val('');
	   $('#bluetooth').val('');
	   $('#nfc').val('');
	   $('#edge').val('');
	   $('#edge_features').val('');
	   $('#music_player').val('');
	   $('#video_player').val('');
	   $('#audio_jack').val('');
	   $('#gpu').val('');
	   $('#sim_size').val('');
	   $('#sim_supported').val('');
	   $('#call_memory').val('');
	   $('#sms_memory').val('');
	   $('#phone_book_memory').val('');
	   $('#sensors').val('');
	   $('#java').val('');
	   $('#insales_package').val('');
	   $('#dislay_resolution').val('');
	   $('#display_type').val('');
	   
	  
  }		
</script>
  



		
