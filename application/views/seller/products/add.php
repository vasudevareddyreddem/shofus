<style>
.label-info{
	border: 1px solid #ddd !important;
	 background-color: #fafafa !important;
	 color:#555 !important;
 }

</style>
<head>
</head>
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
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
	<section class="content">
		<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Add Single Product</a></li>
                                <li><a href="#tab2" data-toggle="tab">Add Multipule Products</a></li>
                            </ul>
                            <!-- Tab panels -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1">
                                    <div class="panel-body">
										<form name="addprodustc" id="addprodustc" action="<?php echo base_url('seller/products/insert/'); ?>" method="post" enctype="multipart/form-data">
											<div class="form-group nopaddingRight col-md-12 san-lg">
											    <label for="exampleInputEmail1">Select Category</label>
												<select class="form-control " onchange="getsubcategory(this.value);" id="category_id" name="category_id">
												<option value="">Select Category</option>
												<?php foreach($category_details as $list){ ?>
												<option value="<?php echo $list['seller_category_id']; ?>"><?php echo $list['category_name']; ?></option>
												<?php } ?>
												
											  </select>
											 
											</div>
											<div class="clear-fix"></div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Sub Category </label>
												<select class="form-control " id="subcategorylist" name="subcategorylist" >
												<option value="">Select Subcategory </option>

												</select>
											 
											</div>
										
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Sku code</label>
												<input type="text" class="form-control" name="skuid" id="skuid" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Other Unique code</label>
												<input type="text" class="form-control" name="otherunique" id="otherunique" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Product name</label>
												<input type="text" class="form-control" id="productname" name="productname" >
											</div>
											
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">price</label>
												<input type="text" class="form-control" id="price" name="product_price" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Special price</label>
												<input type="text" class="form-control" id="specialprice" name="specialprice" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											<label for="exampleInputEmail1">Sleeve / Fitting type </label>
											<input type="text" class="form-control" id="producttype" name="producttype" >

											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Material</label>
												<input type="text" class="form-control" id="material" name="material" >
											</div>
											<div class="col-md-6  ">
												<div class="form-group ">
												<label>Size</label>
													<div class="example example_typeahead">
														<div class="bs-example">
															<input type="text" value="XL,XX,XXX,SM" />
														</div>
													</div>

												</div>
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Weight</label>
												<input type="text" class="form-control" id="weight" name="weight" >
											</div>
											<div class="col-md-6  ">
												<div class="form-group ">
												<label>Color</label>
													<div class="example example_typeahead">
														<div class="bs-example">
															<input type="text" value="Bayapu,Chinna" />
														</div>
													</div>
												</div>
												
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Season</label>
												<input type="text" class="form-control" id="season" name="season" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Brand </label>
												<input type="text" class="form-control" id="brand " name="brand" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Gender</label>
												<select class="form-control " id="gender" name="gender" >
												<option value="">Select </option>
												<option value="0">Male</option>
												<option value="1">Female</option>
												<option value="2">Both</option>
												</select>
											 </div>
											 <div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Qty</label>
												<input type="text" class="form-control" id="qty" name="qty" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Meta keywords</label>
												<input type="text" class="form-control" id="keywords" name="keywords" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Meta title</label>
												<input type="text" class="form-control" id="title" name="title" >
											</div>
											<div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Status</label>
												<select class="form-control " id="status" name="status" >
												<option value="">Select </option>
												<option value="0">Available</option>
												<option value="1">Unavailable</option>
												</select>
											 </div>
											 <div class="form-group nopaddingRight col-md-6 san-lg">
											    <label for="exampleInputEmail1">Product description</label>
												<textarea  placeholder="product Description" class="form-control" rows="3" id="product_description" name="product_description"></textarea>
											</div>
											<div  class="form-group nopaddingRight col-md-6 san-lg">
												<div id="tab_sep">
													<div class="col-md-6" style="padding:0">
														<label for="exampleInputEmail1">Product specifications </label>
														<input style="border-radius:5px 0px 0px 5px" type="text" class="form-control" id="specificationvalueid" name="specificationvalue[]" >
													</div>
													<div class="col-md-6" style="padding:0">
														<label for="exampleInputEmail1">&nbsp; </label>
														<input style="border-radius:0px 5px 5px 0px" type="text" class="form-control" id="specificationnameid" name="specificationname[]" >
													</div>
												</div>
												
												<div class="pull-right" id="delbtn" style="padding-top:10px;display:none">
													<a id="tab_delet" class="btn btn-default btn-xs pull-left">Delete Row</a>
												</div>
												<div class="pull-right" style="padding-top:10px;">
													<a id="add_sep" class="btn btn-default btn-xs pull-left">Add Row</a>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="container">
												<div class="row ">
												<div class="form-group nopaddingRight  col-md-5 san-lg ">
												<label>Item Image</label>
												<table class="table" id="tab_logic">
												<tbody>
													<tr id='addr0'>
														<td>
														<input type="file" name='picture_three[]' id="picture_three" class="form-control"/>
														</td>
													</tr>
													<tr id='addr1'></tr>
												</tbody>
												</table>
												</div>
												<div class="clearfix"></div>
												<div  class="col-md-5 san-lg" >
												<div class="pull-left">
												<a id="add_row" class="btn btn-default pull-left">Add Row</a>
												</div>
												<div class="pull-right" id="deletediv" style="padding-right:30px; display:none;">
												<a id='delete_row' class="btn btn-default">Delete Row</a>
												</div>
												</div>
												</div>
												<div class="clearfix"></div>


											</div>
											<div style="margin-top: 20px; margin-left: 15px;">
											<button type="submit" class="btn btn-primary" >Submit</button>
											<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/products'); ?>">Cancel</a>
											</div>
										</form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2">
                                    <div class="panel-body">
                <div >
					<p class="pull-left"><strong>Note:</strong> &nbsp;Please Select your Category and Download sample file then filling  the data then again upload your products </p>&nbsp;&nbsp;<span class="pull-right"><a href="<?php echo base_url('uploads'); ?>/Importproduct.xlsx" >Download sample Import File</a></span>
				</div>
				<hr>
				<form id="importproducts" onsubmit="return checkvalidation();" name="importproducts" action="<?php echo base_url('seller/products/uploadproducts'); ?>" method="post" enctype="multipart/form-data" >

				 
				 <div class="row">
				 <div class="form-group nopaddingRight col-md-6 ">
                  <label for="exampleInputEmail1">Select Category</label>
				  <?php //echo '<pre>';print_r($sub_cat_data);exit;?>
				  <select class="form-control " onchange="documentid(this.value);getsubcat(this.value);"  id="category_id_import" name="category_id_import">
                    <option value="">Select Category</option>
					<?php foreach($sub_cat_data as $single_cat_data){ ?>
					<option value="<?php echo $single_cat_data['seller_category_id'].'/'.$single_cat_data['documetfile']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   <?php }?>
                  </select>
				 </div>
				 <div class="form-group nopaddingRight col-md-6">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" onchange="hidemsg(this.value);" id="subcategory_id_import" name="subcategory_id_import">
                   </select>
				   <span id="errormsg" style="color:red"></span>
                </div>
                </div>
				 <div class="row">
				<div class="form-group nopaddingRight col-md-6">
				<label for="exampleInputPassword1">Import File</label>
				<input type="file" name="categoryes" id="categoryes" class="form-control" >
				</div>
				<div class="form-group nopaddingRight col-md-12">
				 <button type="submit" class="btn btn-primary" >Submit</button>
				</form>
				</div>
				</div>
                                    </div>
                                </div>
                            </div>
                        </div>
	</section>
</div>
  <!--main content end--> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	 
  <script>
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
      $('#addrs'+k).html("<div class='col-md-6' style='padding:0'><input style='border-radius:5px 0px 0px 5px' type='text' class='form-control' id='specificationvalueid[]' name='specificationvalue[]' ></div><div class='col-md-6' style='padding:0'><input style='border-radius:0px 5px 5px 0px' type='text' class='form-control' id='specificationnameid[]' name='specificationname[]' ></div>");
		$('#tab_sep').append('<div id="addrs'+(k+1)+'"></div>');
		if(k >=2){
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
	  
	  
</script>




		
