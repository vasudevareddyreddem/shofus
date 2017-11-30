 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/jquery-ui.css">
  <script src="<?php echo base_url(); ?>assets/seller/js/jquery-ui.js"></script>

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




.twitter-typeahead{
	display: block !important;
}



.tt-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 495px;
}
.tt-suggestion {
	font-size: 16px;  /* Set suggestion dropdown font size */
	padding: 3px 20px;
}
.tt-suggestion:hover {
	cursor: pointer;
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
.down_fil {
	position:absolute;
	right:24px;
	width:39%;
}
@media (max-width: 1024px) {
.down_fil {
	position:absolute;
	right:24px;
	width:32%;
}	
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
	
	<div class="col-md-6 down_fil" >
	<label >&nbsp; </label>
		<div  class=" shad_down " >
			<h4 class="text-center" style="color:#006a99 ">Download this File to add Multiple Products</h4>
				<form id="importproducts" name="importproducts" onsubmit="return validations();" action ="<?php echo base_url('seller/import/uploadproducts/');?>" method="post" enctype="multipart/form-data">
				<input type="hidden" id="category_ids" name="category_ids">
				<input type="hidden" id="subcategory_ids" name="subcategory_ids">
				<input type="hidden" id="subitemids" name="subitemids">
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
	
	<form onsubmit="return validateForm()" name="addproduct" id="addproduct" action="<?php echo base_url('seller/products/insert/'); ?>" method="post" enctype="multipart/form-data" >
	<div class="row">
			<span id="errormsg"></span>
			<div class="form-group col-md-6 nopaddingRight san-lg">
				<label for="exampleInputEmail1">Category </label>
				<select class="form-control " onchange="removeextrafields();getsubcategory(this.value);groceryproducts(this.value);" id="category_id" name="category_id">
				<option value="">Select Category</option>
				<?php foreach($category_details as $list){ ?>
				<option value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>
				<?php } ?>
			
				</select>
				<span id="suberrormsg" style="color:red;"></span>
				<p  id="categoryhideshow" class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Category</a> </p>
				<span style="color:red" id="addcaterrormsg1"></span>
				<div style="display:none;margin-top:14px;" id="addcat">
				<span style="color:red" id="addcaterrormsg"></span>

				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Request for Add Category</label>
					<input type="text" class="form-control" placeholder="category Name"  name="addcategoryname" id="addcategoryname" >
					<button type="button" onclick="addrequestcategory();" id="addcat">Add</button>

				</div>

				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-6 nopaddingRight san-lg">
			<input type="hidden" id="nametypeahead" name="nametypeahead" value="">
				<label for="exampleInputEmail1">Sub Category </label>
				<select class="form-control" onchange="getspecialinputs(this.value);getinputfiledshideshow(this.value);removeextrafields(this.value);" id="subcategorylist" name="subcategorylist" >
				<option value="">Select Subcategory </option>

				</select>
				<p id="subcategoryhideshow" class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Subcategory</a> </p>
				<span style="color:red" id="addsubcaterrormsg1"></span>
				<div style="display:none;margin-top:14px;" id="addsubcat">
				<span style="color:red" id="addsubcaterrormsg"></span>

				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Request for Add SubCategory </label>
					<input type="text" class="form-control" placeholder="Subcategory Name" name="addsubcategoryname" id="addsubcategoryname" >
					<button type="button" onclick="addrequestsubcategory();" id="addsubcat">Add</button>
				</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-6 nopaddingRight san-lg" id="subitems" style="display:none;">
				<label for="exampleInputEmail1">Sub Item </label>
				<select class="form-control" id="subitemid" name="subitemid" >
				<option value="">Select Subitems </option>
			</select>
			</div>
			
			
	</div>
	<div class="clearfix"></div>
	<hr>
	<div id="inputfiledshideshow" style="">
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					   <label for="exampleInputEmail1">product Name</label>
					   
						<input  style="font-size:16px" type="text" class="form-control tt-query tags"  autocomplete="off" spellcheck="false" onkeyup="getoldproducts(this.value);"  onchange="getoldproduct_details(this.value);" name="product_name" id="product_name" >
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
					<input onkeyup="enablesubbmit();" autocomplete="off" type="text" class="form-control" id="special_price" name="special_price" value="<?php echo isset($item_details['special_price'])?$item_details['special_price']:''; ?>" >
				</div>
				<span style="color:red;" id="errormsgvalidation"></span>
			</div>
			
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Qty</label>
					<input type="text" class="form-control" id="pqty" name="pqty" value="<?php echo isset($item_details['item_quantity'])?$item_details['item_quantity']:''; ?>" >
				</div>
			</div>
		
	</div>
	
	<hr>
	<div class="row">
		<label for="exampleInputEmail1">Description</label>
		
				  <div class="row">
					  <div class="col-sm-6 nopadding">
						<div class="form-group">
							<textarea type="text" class="form-control" id="description" onkeyup="enablesubbmit();" name="description[]" value="" placeholder="Description"><?php echo isset($item_details['description'])?$item_details['description']:''; ?></textarea>
						</div>
					  </div>


						<div class="col-sm-6 nopadding">
						  <div class="form-group">
							<div class="input-group">
										<input type="file" class="form-control" id="descimg" name="descimg[]">

							  <div class="input-group-btn">
								<button style="" class="btn  pad_btn btn-success 
									" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
							  </div>
							</div>
						  </div>
						</div>
				</div>
				<div id="education_fields"></div>
				<span id="descerrormsg"></span>
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
				<input type="text" class="form-control" id="warranty_summary" name="warranty_summary" value="<?php echo isset($item_details['warranty_summary'])?$item_details['warranty_summary']:''; ?>" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Warranty Type</label>
				<input type="text" class="form-control" id="warranty_type" name="warranty_type" value="<?php echo isset($item_details['warranty_type'])?$item_details['warranty_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Service Type</label>
				<input type="text" class="form-control" id="service_type" name="service_type" value="<?php echo isset($item_details['service_type'])?$item_details['service_type']:''; ?>" >
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<hr>
	
	
	<div id="mobile_products"></div>
	<span id="newmobile_products">
	
	</span>
	<div id="grocery_products"></div>
	<div class="clearfix"></div>
	<br>
	<div class="" style="position:relative;">
	<hr style="border-bottom:2px solid #006a99">
	<label style="position:absolute;top:-20px;background:#fff;border:2px solid  #006a99;border-radius:6px;padding:10px;left:0" >Images</label>
	
	</div><br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image1</label>
				<input type="file" onchange="enablesubbmit();" name='picture1' id="picture1"  class="form-control" >
			</div>
			<span id="uploadimgerror"></span>
		</div>
		
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image2</label>
				<input type="file" name='picture2' id="picture2"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image3</label>
				<input type="file" name='picture3' id="picture3"  class="form-control" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image4</label>
				<input type="file" name='picture4' id="picture4"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image5</label>
				<input type="file" name='picture5' id="picture5"  class="form-control" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image6</label>
				<input type="file" name='picture6' id="picture6"  class="form-control" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image7</label>
				<input type="file" name='picture7' id="picture7"  class="form-control" >
			</div>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image8</label>
				<input type="file" name='picture8' id="picture8"  class="form-control" >
			</div>
		</div>
	</div>
</div>
	<div>
		<button type="submit" id="keysubtton" name="buttonSubmit" class="btn btn-primary" >Submit</button>
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
   $( function() {
    var availableTags = [];
    $( "#product_name" ).autocomplete({
      source: availableTags
    });
  } );
  
  function getoldproducts(val){
   	
   		jQuery.ajax({
   			url: "<?php echo site_url('seller/products/relatedproduct_details');?>",
   			type: 'post',
   			data: {
   				form_key : window.FORM_KEY,
   				producname: val,
   				},
   			dataType: 'json',
   			success: function (data) {
				var availableTags = data;
   					 $( "#product_name" ).autocomplete({
   						 
   					   source: availableTags,
   						select: function(event, ui) { 
   						}
   					});
   					
   			}
   		});
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
					$("#subitemid").empty();
					$("#subitemid").html(data);
				} 
			});
	}else{
		$('#subitems').hide();
		  $('subitemid').val();
	}
		
	
}
function changememory(id){
	$('#internal_memory').val(id);
}
function changesimtype(id){
	$('#sim_supported').val(id);
}
jQuery.ajax({
				url: "<?php echo site_url('seller/products/getolditemdata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					productname: 0,
					categoryid: 0,
					subcategoryid: 0,
					},
				dataType: 'html',
				success: function (data) {
					$("#newmobile_products").hide();
					$("#mobile_products").empty();
					$("#mobile_products").append(data);
					
				}
			});
	function groceryproducts(id){
		if(id==21){
			jQuery.ajax({
				url: "<?php echo site_url('seller/products/getolditemdata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					productname: 0,
					categoryid: id,
					subcategoryid: 0,
					},
				dataType: 'html',
				success: function (data) {
					$("#newmobile_products").hide();
					$("#mobile_products").hide();
					$("#grocery_products").append(data);
				}
			});
		}else{
			$("#grocery_products").hide();
			$("#grocery_products").empty();
			$("#newmobile_products").show();
			$("#mobile_products").show();
		}
		
	}
   function getoldproduct_details(val){
	   var subcategory=document.getElementById('subcategorylist').value;
	   var categoryids=document.getElementById('category_id').value;
	   var categoryids=document.getElementById('category_id').value;
	   var special_prices=document.getElementById('special_price').value;
	   var pqtys=document.getElementById('pqty').value;
	    if(special_prices!='' && pqtys!=''){
		}else{
			
			jQuery.ajax({
				url: "<?php echo site_url('seller/products/getolditemdata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					productname: val,
					categoryid: categoryids,
					subcategoryid: subcategory,
					},
				dataType: 'html',
				success: function (data) {
					if(categoryids==21){
					$("#grocery_products").show();
					$("#mobile_products").hide();
					$("#grocery_products").empty();
					$("#grocery_products").append(data);

					}else{
					$("#grocery_products").hide();
					$("#newmobile_products").hide();
					$("#mobile_products").empty();
					$("#mobile_products").append(data);
					}
					
					
				}
			});
		}
	   
	   
   }
   function IsMobile(reasontype) {
        var regex = /^[0-9]+$/;
        return regex.test(reasontype);
        }
	    function validateForm(){
		   var price=document.getElementById('product_price').value;
		   var specialprice=document.getElementById('special_price').value;
		   var desc=document.getElementById('description').value;
		   	var img = document.getElementById('picture1').value;

		   if(specialprice==''){
			   $('#errormsgvalidation').html('Please enter special price');
			   $('#errormsgvalidation1').html('Please enter special price');
			  return false;
		   }
		  
			   if (!IsMobile(specialprice)) {
            $("#errormsgvalidation").html("Please Enter Correct special price").css("color", "red");
            $("#errormsgvalidation1").html("Please Enter Correct special price").css("color", "red");
            jQuery('#seller_mobile').focus();
            return false;
            } 
			if(Number(specialprice) > Number(price)){
				  $('#errormsgvalidation').html('special price must be less than price');
				  $('#errormsgvalidation1').html('special price must be less than price');
				  return false;
			   }
			   $('#errormsgvalidation').html('');
			   $('#errormsgvalidation1').html('');
		   if(desc==''){
			    $('#descerrormsg').html('Description is required').css("color", "red");
			  return false;
			   
		   }else if(img==''){
			    $('#uploadimgerror').html('Image1 is required').css("color", "red");
			  return false;  
			}else if(img!=''){
					  var fup = document.getElementById('picture1');
				var fileName = fup.value;
				var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
				if(ext !=''){
					if(ext == "png" || ext == "jpg" || ext == "gif" || ext == "jpeg")
					{
					jQuery('#uploadimgerror').html('');
					} else{
					jQuery('#uploadimgerror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
					return false;
					}
				}
			   
		   }
			  $('#descerrormsg').html('');
			   
		   
		  
		  // return false;
	   }
	   
	   function enablesubbmit(){
		   document.getElementById('keysubtton').disabled = false;
		  $('#errormsgvalidation').html('');
		  $('#descerrormsg').html('');
		  $('#uploadimgerror').html('');
		}
   function addrequestsubcategory(){
	   var catid=document.getElementById('category_id').value;
	   if(catid==''){
		   		jQuery('#suberrormsg').html('please select Category');
				return false;
		}
		jQuery('#suberrormsg').html('');
	   var subcategory=document.getElementById('addsubcategoryname').value;
	   if(subcategory==''){
		   		jQuery('#addsubcaterrormsg').html('Request for Add SubCategory is required');
				return false;
		}
	   if(subcategory!=''){
		 jQuery('#suberrormsg').html('');
		 jQuery('#addsubcaterrormsg').html('');
			jQuery.ajax({
				url: "<?php echo site_url('seller/products/addsubcategory');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					subcategoryname: subcategory,
					categoryid: catid,
					},
				dataType: 'json',
				success: function (data) {
					if(data.msg==0){
						jQuery('#addsubcaterrormsg').html('Subcategory Name already exits.please use another Subcategory Name').fadeIn().fadeOut(5000);
						return false;
					}
					if(data.msg==1){
						jQuery('#addsubcaterrormsg1').html('Subcategory Successfully Added!').fadeIn().fadeOut(5000);
						document.getElementById('addsubcategoryname').value='';
						 $("#addsubcat").toggle().fadeOut(5000);
					}
					if(data.msg==2){
						jQuery('#addsubcaterrormsg').html('Sorry, a technical error occurred! Please try again later.').fadeIn().fadeOut(5000);
						return false;
					}
				}
			});
	   }
	   
   } 
   function addrequestcategory(){
	   var category=document.getElementById('addcategoryname').value;
	   if(category==''){
		   		jQuery('#addcaterrormsg').html('Request for Add Category is required');
				return false;
		}
	   if(category!=''){
		 jQuery('#addcaterrormsg').html('');
			jQuery.ajax({
				url: "<?php echo site_url('seller/products/addcategory');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					categoryname: category,
					},
				dataType: 'json',
				success: function (data) {
					if(data.msg==0){
						jQuery('#addcaterrormsg').html('Category Name already exits.please use another category Name').fadeIn().fadeOut(5000);
						return false;
					}
					if(data.msg==1){
						jQuery('#addcaterrormsg1').html('Category Successfully Added').fadeIn().fadeOut(5000);
						document.getElementById('addcategoryname').value='';
						 $("#addcat").toggle().fadeOut(5000);
					}
					if(data.msg==2){
						jQuery('#addcaterrormsg').html('Sorry, a technical error occurred! Please try again later.').fadeIn().fadeOut(5000);
						return false;
					}
				}
			});
	   }
	   
   }
function removeextrafields(){
	  
	   $('#product_name').val('');
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
	var subitemid= document.getElementById('subitemid').value;
	document.getElementById('category_ids').value = catid;
	document.getElementById('subcategory_ids').value = subcatid;
	document.getElementById('subitemids').value = subitemid;

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
		 $("#addcategoryname").val('');
        $("#addcaterrormsg").html('');
    });
  
});
$(document).ready(function(){
    $("#subcategoryhideshow").click(function(){
        $("#addsubcat").toggle();
        $("#suberrormsg").html('');
        $("#addsubcategoryname").val('');
        $("#addsubcaterrormsg").html('');	
    });
  
});	


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

  
  function getsubcategory(id){
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

</script>
 


		