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

</style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>


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
	
	<form onsubmit="return validateForm()" name="addproduct" id="addproduct" action="<?php echo base_url('seller/products/insert/'); ?>" method="post" enctype="multipart/form-data" >
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
			
			
	</div>
	<div class="clearfix"></div>
	<hr>
	<div id="inputfiledshideshow" style="">
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					   <label for="exampleInputEmail1">product Name</label>
					   
						<input  style="font-size:16px" type="text" class="form-control typeahead tt-query"  autocomplete="off" spellcheck="false" onchange="getoldproduct_details(this.value);" name="product_name" id="product_name" >
				</div>
			</div>
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">price</label>
					<input type="text" class="form-control" id="product_price" name="product_price" >
			</div>
		</div>
	</div>
	<div id="mobile_products"></div>
	<span id="newmobile_products">
	
	</span>
	
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
function changememory(id){
	$('#internal_memory').val(id);
}
function changesimtype(id){
	$('#sim_supported').val(id);
}
$(document).ready(function(){
    // Defining the local dataset
    var cars = [<?php echo "'".$pdata."'"; ?>];
    
    // Constructing the suggestion engine
    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });
    
    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing result */
    },
    {
        name: 'cars',
        source: cars
    });
});  



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
					$("#newmobile_products").hide();
					$("#mobile_products").empty();
					$("#mobile_products").append(data);
					
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
		   if(specialprice==''){
			   $('#errormsgvalidation').html('Please enter special price');
			  return false;
		   }else{
			   
			   
			   if (!IsMobile(specialprice)) {
            $("#errormsgvalidation").html("Please Enter Correct special price").css("color", "red");
            jQuery('#seller_mobile').focus();
            return false;
            } 
			   if(Number(specialprice) > Number(price)){
				  $('#errormsgvalidation').html('special price must be less than price');
				  return false;
			   }else{
				  return true;
			   }
		   
		   }
		  // return false;
	   }
	   
	   function enablesubbmit(){
		   document.getElementById('keysubtton').disabled = false;
		  $('#errormsgvalidation').html('');
		  
		   
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
	   $('#product_type71').val('');
	   $('#product_theme12').val('');
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

 $('#sizeid').hide();
 function getproductinputs(id){
	
	 if(id==18){
		  $('#foodcategoryinputs').show();
		  $('#brand').hide();
		  $('#idealfor').hide();
		  $('#sizesid').hide();
		  $('#colorid').hide();
	  }else if(id==21){
		$('#colorid').hide();  
		$('#sizesid').hide();  
		$('#ideal_for').hide();  
		  
	  }else{
		  $('#foodcategoryinputs').hide();
		
		  $('#idealfor').show();
		  $('#sizesid').show();
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
	$('#nametypeahead').val(ids);
	if(ids==7 || ids==24){
		$('#sizesid').hide();
		$('#colorid').hide();
	}
	if(ids==40){
		$('#sizesid').hide();
		$('#colorid').hide();
		$('#mobilesinputs').show();
	}else{
		$('#mobilesinputs').hide();
		$('#sizeid').show();		
	}
	
	if(ids==9){
		$('#sizesid').hide();
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
		$('#product_themeetc').show();
		$('#sizesid').hide();
		$('#colorid').hide();
		//$('#ideal_for').hide();
	}else{
		$('#product_themeetc').hide();

	}
	if(ids==13 || ids==16 || ids==17){
		
		$('#sizesid').show();
		$('#colorid').show();
		$('#mensfabricsinputs1').show();
	}else{
		$('#mensfabricsinputs1').hide();

	}
	if(ids==14 || ids==19 || ids==20 || ids==8){
		$('#winterwaerinputs1').show();
		$('#sizesid').show();
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
		$('#sizesid').show();
		$('#colorid').show();
	}
	if(ids==50){
		$('#womenswatchesinputs').show();
	}else{
		$('#womenswatchesinputs').hide();
	}
	if(ids==19){
		$('#winterwaerinputs').show();
		$('#sizesid').show();
		$('#colorid').show();
	}else{
		$('#winterwaerinputs').hide();
	}
	
	
	if(ids==22){
		$('#mensaccessoriesinputs').show();
		$('#sizesid').show();
		$('#colorid').show();
	}else{
		$('#mensaccessoriesinputs').hide();
	}
	if(ids==51){
		$('#mensehinicwearinputs').show();
		$('#sizesid').show();
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
		$('#sizesid').hide();
		$('#colorid').hide();
	}
	if(ids==26){
		$('#sizesid').hide();
		$('#colorid').hide();
		$('#idealfor').hide();
	}
	if(ids==27){
		$('#watchesinputs').show();
	}else{
		$('#watchesinputs').hide();	
	}
	if(ids==25){
		$('#sizesid').show();
		$('#colorid').show();
		$('#womensaccessoriesinputs').show();
	}else{
		$('#womensaccessoriesinputs').hide();	
	}
	if(ids==52){
		$('#sizesid').show();
		$('#colorid').show();
		$('#winterwaerinputs').show();
	}else{
		$('#winterwaerinputs').hide();	
	}
	if(ids==28){
		$('#sizesid').show();
		$('#colorid').show();
		$('#winterwaerinputs').show();
	}else{
		$('#winterwaerinputs').hide();	
	}
	if(ids==29){
		$('#sizesid').show();
		$('#colorid').show();
		$('#winterwaerinputs').show();
	}else{
		$('#winterwaerinputs').hide();	
	}
	if(ids==30){
		$('#sizesid').hide();
		$('#colorid').hide();
		$('#mobileaccessoriesinputs').show();
	}else{
		$('#mobileaccessoriesinputs').hide();	
	}
	if(ids==31 || ids==32  || ids==33){
		$('#sizesid').hide();
		$('#colorid').hide();
	}
	if(ids==34){
		$('#sizesid').hide();
		$('#colorid').show();
		$('#camerainputs').show();
	}else{
		$('#camerainputs').hide();	
	}
	if(ids==35){
		$('#sizesid').hide();
		$('#colorid').hide();
		$('#tabletsinputs').show();
	}else{
		$('#tabletsinputs').hide();	
	}
	if(ids==36){
		$('#sizesid').hide();
		$('#colorid').hide();
		$('#routersinputs').show();
	}else{
		$('#routersinputs').hide();	
	}
	if(ids==39){
		$('#sizesid').hide();
		$('#colorid').hide();
		$('#laptopsinputs').show();
	}else{
		$('#laptopsinputs').hide();	
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
<script src="<?php echo base_url(); ?>assets/seller/dist/js/typeahead.bundle.js" type="text/javascript"></script>
  


		